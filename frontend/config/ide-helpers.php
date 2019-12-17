<?php

/**
 * Этот файл не для исполнения. Он не подключается в других файлах, а нужен
 * лишь для того, чтобы IDE делала правильные подсказки при написании кода.
 *
 * Для избавления от предупреждения PhpStorm "Multiple Implementations"
 * нужно пометить исходный файл vendor/yiisoft/yii2/Yii.php как Plain Text
 */

namespace {

    use frontend\components\GameProcess;

    require __DIR__ . '/../../vendor/yiisoft/yii2/BaseYii.php';

    /**
     * @property-read GameProcess $gameProcess
     */
    trait BaseApplication
    {
    }

    /**
     * Class Yii
     */
    class Yii extends \yii\BaseYii
    {
        /**
         * @var WebApplication|ConsoleApplication the application instance
         */
        public static $app;
    }

    /**
     */
    class WebApplication extends yii\web\Application
    {
        use BaseApplication;
    }

    /**
     */
    class ConsoleApplication extends yii\console\Application
    {
        use BaseApplication;
    }
}
