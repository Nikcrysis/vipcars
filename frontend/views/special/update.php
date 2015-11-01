<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Special */

$this->title = 'Update Special: ' . ' ' . $model->id;
 $this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['/site/admin']]; 
$this->params['breadcrumbs'][] = ['label' => 'Specials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="special-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
