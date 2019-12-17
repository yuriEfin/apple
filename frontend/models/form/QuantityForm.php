<?php


namespace frontend\models\form;

use Yii;
use yii\base\Model;

/**
 * Class QuantityForm
 */
class QuantityForm extends Model
{
    public $qantity;

    public function rules()
    {
        return [
            ['qantity', 'integer'],
        ];
    }

    public function getAttributeLabel($attribute)
    {
        return [
            'qantity' => Yii::t('app', 'Введите количество'),
        ];
    }
}