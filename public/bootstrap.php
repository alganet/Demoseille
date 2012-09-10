<?php
date_default_timezone_set('UTC');
ini_set('log_errors', 1);
define('DEMOSEILLE_ENV',        getenv('DEMOISELLE_ENV')     ?: 'production');
define('DEMOSEILLE_DB_DSN',     getenv('DEMOISELLE_DB_DSN')  ?: '');
define('DEMOSEILLE_DB_USER',    getenv('DEMOSEILLE_DB_USER') ?: '');
define('DEMOSEILLE_DB_PWD',     getenv('DEMOISELLE_DB_PWD')  ?: '');
define('DEMOSEILLE_4SQ_KEY',    getenv('DEMOSEILLE_4SQ_KEY')  ?: '');
define('DEMOSEILLE_4SQ_SECRET', getenv('DEMOSEILLE_4SQ_SECRET')  ?: '');
define('DS', DIRECTORY_SEPARATOR);
define('PS', PATH_SEPARATOR);
define('DEMOSEILLE_ROOT', realpath(__DIR__.DS.'..'));
switch (DEMOSEILLE_ENV) {
    case 'development':
        error_reporting(-1);
        ini_set('display_errors',1);
        break;
    case 'production':
    default:
        ini_set('display_errors',0);
        break;
}
chdir(DEMOSEILLE_ROOT);
set_include_path('src'.PS.get_include_path());
if (!file_exists($loader='vendor'.DS.'autoload.php')) {
    throw new RuntimeException('Dependencies not installed. See README.md.');
}
require $loader;
unset($loader);

/**
 * Renders a twig template.
 *
 * @example twig_render(array('venues.html', array('template var' => 'var content')));
 * @param   array    $vars   Arguments of twig's render method.
 * @return  string
 */
function twig_render($vars) {
    global $config;
    $twig = $config->container->twig;
    return call_user_func_array(array($twig, 'render'), $vars);
}