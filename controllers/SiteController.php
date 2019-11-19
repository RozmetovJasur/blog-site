<?php

namespace app\controllers;

use app\components\Controller;
use app\helpers\Html;
use app\models\UsersModel;
use app\models\UserSuggestionsModel;
use Yii;

/**
 * Class SiteController
 * @package app\controllers
 *
 */
class SiteController extends Controller
{
    public function init()
    {
        $this->layout = 'empty';
        parent::init(); // TODO: Change the autogenerated stub
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
//                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $this->layout='main';
        $this->view->title = t("Bosh sahifa");
        $this->registerMetaTagHomePage();
        return $this->render('index');
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * @return string
     * @throws \yii\base\ExitException
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionContact()
    {
        $model = new UserSuggestionsModel();
        $model->setScenario($model::SCENARIO_ADD);
        $model->ajaxValidation();
        if($model->postValidation())
        {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $user = UsersModel::find()
                    ->andFilterWhere(['email' => $model->email])
                    ->one();
                if (!$user) {
                    $user = new UsersModel();
                    $user->fname = $model->fname;
                    $user->email = $model->email;
                    $user->password = Yii::$app->security->generatePasswordHash('123123');
                    $user->save(false);
                }
                $model->user_id = $user->id;
                $model->save();
                $transaction->commit();
                Html::alertSuccess(t("Sizning savolingiz muvaffaqiyatli qabul qilindi."));

            }catch (\Exception $e)
            {
                print_variable($e->getMessage());
                Html::alertTransactionException($e);
                $transaction->rollBack();
            }
            return  $this->redirect(['contact']);
        }
        return $this->render('contact',[
            'model' => $model,
        ]);
    }

    private function registerMetaTagHomePage()
    {
        Yii::$app->view->registerMetaTag([
            'name' => 'keyword',
            'content' => t("shaxsiy blog, web dasturlash, opensource developer"),
        ]);

        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => t("shaxsiy blog, web dasturlash"),
        ]);
    }
}
