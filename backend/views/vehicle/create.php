<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Vehicle */

$this->title = 'Create Vehicle';
$this->params['breadcrumbs'][] = ['label' => 'Vehicles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
