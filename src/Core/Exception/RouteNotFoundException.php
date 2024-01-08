<?php

namespace App\Core\Exception;

class RouteNotFoundException extends \RuntimeException
{
    public function __construct()
    {
        parent::__construct("Route not found");
    }
}