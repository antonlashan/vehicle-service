<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\VehicleMake */

$this->title = 'Create Vehicle Make';
$this->params['breadcrumbs'][] = ['label' => 'Vehicle Makes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-make-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
