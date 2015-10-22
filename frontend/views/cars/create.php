<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cars */
/*$this->registerJsFile('@web/js/dropzone.js');
$this->registerJsFile('@web/js/createCar.js');*/
$this->title = 'Create Cars';
  $this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['/site/admin']];  
$this->params['breadcrumbs'][] = ['label' => 'Cars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cars-create">
<div class="container">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>