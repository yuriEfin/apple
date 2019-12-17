<?php


namespace frontend\models\form;

use yii\base\Model;

/**
 * Class DeleteForm
 */
class DeleteForm extends Model
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