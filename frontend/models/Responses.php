<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "responses".
 *
 * @property integer $id
 * @property string $text
 * @property string $vk_id
 * @property string $photo_url
 */
class Responses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'responses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text', 'vk_id', 'photo_url'], 'required'],
            [['text'], 'string'],
            [['vk_id', 'photo_url'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'vk_id' => 'Vk ID',
            'photo_url' => 'Photo Url',
        ];
    }
}
