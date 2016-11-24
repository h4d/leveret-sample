<?php
// INI: PHP Directives /////////////////////////////////////////////////////////////////////////////
error_reporting(E_ALL | E_STRICT);
date_default_timezone_set('UTC');
// END: PHP Directives /////////////////////////////////////////////////////////////////////////////

// INI: Constants definition ///////////////////////////////////////////////////////////////////////
define('APP_DIR', __DIR__);
define('APP_CONFIG_DIR', APP_DIR . '/config');
define('APP_CONTROLLERS_DIR', APP_DIR . '/controllers');
define('APP_MODELS_DIR', APP_DIR . '/models');
define('APP_VIEWS_DIR', APP_DIR . '/views');
define('APP_LOGS_DIR', APP_DIR . '/logs');
define('APP_DATA_DIR', APP_DIR . '/data');
define('EXTERNAL_LIBS_DIR', APP_DIR . '/../vendor');
// END: Constants definitio ////////////////////////////////////////////////////////////////////////

// INI: Requirements ///////////////////////////////////////////////////////////////////////////////
// Application autoload
/** @noinspection PhpIncludeInspection */
require_once(EXTERNAL_LIBS_DIR . '/autoload.php');
// END: Requirements ///////////////////////////////////////////////////////////////////////////////
