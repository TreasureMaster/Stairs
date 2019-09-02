<?php
  // тестируемая область
  namespace Test;

  use StairElement, StairMaterial, Stair, StairRegistry;

  require_once('vendor/autoload.php');

  require_once('Registry/common_registry.php');

  
  // Создание объекта лестницы из заданного материала
  $stair = new Stair\Stair (StairMaterial\PineMaterial::getInstance(specifyMaterial('pine')));
  
  if ($_POST['button'] == 'submitElement') {
    var_dump($_POST);
    exit;
    // текущий элемент
    $current_elem = StairRegistry\StairElementRegistry::getInstance($_POST);
    $stair->addStairElement($current_elem);
    echo $current_elem->getJsonProperties();
    // echo $current_elem->getHtmlButton();
  }
  if ($_POST['button'] == 'submitStair') {
    // var_dump($_POST);
    $elems = [];
    foreach ($_POST as $key => $value) {
      if ($key != 'button') {
        array_push($elems, json_decode($value, true));
      }
    }
    var_dump($elems);
    exit;
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