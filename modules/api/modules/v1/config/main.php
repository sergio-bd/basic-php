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
                    'class' => 'yii\rest\UrlRule', 'controller' => ['api/v1/country'], 'pluralize' => false,
                    'tokens' => ['{id}' => '<id:\\d+>'],
                    'patterns' => [
                        'GET' => 'index',
                        'GET {id}' => 'view',
                        'POST' => 'create',
                        'PUT {id}' => 'update',
                        'DELETE {id}' => 'delete',
                    ]
                ]
            ],
        ],
    ]
];