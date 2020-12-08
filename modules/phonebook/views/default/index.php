<?php
use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $content string */
echo Url::current();

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?= Html::beginForm(['order/update', 'id' => $id], 'post', ['enctype' => 'multipart/form-data']) ?>
// тип, название поля ввода, установленное в поле значение, атрибуты поля ввода
<?= Html::input('text', 'username', $user->name, ['class' => $username]) ?>



<?= Html::endForm() ?>
    <header><?= $content ?></header>
    <footer>footer</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>