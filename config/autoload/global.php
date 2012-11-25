<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overridding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

//if(preg_match('/bondvt04\.home\.lan$/', $_SERVER['HTTP_HOST'])){
//    $dbHost = "localhost";// хули, если openvpn есть
//    $dbName = "tasker";
//    $dbUser = "user";
//    $dbPass = "usbw";
//} elseif(preg_match('/.*\.lan$/', $_SERVER['HTTP_HOST'])){
//    $dbHost = "10.0.0.99";
//    $dbName = "tasker";
//    $dbUser = "user";
//    $dbPass = "usbw";
//}

return array(
    'db' => array(
        'driver'         => 'Pdo',
        'dsn'            => 'mysql:dbname=tasker;host=10.0.0.99',
        'username'       => 'user',
        'password'       => 'usbw',
        'driver_options' => array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'Zend\Db\Adapter\Adapter'
                => 'Zend\Db\Adapter\AdapterServiceFactory',
        ),
    ),
);