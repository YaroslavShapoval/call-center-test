<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "orders".
 *
 * @property integer $order_id
 * @property integer $order_state
 * @property string $order_add_time
 * @property integer $order_good
 * @property string $order_client_phone
 * @property string $order_client_name
 *
 * @property Good $good
 * @property State $state
 */
class Order extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_state', 'order_add_time', 'order_good', 'order_client_phone', 'order_client_name'], 'required'],
            [['order_state', 'order_good'], 'integer'],
            [['order_add_time'], 'safe'],
            [['order_client_phone', 'order_client_name'], 'string', 'max' => 255],
            [['order_good'], 'exist', 'skipOnError' => true, 'targetClass' => Good::className(), 'targetAttribute' => ['order_good' => 'good_id']],
            [['order_state'], 'exist', 'skipOnError' => true, 'targetClass' => State::className(), 'targetAttribute' => ['order_state' => 'state_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'order_state' => 'Order State',
            'order_add_time' => 'Order Add Time',
            'order_good' => 'Order Good',
            'order_client_phone' => 'Order Client Phone',
            'order_client_name' => 'Order Client Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGood()
    {
        return $this->hasOne(Good::className(), ['good_id' => 'order_good']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getState()
    {
        return $this->hasOne(State::className(), ['state_id' => 'order_state']);
    }
}
