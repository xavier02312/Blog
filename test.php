<?php
/**
 *Test de var_dumper() 
 */
//Chargement de l'autoloader de Composer
require_once 'vendor/autoload.php';

$array = [
    'id' => 'Xavier'
    
];

dump($array);