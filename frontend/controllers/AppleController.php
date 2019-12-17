<?php


namespace frontend\controllers;

use frontend\models\form\QuantityForm;
use yii\web\Controller;

/**
 * Class AppleController
 */
class AppleController extends Controller
{
    public function actionIndex()
    {
        $modelForm = new QuantityForm();

        return $this->render('');
    }
}