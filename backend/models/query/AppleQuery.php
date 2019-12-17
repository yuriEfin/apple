<?php


namespace backend\models\query;

use common\models\BaseApple;

/**
 * This is the ActiveQuery class for [[\backend\models\Apple]].
 *
 * @see BaseApple
 */
class AppleQuery extends \yii\db\ActiveQuery
{
    /**
     * {@inheritdoc}
     * @return BaseApple[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return BaseApple|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
