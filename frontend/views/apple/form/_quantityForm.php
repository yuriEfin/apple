<?php

use \yii\widgets\ActiveForm;
use \yii\bootstrap\Html;

/**
 * @var \frontend\models\form\QuantityForm $quantityFormModel
 */
?>
<h1>Сгенерируйте яблоки</h1>
<?php $form = ActiveForm::begin(
    [
        'id' => 'js-form-quantity',
    ]
) ?>
<?= $form->field($quantityFormModel, 'quantity')->textInput(['encode' => false]) ?>
<?= Html::submitButton(Yii::t('app', 'Generate'), ['class' => 'btn btn-sm']) ?>
<?php ActiveForm::end(); ?>

