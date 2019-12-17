<?php


namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

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
class BaseStatus extends \yii\db\ActiveRecord
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
            [['title'], 'required'],
            [['title', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['title', 'alias'], 'string', 'max' => 255],
            [['is_default'], 'boolean'],
            [['is_default'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'alias' => Yii::t('app', 'Alias'),
            'is_default' => Yii::t('app', 'Is Default'),
            'created_at' => Yii::t('app', 'Created at'),
            'updated_at' => Yii::t('app', 'Updated at'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Created By'),
        ];
    }

    public function behaviors(): array
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
            [
                'class' => BlameableBehavior::class,
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
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
