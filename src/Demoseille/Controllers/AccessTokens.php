<?php
namespace Demoseille\Controllers;

use \InvalidArgumentException;
use \UnexpectedValueException;
use \INPUT_GET;
use Respect\Rest\Routable;
use Respect\Config\Container;

class AccessTokens implements Routable
{
    public function get($serviceName)
    {
        $service  = $this->getServiceContainer($serviceName);
        $redirect = 'http://locais.mobi/accesstokens/'.$serviceName;

        if (isset($_GET['code'])) {
            $url = 'https://foursquare.com/oauth2/access_token?client_id=%s&client_secret=%s&grant_type=authorization_code&redirect_uri=%s&code=%s';
            $url = sprintf($url, $service['key'], $service['secret'], $redirect, filter_input(INPUT_GET, 'code'));
            $json = file_get_contents($url);

            if (strlen($json) <= 0)
                return header('HTTP/1.1 403');
            $code = json_decode($json);
            if (!isset($code->access_token))
                return header('HTTP/1.1 403');

            return $code->access_token;
        }

        $url     = 'https://foursquare.com/oauth2/authenticate?client_id=%s&response_type=code&redirect_uri=%s';
        $url     = sprintf($url, $service['key'], $redirect);
        
        header('HTTP/1.1 307');
        header('Location: '.$url);
    }

    /**
     * @param  string $serviceName
     * @return array
     */
    protected function getServiceContainer($serviceName)
    {
        if (!file_exists($file='conf/accesstokens.ini'))
            throw new UnexpectedValueException($file.' does not exists!');

        $config = new Container($file);
        if (!isset($config->$serviceName))
            throw new InvalidArgumentException('Service not configured: '.$serviceName);

        return $config->$serviceName;
    }
}