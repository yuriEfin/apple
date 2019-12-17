<?php

namespace frontend\models\query;

use common\models\BaseStatus;

/**
 * This is the ActiveQuery class for [[\frontend\models\Status]].
 *
 * @see BaseStatus
 */
class StatusQuery extends \yii\db\ActiveQuery
{
    /**
     * {@inheritdoc}
     * @return BaseStatus[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return BaseStatus|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
