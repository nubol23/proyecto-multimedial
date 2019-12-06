<?php
require_once 'vendor/autoload.php';

// Setup Doctrine
$configuration = Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
    $paths = [__DIR__ . '/entities'],
    $isDevMode = true,
    null,
    null,
    false
);

// Setup connection parameters
$connection_parameters = [
    'dbname' => 'pharmacy',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost',
    'driver' => 'pdo_mysql'
];

// Get the entity manager
$entity_manager = Doctrine\ORM\EntityManager::create($connection_parameters, $configuration);

?>