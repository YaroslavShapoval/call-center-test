<?php

namespace app\models\search;

use app\models\Good;
use app\models\State;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Order;

/**
 * OrderSearch represents the model behind the search form about `app\models\Order`.
 */
class OrderSearch extends Order
{
    public $dateFrom = null;
    public $dateTo = null;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'order_state', 'order_good'], 'integer'],
            [['dateFrom', 'dateTo', 'order_client_phone', 'order_client_name'], 'safe'],
            [['order_good'], 'exist', 'skipOnError' => true, 'targetClass' => Good::className(), 'targetAttribute' => ['order_good' => 'good_id']],
            [['order_state'], 'exist', 'skipOnError' => true, 'targetClass' => State::className(), 'targetAttribute' => ['order_state' => 'state_id']],
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
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'dateFrom' => 'От',
            'dateTo' => 'До',
        ]);
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
        $query = Order::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'order_id' => $this->order_id,
            'order_state' => $this->order_state,
            'order_good' => $this->order_good,
        ]);

        $query->andFilterWhere([
            'between', 'order_add_time', $this->dateFrom, $this->dateTo,
        ])->andFilterWhere([
            'like', 'order_client_phone', $this->order_client_phone,
        ])->andFilterWhere([
            'like', 'order_client_name', $this->order_client_name,
        ]);

        return $dataProvider;
    }
}
