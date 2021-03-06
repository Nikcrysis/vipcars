<?php

namespace frontend\controllers;

use Yii;
use app\models\Special;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SpecialController implements the CRUD actions for Special model.
 */
class SpecialController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Special models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Special::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Special model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
  
  
  protected function ak_img_resize($target, $newcopy, $w, $h, $ext) {
        list($w_orig, $h_orig) = getimagesize($target);
        $scale_ratio = $w_orig / $h_orig;
        if (($w / $h) > $scale_ratio) {
               $w = $h * $scale_ratio;
        } else {
               $h = $w / $scale_ratio;
        }
        $img = "";
        $ext = strtolower($ext);
        if ($ext == "gif"){ 
          $img = imagecreatefromgif($target);
        } else if($ext =="png"){ 
          $img = imagecreatefrompng($target);
        } else { 
          $img = imagecreatefromjpeg($target);
        }
        $tci = imagecreatetruecolor($w, $h);
        // imagecopyresampled(dst_img, src_img, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
        imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
        imagejpeg($tci, $newcopy, 80);
    }

    /**
     * Creates a new Special model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        
        $fileName = 'file';
       $model = new Special();
        
        if (isset($_FILES[$fileName])) {
          //return var_dump($_POST);

        $imgs = \yii\web\UploadedFile::getInstancesByName($fileName);

        $img = $imgs[0];
                $mysqlName = time().'_'. $img->name;
          $url = getcwd() . '/src/special/' . $mysqlName ;
                $kaboom = explode(".", $img->tempName); // Split file name into an array using the dot
                $fileExt = end($kaboom); // Now target the last array element to get the file extension
          self::ak_img_resize($img->tempName, $url, 1024, 683, $fileExt);
                chmod($url, 0755);

        $model->photo_url = $mysqlName;
      

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
           }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Special model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $fileName = 'file';
        $model = $this->findModel($id);
      $imgs = \yii\web\UploadedFile::getInstancesByName($fileName);
      if (count($imgs)>0){
        $img = $imgs[0];
                $mysqlName = time().'_'. $img->name;
          $url = getcwd() . '/src/special/' . $mysqlName ;
                $kaboom = explode(".", $img->tempName); // Split file name into an array using the dot
                $fileExt = end($kaboom); // Now target the last array element to get the file extension
                self::ak_img_resize($img->tempName, $url, 1024, 683, $fileExt);
                chmod($url, 0755);

        $model->photo_url = $mysqlName;
    }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Special model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Special model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Special the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Special::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
