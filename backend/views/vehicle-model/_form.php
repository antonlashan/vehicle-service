<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Vehicle;
use yii\helpers\ArrayHelper;
use common\models\VehicleMake;

/* @var $this yii\web\View */
/* @var $model common\models\VehicleModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehicle-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vehicle_id')->dropDownList(ArrayHelper::map(Vehicle::find()->asArray()->all(), 'id', 'name'), ['prompt' => 'select a vehicle type']) ?>
    
    <?= $form->field($model, 'vehicle_make_id')->dropDownList(ArrayHelper::map(VehicleMake::find()->asArray()->all(), 'id', 'name'), ['prompt' => 'select a vehicle make']) ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_of_nipples')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
