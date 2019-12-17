<?php


namespace frontend\controllers;

use frontend\models\Apple;
use frontend\models\form\BiteOffForm;
use frontend\models\form\DeleteForm;
use frontend\models\form\FailForm;
use frontend\models\form\QuantityForm;
use frontend\models\form\RottenForm;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Request;
use yii\web\Response;

/**
 * Class AppleController
 */
class AppleController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'index' => ['get', 'post'],
                    'list' => ['get'],
                    'fail' => ['post'],
                    'bite-off' => ['post'],
                    'delete' => ['post'],
                    'rotten' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $quantityFormModel = new QuantityForm();
        if (\Yii::$app->request->isPost && $quantityFormModel->load(\Yii::$app->request->post())) {
            \Yii::$app->gameProcess->randomGenerateItems(['quantity' => $quantityFormModel->quantity]);

            return $this->redirect(['list']);
        }

        return $this->render(
            'index',
            [
                'quantityFormModel' => $quantityFormModel,
            ]
        );
    }

    public function actionList()
    {
        $dataProvider = new ActiveDataProvider(
            [
                'query' => Apple::find()->noDeleted(),
                'pagination' => [
                    'pageSize' => 100,
                ],
            ]
        );

        return $this->render(
            'list',
            [
                'dataProvider' => $dataProvider,
                'biteOffFormModel' => new BiteOffForm(),
                'rottenFormModel' => new RottenForm(),
                'failFormModel' => new FailForm(),
            ]
        );
    }

    /**
     * @param $appleId
     *
     * @return array
     * @throws NotFoundHttpException
     */
    public function actionFail($appleId)
    {
        /** @var Apple $model */
        $model = $this->loadModel($appleId);
        $form = new FailForm(['apple_id' => $appleId]);
        if ($form->load(\Yii::$app->request->post()) && $form->validate()) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $response = \Yii::$app->gameProcess->processBiteOffPiece($model, ['percent' => $form->percent ?? 0]);

            return [
                'status' => 'Ok',
                'respone' => $response,
            ];
        }
    }

    /**
     * @param int $appleId
     *
     * @return array
     * @throws NotFoundHttpException
     * @throws \frontend\components\exceptions\InvalidItemProperty
     */
    public function actionBiteOff($appleId)
    {
        $model = $this->loadModel($appleId);
        $form = new BiteOffForm(['apple_id' => $appleId]);
        if ($form->load(\Yii::$app->request->post()) && $form->validate()) {
            \Yii::$app->gameProcess->processBiteOffPiece($model, ['percent' => $form->percent ?? 0]);
        }
        \Yii::$app->response->format = Response::FORMAT_JSON;

        return [
            'status' => 'Ok',
        ];
    }

    /**
     * @param int $appleId
     *
     * @return array
     * @throws NotFoundHttpException
     * @throws \frontend\components\exceptions\InvalidItemProperty
     */
    public function actionRotten($appleId)
    {
        $model = $this->loadModel($appleId);
        $form = new RottenForm(['apple_id' => $appleId]);
        if ($form->load(\Yii::$app->request->post()) && $form->validate()) {
            \Yii::$app->gameProcess->processRotten($model);
            \Yii::$app->response->format = Response::FORMAT_JSON;

            return [
                'status' => 'Ok',
            ];
        }
    }

    /**
     * @param int $appleId
     *
     * @return array
     * @throws NotFoundHttpException
     * @throws \frontend\components\exceptions\InvalidItemProperty
     */
    public function actionDelete($appleId)
    {
        $model = $this->loadModel($appleId);
        $form = new DeleteForm(['apple_id' => $appleId]);
        if ($form->load(\Yii::$app->request->post()) && $form->validate()) {
            \Yii::$app->gameProcess->processDeleteItem($model);
        }
        \Yii::$app->response->format = Response::FORMAT_JSON;

        return [
            'status' => 'Ok',
        ];
    }

    private function loadModel($id)
    {
        if (!$model = Apple::findOne($id)) {
            throw new NotFoundHttpException(\Yii::t('error', 'Not found {id}', ['{id}' => $id]));
        }

        return $model;
    }
}