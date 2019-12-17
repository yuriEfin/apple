<?php

namespace backend\models\query;

use common\models\BaseColor;

/**
 * This is the ActiveQuery class for [[\backend\models\Color]].
 *
 * @see BaseColor
 */
class ColorQuery extends \yii\db\ActiveQuery
{
    /**
     * {@inheritdoc}
     * @return BaseColor[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return BaseColor|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
