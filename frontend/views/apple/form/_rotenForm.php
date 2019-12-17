<?php

use \yii\widgets\ActiveForm;
use \yii\bootstrap\Html;
use yii\helpers\Url;

/**
 * @var \frontend\models\form\RottenForm $model
 * @var \frontend\models\Apple $appleModel
 */
?>

<?php $form = ActiveForm::begin(
    [
        'id' => 'js-form-rotten',
        'action' => Url::to(['/apple/rotten', 'appleId' => $appleModel->id]),
    ]
) ?>
<?= $form->field($model, 'apple_id')->hiddenInput()->label(false) ?>
<?= Html::submitButton(Yii::t('app', 'Rotten Action'), ['class' => 'btn btn-sm']) ?>
<?php ActiveForm::end(); ?>