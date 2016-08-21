<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Service */

$this->title = $model->getServiceNo();
$this->params['breadcrumbs'][] = ['label' => 'Services', 'url' => ['index', 'rid' => $registration->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'rid' => $registration->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->id, 'rid' => $registration->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <div class="row">
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-asterisk" ></span> General</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">

                            <tbody>
                                <tr>
                                    <th><?= $model->getAttributeLabel('id') ?></th>
                                    <td><?= $model->getServiceNo() ?></td>
                                </tr>
                                <tr>
                                    <th><?= $model->getAttributeLabel('date') ?></th>
                                    <td><?= $model->date ?></td>
                                </tr>
                                <tr>
                                    <th><?= $model->getAttributeLabel('customer.name') ?></th>
                                    <td><?= $model->customer->name ?></td>
                                </tr>
                                <tr>
                                    <th><?= $model->getAttributeLabel('current_meter') ?></th>
                                    <td><?= $model->current_meter ?></td>
                                </tr>
                                <tr>
                                    <th><?= $model->getAttributeLabel('next_service_meter') ?></th>
                                    <td><?= $model->next_service_meter ?></td>
                                </tr>
                                <tr>
                                    <th><?= $model->getAttributeLabel('next_service') ?></th>
                                    <td><?= $model->getFormattedNextServiceLabel() ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($model->getLubricationCharges()) { ?>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-hourglass" ></span> Lubrication</h3>
                    </div>
                    <div class="panel-body">
                        <div class="list-group">

                            <?php if ($model->engine_oil_id) { ?>
                                <a class="list-group-item">
                                    <span class="badge"><?= $model->engine_oil_price ?></span>
                                    <?= $model->getAttributeLabel('engine_oil') ?>
                                </a>
                            <?php } ?>
                            <?php if ($model->gear_oil_id) { ?>
                                <a class="list-group-item">
                                    <span class="badge"><?= $model->gear_oil_price ?></span>
                                    <?= $model->getAttributeLabel('gear_oil') ?>
                                </a>
                            <?php } ?>
                            <?php if ($model->differential_oil_id) { ?>
                                <a class="list-group-item">
                                    <span class="badge"><?= $model->differential_oil_price ?></span>
                                    <?= $model->getAttributeLabel('differential_oil') ?>
                                </a>
                            <?php } ?>
                            <?php if ($model->steering_oil_id) { ?>
                                <a class="list-group-item">
                                    <span class="badge"><?= $model->steering_oil_price ?></span>
                                    <?= $model->getAttributeLabel('steering_oil') ?>
                                </a>
                            <?php } ?>
                            <?php if ($model->break_oil_id) { ?>
                                <a class="list-group-item">
                                    <span class="badge"><?= $model->break_oil_price ?></span>
                                    <?= $model->getAttributeLabel('break_oil') ?>
                                </a>
                            <?php } ?>
                            <?php if ($model->coolent_oil_id) { ?>
                                <a class="list-group-item">
                                    <span class="badge"><?= $model->coolent_oil_price ?></span>
                                    <?= $model->getAttributeLabel('coolent_oil') ?>
                                </a>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if ($model->getFilterCharges()) { ?>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-filter" ></span> Filters</h3>
                    </div>
                    <div class="panel-body">
                        <div class="list-group">

                            <?php if ($model->oil_filter_id) { ?>
                                <a class="list-group-item">
                                    <span class="badge"><?= $model->oil_filter_price ?></span>
                                    <?= $model->getAttributeLabel('oil_filter') ?>
                                </a>
                            <?php } ?>
                            <?php if ($model->diesel_filter_id) { ?>
                                <a class="list-group-item">
                                    <span class="badge"><?= $model->diesel_filter_price ?></span>
                                    <?= $model->getAttributeLabel('diesel_filter') ?>
                                </a>
                            <?php } ?>
                            <?php if ($model->air_filter_id) { ?>
                                <a class="list-group-item">
                                    <span class="badge"><?= $model->air_filter_price ?></span>
                                    <?= $model->getAttributeLabel('air_filter') ?>
                                </a>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if ($model->getWashCategoriesTotal()) { ?>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-tint" ></span> Wash</h3>
                    </div>
                    <div class="panel-body">
                        <div class="list-group">

                            <?php if ($model->full_wash) { ?>
                                <a class="list-group-item">
                                    <span class="badge"><?= $model->full_wash_charge ?></span>
                                    <?= $model->getAttributeLabel('full_wash') ?>
                                </a>
                            <?php } ?>
                            <?php if ($model->body_wash) { ?>
                                <a class="list-group-item">
                                    <span class="badge"><?= $model->body_wash_charge ?></span>
                                    <?= $model->getAttributeLabel('body_wash') ?>
                                </a>
                            <?php } ?>
                            <?php if ($model->vacuume_cleaning) { ?>
                                <a class="list-group-item">
                                    <span class="badge"><?= $model->vacuume_cleaning_charge ?></span>
                                    <?= $model->getAttributeLabel('vacuume_cleaning') ?>
                                </a>
                            <?php } ?>
                            <?php if ($model->under_wash) { ?>
                                <a class="list-group-item">
                                    <span class="badge"><?= $model->under_wash_charge ?></span>
                                    <?= $model->getAttributeLabel('under_wash') ?>
                                </a>
                            <?php } ?>
                            <?php if ($model->engine_wash) { ?>
                                <a class="list-group-item">
                                    <span class="badge"><?= $model->engine_wash_charge ?></span>
                                    <?= $model->getAttributeLabel('engine_wash') ?>
                                </a>
                            <?php } ?>
                            <?php if ($model->no_of_grease_nipples) { ?>
                                <a class="list-group-item">
                                    <span class="badge"><?= $model->getGreaseChargeAmountLabel() ?></span>
                                    <?= $model->getAttributeLabel('grease_charge') ?>
                                </a>
                            <?php } ?>


                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-menu-hamburger" ></span> Summary</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">

                            <tbody>
                                <tr>
                                    <th><?= $model->getAttributeLabel('remarks') ?></th>
                                    <td><?= nl2br($model->remarks) ?></td>
                                </tr>
                                <?php if (!empty((int) $model->discount)) { ?>
                                    <tr>
                                        <th><?= $model->getAttributeLabel('discount') ?></th>
                                        <td><span class="badge"><?= $model->discount_amount . " ({$model->discount}%)" ?></span></td>

                                    </tr>
                                <?php } ?>
                                <?php if (!empty((int) $model->service_charge)) { ?>
                                    <tr>
                                        <th><?= $model->getAttributeLabel('service_charge') ?></th>
                                        <td><span class="badge"><?= $model->service_charge ?></span></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <th><?= $model->getAttributeLabel('total') ?></th>
                                    <td><span class="badge"><?= $model->total ?></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
