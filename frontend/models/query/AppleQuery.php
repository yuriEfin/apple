<?php

namespace frontend\models\query;

/**
 * This is the ActiveQuery class for [[\frontend\models\Apple]].
 *
 * @see \frontend\models\BaseApple
 */
class AppleQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        return $this->andWhere('[[status]]=1');
    }

    /**
     * {@inheritdoc}
     * @return \frontend\models\BaseApple[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \frontend\models\BaseApple|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
