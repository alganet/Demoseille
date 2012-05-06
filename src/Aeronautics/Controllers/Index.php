<?php

namespace Aeronautics\Controllers;

use Respect\Rest\Routable;

class Index implements Routable
{
    public function get()
    {
        header('HTTP/1.1 307');
        header('Location: /venues');
    }
}