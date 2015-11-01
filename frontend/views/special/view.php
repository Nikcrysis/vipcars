<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
  use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Special */

$this->title = $model->id;
 $this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['/site/admin']]; 
$this->params['breadcrumbs'][] = ['label' => 'Specials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="special-view">

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
            'name',
            'old_price',
            'new_price',
            'seats',
            'description:ntext',
        ],
    ]) ?>
  
  <?php if(isset($model->photo_url)):?>  
  <div class="col-sm-4 text-center">
          <img class="img-responsive" src="<?=Url::to('@web/src/special/') . $model->photo_url?>">
          </div>
  <?php endif; ?>

</div>
