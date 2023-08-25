<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country_ext_europe".
 *
 * @property int $country_id
 * @property int|null $is_european
 * @property int|null $is_schengen
 *
 * @property Country $country
 */
class CountryExtEurope extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'country_ext_europe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_european', 'is_schengen'], 'integer'],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::class, 'targetAttribute' => ['country_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'country_id' => 'Country ID',
            'is_european' => 'Is European',
            'is_schengen' => 'Is Schengen',
        ];
    }

    /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\CountryQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::class, ['id' => 'country_id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\CountryExtEuropeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\CountryExtEuropeQuery(get_called_class());
    }
}
