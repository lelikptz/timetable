<?php

/**
 * @var $this yii\web\View
 * @var $objProvider object
 * @var $objModel app\models\TimeTableSearch
 */

use app\models\TimeTable;

$this->title = 'Расписние';

?>
<div class="site-index">
    <div class="jumbotron">
        <h1>Расписание!</h1>
    </div>

    <div class="body-content">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <?= $this->render('_search', ['objModel' => $objModel]) ?>

                <div class="box">
                    <div class="box-body">
                        <?php
                        echo yii\grid\GridView::widget([
                            'dataProvider' => $objProvider,
                            'columns' => [
                                'id',
                                'couriers.fio',
                                'regions.name',
                                'date_start' =>
                                    [
                                        'header' => 'Дата выезда',
                                        'value' => function ($date) {
                                            return date(TimeTable::PHP_DATE_FORMAT, $date->date_start);
                                        },
                                    ],
                                'regions.duration',
                                [
                                    'header' => 'Дата прибытия',
                                    'value' => function ($data) {
                                        $intTime = $data->date_start + $data->regions->duration * 86400;
                                        return date(TimeTable::PHP_DATE_FORMAT, $intTime);
                                    },
                                ],
                            ],
                            'layout' => "{items}\n{summary}\n{pager}",
                        ]);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
