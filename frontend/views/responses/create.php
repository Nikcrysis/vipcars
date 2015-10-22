<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Responses */

$this->title = 'Create Responses';
  $this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['/site/admin']];  
$this->params['breadcrumbs'][] = ['label' => 'Responses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container responses-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>