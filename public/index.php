<?php
require 'bootstrap.php';

try {
    $config = new Respect\Config\Container('config/app.ini');
    echo $config->container->router->run();
} catch (Exception $e) {
    var_dump($e);
}