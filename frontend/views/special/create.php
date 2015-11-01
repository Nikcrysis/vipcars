<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Special */

$this->title = 'Create Special';
 $this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['/site/admin']]; 
$this->params['breadcrumbs'][] = ['label' => 'Specials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="special-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
