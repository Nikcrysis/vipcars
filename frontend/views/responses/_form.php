<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Responses */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="responses-form">

    <?php $form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data', 'class' => ""]
    ]);; ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'vk_id')->textInput(['maxlength' => true]) ?>
  <?php if(isset($model->photo_url)):?>  
  <div class="col-sm-4 text-center">
          <img class="img-responsive" src="<?=Url::to('@web/src/response/') . $model->photo_url?>">
          </div>
  <?php endif; ?>
  <input type="file" name="file">

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
