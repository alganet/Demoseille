<?php
try {
    require 'bootstrap.php';
    $config = new Respect\Config\Container('conf/app.ini');
    $router = $config->container->router;
    $router->get('/',               'Demoseille\Controllers\Index');
    $router->get('/venues',         'Demoseille\Controllers\Venues');
    $router->post('/venues',        'Demoseille\Controllers\Venues');
    $router->get('/accesstokens/*', 'Demoseille\Controllers\AccessTokens');

    $router->always('Accept', array(
        'text/html' => 'twig_render',
        'application/json' => 'json_encode'
    ));
    echo $router->run();
} catch (Exception $e) {
    echo PHP_EOL, '<pre>', '<hr/>', $e, PHP_EOL, $e->getTraceAsString(), '</pre>';
}