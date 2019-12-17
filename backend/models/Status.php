<?php

namespace backend\models;

use backend\models\query\StatusQuery;
use common\models\BaseApple;
use common\models\BaseStatus;
use Yii;

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
class Status extends BaseStatus
{
    /**
     * {@inheritdoc}
     * @return StatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StatusQuery(get_called_class());
    }
}
