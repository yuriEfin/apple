<?php

use \yii\widgets\ListView;

/**
 * @var \yii\data\ActiveDataProvider      $dataProvider
 * @var \frontend\models\form\BiteOffForm $biteOffFormModel
 * @var \frontend\models\form\RottenForm  $rottenFormModel
 * @var \frontend\models\form\FailForm    $failFormModel
 */
?>

<?= ListView::widget(
    [
        'dataProvider' => $dataProvider,
        'layout' => '{items}',
        'itemView' => function ($model) use ($biteOffFormModel, $rottenFormModel, $failFormModel) {
            return $this->render(
                '_item_apple',
                [
                    'model' => $model,
                    'biteOffFormModel' => $biteOffFormModel,
                    'rottenFormModel' => $rottenFormModel,
                    'failFormModel' => $failFormModel,
                ]
            );
        },
    ]
) ?>