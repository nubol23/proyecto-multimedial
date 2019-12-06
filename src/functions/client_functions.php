<?php

use Doctrine\Common\Collections\ArrayCollection;
use entities\Client;
use entities\Origin;

require_once 'connection_settings.php';
require_once '../entities/Client.php';

function add_origin($state): Origin{
    global $entity_manager;
    $origins = $entity_manager->getRepository('entities\Origin')->findBy(array(
        'state' => $state
    ));

    if (sizeof($origins) == 0){
        // Create
        $origin = (new Origin())->setState($state);
        $entity_manager->persist($origin);
        $entity_manager->flush();
    }
    else{
        $origin = $origins[0];
    }

    return $origin;
}

function add_client(string $name, string $nit, string $origin=''): Client{
    global $entity_manager;

    $clients = $entity_manager->getRepository('entities\Client')->findBy(array(
        'name' => $name
    ));

    if (sizeof($clients) == 0){
        $origin_entry = add_origin($origin);

        $client = (new Client())
            ->setName($name)
            ->setNit($nit)
            ->setOrigin($origin_entry);

        $origin_entry->addClient($client);

        $entity_manager->flush();
    }
    else{
        $client = $clients[0];
    }

    return $client;
}

//echo add_client('rafael', '8944417', 'Santa Cruz');

function find_client(string $nit): ?Client{
    global $entity_manager;
    $clients = $entity_manager->getRepository('entities\Client')->findBy(array(
        'nit' => $nit
    ));

    if (sizeof($clients) == 1)
        return $clients[0];

    return null;
}

//echo find_client('8944417');

function find_client_by_name(string $name): ?Client{
    global $entity_manager;
    $clients = $entity_manager->getRepository('entities\Client')->findBy(array(
        'name' => $name
    ));

    if (sizeof($clients) == 1)
        return $clients[0];

    return null;
}

//echo find_client_by_name('Rafael');

function find_clients(string $name): array{
    global $entity_manager;
    $clients = $entity_manager->getRepository('entities\Client')->createQueryBuilder('c')
        ->where("c.name LIKE :name")
        ->setParameter('name', $name."%")
        ->getQuery()
        ->getResult();

    return $clients;
}

//foreach (find_clients('raf') as $client){
//    echo nl2br($client."\n");
//}


