<?php

namespace Aeronautics\Controllers;

use Respect\Validation\Validator as V;

class AccessTokensTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        global $header;

        $header = array();
    }

    public function assertPreConditions()
    {
        global $header;

        $this->assertEmpty($header);
        $this->assertInstanceOf('Respect\Rest\Routable', new AccessTokens);
    }

    public function test_redirect()
    {
        global $header;

        $c = new AccessTokens;
        $c->get('foursquare');
        
        $this->assertTrue(V::contains('HTTP/1.1 307')->check($header));
    }

    public function test_access_token()
    {
        global $header;

        $_GET['code'] = 'Received by foursquare';
        $c            = new AccessTokens;
        $accesstoken  = $c->get('foursquare');
        $this->assertEquals('ACCESS_TOKEN', $accesstoken);
        $this->assertEmpty($header);
    }
}

/** Stubs */
$header = array();
function header($string)
{
    global $header;

    $header[$string] = $string;
}

function filter_input($method, $var)
{
    return $_GET[$var];
}

function file_get_contents($url)
{
    return '{"access_token": "ACCESS_TOKEN"}';
}