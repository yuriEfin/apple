<?php


namespace frontend\models\form;

use yii\base\Model;

/**
 * Class RottenForm
 */
class RottenForm extends Model
{
    /**
     * @var integer
     */
    public $apple_id;

    public function rules()
    {
        return [
            [['apple_id'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'apple_id' => \Yii::t('app', 'Apple Id'),
        ];
    }
}