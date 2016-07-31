<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Registration;

/**
 * RegistrationSearch represents the model behind the search form about `common\models\Registration`.
 */
class RegistrationSearch extends Registration {

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vehicle_no'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Registration::find();

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return null;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'vehicle_no' => $this->vehicle_no,
        ]);

        return $query->one();
    }

}
