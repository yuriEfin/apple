<?php

use frontend\models\form\QuantityForm;
use frontend\models\form\RottenForm;
use \yii\widgets\ListView;
use \yii\widgets\ActiveForm;

/**
 * @var \yii\data\ActiveDataProvider       $dataProvider
 * @var \frontend\models\form\BiteOffForm  $biteOffFormModel
 * @var \frontend\models\form\QuantityForm $quantityFormModel
 * @var \frontend\models\form\RottenForm   $rottenFormModel
 */
?>
<div class="container">
    <div class="row">
        <?= $this->render('form/_quantityForm', ['quantityFormModel' => $quantityFormModel]) ?>
    </div>
</div>