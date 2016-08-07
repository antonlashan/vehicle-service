<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Service */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'registration_id',
            'date',
            'customer_id',
            'current_meter',
            'next_service_meter',
            'next_service',
            'engine_oil_id',
            'engine_oil',
            'engine_oil_price',
            'oil_filter_id',
            'oil_filter',
            'oil_filter_price',
            'diesel_filter_id',
            'diesel_filter',
            'diesel_filter_price',
            'air_filter_id',
            'air_filter',
            'air_filter_price',
            'gear_oil_id',
            'gear_oil',
            'gear_oil_price',
            'differential_oil_id',
            'differential_oil',
            'differential_oil_price',
            'steering_oil_id',
            'steering_oil',
            'steering_oil_price',
            'break_oil_id',
            'break_oil',
            'break_oil_price',
            'coolent_oil_id',
            'coolent_oil',
            'coolent_oil_price',
            'no_of_grease_nipples',
            'grease_charge',
            'body_wash:boolean',
            'body_wash_charge',
            'vacuume_cleaning:boolean',
            'vacuume_cleaning_charge',
            'under_wash:boolean',
            'under_wash_charge',
            'engine_wash:boolean',
            'engine_wash_charge',
            'discount',
            'service_charge',
            'remarks:ntext',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
