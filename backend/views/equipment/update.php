<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Equipment */

$this->title = 'Update Equipment: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Equipments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="equipment-update">

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
