<?php

use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\helpers\Html;
use common\models\Service;

$params = Yii::$app->request->getQueryParams();
$params['type'] = Service::TYPE_LUBRICANT;
$params[] = 'create-lubrication';
?>
<div class="lubrication">

    <p>
        <?= Html::a('Add New Lubrication', $params, ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'registration_id',
            'date',
            'customer_id',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>
</div>