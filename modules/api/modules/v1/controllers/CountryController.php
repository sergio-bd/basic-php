<?php

namespace app\modules\api\modules\v1\controllers;

use yii\rest\ActiveController;

class CountryController extends ActiveController
{
    public $modelClass = 'app\models\Country';
}