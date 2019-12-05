<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Query\ResultSetMapping;
use entities\Medicine;

require_once '../../connection_settings.php';
require_once '../../entities/Manufacturer.php';

function add_manufacturer(string $name): bool {
    global $entity_manager;
    $manufacturers = $entity_manager->getRepository('entities\Manufacturer')->findBy(array(
        'name' => $name
    ));
    if (sizeof($manufacturers) == 0) {
        // There are no manufacturers with this name
        $entity_manager->persist((new \entities\Manufacturer())->setName($name));
        $entity_manager->flush();

        return true;
    }
    return false;
}

//add_manufacturer('Biofar');

function add_medicine(string $name, float $price, int $quantity_in_box, int $stock, string $manufacturer_name): bool {
    global $entity_manager;
    add_manufacturer($manufacturer_name);
    $manufacturer = $entity_manager->getRepository('entities\Manufacturer')->findBy(array(
        'name' => $manufacturer_name
    ))[0];

    $medicines = $entity_manager->getRepository('entities\Medicine')->findBy(array(
        'name' => $name
    ));

    if (sizeof($medicines) == 0){
        // Medicine does not exist
        $entity_manager->persist(
            (new Medicine())
                ->setName($name)
                ->setPrice($price)
                ->setQuantityInBox($quantity_in_box)
                ->setStock($stock)
                ->setManufacturer($manufacturer)
        );
        $entity_manager->flush();

        return true;
    }
    return false;
}

//add_medicine('aspirina',1.5,5,10,'Biofar');

function find_inexact_medicines(string $name): ArrayCollection{
    /**
     * @var $medicines : ArrayCollection[Medicine]
     */
    global $entity_manager;
    $medicines = $entity_manager->getRepository('entities\Medicine')->createQueryBuilder('m')
        ->where('m.name LIKE :name')
        ->setParameter('name', $name."%")
        ->getQuery()
        ->getResult();

    return $medicines;
}

//find_inexact_medicine('ome');

function find_exact_medicine(string $name): ?Medicine{
    /**
     * @var $medicine: Medicine
     */
    global $entity_manager;
    $medicines = $entity_manager->getRepository('entities\Medicine')->findBy(array(
        'name' => $name
    ));

    if (sizeof($medicines) > 0)
        return $medicines[0];

    return null;
}

//echo find_exact_medicine('omeprazol');

function get_remaining_medicine_quantity(string $medicine_name): ?int{
    global $entity_manager;
    $medicines = $entity_manager->getRepository('entities\Medicine')->findBy(array(
        'name' => $medicine_name
    ));

    if (sizeof($medicines) == 1)
        return $medicines[0]->getStock();

    return null;
}

//echo get_remaining_medicine_quantity('alercet d');

function get_all_medicines_and_manufacturers(): array{
    /**
     * array['medicine_names' => array[string],
     *       'manufacturer_names' => array[string]]
     */
    global $entity_manager;
    $medicines = $entity_manager->getRepository('entities\Medicine')->findAll();
    $manufacturers = $entity_manager->getRepository('entities\Manufacturer')->findAll();

    $medicine_names = array();
    foreach ($medicines as $medicine){
        $medicine_names[] = $medicine->getName();
    }

    $manufacturer_names = array();
    foreach ($manufacturers as $manufacturer){
        $manufacturer_names[] = $manufacturer->getName();
    }

    return ['medicine_names' => $medicine_names,
            'manufacturer_names' => $manufacturer_names];
}

//$res = get_all_medicines_and_manufacturers();
//$manufacturers = $res['manufacturer_names'];
//foreach ($manufacturers as $manufacturer){
//    echo nl2br($manufacturer."\n");
//}

function refill_medicine(string $medicine_name,
                         int $stock,
                         string $manufacturer_name = null,
                         float $price = null,
                         int $quantity_in_box = null): bool {
    global $entity_manager;
    $medicines = $entity_manager->getRepository('entities\Medicine')->findBy(array(
        'name' => $medicine_name
    ));
    if (sizeof($medicines) > 0){
        // Refill
        $medicine = $medicines[0];
        $medicine->setStock($medicine->getStock() + $stock);
        $entity_manager->flush();

        return true;
    }
    else{
        if ($manufacturer_name != null and $price != null and $quantity_in_box != null){
            add_medicine($medicine_name, $price, $quantity_in_box, $stock, $manufacturer_name);

            return true;
        }

        return false;
    }

}

function get_medicine_price(string $medicine_name): ?float{
    global $entity_manager;
    $medicines = $entity_manager->getRepository('entities\Medicine')->findBy(array(
        'name' => $medicine_name
    ));

    if (sizeof($medicines) == 1)
        return $medicines[0]->getPrice();

    return null;
}

function get_medicine_id(string $medicine_name): ?float{
    global $entity_manager;
    $medicines = $entity_manager->getRepository('entities\Medicine')->findBy(array(
        'name' => $medicine_name
    ));

    if (sizeof($medicines) == 1)
        return $medicines[0]->getId();

    return null;
}

//echo refill_medicine('Alercet D', 7, 'Bagó', 12.8, 10);