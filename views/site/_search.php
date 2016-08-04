<?php

use app\models\TimeTable;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

/**
 * @var $this yii\web\View
 * @var $objModel app\models\TimeTableSearch
 * @var $form yii\widgets\ActiveForm
 */
?>

<div class="post-search">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($objModel, 'date_from')->widget(DatePicker::className(),
        [
            'clientOptions' =>
                [
                    'defaultDate' => date(TimeTable::PHP_DATE_FORMAT),
                ],
            'language' => 'ru',
            'dateFormat' => TimeTable::DATE_PICKER_DATE_FORMAT,
            'options' => [
                'class' => 'form-control',
            ]
        ]); ?>
    <?= $form->field($objModel, 'date_to')->widget(DatePicker::className(),
        [
            'clientOptions' =>
                [
                    'defaultDate' => date(TimeTable::PHP_DATE_FORMAT),
                ],
            'language' => 'ru',
            'dateFormat' => TimeTable::DATE_PICKER_DATE_FORMAT,
            'options' => [
                'class' => 'form-control',
            ]
        ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Искать', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Сбросить', ['index'], ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>