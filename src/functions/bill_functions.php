<?php

use entities\Agency;
use entities\Bill;
use entities\Sale;

require_once 'connection_settings.php';
require_once 'medicine_functions.php';
require_once 'client_functions.php';
require_once 'user_functions.php';


function add_agency($location): Agency{
    global $entity_manager;
    $agencies = $entity_manager->getRepository('entities\Agency')->findBy(array(
        'location' => $location
    ));

    if (sizeof($agencies) == 0){
        // Create
        $agency = (new Agency())->setLocation($location);
        $entity_manager->persist($agency);
        $entity_manager->flush();
    }
    else{
        $agency = $agencies[0];
    }

    return $agency;
}


function register_bill(string $client_name,
                       string $client_nit,
                       array $buyed_medicines_name_quantity,
                       string $user_token,
                       string $agency_location,
                       string $client_origin=''): bool {
    /**
     * medicine_names = array[array['name' => string, 'quantity' => int]]
     */
    global $entity_manager;

    $client = add_client($client_name, $client_nit, $client_origin);
    $entity_manager->persist($client);

    $bill = (new Bill())
        ->setDateTime(new DateTime('now'))
        ->setClient($client)
        ->setTotalPrice(0.0);

    $entity_manager->persist($bill);

    $total_price = 0.0;
    foreach ($buyed_medicines_name_quantity as $buyed_medicine){
        $buyed_medicine_name = $buyed_medicine['name'];
        $buyed_medicine_quantity = $buyed_medicine['quantity'];

        $medicine = find_exact_medicine($buyed_medicine_name);
        if ($medicine != null){
            $total_price = $total_price + ($buyed_medicine_quantity*$medicine->getPrice());
            $medicine->setStock($medicine->getStock() - $buyed_medicine_quantity);
            $entity_manager->persist($medicine);

            $sale = (new Sale())
                ->setUnits($buyed_medicine_quantity)
                ->setSalePrice($buyed_medicine_quantity*$medicine->getPrice())
                ->setBill($bill)
                ->setMedicine($medicine)
                ->setUser(get_user($user_token))
                ->setAgency(add_agency($agency_location));

            $bill->addSale($sale);
        }
    }

    $bill->setTotalPrice($total_price);
    $client->addBill($bill);

    $entity_manager->flush();

    return true;
}

// To use this function, you must use find_client($nit) before, in order to get the client information
// or to create a new client.
//echo register_bill(
//    'rafael',
//    '8944417',
//    array(
//        array('name' => 'Alercet D', 'quantity' => 1),
//        array('name' => 'Omeprazol', 'quantity' => 5)
//    ),
//    '4f7c55ed262b10c5f3b556136d50143af1d51f66',
//    'Downtown');

function get_bill($id): Bill {
    global $entity_manager;
    $bill = $entity_manager->getRepository('entities\Bill')->find($id);

    return $bill;
}

//echo nl2br(get_bill(1));
//echo get_bill(1);

function get_bill_information($id): array {
    global $entity_manager;
    $bill = $entity_manager->getRepository('entities\Bill')->find($id);

    $attributes = array();

    $attributes["name"] = $bill->getClient()->getName();
    $attributes["nit"] = $bill->getClient()->getNit();
    $attributes["time"] = $bill->getDateTime()->format('Y-m-d H:i:s');

    if (sizeof($bill->getSales()) > 0){
        $attributes["cashier"] = $bill->getSales()[0]->getUser()->getUsername();
        $attributes["agency"] = $bill->getSales()[0]->getAgency()->getLocation();
    }

    $attributes["sales"] = array();
    foreach ($bill->getSales() as $sale){
        $sale_group = array();
        $sale_group["medicine_name"] = $sale->getMedicine()->getName();
        $sale_group["units"] = $sale->getUnits();
        $sale_group["price"] = $sale->getSalePrice();

        $attributes["sales"][] = $sale_group;
    }

    $attributes["total_price"] = $bill->getTotalPrice();

    return $attributes;
}

//$info = get_bill_information(2);
//echo json_encode($info);

// Json Formatted Output
/**
 *  {"name": "rafael",
 *   "nit": "8944417",
 *   "time": "2019-11-25 06:28:17",
 *   "cashier": "admin",
 *   "agency": "Downtown",
 *   "sales": [
 *       {"medicine_name": "Alercet D",
 *        "units": 1,
 *        "price": 12.800000000000000710542735760100185871124267578125
 *       },
 *       {"medicine_name":"Omeprazol",
 *        "units":5,"price":50
 *       }
 *   ],
 *   "total_price":62.7999999999999971578290569595992565155029296875
 *  }
 */

/**
 * @param string $client_name
 * @return array
 */
function find_bills(string $client_name): array {
    global $entity_manager;
    $client = find_client_by_name($client_name);

    $bills = array();
    if ($client != null){
        foreach ($client->getBills() as $bill){
            $time = $bill->getDateTime()->format('Y/m/d H:i:s');
            $bills[] = $bill->getId()."\t".$time."\t".$bill->getTotalPrice()."\n";
        }
    }

    return $bills;
}

//foreach (find_bills('kevin') as $bill){
//    echo nl2br($bill);
//}

function find_bills_ids(string $client_name): array {
    global $entity_manager;
    $client = find_client_by_name($client_name);

    $bills = array();
    if ($client != null){
        foreach ($client->getBills() as $bill){
            $bills[] = $bill->getId()."\n";
        }
    }

    return $bills;
}