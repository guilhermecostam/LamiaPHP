<?php

namespace App\Core;

class Router
{
    public static function createRoute(string $controllerName, string $methodName): array
    {
        return [
            'controller' => $controllerName,
            'method' => $methodName
        ];
    }
}