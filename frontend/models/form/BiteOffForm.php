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
            ['percent', 'validatePercent'],
        ];
    }

    public function getAttributeLabel($attribute)
    {
        return [
            'percent' => \Yii::t('app', 'Percent Bite Off Size'),
        ];
    }

    public function validateAppleId($attr)
    {
        if (!$model = Apple::findOne($this->apple_id)) {
            $this->addError($attr, \Yii::t('validation', 'Do you want to bite off an unknown apple'));
        }
    }

    /**
     * @param $attr
     * @param $val
     *
     * @return bool
     */
    public function validatePercent($attr, $val)
    {
        if ($this->$attr > 100) {
            $this->addError($attr, \Yii::t('validation', 'You cannot bite off the apple itself'));
        }
    }
}