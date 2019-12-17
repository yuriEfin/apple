<?php
/**
 * @var \frontend\models\form\BiteOffForm $biteOffFormModel
 * @var \frontend\models\form\RottenForm  $rottenFormModel
 * @var \frontend\models\form\FailForm    $failFormModel
 */

?>

<div class="row">
    <div class="panel">
        <div class="panel-body">
            <div class="apple col-lg-2" id="apple-<?= $model->id ?>"></div>
            <div class="col-lg-3">
                <?= $this->render('/apple/form/_biteOffForm', ['model' => $biteOffFormModel, 'appleModel' => $model]); ?>
                <?= $this->render('/apple/form/_failForm', ['model' => $failFormModel, 'appleModel' => $model]); ?>
                <?= $this->render('/apple/form/_rotenForm', ['model' => $rottenFormModel, 'appleModel' => $model]); ?>
            </div>
        </div>
    </div>
</div>

