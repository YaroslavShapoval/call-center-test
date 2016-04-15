<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "states".
 *
 * @property integer $state_id
 * @property string $state_name
 * @property string $state_slug
 */
class State extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'states';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['state_name', 'state_slug'], 'required'],
            [['state_name', 'state_slug'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'state_id' => 'State ID',
            'state_name' => 'State Name',
            'state_slug' => 'State Slug',
        ];
    }
}
