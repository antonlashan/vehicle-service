<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Config */

$this->title = 'Update: ' . $model->label;
$this->params['breadcrumbs'][] = ['label' => 'Configurations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->label, 'url' => ['view', 'id' => $model->type]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="config-update">

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
