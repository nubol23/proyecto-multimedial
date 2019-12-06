<?php
require_once 'connection_settings.php';

require_once '../entities/Position.php';
require_once '../entities/User.php';

use entities\Position;
use entities\User;

function register(string $username, string $password, string $position){
    global $entity_manager;
    $positions = $entity_manager->getRepository('entities\Position')->findBy(array(
        'position' => $position
    ));
    if (sizeof($positions) > 0){
        $position = $positions[0];
    }
    else {
        $position = (new Position())->setPosition($position);
        $entity_manager->persist($position);
    }

    $user = (new User())
        ->setUsername($username)
        ->setPassword(hash('sha256', $password))
        ->setPosition($position);

    $entity_manager->persist($user);
    $entity_manager->flush();
}

// register('admin', 'admin', 'admin');

function list_users(){
    global $entity_manager;
    $users = $entity_manager->getRepository('entities\User')->findAll();
    foreach ($users as $user){
        echo nl2br($user->getUsername()."\n");
        if (sizeof($user->getTokens()) > 0)
            echo nl2br($user->getTokens()[0]."\n");
        else
            echo nl2br("null\n");
        echo nl2br("\n");
    }
}

//list_users();

function login(string $username, string $password): ?string {
    global $entity_manager;
    $users = $entity_manager->getRepository('entities\User')->findBy(array(
        'username' => $username,
        'password' => hash('sha256', $password)
    ));
    if (sizeof($users) == 0)
        return null;
    else
        $user = $users[0];

    if (sizeof($user->getTokens()) == 0) {
        $generated = bin2hex(random_bytes(20));
        $token = (new \entities\Token())
            ->setToken($generated)
            ->setUser($user);

        $user->addToken($token);

        $entity_manager->persist($user);
        $entity_manager->flush();
    }

    return $user->getTokens()[0]->getToken();
}

//$response = login("admin", "admin");
//if ($response == null)
//    echo "No existe";
//else
//    echo $response;

function get_user(string $token): ?User{
    global $entity_manager;
    $token_entities = $entity_manager->getRepository('entities\Token')->findBy(array(
        'token' => $token,
    ));
    if (sizeof($token_entities) > 0) {
        // Token Exists
        $token_entity = $token_entities[0];
        return $token_entity->getUser();
    }
    else
        return null;
}

//echo get_user('4f7c55ed262b10c5f3b556136d50143af1d51f66');

function logout(string $token): bool {
    global $entity_manager;
    $token_entities = $entity_manager->getRepository('entities\Token')->findBy(array(
        'token' => $token,
    ));
    if (sizeof($token_entities) > 0) {
        // Token Exists
        $token_entity = $token_entities[0];
        $user = $token_entity->getUser();
        $user->removeToken($token_entity);
        $entity_manager->flush();

        return true;
    }
    else
        return false;
}

//logout("8afbe3c1c5055970ff31b724eb784158fc33d8b6");
?>