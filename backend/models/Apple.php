<?php


namespace backend\models;

use common\models\BaseApple;
use common\models\BaseColor;
use common\models\BaseStatus;
use Yii;

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
     */
    public static function tableName()
    {
        return '{{%apple}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                [
                    'status_id',
                    'color_id',
                    'date_fell',
                    'size',
                    'bite_off_size',
                    'created_at',
                    'updated_at',
                    'created_by',
                    'updated_by',
                ],
                'integer',
            ],
            [['created_at'], 'required'],
            [
                ['color_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => BaseColor::class,
                'targetAttribute' => ['color_id' => 'id'],
            ],
            [
                ['status_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => BaseStatus::class,
                'targetAttribute' => ['status_id' => 'id'],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'status_id' => Yii::t('app', 'Status'),
            'color_id' => Yii::t('app', 'Color'),
            'date_fell' => Yii::t('app', 'Date fell'),
            'size' => Yii::t('app', 'Size'),
            'bite_off_size' => Yii::t('app', 'Bite Off Size'),
            'created_at' => Yii::t('app', 'Created at'),
            'updated_at' => Yii::t('app', 'Updated at'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Created By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColor()
    {
        return $this->hasOne(BaseColor::class, ['id' => 'color_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(BaseStatus::class, ['id' => 'status_id']);
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
