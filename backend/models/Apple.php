<?php


namespace backend\models;

use backend\models\query\AppleQuery;
use common\models\BaseApple;
use common\models\BaseColor;
use common\models\BaseStatus;

/**
 * This is the model class for table "{{%apple}}".
 *
 * @property int        $id
 * @property int        $status_id     Status
 * @property int        $color_id      Color
 * @property int|null   $date_fell     Date fell
 * @property int|null   $size          Size
 * @property int|null   $bite_off_size Bite Off Size
 * @property int        $created_at    Created at
 * @property int|null   $updated_at    Updated at
 * @property int        $created_by    Created By
 * @property int|null   $updated_by    Created By
 *
 * @property BaseColor  $color
 * @property BaseStatus $status
 */
class Apple extends BaseApple
{
    /**
     * {@inheritdoc}
     * @return AppleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AppleQuery(get_called_class());
    }
}
