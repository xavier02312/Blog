<?php
/**
 * Fixtures.php
 * Insertion de fausses données en BDD
 */
//Chargement de l'autoloader de Composer
require_once 'vendor/autoload.php';

//Connection à la base de donnéés
require_once 'connexion.php';

//Création de l'instance Faker
$faker = Faker\Factory::create('fr_FR');

$db->query('SET FOREIGN_KEY_CHECKS = 0; TRUNCATE category; SET FOREIGN_KEY_CHECKS = 1');
//Désactive la vérification des clés étrangère =" SET FOREIGN_KEY_CHECKS = 0;" 
//Vide la table category = "TRUNCATE category;"
//Active la vérification des clés étrangère = "SET FOREIGN_KEY_CHECKS = 1" 
/**
* Insertion des données dans la table "categories" 
*/

for ($i = 0; $i < 10; $i++) {
    $query = $db->prepare('INSERT INTO category (name) VALUES (:name)');
    $query->bindValue(':name', $faker->colorName);
    $query->execute();
}
for ($i = 0; $i < 10; $i++) {
    $query = $db->prepare('INSERT INTO users (lastname, fistname, email, password, role, created_ad) VALUES (:lastname, :fistname, :email, :password, :role, :created_ad)');
    $query->bindValue(':lastname', $faker->lastName);
    $query->bindValue(':fistname', $faker->firstName);
    $query->bindValue(':email', $faker->email);
    $query->bindValue(':password', $faker->password);
    $query->bindValue(':role', $faker->//////);
    $query->bindValue(':created_ad', $faker->//date($format = "Y-m-d", $max = "now"))
}
for ($i = 0; $i < 10; $i++) {
    $query = $db->prepare('INSERT INTO posts (title, content, cover, created_at) VALUES (:title, :content, :cover, :created_at)');
    $query->bindValue(':title', $faker->title($gender = null|'male'|'female'));
    $query->bindValue(':content', $faker->);
    $query->bindValue(':cover', $faker->);
    $query->bindValue(':creat_at', $faker->//date($format = "Y-m-d", $max = "now")); 
}