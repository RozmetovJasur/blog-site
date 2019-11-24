<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 21.11.2019
 * Time: 21:42
 */

namespace app\controllers;


use app\helpers\Html;
use app\models\UserTagsModel;
use Yii;
use app\components\AuthController;
use app\models\UserArticlesModel;
use app\models\UserBlogsModel;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * Class CabinetController
 * @package app\controllers
 */
class CabinetController extends AuthController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * @return string
     * @throws \yii\base\ExitException
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionAddArticle()
    {
        $model = new UserArticlesModel();
        $model->user_id = Yii::$app->user->id;
        return $this->editBlock($model);
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     * @throws \yii\base\ExitException
     */
    public function actionUpdateArticle($id)
    {
        $model = UserArticlesModel::find()
            ->where([
                'id' => $id,
                'user_id' => Yii::$app->user->id,
            ])->one();
        if(!$model)
            throw new NotFoundHttpException();
        return $this->editBlock($model);
    }

    /**
     * @param UserArticlesModel $model
     * @return string
     * @throws \yii\base\ExitException
     * @throws \yii\web\NotFoundHttpException
     */
    private function editBlock(UserArticlesModel $model)
    {
        $model->setScenario($model::SCENARIO_EDIT);
        $model->ajaxValidation();
        if($model->postValidation())
        {
            $transaction = Yii::$app->db->beginTransaction();
            try{
                if($model->isNewRecord || $model->isAttributeChanged('image') ){
                    $model->image = UploadedFile::getInstance($model, 'image');
                    if($model->image) {
                        $fileName = time() . '.' . $model->image->extension;
                        $fullPath = 'uploads/content/' . $fileName;
                        $model->image->saveAs($fullPath);
                        $model->image = $fullPath;
                    }
                }
                $model->save();
                $transaction->commit();
                Html::alertSuccess(t("Ma'lumotlar muvaffaqiyatli saqlandi."));

            }catch (\Exception $e){
                print_variable($e->getMessage());
                Html::alertTransactionException($e);
                $transaction->rollBack();
            }

            return  $this->redirect(['articles/index']);
        }
        $blogs = ArrayHelper::map(UserBlogsModel::find()
            ->orderBy(['id' => SORT_ASC])
            ->all(),'id', 'name');
        $tags = ArrayHelper::map(UserTagsModel::find()
            ->orderBy(['id' => SORT_ASC])
            ->all(),'id', 'name');

        return $this->render('edit',[
            'model' => $model,
            'blogs' => $blogs,
            'tags' => $tags,
        ]);
    }
}