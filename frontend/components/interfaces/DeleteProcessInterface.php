<?php


namespace frontend\components\interfaces;

/**
 * Class DeleteInterface
 */
interface DeleteProcessInterface
{
    /**
     * @param ItemInterface $item
     *
     * @return mixed
     */
    public function processDeleteItem(ItemInterface $item);
}