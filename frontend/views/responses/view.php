<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Responses */

$this->title = $model->id;
  $this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['/site/admin']];  
$this->params['breadcrumbs'][] = ['label' => 'Responses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container responses-view">

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
            'text:ntext',
            'vk_id',
        ],
    ]) ?>
  
  <?php if(isset($model->photo_url)):?>  
  <div class="col-sm-4 text-center">
          <img class="img-responsive" src="<?=Url::to('@web/src/response/') . $model->photo_url?>">
          </div>
  <?php endif; ?>

</div>
