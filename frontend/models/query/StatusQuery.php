<?php

namespace frontend\models\query;

/**
 * This is the ActiveQuery class for [[\frontend\models\Status]].
 *
 * @see \frontend\models\BaseStatus
 */
class StatusQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \frontend\models\BaseStatus[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \frontend\models\BaseStatus|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
