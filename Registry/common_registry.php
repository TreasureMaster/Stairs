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
        $regname = substr($opts['stair_element'], 0, strrpos($opts['stair_element'], '_'));
        switch ($regname) {
          case "level":
              if ($opts["elem_length"] > 1000) {
                $product = new \StairElement\SquareElement\LongLevel($opts['elem_length'], $opts['elem_width'], $opts['elem_height'], $opts['elem_quantity']);
                break;
              } else {
                $product = new \StairElement\SquareElement\ShortLevel($opts['elem_length'], $opts['elem_width'], $opts['elem_height'], $opts['elem_quantity']);
                break;
              }
          case "landing":
              $product = new \StairElement\SquareElement\StairLanding($opts['elem_length'], $opts['elem_width'], $opts['elem_height'], $opts['elem_quantity']);
              break;
          case "riser":
              $product = new \StairElement\SquareElement\StairRiser($opts['elem_length'], $opts['elem_width'], $opts['elem_height'], $opts['elem_quantity']);
              break;
          case "figuredlevel":
              $product = new \StairElement\SquareElement\FiguredLevel($opts['elem_length'], $opts['elem_width'], $opts['elem_height'], $opts['elem_quantity']);
              break;
          case "bridgeboard":
              $product = new \StairElement\SquareElement\BridgeBoard($opts['elem_length'], $opts['elem_width'], $opts['elem_height'], $opts['elem_quantity']);
              break;
          case "jackboard":
              $product = new \StairElement\SquareElement\JackBoard($opts['elem_length'], $opts['elem_width'], $opts['elem_height'], $opts['elem_quantity']);
              break;
          case "stairbaseboard":
              $product = new \StairElement\SquareElement\StairBaseboard($opts['elem_length'], $opts['elem_width'], $opts['elem_height'], $opts['elem_quantity']);
              break;
          case "falsebridgeboard":
              $product = new \StairElement\SquareElement\PseudoBridgeBoard($opts['elem_length'], $opts['elem_width'], $opts['elem_height'], $opts['elem_quantity']);
              break;
          case "baluster":
              $product = new \StairElement\PieceElement\Baluster($opts['elem_pcs']);
              break;
          case "balustradecolumn":
              $product = new \StairElement\PieceElement\BalustradeColumn($opts['elem_pcs']);
              break;
          case "rodcolumn":
              $product = new \StairElement\LinearMeterElement\RodColumn($opts['elem_meter']);
              break;
          case "handrail":
              $product = new \StairElement\LinearMeterElement\Handrail($opts['elem_meter']);
              break;
          case "stairtrim":
              $product = new \StairElement\LinearMeterElement\StairTrim($opts['elem_meter']);
              break;
          case "balusterbottomboard":
              $product = new \StairElement\LinearMeterElement\BalusterBottomBoard($opts['elem_meter']);
              break;
          case "customboard":
              $product = new \StairElement\LinearMeterElement\CustomBoard($opts['elem_meter']);
              break;
          case "benthandrail":
              $product = new \StairElement\LinearMeterElement\BentHandrail($opts['elem_meter']);
              break;
          default:
              $product = false;
        }

        return $product;
      }
  }

?>