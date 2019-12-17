<?php

namespace backend\models;

use backend\models\query\ColorQuery;
use common\models\BaseApple;
use common\models\BaseColor;

/**
 * This is the model class for table "{{%color}}".
 *
 * @property int         $id
 * @property int         $title Object item id
 * @property int         $created_at Created at
 * @property int|null    $updated_at Updated at
 * @property int         $created_by Created By
 * @property int|null    $updated_by Created By
 *
 * @property BaseApple[] $apples
 */
class Color extends BaseColor
{
    /**
     * {@inheritdoc}
     * @return ColorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ColorQuery(get_called_class());
    }
}
