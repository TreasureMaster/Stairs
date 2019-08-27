<?php
  namespace Test;

  use StairElement, StairMaterial, Stair;

  require_once('StairElement/common_file.php');
  require_once('StairElement/list_name.php');
  require_once('StairMaterial/common_material.php');
  require_once('Stair/stair.php');

  // создаем лестницу, включающую элементы (длина, ширина, толщина, количество)
  $stair_array = [
    $level_1000x300 = new StairElement\ShortLevel(1000, 300, 40, 7),
    $stair_riser_1000_200 = new StairElement\StairRiser(1000, 200, 20, 9),
    $baluster_num = new StairElement\Baluster(16),
    $balustrade_column_num = new StairElement\BalustradeColumn(4),
    $handrail = new StairElement\BentHandrail(5.5),
    $false_bridgeboard_1500x300 = new StairElement\PseudoBridgeBoard(1500, 300, 20, 1),
    $false_bridgeboard_1100x300 = new StairElement\PseudoBridgeBoard(1100, 300, 20, 1),
    $false_bridgeboard_650x340 = new StairElement\PseudoBridgeBoard(650, 340, 20, 1),
    $false_bridgeboard_1000x200 = new StairElement\PseudoBridgeBoard(1000, 200, 20, 1),
    $jackboard_1200x300 = new StairElement\JackBoard(1200, 300, 20, 3),
    $jackboard_800x200 = new StairElement\JackBoard(800, 200, 20, 3),
    $jackboard_800x400 = new StairElement\JackBoard(800, 400, 20, 1),
    $jackboard_500x200 = new StairElement\JackBoard(500, 200, 20, 1),
    $baluster_bottomboard = new StairElement\BalusterBottomBoard(0.5),
    $stair_trim = new StairElement\StairTrim(20)
  ];

  // var_dump($stair_array);
  // exit;
  $stair = new Stair\Stair (StairMaterial\PineMaterial::getInstance($pine_price));
  // $total = 0;
//   echo $jackboard_1200x300->getShortElementName();
//   echo '<br>';
// var_dump ($jackboard_1200x300->getTotalAmount());
// echo '<br>';
// var_dump ($material->getPrice($jackboard_1200x300->getShortElementName()));
// echo '<br>';
//   exit;
  foreach ($stair_array as $element) {
    $stair->addStairElement($element);
  }

  $stair->getNames();
  echo "<h3>Цены элементов</h3>";
  $total = $stair->getTotalStairPrice();
  echo "Общая цена материалов лестницы составляет $total<br>";
?>