<?php


namespace frontend\models;

use frontend\components\interfaces\ItemInterface;
use Yii;
use common\models\BaseApple;
use common\models\BaseColor;
use common\models\BaseStatus;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%apple}}".
 *
 * @property int        $id
 * @property int        $status_id     Status
 * @property boolean    $deleted       Deleted
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
class Apple extends BaseApple implements ItemInterface
{
    const DEFAULT_STATUS = 1;
    const STATUS_ALIAS_ROTEN = 'rotten';
    const STATUS_ALIAS_FAIL = 'fail_to_ground';
    const STATUS_ALIAS_HANDING = 'handing_tree';
    const STATUS_ALIAS_DELETED = 'deleted';

    /**
     * @return bool|false|int
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function safeRemove()
    {
        $this->deleted = true;
        $this->status_id = self::getStatusIdByAlias(self::STATUS_ALIAS_DELETED);

        return $this->update(true, ['status_id', 'deleted']);
    }

    /**
     * @return bool|false|int
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function biteOffPiece()
    {
        $this->status_id = self::getStatusIdByAlias(self::STATUS_ALIAS_FAIL);

        return $this->update(true, ['status_id']);
    }

    /**
     * @return bool|false|int
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function fail()
    {
        $this->status_id = self::getStatusIdByAlias(self::STATUS_ALIAS_FAIL);

        return $this->update(true, ['status_id']);
    }

    /**
     * @return bool|false|int
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function rotten()
    {
        $this->status_id = self::getStatusIdByAlias(self::STATUS_ALIAS_ROTEN);

        return $this->update(true, ['status_id']);
    }

    /**
     * @param string $alias
     *
     * @return mixed
     */
    public static function getStatusIdByAlias($alias)
    {
        return Status::getListWithFromTo('alias', 'id')[$alias];
    }

    /**
     * {@inheritdoc}
     * @return \frontend\models\query\AppleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\query\AppleQuery(get_called_class());
    }
}
