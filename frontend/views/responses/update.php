<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Responses */

$this->title = 'Update Responses: ' . ' ' . $model->id;
  $this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['/site/admin']];  
$this->params['breadcrumbs'][] = ['label' => 'Responses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="container responses-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
