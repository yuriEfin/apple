<?php


namespace frontend\models;

use Yii;
use common\models\BaseApple;
use common\models\BaseColor;

/**
 * This is the model class for table "{{%color}}".
 *
 * @property int         $id
 * @property int         $title      Object item id
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
     * @return \frontend\models\query\ColorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\query\ColorQuery(get_called_class());
    }
}
