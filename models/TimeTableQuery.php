<?php

namespace app\models;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[TimeTable]].
 *
 * @see TimeTable
 */
class TimeTableQuery extends ActiveQuery {
    /**
     * @inheritdoc
     * @return TimeTable[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TimeTable|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }
}