<?php


namespace frontend\components\widgets;

use yii\base\Widget;

/**
 * Class ShowApple
 */
class ShowApple extends Widget
{
    /**
     * @var array
     */
    public $items = [];
    /**
     * @var string
     */
    public $view = '_w_show_apple';

    public function run()
    {
        return $this->render($this->view, ['items' => $this->items]);
    }
}