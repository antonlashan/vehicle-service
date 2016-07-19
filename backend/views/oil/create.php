<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Oil */

$this->title = 'Create Oil';
$this->params['breadcrumbs'][] = ['label' => 'Oils', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oil-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>