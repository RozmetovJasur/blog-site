<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 17.11.2019
 * Time: 19:08
 */
use yii\helpers\Html;
/** @var $menus [] */
/** @var $current_route string */
$user = Yii::$app->user;
?>
<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
    <ul class="nav navbar-nav menu_nav">
        <?php foreach ($menus as $row):
            $title = isset($row["title"]) ? $row["title"] : "";
            $url = isset($row["url"]) ? $row["url"] : "";?>
            <li class="nav-item <?= in_array($current_route, $url) ? "active" : "";?>">
                <?= Html::a($title, $url, ['class' => 'nav-link']); ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <ul class="nav navbar-nav navbar-right   ml-auto">
        <?php if($user->isGuest): ?>
            <li class="nav-item"><?= Html::a(t("Kirish").' '.'<i class="fa fa-sign-in"></i>', ['site/login'],['class' => 'nav-link']); ?></li>
            <li class="nav-item"><?= Html::a(t("Ro'yxatdan o'tish").' '.'<i class="fa fa-plus"></i>', ['site/registration'],['class' => 'nav-link']); ?></li>
        <?php else: ?>
            <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <?= t("Yangi");?> <i class="fa fa-caret-down" aria-hidden="true"></i>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item"><?= Html::a(t("Maqola"), ['cabinet/add-article'], ['class' => 'nav-link']) ?></li>
                    <li class="nav-item"><?= Html::a(t("Yangilik"), ['cabinet/add-news'],['class' => 'nav-link']); ?></li>
                </ul>
            </li>
            <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <?= $user->identity->fname;?> <i class="fa fa-caret-down" aria-hidden="true"></i>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item"><?= Html::a(t("Profil"), ['site/index'], ['class' => 'nav-link']) ?></li>
                    <li class="nav-item"><?= Html::a(t("Chiqish").' '.'<i class="fa fa-sign-out"></i>', ['site/logout'],['class' => 'nav-link']); ?></li>
                </ul>
            </li>
        <?php endif; ?>
        <?= \app\widgets\LangWidget::widget(); ?>
        <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-facebook"></i></a></li>
        <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-twitter"></i></a></li>
    </ul>
</div>