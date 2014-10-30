<?php

/**
 * A simple PHP MVC skeleton
 *
 * @package php-mvc
 * @author Panique
 * @link http://www.php-mvc.net
 * @link https://github.com/panique/php-mvc/
 * @license http://opensource.org/licenses/MIT MIT License
 */

// load the (optional) Composer auto-loader
if (file_exists('../vendor/autoload.php')) {
    require '../vendor/autoload.php';
}

// load application config (error reporting etc.)
require '../application/config/config.php';

// load application class
require 'application/libs/auth.php';
require 'application/libs/application.php';
require 'application/libs/controller.php';

$auth = new Auth();

// ... ask if we are logged in here:
if ($auth->isUserLoggedIn() == true) {
    // the user is logged in.
    // start the application
	$app = new Application();
} else {
    // the user is not logged in.
    require 'application/views/_templates/header.php';
    require 'application/views/not_logged_in.php';
    require 'application/views/_templates/footer.php';
}

