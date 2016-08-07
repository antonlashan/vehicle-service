<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Service */
/* @var $registration common\models\Registration */

$this->title = 'Create Service';
$this->params['breadcrumbs'][] = ['label' => 'Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = "{$registration->vehicle_no} ({$registration->vehicleModel->model})";
?>
<div class="service-create">

    <?= $this->render('_form', [
        'model' => $model,
        'equipmentsArr' => $equipmentsArr,
    ]) ?>

</div>
