<?php

/**
 * @var $this yii\web\View
 * @var $objModel app\models\TimeTable
 * @var $arrRegions array
 * @var $arrCouriers array
 * @var $arrRegionsOptions array
 */
use app\models\TimeTable;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\jui\DatePicker;
use yii\widgets\Pjax;

$this->title = 'Добавить поездку';

?>
<div class="site-index">
    <div class="jumbotron">
        <h1>Добавить поездку!</h1>
    </div>
    <div class="body-content">
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-12">
                <?php Pjax::begin(['id' => 'new_note']); ?>

                <?php if (Yii::$app->session->hasFlash('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?= Yii::$app->session->getFlash('success') ?>
                    </div>
                <?php endif; ?>

                <?php
                $form = ActiveForm::begin(['options' => ['data-pjax' => true]]);
                $form->errorSummary($objModel);
                ?>

                <?= $form->field($objModel, 'region_id')->dropDownList($arrRegions, ['options' => $arrRegionsOptions]); ?>
                <?= $form->field($objModel, 'courier_id')->dropDownList($arrCouriers); ?>

                <?php $objModel->date_start = date(TimeTable::PHP_DATE_FORMAT); ?>
                <?= $form->field($objModel, 'date_start')->widget(DatePicker::className(),
                    [
                        'clientOptions' =>
                            [
                                'defaultDate' => date(TimeTable::PHP_DATE_FORMAT),
                            ],
                        'language' => 'ru',
                        'dateFormat' => TimeTable::DATE_PICKER_DATE_FORMAT,
                        'options' => [
                            'class' => 'form-control',
                        ],

                    ]); ?>

                <div class="form-group">
                    <label class="control-label">Дата прибытия</label>
                    <?= Html::textInput('', '', ['class' => 'form-control act-date-to', 'disabled' => true]); ?>
                </div>
                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'add-button']); ?>
                </div>
                <?php
                ActiveForm::end();
                Pjax::end();
                ?>
            </div>
        </div>
    </div>
</div>
