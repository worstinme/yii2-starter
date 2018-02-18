<?php

/* @var $this \yii\web\View */

/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\Menu;

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
<body class="admin">
<?php $this->beginBody() ?>
<div class="mainnav uk-navbar-container">
    <div class="uk-container uk-container-expand">
        <nav class="uk-navbar" uk-navbar>
            <div class="uk-navbar-left">
                <?= Menu::widget([
                    'options' => ['class' => 'uk-navbar-nav uk-hidden-small'],
                    'encodeLabels' => false,
                    'activeCssClass' => 'uk-active',
                    'submenuTemplate' => "\n<div class=\"uk-navbar-dropdown\">\n<ul class=\"uk-nav uk-navbar-dropdown-nav\">\n{items}\n</ul>\n</div>\n",
                    'items' =>
                        array_merge([
                            ['label' => '<i uk-icon="icon: nut"></i>', 'url' => ['/site/index']],
                        ], Yii::$app->getModule('zoo')->nav, Yii::$app->getModule('widgets')->nav,[
                            ['label' => 'Меню', 'url' => ['/menu/index']],
                        ])
                ]); ?>
            </div>
            <div class="uk-navbar-right">
                <?= Menu::widget([
                    'options' => ['class' => 'uk-navbar-nav uk-hidden-small'],
                    'items' => [
                        [
                            'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'template' => '<a href="{url}" data-method="post">{label}</a>',
                        ]
                    ],
                ]); ?>
            </div>
        </nav>
    </div>
</div>
<?php if (Yii::$app->controller->module->id == 'zoo') : ?>
    <?= $content ?>
<?php else: ?>
    <div class="uk-container uk-container-expand">
        <?= $content ?>
    </div>
<?php endif; ?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
