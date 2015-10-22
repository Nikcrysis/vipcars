<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cars */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cars-form">

    <?php $form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data', 'class' => ""]
    ]);; ?>

    <?= $form->field($model, 'name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'category')->dropDownList(
            [
            'sedan' => 'Седан',
            'offroad' => 'Внедорожник',
            'micro' => 'Микроавтобус',
            'limo' => 'Лимузин',
            'cabri' => 'Кабриолет',
            'retro' => 'Ретро',
            ],           // Flat array ('id'=>'label')
            ['prompt'=>'']    // options
        ); ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <input type="file" name="file[]" multiple>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
