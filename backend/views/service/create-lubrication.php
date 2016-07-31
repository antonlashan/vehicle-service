<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Service */

$params = Yii::$app->request->getQueryParams();
$params[] = 'index';

$this->title = 'Add Lubrication';
$this->params['breadcrumbs'][] = ['label' => 'Lubrication', 'url' => $params];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-create-lubrication">

    <?=
    $this->render('_form-lubrication', [
        'model' => $model,
    ])
    ?>

</div>