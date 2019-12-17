<?php


namespace frontend\components\interfaces;

/**
 * Interface RandomObjectGenerateInterface
 */
interface RandomObjectGenerateInterface
{
    /**
     * @param array $params
     *
     * @return mixed
     */
    public function randomGenerateItems($params = []): array;
}