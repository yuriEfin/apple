<?php


namespace frontend\components\interfaces;

/**
 * Interface ItemInterface
 */
interface ItemInterface
{
    /**
     * @return bool
     */
    public function biteOffPiece();

    /**
     * @return boolean
     */
    public function fail();

    /**
     * @return bool
     */
    public function rotten();

    /**
     * @return bool
     */
    public function safeRemove();
}