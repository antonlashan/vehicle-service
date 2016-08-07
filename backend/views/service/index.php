<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $registration common\models\Registration */

$this->title = 'Services';
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = "{$registration->vehicle_no} ({$registration->customer->name})";
?>
<div class="service-index">

    <p>
        <?= Html::a('Add New Service', ['create', 'rid' => $registration->id], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="table-responsive">
        <?php Pjax::begin(); ?>    <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
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
                // 'created_at',
                // 'created_by',
                // 'updated_at',
                // 'updated_by',
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
        ?>
        <?php Pjax::end(); ?>
    </div>
</div>
