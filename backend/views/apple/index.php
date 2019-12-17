<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\AppleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('app', 'Apples');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apple-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Apple'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget(
        [
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                [
                    'attribute' => 'status_id',
                    'value' => function ($model) {
                        return $model->status ? $model->status->name : null;
                    }
                ],
                [
                    'attribute' => 'color_id',
                    'value' => function ($model) {
                        return $model->color ? $model->color->title : null;
                    }
                ],
                'date_fell',
                'size',
                'bite_off_size',
                'deleted',
                'created_at',
                'updated_at',
                'created_by',
                'updated_by',
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]
    ); ?>

    <?php Pjax::end(); ?>

</div>
