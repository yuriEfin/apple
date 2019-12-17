<?php


namespace frontend\models\form;

use frontend\models\Apple;
use yii\base\Model;

/**
 * Class BiteOffForm
 */
class BiteOffForm extends Model
{
    /**
     * @var integer
     */
    public $percent;
    /**
     * @var integer
     */
    public $apple_id;

    public function rules()
    {
        return [
            [['percent'], 'integer', 'max' => 100],
            [['apple_id'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'percent' => \Yii::t('app', 'Percent Bite Off Size'),
            'apple_id' => \Yii::t('app', 'Apple Id'),
        ];
    }
}