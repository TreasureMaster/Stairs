<?php
  // тестируемая область
  namespace Test;

  use StairElement, StairMaterial, Stair, StairRegistry;

  require_once('vendor/autoload.php');

  require_once('Registry/common_registry.php');

  
  // Создание объекта лестницы из заданного материала
  $stair = new Stair\Stair (StairMaterial\PineMaterial::getInstance(specifyMaterial('pine')));
  
  if ($_POST['button'] == 'submitElement') {
    // текущий элемент
    $current_elem = StairRegistry\StairElementRegistry::getInstance($_POST);
    $stair->addStairElement($current_elem);
    echo $current_elem->getJsonProperties();
  }
  if ($_POST['button'] == 'submitStair') {
    foreach ($_POST as $key => $value) {
      if ($key != 'button') {
        $stair->addStairElement(StairRegistry\StairElementRegistry::getInstance(json_decode($value, true)));
      }
    }
    $total = $stair->getTotalStairPrice();
    echo "Общая цена материалов лестницы составляет $total руб.<br>";
  }
  // var_dump($stair);
  exit;

  $stair->getNames();
  echo "<h3>Цены элементов</h3>";
  $total = $stair->getTotalStairPrice();
  echo "Общая цена материалов лестницы составляет $total<br>";
?>