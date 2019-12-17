<?php

use frontend\components\widgets\ShowApple;

?>
<div class="row">
    <div class="col-lg-12">
        <?= ShowApple::widget(
            ['items' => Yii::$app->gameProcess->randomGenerateItems(['quantity' => 3])]
        ) ?>
    </div>
</div>