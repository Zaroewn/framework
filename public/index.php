<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';
use MVC\App;

$app = App::getInstance();
// Le symbole "->" est un opérateur d'accès qui est utiliser pour accéder à une propriété ou appeler une méthode dans un objet.
$app -> boot();

var_dump($app -> container);

$app -> singleton('Mon premier service', fn(App $app) => 'instance');
var_dump($app -> container);
$app -> singleton('Mon deuxieme service', fn(App $app) => 'instance 2');
var_dump($app -> container);

$monService = $app -> make('Mon premier service');
$monService = $app -> make('Mon deuxieme service');
