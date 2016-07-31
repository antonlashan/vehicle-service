<?php

use yii\helpers\Html;
use yii\bootstrap\Tabs;
use common\models\Service;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $registration common\models\Registration */

$this->title = 'Services';
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = $registration->customer->name;
?>
<div class="service-index">

    <?=
    Tabs::widget([
        'items' => [
            [
                'label' => 'Lubrication',
                'content' => $this->render('_lubrication', [
                    'dataProvider' => $dataProvider,
                    'rid' => $registration->id,
                ]),
                'active' => $type == Service::TYPE_LUBRICANT,
            ],
            [
                'label' => 'Wash',
                'content' => 'Anim pariatur cliche...',
                'headerOptions' => [],
                'options' => ['id' => 'myveryownID'],
                'active' => $type == Service::TYPE_WASH,
            ],
        ],
    ]);
    ?>
</div>
