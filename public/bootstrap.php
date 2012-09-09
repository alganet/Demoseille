<?php
date_default_timezone_set('UTC');
ini_set('log_errors', 1);
switch (DEMOISELLE_ENV) {
    case 'development':
        error_reporting(-1);
        ini_set('display_errors',1);
        break;
    case 'production':
    default:
        ini_set('display_errors',0);
        break;
}
define('DEMOSEILLE_ENV',        getenv('DEMOISELLE_ENV')     ?: 'production');
define('DEMOSEILLE_DB_DSN',     getenv('DEMOISELLE_DB_DSN')  ?: '');
define('DEMOSEILLE_DB_USER',    getenv('DEMOSEILLE_DB_USER') ?: '');
define('DEMOSEILLE_DB_PWD',     getenv('DEMOISELLE_DB_PWD')  ?: '');
define('DEMOSEILLE_4SQ_KEY',    getenv('DEMOSEILLE_4SQ_KEY')  ?: '');
define('DEMOSEILLE_4SQ_SECRET', getenv('DEMOSEILLE_4SQ_SECRET')  ?: '');
chdir(__DIR__.'/../');
set_include_path('src'.PATH_SEPARATOR.get_include_path());
if (!file_exists('Respect/Loader.php')) {
    trigger_error('Respect/Loader is not installed.', E_USER_ERROR);
}
spl_autoload_register(require 'Respect/Loader.php');

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