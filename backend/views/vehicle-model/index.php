<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vehicle Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-model-index">

    <p>
        <?= Html::a('Create Vehicle Model', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="table-responsive">
        <?php Pjax::begin(); ?>    <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'vehicle.name',
                'model',
                'no_of_nipples',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update} {delete}',
                ],
            ],
        ]);
        ?>
        <?php Pjax::end(); ?>
    </div>
</div>
