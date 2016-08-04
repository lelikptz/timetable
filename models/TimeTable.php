<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "TimeTable".
 *
 * @property integer $id
 * @property integer $region_id
 * @property integer $courier_id
 * @property integer $date_start
 */
class TimeTable extends ActiveRecord {

    const PHP_DATE_FORMAT = 'Y-m-d';
    const DATE_PICKER_DATE_FORMAT = 'yyyy-MM-dd';

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'timetable';
    }

    public function getRegions() {
        return $this->hasOne(Regions::className(), ['id' => 'region_id']);
    }

    public function getCouriers() {
        return $this->hasOne(Couriers::className(), ['id' => 'courier_id']);
    }

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [['region_id', 'courier_id', 'date_start'], 'required'],
            [['region_id', 'courier_id'], 'integer'],
            ['courier_id', 'validatorCourier'],
            ['date_start', 'date', 'format' => 'php:' . self::PHP_DATE_FORMAT],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels() {
        return [
            'region_id' => 'Регион',
            'courier_id' => 'Курьер',
            'date_start' => 'Дата отправления',
        ];
    }

    public function beforeSave($insert) {
        $this->date_start = strtotime($this->date_start);
        return parent::beforeSave($insert);
    }

    public function validatorCourier($attribute) {
        $objRegion = Regions::findOne($this->region_id);

        $v = TimeTable::find()
            ->with('regions')
            ->leftJoin('regions', 'timetable.region_id = regions.id')
            ->andWhere(['courier_id' => $this->$attribute])
            ->andWhere('
            (LEAST(GREATEST(date_start, date_start + regions.duration * 86400), GREATEST(:new_date_start, :new_date_end)) -
            GREATEST(LEAST(date_start, date_start + regions.duration * 86400), LEAST(:new_date_start, :new_date_end)) >= 0)
            ', [
                ':new_date_start' => strtotime($this->date_start),
                ':new_date_end' => strtotime($this->date_start) + $objRegion->duration * 86400
            ])->all();

        if (count($v)) {
            $this->addError($attribute, 'В это время курьер занят');
        }
    }

    public static function find() {
        return new TimeTableQuery(get_called_class());
    }
}
