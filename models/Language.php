<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "language".
 *
 * @property int $id
 * @property string|null $name
 *
 * @property Country[] $countries
 */
class Language extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'language';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Countries]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\CountryQuery
     */
    public function getCountries()
    {
        return $this->hasMany(Country::class, ['lang_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\LanguageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\LanguageQuery(get_called_class());
    }
}
