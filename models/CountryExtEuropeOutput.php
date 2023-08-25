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
class CountryExtEuropeOutput extends CountryExtEurope
{
    public function fields(): array
    {
        return [
            'country' => function () { return $this->country; },
//            'language' => function () { return $this->country->lang;},
            'is_european',
            'is_schengen'
        ];
    }

    public function getCountry()
    {
        return $this->hasOne(Country::class, ['id' => 'country_id'])->fla;
    }

}
