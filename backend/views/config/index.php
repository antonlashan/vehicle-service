<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Configurations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="config-index">

    <div class="table-responsive">
        <?php Pjax::begin(); ?>    <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'label',
                'description',
                'price',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {update}',
                ],
            ],
        ]);
        ?>
        <?php Pjax::end(); ?>
    </div>
</div>
