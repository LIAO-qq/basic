<?php

namespace app\controllers;

use Yii;
use app\models\Competence;
use app\models\CompetenceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * CompetenceController implements the CRUD actions for Competence model.
 */
class CompetenceController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Competence models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CompetenceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Competence model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Competence model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Competence();

        if ($model->load(Yii::$app->request->post())) {
            $model->save();

            $imageId = $model->Num_Competence;
            $image = UploadedFile::getInstance($model,'image');
            $imageName = 'image_'.$imageId.'.'.$image->getExtension();
            $image->saveAs(Yii::getAlias('@imagePath').'/'.$imageName);
            $model->image = $imageName;
            $model->save();


            return $this->redirect(['view', 'id' => $model->Num_Competence]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    //get the instance of the uploaded file
    /** $imageName = $model->Libelle_Competence;
    $model->file = UploadedFile::getInstance($model,'file');
    $model->file->saveAs('uploads/'.$imageName.'.'.$model->file->extension);

    //save the path in the db colum
    $model->image = 'uploads/'.$imageName.'.'.$model->file->extension;**/


    /**
     * Updates an existing Competence model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Num_Competence]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Competence model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Competence model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Competence the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Competence::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
