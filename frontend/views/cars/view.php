<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Cars */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['/site/admin']];  
$this->params['breadcrumbs'][] = ['label' => 'Cars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container cars-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name:ntext',
            'category',
            'description:ntext',
        ],
    ]) ?>
  
  <?php
    foreach ($model->photos as $photo) {
        echo '<div class="col-sm-4"><img class="img-responsive" src="' . Url::to('@web/src/upload/') . $photo->url . '"></div>';
    }
  ?>

</div>
