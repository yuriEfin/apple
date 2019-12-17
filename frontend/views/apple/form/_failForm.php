<?php

use \yii\widgets\ActiveForm;
use \yii\bootstrap\Html;
use yii\helpers\Url;

/**
 * @var \frontend\models\form\BiteOffForm $model
 * @var \frontend\models\Apple $appleModel
 */
?>

<?php $form = ActiveForm::begin(
    [
        'id' => 'js-form-bite-off',
        'action' => Url::to(['/apple/fail', 'appleId' => $appleModel->id]),
    ]
) ?>
<?= $form->field($model, 'apple_id')->hiddenInput()->label(false) ?>
<?= Html::submitButton(Yii::t('app', 'Fail Action'), ['class' => 'btn btn-sm']) ?>
<?php ActiveForm::end(); ?>