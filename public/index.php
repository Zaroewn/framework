<?php

// Front controller (toutes les requêtes passent par ici)

// Autoloader de Composer
require_once __DIR__ . '/../vendor/autoload.php';

// On récupère une instance de la classe App
$app = MVC\App::getInstance();
// Servira à ajouter mes services au conteneur
$app->boot();

// Test d'ajout de 2 services
$app->singleton('foo', fn(MVC\App $app) => new class () {});
$app->singleton('bar', fn(MVC\App $app) => new class () {});

dd(
    $app,
    $app->make('bar'),
);
