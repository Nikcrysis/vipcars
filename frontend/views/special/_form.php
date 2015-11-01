<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Special */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="special-form">

    <?php $form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data', 'class' => ""]
    ]); ?>

  <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
  
    <?= $form->field($model, 'old_price')->textInput() ?>

    <?= $form->field($model, 'new_price')->textInput() ?>

    <?= $form->field($model, 'seats')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
<?php if(isset($model->photo_url)):?>  
  <div class="col-sm-4 text-center">
          <img class="img-responsive" src="<?=Url::to('@web/src/special/') . $model->photo_url?>">
          </div>
  <?php endif; ?>
  <input type="file" name="file">
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
