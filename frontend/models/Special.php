<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "special".
 *
 * @property integer $id
 * @property integer $old_price
 * @property integer $new_price
 * @property integer $seats
 * @property integer $description
 */
class Special extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'special';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['old_price', 'new_price', 'seats', 'description'], 'required'],
            [['old_price', 'new_price'], 'integer'],
            [['description'], 'string'],
            [['seats', 'photo_url', 'name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'old_price' => 'Old Price',
            'new_price' => 'New Price',
            'seats' => 'Seats',
            'description' => 'Description',
        ];
    }
}
