<?php

namespace app\models;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[Couriers]].
 *
 * @see Couriers
 */
class CouriersQuery extends ActiveQuery {
    /**
     * @inheritdoc
     * @return Couriers[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Couriers|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }
}
