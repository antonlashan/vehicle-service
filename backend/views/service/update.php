<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Service */

$this->title = 'Update Service: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Services', 'url' => ['index', 'rid' => $registration->id]];
$this->params['breadcrumbs'][] = ['label' => $model->getRegistrationNo(), 'url' => ['view', 'id' => $model->id, 'rid' => $registration->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="service-update">

    <?=
    $this->render('_form', [
        'model' => $model,
        'equipmentsArr' => $equipmentsArr,
        'globalChargesArr' => $globalChargesArr,
    ])
    ?>

</div>
