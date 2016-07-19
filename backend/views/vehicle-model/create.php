<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\VehicleModel */

$this->title = 'Create Vehicle Model';
$this->params['breadcrumbs'][] = ['label' => 'Vehicle Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-model-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
