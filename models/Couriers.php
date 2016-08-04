<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "couriers".
 *
 * @property integer $id
 * @property string $fio
 */
class Couriers extends ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'couriers';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['fio'], 'required'],
            [['fio'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'fio' => 'Фамилия',
        ];
    }

    /**
     * @inheritdoc
     * @return CouriersQuery the active query used by this AR class.
     */
    public static function find() {
        return new CouriersQuery(get_called_class());
    }
}
