<?php
use app\helpers\Html;
use yii\helpers\Url;
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 19.11.2019
 * Time: 19:58
 */

/** @var $tags[] */
/** @var $blogs[] */
/** @var $this \yii\web\View */
/** @var $data \app\components\ActiveDataProvider */
/** @var $row \app\models\UserArticlesModel */
$user = Yii::$app->user;
?>
<?php if($data->models): ?>
    <?php foreach ($data->models as $row): ?>
        <div class="blog_left_sidebar">
            <article class="blog_style1">
                <?php if(!$user->isGuest && $row->user_id == $user->id): ?>
                    <p><?= Html::a(t('Tahrirlash'),['cabinet/update-article', 'id' => $row->id]); ?> </p>
                <?php endif; ?>
                <div class="blog_img">
                    <?= Html::img(Url::to('@web/'.$row->image),['class' => 'img-fluid']); ?>
                </div>
                <div class="blog_text">
                    <div class="blog_text_inner">
                        <div class="cat">
                            <?php if(is_array($row->blog_id)): ?>
                                <?php foreach ($row->blog_id as $key => $value): ?>
                                    <?php if(!isset($blogs[$value]))continue; ?>
                                    <?= Html::a($blogs[$value]['name'],['tags/index', 'url' => $blogs[$value]['slug'] ], ['class' => 'cat_btn']); ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <?= Html::a('<h4>'.$row->title.'</h4>',['articles/index', 'url' => $row->slug]); ?>
                        <p><?= $row->contentCut; ?></p>

                        <div class="cat">
                            <?php if(is_array($row->tag_id)): ?>
                                <?php foreach ($row->tag_id as $key => $value): ?>
                                    <?php if(!isset($tags[$value]))continue; ?>
                                    <?= Html::a($tags[$value]['name'],['tags/index', 'url' => $tags[$value]['slug'] ], ['class' => 'cat_btn']); ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> <?= date("d/m/Y H:m:s",strtotime($row->created_at)); ?></a>
                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> <?= $row->count_comment; ?></a>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    <?php endforeach; ?>
    <?= \app\widgets\LinkPagerWidget::widget(['pagination' => $data->pagination]); ?>
<?php endif; ?>
