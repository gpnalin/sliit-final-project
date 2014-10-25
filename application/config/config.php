<?php

/**
 * Configuration
 *
 * For more info about constants please @see http://php.net/manual/en/function.define.php
 * If you want to know why we use "define" instead of "const" @see http://stackoverflow.com/q/2447791/1114320
 */

/**
 * Configuration for: Error reporting
 * Useful to show every little problem during development, but only show hard errors in production
 */
error_reporting(E_ALL);
ini_set("display_errors", 1);

/**
 * Configuration for: Project URL
 * Put your URL here, for local development "127.0.0.1" or "localhost" (plus sub-folder) is fine
 */
define('URL', 'http://localhost/sliit-final-project/');

/**
 * Configuration for: Project Paths
 * Put your URL here, for local development "127.0.0.1" or "localhost" (plus sub-folder) is fine
 */

define('DS'				,DIRECTORY_SEPARATOR);

define( 'MAINDIR'		, dirname(__DIR__) 		 . DS );
define( 'CONTROLLER_DIR'	, MAINDIR . 'controller' . DS );
define( 'VIEWS_DIR'		, MAINDIR . 'views' 	 . DS );
define( 'MODELS_DIR'		, MAINDIR . 'models' 	 . DS );

/**
 * Configuration for: Database
 * This is the place where you define your database credentials, database type etc.
 */
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'php-mvc');
define('DB_USER', 'root');
define('DB_PASS', '');
