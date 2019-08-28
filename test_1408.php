<?php
  // тестируемая область
  namespace Test;

  use StairElement, StairMaterial, Stair, StairRegistry;

  require_once('vendor/autoload.php');

  // var_dump(specifyMaterial('pine'));
  // exit;
  // require_once('StairElement/list_name.php');
  // require_once('StairMaterial/common_material.php');
  // require_once('Stair/stair.php');
  require_once('Registry/common_registry.php');

  // создаем лестницу, включающую элементы (длина, ширина, толщина, количество)
  // $stair_array = [
  //   array('stair_element' => 'level', 'elem_length' => '1000', 'elem_width' => '300', 'elem_height' => '40', 'elem_quantity' => '7'),
  //   array('stair_element' => 'riser', 'elem_length' => '1000', 'elem_width' => '200', 'elem_height' => '20', 'elem_quantity' => '9'),
  //   array('stair_element' => 'baluster', 'elem_pcs' => '16'),
  //   array('stair_element' => 'balustradecolumn', 'elem_pcs' => '4'),
  //   array('stair_element' => 'benthandrail', 'elem_meter' => '5.5'),
  //   array('stair_element' => 'falsebridgeboard', 'elem_length' => '1500', 'elem_width' => '300', 'elem_height' => '20', 'elem_quantity' => '1'),
  //   array('stair_element' => 'falsebridgeboard', 'elem_length' => '1100', 'elem_width' => '300', 'elem_height' => '20', 'elem_quantity' => '1'),
  //   array('stair_element' => 'falsebridgeboard', 'elem_length' => '650', 'elem_width' => '340', 'elem_height' => '20', 'elem_quantity' => '1'),
  //   array('stair_element' => 'falsebridgeboard', 'elem_length' => '1000', 'elem_width' => '200', 'elem_height' => '20', 'elem_quantity' => '1'),
  //   array('stair_element' => 'jackboard', 'elem_length' => '1200', 'elem_width' => '300', 'elem_height' => '20', 'elem_quantity' => '3'),
  //   array('stair_element' => 'jackboard', 'elem_length' => '800', 'elem_width' => '200', 'elem_height' => '20', 'elem_quantity' => '3'),
  //   array('stair_element' => 'jackboard', 'elem_length' => '800', 'elem_width' => '400', 'elem_height' => '20', 'elem_quantity' => '1'),
  //   array('stair_element' => 'jackboard', 'elem_length' => '500', 'elem_width' => '200', 'elem_height' => '20', 'elem_quantity' => '1'),
  //   array('stair_element' => 'balusterbottomroad', 'elem_meter' => '0.5'),
  //   array('stair_element' => 'stairtrim', 'elem_meter' => '20')
  // ];

  // var_dump($stair_array);
  // exit;
  // $obj = StairRegistry\Registry::getInstance(array('stair_element' => 'stairtrim', 'elem_meter' => '20'));
  // var_dump($obj);
  // exit;

  // Создание объекта лестницы из заданного материала
  $stair = new Stair\Stair (StairMaterial\PineMaterial::getInstance(specifyMaterial('pine')));
  // $total = 0;
//   echo $jackboard_1200x300->getShortElementName();
//   echo '<br>';
// var_dump ($jackboard_1200x300->getTotalAmount());
// echo '<br>';
// var_dump ($material->getPrice($jackboard_1200x300->getShortElementName()));
// echo '<br>';
//   exit;
  // foreach ($stair_array as $element) {
  //   $stair->addStairElement(StairRegistry\Registry::getInstance($element));
  // }
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