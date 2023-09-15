<?php

use yii\web\Response;

return [
    'components' => [
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\web\GroupUrlRule',
                    'prefix' => 'api',
                    'rules' => [
                        // API module
                        'OPTIONS <url:.*>' => 'default/index',

                    ],
                ],
            ],
        ],
    ]
];