<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use common\models\Equipment;
use yii\helpers\ArrayHelper;
use yii\web\View;
use backend\assets\AppAsset;
use common\models\Service;
use common\models\Config;

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
            <?= $form->field($model, 'no_of_grease_nipples')->dropDownList($model->getNippleOptValues($model->no_of_grease_nipples)) ?>
            <small id="no_of_grease_nipples_price" class="calc"></small>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-4 col-md-6 m-b">
            <?= $form->field($model, 'full_wash')->checkbox() ?>
            <small id="full_wash_price" class="calc"></small>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 m-b">
        <?= $form->field($model, 'body_wash')->checkbox() ?>
        <small id="body_wash_price" class="calc"></small>
    </div>

    <div class="col-md-3 col-sm-6 m-b">
        <?= $form->field($model, 'vacuume_cleaning')->checkbox() ?>
        <small id="vacuume_cleaning_price" class="calc"></small>
    </div>

    <div class="col-md-3 col-sm-6 m-b">
        <?= $form->field($model, 'under_wash')->checkbox() ?>
        <small id="under_wash_price" class="calc"></small>
    </div>

    <div class="col-md-3 col-sm-6 m-b">
        <?= $form->field($model, 'engine_wash')->checkbox() ?>
        <small id="engine_wash_price" class="calc"></small>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-lg-4 col-md-6 m-b">
            <?= $form->field($model, 'discount')->dropDownList($model->getDiscountLabels()) ?>
            <?= $form->field($model, 'discount_amount')->hiddenInput()->label(false) ?>
            <small id="discount_price" class="calc"></small>
        </div>

        <div class="col-lg-4 col-md-6 m-b">
            <?= $form->field($model, 'service_charge')->textInput(['maxlength' => true]) ?>
        </div>
        
        <div class="col-lg-4 col-md-6 m-b">
            <?= $form->field($model, 'total')->textInput(['readonly' => true]) ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-8 m-b">
    <?= $form->field($model, 'remarks')->textarea(['rows' => 6]) ?>
</div>
</div>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$options = [
    'allEquipments' => $equipmentsArr,
    'categories' => [
        'filterOil' => Equipment::CAT_FILTER_OIL,
        'filterDiesel' => Equipment::CAT_FILTER_DIESEL,
        'filterAir' => Equipment::CAT_FILTER_AIR,
        'oilEngine' => Equipment::CAT_OIL_ENGINE,
        'oilBreak' => Equipment::CAT_OIL_BREAK,
        'oilCoolant' => Equipment::CAT_OIL_COOLENT,
        'oilPower' => Equipment::CAT_OIL_POWER,
        'oilGear' => Equipment::CAT_OIL_GEAR,
        'oilDifferential' => Equipment::CAT_OIL_DIFFERENTIAL,
    ],
    'globalCharges' => $globalChargesArr,
    'globalChargeTypes' => [
        'typeBodyWash' => Config::TYPE_BODY_WASH,
        'typeEngineWash' => Config::TYPE_ENGINE_WASH,
        'typeGreasePerNipple' => Config::TYPE_GREASE_PER_NIPPLE,
        'typeUnderWash' => Config::TYPE_UNDER_WASH,
        'typeVacuumeCleaning' => Config::TYPE_VACUUME_CLEANING,
        'typeFullWashCharge' => Config::TYPE_FULL_WASH_CHARGE,
    ],
    'serviceThreshold' => Service::SERVICE_THRESHOLD,
];
$this->registerJs("var AS = " . json_encode($options) . ";", View::POS_HEAD);
$this->registerJsFile('@web/js/service__form.js', ['depends' => [AppAsset::className()]]);

$css = ".form-group, .help-block {
    margin-bottom: 0;
}
#discount_price {color: red;}";
$this->registerCss($css);
?>
