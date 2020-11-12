<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "temp".
 *
 * @property integer $stage
 */
class Temp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'temp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stage','getlat','getlng'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'stage' => 'Stage',
            'getlat'=>'ละติจูด',
            'getlng'=>'ลองติจูด',
        ];
    }
}
