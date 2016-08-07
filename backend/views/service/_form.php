<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use common\models\Equipment;
use yii\helpers\ArrayHelper;
use yii\web\View;
use backend\assets\AppAsset;
use common\models\Service;

/* @var $this yii\web\View */
/* @var $model Service */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-4 col-md-6 m-b">
            <?=
            $form->field($model, 'date')->widget(
                    DatePicker::className(), [
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]);
            ?>
        </div>

        <div class="col-lg-4 col-md-6 m-b">
            <?= $form->field($model, 'current_meter')->textInput() ?>
        </div>

        <div class="col-lg-4 col-md-6 m-b">
            <?= $form->field($model, 'next_service_meter')->textInput(['readonly' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-6 m-b">
            <?= $form->field($model, 'next_service')->dropDownList($model->getNextServiceLabels()) ?>
        </div>

        <div class="col-lg-4 col-md-6 m-b">
            <div class="form-group field-service-next_service">
                <label class="control-label">Next Service Date</label>
                <span class="form-control" id="next_service_date" readonly></span>

                <div class="help-block"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-6 m-b">
            <?= $form->field($model, 'engine_oil_id')->dropDownList(isset($equipmentsArr[Equipment::CAT_OIL_ENGINE]) ? ArrayHelper::map($equipmentsArr[Equipment::CAT_OIL_ENGINE], 'id', 'name') : [], ['prompt' => '- select one -']) ?>
            <small id="engine_oil_id_price" class="calc"></small>
        </div>

        <div class="col-lg-4 col-md-6 m-b">
            <?= $form->field($model, 'oil_filter_id')->dropDownList(isset($equipmentsArr[Equipment::CAT_FILTER_OIL]) ? ArrayHelper::map($equipmentsArr[Equipment::CAT_FILTER_OIL], 'id', 'name') : [], ['prompt' => '- select one -']) ?>
            <small id="oil_filter_id_price" class="calc"></small>
        </div>

        <div class="col-lg-4 col-md-6 m-b">
            <?= $form->field($model, 'diesel_filter_id')->dropDownList(isset($equipmentsArr[Equipment::CAT_FILTER_DIESEL]) ? ArrayHelper::map($equipmentsArr[Equipment::CAT_FILTER_DIESEL], 'id', 'name') : [], ['prompt' => '- select one -']) ?>
            <small id="diesel_filter_id_price" class="calc"></small>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-6 m-b">
            <?= $form->field($model, 'air_filter_id')->dropDownList(isset($equipmentsArr[Equipment::CAT_FILTER_AIR]) ? ArrayHelper::map($equipmentsArr[Equipment::CAT_FILTER_AIR], 'id', 'name') : [], ['prompt' => '- select one -']) ?>
            <small id="air_filter_id_price" class="calc"></small>
        </div>

        <div class="col-lg-4 col-md-6 m-b">
            <?= $form->field($model, 'gear_oil_id')->dropDownList(isset($equipmentsArr[Equipment::CAT_OIL_GEAR]) ? ArrayHelper::map($equipmentsArr[Equipment::CAT_OIL_GEAR], 'id', 'name') : [], ['prompt' => '- select one -']) ?>
            <small id="gear_oil_id_price" class="calc"></small>
        </div>

        <div class="col-lg-4 col-md-6 m-b">
            <?= $form->field($model, 'differential_oil_id')->dropDownList(isset($equipmentsArr[Equipment::CAT_OIL_DIFFERENTIAL]) ? ArrayHelper::map($equipmentsArr[Equipment::CAT_OIL_DIFFERENTIAL], 'id', 'name') : [], ['prompt' => '- select one -']) ?>
            <small id="differential_oil_id_price" class="calc"></small>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-6 m-b">
            <?= $form->field($model, 'steering_oil_id')->dropDownList(isset($equipmentsArr[Equipment::CAT_OIL_POWER]) ? ArrayHelper::map($equipmentsArr[Equipment::CAT_OIL_POWER], 'id', 'name') : [], ['prompt' => '- select one -']) ?>
            <small id="steering_oil_id_price" class="calc"></small>
        </div>

        <div class="col-lg-4 col-md-6 m-b">
            <?= $form->field($model, 'break_oil_id')->dropDownList(isset($equipmentsArr[Equipment::CAT_OIL_BREAK]) ? ArrayHelper::map($equipmentsArr[Equipment::CAT_OIL_BREAK], 'id', 'name') : [], ['prompt' => '- select one -']) ?>
            <small id="break_oil_id_price" class="calc"></small>
        </div>

        <div class="col-lg-4 col-md-6 m-b">
            <?= $form->field($model, 'coolent_oil_id')->dropDownList(isset($equipmentsArr[Equipment::CAT_OIL_COOLENT]) ? ArrayHelper::map($equipmentsArr[Equipment::CAT_OIL_COOLENT], 'id', 'name') : [], ['prompt' => '- select one -']) ?>
            <small id="coolent_oil_id_price" class="calc"></small>
        </div>
        
        <div class="col-lg-4 col-md-6 m-b">
            <?= $form->field($model, 'no_of_grease_nipples')->textInput() ?>
        </div>
    </div>

    

    <?= $form->field($model, 'full_wash')->checkbox() ?>

    <?= $form->field($model, 'body_wash')->checkbox() ?>

    <?= $form->field($model, 'vacuume_cleaning')->checkbox() ?>

    <?= $form->field($model, 'under_wash')->checkbox() ?>

    <?= $form->field($model, 'engine_wash')->checkbox() ?>

    <?= $form->field($model, 'discount')->dropDownList($model->getDiscountLabels()) ?>

    <?= $form->field($model, 'service_charge')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remarks')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$options = [
    'allEquipments' => $equipmentsArr,
    'categories' => [
        'filter_oil' => Equipment::CAT_FILTER_OIL,
        'filter_diesel' => Equipment::CAT_FILTER_DIESEL,
        'filter_air' => Equipment::CAT_FILTER_AIR,
        'oil_engine' => Equipment::CAT_OIL_ENGINE,
        'oil_break' => Equipment::CAT_OIL_BREAK,
        'oil_coolant' => Equipment::CAT_OIL_COOLENT,
        'oil_power' => Equipment::CAT_OIL_POWER,
        'oil_gear' => Equipment::CAT_OIL_GEAR,
        'oil_differential' => Equipment::CAT_OIL_DIFFERENTIAL,
    ],
    'serviceThreshold' => Service::SERVICE_THRESHOLD,
];
$this->registerJs("var AS = " . json_encode($options) . ";", View::POS_HEAD);
$this->registerJsFile('@web/js/service__form.js', ['depends' => [AppAsset::className()]]);

$css = ".form-group, .help-block {
    margin-bottom: 0;
}";
$this->registerCss($css);
?>
