<?php


namespace frontend\models;

use Yii;
use common\models\BaseApple;
use common\models\BaseStatus;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%color}}".
 *
 * @property int         $id
 * @property int         $title           Title
 * @property int         $alias           Alias
 * @property int         $is_default      Is default
 * @property int         $created_at      Created at
 * @property int|null    $updated_at      Updated at
 * @property int         $created_by      Created By
 * @property int|null    $updated_by      Created By
 *
 * @property BaseApple[] $apples
 */
class Status extends BaseStatus
{
    /**
     * @param string $from
     * @param string $to
     *
     * @return array
     */
    public static function getListWithFromTo($from, $to)
    {
        return ArrayHelper::map(self::find()->all(), $from, $to);
    }

    /**
     * {@inheritdoc}
     * @return \frontend\models\query\StatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\query\StatusQuery(get_called_class());
    }
}
