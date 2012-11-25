<?php

ini_set("error_reporting", E_ALL);
ini_set("display_errors", "On");
ini_set("display_startup_errors", "On");
ini_set("log_errors", "On");
ini_set("html_errors", "On");

/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
chdir(dirname(__DIR__));
//print_r(dirname(__DIR__));exit();

// Setup autoloading
include 'init_autoloader.php';

// Run the application!
Zend\Mvc\Application::init(include 'config/application.config.php')->run();
