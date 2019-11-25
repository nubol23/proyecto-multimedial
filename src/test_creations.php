<?php
require_once '../connection_settings.php';

//require_once '../entities/Agency.php';
//require_once '../entities/Bill.php';
//require_once '../entities/Client.php';
//require_once '../entities/Manufacturer.php';
//require_once '../entities/Medicine.php';
//require_once '../entities/Origin.php';
//require_once '../entities/Position.php';
//require_once '../entities/Sale.php';
//require_once '../entities/Token.php';
//require_once '../entities/User.php';

/** Create **/
//$manufacturer = (new Manufacturer())->setName('BAGÓ');
//
//// Creates SQL Query but does not execute it until "flush()" is called
//$entity_manager->persist($manufacturer);
//
//// Manufacturer is added manually for each medicine
//$medicine = (new Medicine())
//    ->setName('Omeprazol')
//    ->setPrice(10)
//    ->setQuantityInBox(5)
//    ->setStock(10)
//    ->setManufacturer($manufacturer);
//
//// Add medicine to Manufacturers product list
//$manufacturer->addMedicine($medicine);
//
//// Execute the queries
//$entity_manager->flush();

/** Read **/
$manufacturersRepository = $entity_manager->getRepository('entities\Manufacturer');
$manufacturers = $manufacturersRepository->findAll();
foreach ($manufacturers as $manufacturer){
    echo nl2br($manufacturer->getName()."\n");
    foreach ($manufacturer->getMedicines() as $medicine){
        echo nl2br("Medicina: ".$medicine->getName()."\n");
    }
    echo nl2br("\n");
}

//$medicine = $entity_manager->getRepository('entities\Medicine')->findBy(array(
//    'name' => 'omeprazol'
//))[0];
//echo $medicine->getName();

//$medicines = $entity_manager->getRepository('entities\Medicine')->findAll();
//foreach ($medicines as $medicine){
//    echo nl2br("Medicina: ".$medicine->getName()."\n");
//}

/** Update **/
//$manufacturer = $entity_manager->getRepository('entities\Manufacturer')->findBy(array(
//    'name' => "BAGÓ"
//))[0];
//if ($manufacturer != null){
//    $manufacturer->setName('Cofar');
//}
//
////Execute query
//$entity_manager->flush();

/** Delete **/
// Cascaded, if a Manufacturer is deleted, so is the Medicine
//$manufacturer = $entity_manager->getRepository('entities\Manufacturer')->findBy(array(
//    'name' => "Cofar"
//))[0];
//if ($manufacturer != null){
//    $entity_manager->remove($manufacturer);
//}
//$entity_manager->flush();