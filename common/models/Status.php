<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%status}}".
 *
 * @property int $id
 * @property string|null $name Name
 * @property string|null $alias Alias
 * @property string|null $is_default Is Default
 * @property int $created_at Created at
 * @property int|null $updated_at Updated at
 * @property int|null $created_by Created By
 * @property int|null $updated_by Created By
 *
 * @property BaseApple[] $apples
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%status}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at'], 'required'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name', 'alias', 'is_default'], 'string', 'max' => 100],
            [['alias'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'alias' => Yii::t('app', 'Alias'),
            'is_default' => Yii::t('app', 'Is Default'),
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
        return $this->hasMany(BaseApple::className(), ['status_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\AppleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\AppleQuery(get_called_class());
    }
}
