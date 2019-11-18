<?php

namespace app\commands;

use yii\console\Controller;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\FileHelper;
use Yii;

/**
 * Class FixModelsController
 * @package app\commands
 */
class FixModelsController extends Controller
{
    public $modelsBasePath = [
        '@app/models',
    ];

    public function actionIndex()
    {
        $root = Yii::getAlias("@app");
        foreach ($this->modelsBasePath as $row):
            $files = FileHelper::findFiles(Yii::getAlias($row));

            $commonAttributes = ["id"]; //authKey - IdentityInterface

            foreach($files as $file) {
                $info = pathinfo($file);
                $className = 'app\\'.str_replace("/", "\\", substr($info['dirname'], strlen($root) + 1)."/".$info['filename']);

                if (!class_exists($className)) {
                    require_once $file;
                }

                try {
                    $model = new $className;
                }
                catch (\Error $e) { //trait or interface
                    continue;
                }

                if (!($model instanceof  ActiveRecord)) {
                    continue;
                }

                $ref = new \ReflectionClass($model);

                $properties = [];

                $doc = $ref->getDocComment();

                $define = "class ".$ref->getShortName()." extends";
                $replaceText = $doc ?: $define;

                $replaceTo = ['/**'];
                $replaceTo[] = '* Class '.$ref->getShortName();
                $replaceTo[] = '* @package '.$ref->getNamespaceName();
                foreach($model->attributes as $attrinute => $_) {
                    if (in_array($attrinute, $commonAttributes))
                        continue;

                    $replaceTo[] = '* @property $'.$attrinute;
                }

                foreach($ref->getMethods() as $method) {
                    if ($method->isStatic() || !$method->isPublic())
                        continue;

                    if ($method->getDeclaringClass()->getShortName() != $ref->getShortName())
                        continue;

                    $name = $method->getName();
                    if (strlen($name) <= 3)
                        continue;

                    if (substr($name, 0, 3) != "get")
                        continue;

                    $name = substr($name, 3);

                    $attrinute = strtolower($name[0]).substr($name, 1);
                    if (in_array($attrinute, $commonAttributes))
                        continue;

                    $type = "";
                    try {
                        $ret = $method->invoke($model);
                        if ($ret instanceof ActiveQuery) {
                            /** @var ActiveQuery $ret */
                            $type = ' \\' . $ret->modelClass;
                            if ($ret->multiple)
                                $type .= '[]';
                        }
                    }
                    catch (\Error $e) {
                        continue;
                    }
                    catch (\Exception $e){

                    }

                    $replaceTo[] = '* @property'.$type.' $'.$attrinute;
                }

                $replaceTo[] = '*/';
                if (!$doc) {
                    $replaceTo[] = $define;
                }

                $replaceTo = implode("\n", $replaceTo);

                if ($replaceText == $replaceTo) {
                    continue;
                }

                $content = file_get_contents($file);
                if (strpos($content, $replaceText) === false) {
                    echo "***** NOT FOUND *****\n";
                    echo $file."\n\n";
                    echo "******* TEXT ********\n";
                    echo $replaceText."\n\n";
                    exit(1);
                }

                echo "Process: ".$ref->getName()."\n";
                $content = str_replace($replaceText, $replaceTo, $content);
                file_put_contents($file, $content);
            }

            echo "DONE\n\n";
        endforeach;
    }
}