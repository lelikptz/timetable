<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "regions".
 *
 * @property integer $id
 * @property string $name
 * @property integer $duration
 */
class Regions extends ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'regions';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'duration'], 'required'],
            [['duration'], 'integer'],
            [['name'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Название города',
            'duration' => 'Дней в пути',
        ];
    }

    /**
     * @inheritdoc
     * @return RegionsQuery the active query used by this AR class.
     */
    public static function find() {
        return new RegionsQuery(get_called_class());
    }

    /**
     * Формируем атрибут data-duration для js обновления даты прибытия
     * @return array
     */
    public function getDname() {
        return [
            'data-duration' => $this->duration
        ];
    }
}
