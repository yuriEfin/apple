<?php


namespace frontend\components\interfaces;

interface BiteOffPieceProcessInterface
{
    /**
     * @param array $params
     *
     * @return mixed
     */
    public function processBiteOffPiece(ItemInterface $item, $params = []);

    /**
     * @param ItemInterface $item
     * @param float         $percent
     *
     * @return mixed
     */
    public function calculateBiteOfPercent(ItemInterface $item, float $percent);
}