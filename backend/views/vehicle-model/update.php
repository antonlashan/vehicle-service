<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\VehicleModel */

$this->title = 'Update Vehicle Model: ' . $model->model;
$this->params['breadcrumbs'][] = ['label' => 'Vehicle Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->model, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vehicle-model-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
