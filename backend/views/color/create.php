<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Color */

$this->title = Yii::t('app', 'Create Color');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Colors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="color-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
