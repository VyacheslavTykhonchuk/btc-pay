<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<?php
$body_class ='';
$footer_class ='';
if(Yii::$app->controller->id=='site' && Yii::$app->controller->action->id=='index' ){
    $body_class = 'home-page body_home-page';
    $footer_class = 'main-footer  main-footer_white main-footer_mob-gray';
}
if(Yii::$app->controller->id=='site' && Yii::$app->controller->action->id=='about' ){
    $body_class = 'about about_page';
    $footer_class = 'main-footer  main-footer_transparent';
}
if(Yii::$app->controller->id=='site' && Yii::$app->controller->action->id=='contact' ){
    $body_class = 'contact-us contact_page';
    $footer_class = 'main-footer  main-footer_white main-footer_blue-logo';
}
if(Yii::$app->controller->id=='site' && Yii::$app->controller->action->id=='blog' ){
    $body_class = 'blog';
    $footer_class = 'main-footer main-footer_mt';
}

?>

<body  class="<?=$body_class?>">
<?php $this->beginBody() ?>
<header class="main__header page-header wrap">
    <a class="main__header__logo" href="<?=\yii\helpers\Url::toRoute(['site/index'])?>">
        <img src="/design/landing/img/55.png" alt="">
    </a>
    <div class="main__header__wrap">
    <div class="mobileOpen mobile-burger">
            <svg width="18px" height="9px" viewBox="0 0 18 9" version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <!-- Generator: Sketch 49 (51002) - http://www.bohemiancoding.com/sketch -->
                <desc>Created with Sketch.</desc>
                <defs></defs>
                <g id="mobile" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Contact" transform="translate(-16.000000, -27.000000)" fill="#FFFFFF">
                        <g id="Group-3" transform="translate(16.000000, 27.000000)">
                            <rect id="Rectangle-13" x="0" y="0" width="18" height="1.28571429"></rect>
                            <rect id="Rectangle-13" x="0" y="3.85714286" width="18" height="1.28571429"></rect>
                            <rect id="Rectangle-13" x="0" y="7.71428571" width="18" height="1.28571429"></rect>
                        </g>
                    </g>
                </g>
            </svg>
        </div>
        <div class="main__header__nav">
            <a href="<?=\yii\helpers\Url::toRoute(['site/about'])?>" class="main__header__nav__link"><?=Yii::t('app','About us')?></a>
            <a href="<?=\yii\helpers\Url::toRoute(['site/blog'])?>" class="main__header__nav__link"><?=Yii::t('app','Blog')?></a>
            <a href="<?=\yii\helpers\Url::toRoute(['site/contact'])?>" class="main__header__nav__link"><?=Yii::t('app','Contact')?></a>
        </div>
        <div class="main__header__sign">
            <?php if(Yii::$app->user->isGuest){?>
            <a href="" class="main__header__sign__in openModal" data-open-modal="login"><?=Yii::t('app','Login')?></a>
            <a href="" class="main__header__sign__up openModal" data-open-modal="register"><?=Yii::t('app','Register')?></a>
            <?php }else{?>
            <a href="<?=\yii\helpers\Url::toRoute(['site/logout'])?>" class="main__header__sign__in" ><?=Yii::t('app','Logout')?></a>
            <a href="<?=\yii\helpers\Url::toRoute(['cabinet/index'])?>" class="main__header__sign__up" ><?=Yii::t('app','Cabinet')?></a>
            <?php }?>
        </div>
    </div>
</header>

        <?= $content ?>


<footer class="<?=$footer_class?>" id="mainHeader">
    <div class="wrap main__header">
        <a class="main__header__logo">
            <img src="/design/landing/img/footerlogo.png" alt="">
        </a>
        <div class="main__header__wrap">
            <div class="main__header__nav">
                <a href="<?=\yii\helpers\Url::toRoute(['site/about'])?>" class="main__header__nav__link"><?=Yii::t('app','About us')?></a>
                <a href="<?=\yii\helpers\Url::toRoute(['site/blog'])?>" class="main__header__nav__link"><?=Yii::t('app','Blog')?></a>
                <a href="<?=\yii\helpers\Url::toRoute(['site/contact'])?>" class="main__header__nav__link"><?=Yii::t('app','Contact')?></a>
            </div>
            <div class="main__header__sign">
                <?php if(Yii::$app->user->isGuest){?>
                <a href="" class="main__header__sign__in openModal" data-open-modal="login">Login</a>
                <a href="" class="main__header__sign__up openModal" data-open-modal="register">Register</a>
                <?php }else{?>
                <a href="<?=\yii\helpers\Url::toRoute(['site/logout'])?>" class="main__header__sign__in" ><?=Yii::t('app','Logout')?></a>
                <a href="<?=\yii\helpers\Url::toRoute(['cabinet/index'])?>" class="main__header__sign__up" ><?=Yii::t('app','Cabinet')?></a>
                <?php }?>
            </div>
        </div>
    </div>
</footer>


<?= \frontend\widgets\LoginWidget::widget() ?>
<?= \frontend\widgets\RegisterWidget::widget() ?>

<div class="modal-container" data-modal="restore-pass">
    <div class="modal">
        <div class="modal__title">
            Restore password
        </div>
        <form class="main-form" action="login">
            <input type="email" class=" main-form__item" placeholder="Email">
            <input type="password" class="main-form__item" placeholder="Password">
            <input type="submit" class="btn btn_big" value="Login">
        </form>
    </div>
</div>


<?php $this->endBody() ?>




</body>
</html>
<?php $this->endPage() ?>
