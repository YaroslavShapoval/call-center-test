<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "adverts".
 *
 * @property integer $user_id
 * @property string $user_first_name
 * @property string $user_last_name
 * @property string $user_login
 * @property string $user_password
 */
class Advert extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'adverts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_first_name', 'user_last_name', 'user_login', 'user_password'], 'required'],
            [['user_first_name', 'user_last_name', 'user_login', 'user_password'], 'string', 'max' => 255],
            [['user_login'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'user_first_name' => 'User First Name',
            'user_last_name' => 'User Last Name',
            'user_login' => 'User Login',
            'user_password' => 'User Password',
        ];
    }
}
