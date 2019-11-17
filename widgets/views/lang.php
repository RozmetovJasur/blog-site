<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 17.11.2019
 * Time: 17:54
 */
use yii\helpers\Html;

?>
<li class="nav-item submenu dropdown">
    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <?= $current;?> <i class="fa fa-caret-down" aria-hidden="true"></i>
    </a>
    <ul class="dropdown-menu">
        <?php foreach ($langs as $key => $value):?>
            <?php if($key == Yii::$app->language)continue; ?>
            <li class="nav-item"><?= Html::a($key, ['site/index', 'lang' => $key], ['class' => 'nav-link']) ?></li>
        <?php endforeach;?>
    </ul>
</li>

