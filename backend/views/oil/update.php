<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Oil */

$this->title = 'Update Oil: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Oils', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="oil-update">

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
