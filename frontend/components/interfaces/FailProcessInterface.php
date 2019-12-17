<?php


namespace frontend\components\interfaces;

/**
 * Class FailInterface
 */
interface FailProcessInterface
{
    /**
     * @param ItemInterface $item
     * @param array         $params
     *
     * @return mixed
     */
    public function processFailItem(ItemInterface $item, $params = []);
}