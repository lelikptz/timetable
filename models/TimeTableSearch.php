<?php

namespace app\models;

use yii\data\ActiveDataProvider;

class TimeTableSearch extends TimeTable {

    public $date_from;
    public $date_to;

    public function rules() {
        return [
            [['date_from', 'date_to'], 'safe'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels() {
        return [
            'date_from' => 'Отправление в период с:',
            'date_to' => 'Отправление в период по:',
        ];
    }

    public function search($params) {
        $query = TimeTable::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => ['id' => SORT_DESC],
            ],
        ]);

        // загружаем данные формы поиска и производим валидацию
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        if ($this->date_from) {
            $query->andFilterWhere(['>=', 'date_start', strtotime($this->date_from)]);
        }

        if ($this->date_to) {
            $query->andFilterWhere(['<=', 'date_start', strtotime($this->date_to)]);
        }

        return $dataProvider;
    }
}