<?php
require 'bootstrap.php';

try {
    $config = new Respect\Config\Container('conf/app.ini');
    function twig_render($vars) {
        global $config;
        $twig = $config->container->twig;
        return call_user_func_array(array($twig, 'render'), $vars);
    };
    echo $config->container->router->run();
} catch (Exception $e) {
    var_dump($e);
}