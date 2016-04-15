<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "goods".
 *
 * @property integer $good_id
 * @property string $good_name
 * @property integer $good_price
 * @property integer $good_advert
 *
 * @property Advert $advert
 */
class Good extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['good_name', 'good_price', 'good_advert'], 'required'],
            [['good_price', 'good_advert'], 'integer'],
            [['good_name'], 'string', 'max' => 255],
            [['good_name'], 'unique'],
            [['good_advert'], 'exist', 'skipOnError' => true, 'targetClass' => Advert::className(), 'targetAttribute' => ['good_advert' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'good_id' => 'ID товара',
            'good_name' => 'Название',
            'good_price' => 'Цена',
            'good_advert' => 'Рекламодатель',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdvert()
    {
        return $this->hasOne(Advert::className(), ['user_id' => 'good_advert']);
    }
}
