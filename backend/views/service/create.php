<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Service */
/* @var $registration common\models\Registration */

$this->title = 'Create Service';
$this->params['breadcrumbs'][] = ['label' => 'Services', 'url' => ['index', 'rid' => $registration->id]];
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = "{$registration->vehicle_no} ({$registration->vehicleModel->model})";
?>
<div class="service-create">

    <?= $this->render('_form', [
        'model' => $model,
        'equipmentsArr' => $equipmentsArr,
        'globalChargesArr' => $globalChargesArr,
    ]) ?>

</div>
