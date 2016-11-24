<?php

require_once(__DIR__ . '/../app/bootstrap.php');

use Application\Application;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

// INIT: Application ///////////////////////////////////////////////////////////////////////////////

// Instance and configure main app's logger
$appLogger = new Logger('application');
$appLogger->pushHandler(new StreamHandler(APP_LOGS_DIR . '/application.log'));
$appLogger->pushProcessor(new \Monolog\Processor\WebProcessor());

// Instance app.
$app = new Application(APP_CONFIG_DIR . '/config.ini', $appLogger);

// Run app
$app->run();

// END: Application ////////////////////////////////////////////////////////////////////////////////