<?php
try {
    require 'bootstrap.php';
    $config = new Respect\Config\Container('conf/app.ini');
    echo $config->container->router->run();
} catch (Exception $e) {
    var_dump($e);
}