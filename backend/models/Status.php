<?php

namespace backend\models;

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
     */
    public static function tableName()
    {
        return '{{%color}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'created_at', 'created_by'], 'required'],
            [['title', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Object item id'),
            'created_at' => Yii::t('app', 'Created at'),
            'updated_at' => Yii::t('app', 'Updated at'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Created By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApples()
    {
        return $this->hasMany(BaseApple::class, ['color_id' => 'id']);
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
