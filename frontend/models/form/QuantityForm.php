<?php


namespace frontend\models\form;

use Yii;
use yii\base\Model;

/**
 * Class QuantityForm
 */
class QuantityForm extends Model
{
    public $quantity;

    public function rules()
    {
        return [
            ['quantity', 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'quantity' => Yii::t('app', 'Введите количество'),
        ];
    }
}