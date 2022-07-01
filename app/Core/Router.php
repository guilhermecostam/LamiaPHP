<?php

namespace App\Core;

class Router
{
    public function createRoute(string $controllerName, string $methodName): array
    {
        return [
            'controller' => $controllerName,
            'method' => $methodName
        ];
    }
}