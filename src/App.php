<?php

namespace MVC;

class App
{
    private static $_instance;
    private function __construct() {}

    // création d'une méthode dites (Singleton) qui fera en sortes qu'on ne puisse faire qu'une seule instance de cette classe.
    public static function getInstance()
    {
        // création d'une structure conditionnelle, ici si $_instance est null, on lui demande de créer une nouvelle instance de App.
        // self fait référence à la classe actuelle, elle n’est pas précédé par « $ » car « self »
        // ne représente pas une variable mais la classe elle-même.
        // Les :: nous permettent ici de venir accéder à notre variable static ($_instance).
        if(is_null(self::$_instance)) {
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    // création de la méthode boot()
    public function boot() {}

    // création de la propriété $container
    public array $container = [];

    // création de la méthode singleton(), avec 2 paramètres
    public function singleton(string $name, \Closure $closure)
    {
        // La fonction isset() vérifie si une variable (ou une clé dans le cas d'un tableau) est définie.
        // En utilisant !isset(), on vérifie si la clé spécifiée n'existe pas.
        if (!isset($this -> container[$name])) {
            // si la clé n'existe pas, alors
            // App est passé en tant qu'instance pour que les services aient accès à App si nécessaire
            $this -> container[$name] = $closure(App::$_instance);
        }
        return $this->container[$name];
    }

    // création de la fonction make() avec le nom du service recherché en paramètre
    public function make(string $name)
    {
        if (isset($this -> container[$name])) {
            return var_dump($this->container[$name]);
        } else {
            echo 'Ce service n\'existe pas';
        }

    }

}
