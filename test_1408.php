<?php
  // тестируемая область
  namespace Test;

  use StairElement, StairMaterial, Stair, StairRegistry;

  require_once('vendor/autoload.php');

  require_once('Registry/common_registry.php');

  
  // Создание объекта лестницы из заданного материала
  $stair = new Stair\Stair (StairMaterial\PineMaterial::getInstance(specifyMaterial('pine')));
  
  if ($_POST['button'] == 'submitElement') {
    // var_dump($_POST);
    // exit;
    $current_elem = StairRegistry\StairElementRegistry::getInstance($_POST);
    $stair->addStairElement($current_elem);
    echo $current_elem->getHtmlButton();
  }
  if ($_POST['button'] == 'submitStair') {
    $total = $stair->getTotalStairPrice();
    echo "Общая цена материалов лестницы составляет $total<br>";
  }
  // var_dump($stair);
  exit;

  $stair->getNames();
  echo "<h3>Цены элементов</h3>";
  $total = $stair->getTotalStairPrice();
  echo "Общая цена материалов лестницы составляет $total<br>";
?>