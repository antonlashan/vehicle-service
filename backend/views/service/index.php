<?php

//phpinfo();exit;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ActiveForm;
use himiklab\thumbnail\EasyThumbnailImage;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $registration common\models\Registration */
/* @var $imageUploadForm backend\models\ImageUploadForm */

$this->title = 'Services';
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = "{$registration->vehicle_no} ({$registration->customer->name})";
$this->params['breadcrumbs'][] = $registration->getRegistrationNo();
?>
<div class="service-index">

    <p>
<?= Html::a('Add New Service', ['create', 'rid' => $registration->id], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="table-responsive">
        <?php Pjax::begin(); ?>    <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
//            'filterModel' => $searchModel,
            'columns' => [
                [
                    'attribute' => 'id',
                    'value' => function($model) {
                        return $model->getServiceNo();
                    }
                ],
                'date',
                'current_meter',
                'next_service_meter',
                [
                    'attribute' => 'next_service',
                    'value' => function($model) {
                        return $model->getFormattedNextServiceLabel();
                    }
                ],
                'total',
                [
                    'class' => ActionColumn::className(),
                    'buttons' => [
                        'update' => function ($url, $model, $key) use($registration) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Url::to(['update', 'id' => $model->id, 'rid' => $registration->id]), ['title' => 'Update']);
                        },
                                'view' => function ($url, $model, $key) use($registration) {
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', Url::to(['view', 'id' => $model->id, 'rid' => $registration->id]), ['title' => 'View']);
                        },
                                'delete' => function ($url, $model, $key) use($registration) {
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', Url::to(['delete', 'id' => $model->id, 'rid' => $registration->id]), ['title' => 'Delete', 'aria-label' => 'Delete', 'data-confirm' => 'Are you sure you want to delete this item?', 'data-method' => 'post', 'data-pjax' => 0]);
                        },
                            ],
                        ],
                    ],
                ]);
                ?>
        <?php Pjax::end(); ?>
            </div>

            <div class="row m-b">
        <?php foreach ($registration->images as $image) { ?>
                    <div class="col-md-3 col-sm-4 col-xs-12"> 
                        <a href="#" class="thumbnail"> 
                            <img src="<?= EasyThumbnailImage::thumbnailFileUrl($image->getImagePath(), 280, 280, EasyThumbnailImage::THUMBNAIL_INSET) ?>"> 
                        </a>
                        <a href="<?= Url::to(['delete-image', 'rid' => $registration->id, 'id' => $image->id]) ?>" class="btn btn-danger btn-xs pull-right" onclick="if (!confirm('Please Confirm !!!'))
                                    return false;"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                    </div>
            <?php } ?>
            </div>
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

        <?= $form->field($imageUploadForm, 'imageFile')->fileInput() ?>

            <button class="btn btn-primary"><i class="glyphicon glyphicon-arrow-up"></i> Upload</button>

        <?php ActiveForm::end() ?>
        </div>

        <?php
        $css = ".thumbnail {
    margin-bottom: 10px;
}";
        $this->registerCss($css);
        ?>