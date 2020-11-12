<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stage".
 *
 * @property integer $id
 * @property integer $stage
 * @property string $stage_name
 */
class Stage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'stage'], 'integer'],
            [['stage_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'stage' => 'Stage',
            'stage_name' => 'Stage Name',
        ];
    }
}
