<?php

namespace app\models;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[Regions]].
 *
 * @see Regions
 */
class RegionsQuery extends ActiveQuery {
    /**
     * @inheritdoc
     * @return Regions[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Regions|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }
}
