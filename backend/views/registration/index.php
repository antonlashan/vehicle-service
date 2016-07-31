<?php
/* @var $this yii\web\View */
/* @var $searchModel backend\models\RegistrationSearch */
/* @var $form yii\widgets\ActiveForm */
/* @var $registration common\models\Registration */
/* @var $customer common\models\Customer */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use backend\assets\AppAsset;
use yii\web\View;
use yii\helpers\Url;

$this->title = 'Registration';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="registration-index">

    <div class="registration-search row">

        <?php
        $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
        ]);
        ?>

        <div class="col-md-6">
            <?= $form->field($searchModel, 'vehicle_no', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control', 'placeholder' => 'Ex: JV-2795']]) ?>


            <div class="form-group">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>

    </div>

    <?php if ($vehicleNo) { ?>
        <div class="registration-form">

            <?php $form = ActiveForm::begin(); ?>

            <h4 class="text-center text-uppercase">Vehicle Info</h4>

            <div class="col-md-12">
                <?php echo $form->errorSummary([$registration, $customer]) ?>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="make" class="control-label">Make</label>
                    <?= Html::dropDownList('make', isset($registration->vehicleModel) ? $registration->vehicleModel->vehicle_id : null, $vehicleList, ['class' => 'form-control', 'id' => 'make', 'prompt' => 'select a make']); ?>
                    <div class="help-block"></div>
                </div>


            </div>
            <div class="col-md-6">
                <?= $form->field($registration, 'vehicle_model_id')->dropDownList($vehicleModels, ['prompt' => 'select a model']) ?>
            </div>

            <?= $form->field($registration, 'customer_id')->hiddenInput()->label(false) ?>

            <div class="clearfix"></div>

            <h4 class="text-center text-uppercase">Customer Info</h4>

            <div class="col-md-6">
                <?= $form->field($customer, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($customer, 'email')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($customer, 'phone')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($customer, 'address')->textarea(['maxlength' => true]) ?>
            </div>
            <div class="clearfix"></div>
            <div class="form-group">
                <?= Html::submitButton('Next', ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Change Customer', [Yii::$app->request->pathInfo, 'RegistrationSearch' => Yii::$app->request->get('RegistrationSearch'), 'cc' => true], ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    <?php } ?>
</div>

<?php
$options = [
    'urlGetModels' => Url::to(['registration/get-models']),
];
$this->registerJs("var AS = " . json_encode($options) . ";", View::POS_END);
$this->registerJsFile('@web/js/registration_index.js', ['depends' => [AppAsset::className()]]);
?>
