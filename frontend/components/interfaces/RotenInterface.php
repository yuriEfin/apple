<?php


namespace frontend\components\interfaces;

interface RotenInterface
{
    /**
     * @param array $params
     *
     * @return mixed
     */
    public function processRotten(ItemInterface $item, $params = []);
}