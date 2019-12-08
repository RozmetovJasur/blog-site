<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 19.11.2019
 * Time: 19:50
 */
use app\helpers\Html;

$user = Yii::$app->user;
?>
<br>
<footer class="footer-area p_50">
    <div class="container">
        <div class="row">
            <div class="col-lg-3  col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6 class="footer_title"><?= t("Sayt haqida"); ?></h6>
                    <p>
                        <?= Yii::$app->name.' - '.t("Barcha sohalarga oid bilimlar va yangiliklar makoni.Asosiy yo'nalishlar dastulash, SEO, SMM, biznes."); ?>
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6 class="footer_title">
                        <?php if($user->isGuest): ?>
                            <?= t("Mehmon"); ?>
                        <?php else: ?>
                            <?= $user->identity->email; ?>
                        <?php endif; ?>
                    </h6>
                    <?php if($user->isGuest): ?>
                        <p><?= Html::a(t("Kirish"),['site/login']); ?></p>
                        <p><?= Html::a(t("Ro'yxatdan o'tish"),['site/registration']); ?></p>
                    <?php else: ?>
                        <p><?= Html::a(t("Yangi maqola"),['cabinet/add-articles']); ?></p>
                        <p><?= Html::a(t("Yangilik"),['cabinet/add-news']); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="single-footer-widget f_social_wd">
                    <h6 class="footer_title"><?= t("Bog'lanish"); ?></h6>
                    <div class="f_social">
                        <a href="#">+99890123456789</a>
                        <?= Html::a(t("Bog'lanish"), ['site/contact']); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row footer-bottom d-flex justify-content-between align-items-center">
            <p class="col-lg-12 footer-text text-center">
                 &copy; <?= date("Y"); ?>
                <?= t("Barcha huquqlar himoyalangan."); ?>
                <?= t("Sayt {author} tomonidan ishlab chiqilgan.", [
                        'author' => \app\helpers\Html::a('rozmetovjasur','http://rozmetovjasur.uz')
                    ]);?>
            </p>
        </div>
    </div>
</footer>
