<?php

namespace StairRegistry;

// use StairElement;

/* -------------------------------------------------------------------------- */
/*                       Регистрация элементов лестницы                       */
/* -------------------------------------------------------------------------- */

/* ------------------------ Регистрация из HTML-формы ----------------------- */
// методу getInstance кидаем массив и он сам возвращает объект элемента, в зависимости от его имени
class StairElementRegistry
  {
    
    /* ------------------- Фабрика объектов-элементов лестницы ------------------ */
    // Создает объект элемента лестницы из полученного ассоциативного массива
    // Из массива извлекаются название элемента и его параметры (размеры, количество, погонная длина)
    public static function getInstance($opts)
      {
        //   Извлечение названия элемента и очистка его от номера категории
        $regname = $opts['stair_element'];
        if ($regname == 'shortlevel' || $regname == 'longlevel') { $regname = 'level';}
        switch ($regname) {
            // создание элементов square
          case "level":
              if ($opts["length"]['value'] > 1000) {
                $product = new \StairElement\SquareElement\LongLevel($opts);
                break;
              } else {
                $product = new \StairElement\SquareElement\ShortLevel($opts);
                break;
              }
          case "stairlanding":
              $product = new \StairElement\SquareElement\StairLanding($opts);
              break;
          case "stairriser":
              $product = new \StairElement\SquareElement\StairRiser($opts);
              break;
          case "figuredlevel":
              $product = new \StairElement\SquareElement\FiguredLevel($opts);
              break;
          case "bridgeboard":
              $product = new \StairElement\SquareElement\BridgeBoard($opts);
              break;
          case "jackboard":
              $product = new \StairElement\SquareElement\JackBoard($opts);
              break;
          case "stairbaseboard":
              $product = new \StairElement\SquareElement\StairBaseboard($opts);
              break;
          case "pseudobridgeboard":
              $product = new \StairElement\SquareElement\PseudoBridgeBoard($opts);
              break;
            // создание элементов pieces
          case "baluster":
              $product = new \StairElement\PieceElement\Baluster($opts);
              break;
          case "balustradecolumn":
              $product = new \StairElement\PieceElement\BalustradeColumn($opts);
              break;
            // создание элементов linear
          case "rodcolumn":
              $product = new \StairElement\LinearMeterElement\RodColumn($opts);
              break;
          case "handrail":
              $product = new \StairElement\LinearMeterElement\Handrail($opts);
              break;
          case "stairtrim":
              $product = new \StairElement\LinearMeterElement\StairTrim($opts);
              break;
          case "balusterbottomboard":
              $product = new \StairElement\LinearMeterElement\BalusterBottomBoard($opts);
              break;
          case "customboard":
              $product = new \StairElement\LinearMeterElement\CustomBoard($opts);
              break;
          case "benthandrail":
              $product = new \StairElement\LinearMeterElement\BentHandrail($opts);
              break;
          default:
              $product = false;
        }

        return $product;
      }
  }

?>