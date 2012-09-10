<?php
namespace Demoseille\Controllers;

use Respect\Rest\Routable;


class Venues implements Routable
{
    public function get()
    {
        return array(
            'venues.html' , array(
                'message' => 'hello world!'
            )
        );
    }

    public function post()
    {
        // ...
    }
}