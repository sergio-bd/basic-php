<?php

namespace app\modules\api\modules\v1;

use Yii;
use yii\base\BootstrapInterface;
use yii\web\Application;

/**
 * v1 module definition class
 */
class Module extends \yii\base\Module implements BootstrapInterface
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\api\modules\v1\controllers';

    /**
     * {@inheritdoc}
     */
    public function init(): void
    {
        parent::init();

        Yii::configure($this, require __DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'main.php');
    }

    public function bootstrap($app): void
    {
        if ($app instanceof Application) {
            $app->getUrlManager()->addRules($this->getComponents()['urlManager']['rules'], false);
        }
    }
}
