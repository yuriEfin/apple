<?php

use frontend\models\Apple;
var_dump($items);die;
/**
 * @var Apple $item
 */
?>
<?php foreach ($items as $item): ?>
    <div class="apple circle" id="apple-<?= $item->id ?>"><?= $item->color->title ?></div>
<?php endforeach; ?>