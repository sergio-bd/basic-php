<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property int $id
 * @property int|null $lang_id
 * @property string|null $code
 * @property string|null $name
 *
 * @property CountryExtEurope $countryExtEurope
 * @property Language $lang
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lang_id'], 'integer'],
            [['code'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 125],
            [['code'], 'unique'],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::class, 'targetAttribute' => ['lang_id' => 'id']],
        ];
    }

    public function fields(): array
    {
        // return parent::fields();
        return [
            'id',
            'language' => function () {
                return $this->lang;
            },
            'code',
            'name',
//            'ext' => function () {
//                return $this->countryExtEurope;
//            }
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lang_id' => 'Lang ID',
            'code' => 'Code',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[CountryExtEurope]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\CountryExtEuropeQuery
     */
    public function getCountryExtEurope()
    {
        return $this->hasOne(CountryExtEurope::class, ['country_id' => 'id']);
    }

    /**
     * Gets query for [[Lang]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\LanguageQuery
     */
    public function getLang()
    {
        return $this->hasOne(Language::class, ['id' => 'lang_id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\CountryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\CountryQuery(get_called_class());
    }
}
