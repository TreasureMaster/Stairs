<?php

namespace StairRegistry;

use StairElement;

require_once('StairElement/common_file.php');

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
                $product = new StairElement\LongLevel($opts['elem_length'], $opts['elem_width'], $opts['elem_height'], $opts['elem_quantity']);
                break;
              } else {
                $product = new StairElement\ShortLevel($opts['elem_length'], $opts['elem_width'], $opts['elem_height'], $opts['elem_quantity']);
                break;
              }
          case "landing":
              $product = new StairElement\StairLanding($opts['elem_length'], $opts['elem_width'], $opts['elem_height'], $opts['elem_quantity']);
              break;
          case "riser":
              $product = new StairElement\StairRiser($opts['elem_length'], $opts['elem_width'], $opts['elem_height'], $opts['elem_quantity']);
              break;
          case "figuredlevel":
              $product = new StairElement\FiguredLevel($opts['elem_length'], $opts['elem_width'], $opts['elem_height'], $opts['elem_quantity']);
              break;
          case "bridgeboard":
              $product = new StairElement\BridgeBoard($opts['elem_length'], $opts['elem_width'], $opts['elem_height'], $opts['elem_quantity']);
              break;
          case "jackboard":
              $product = new StairElement\JackBoard($opts['elem_length'], $opts['elem_width'], $opts['elem_height'], $opts['elem_quantity']);
              break;
          case "stairbaseboard":
              $product = new StairElement\StairBaseboard($opts['elem_length'], $opts['elem_width'], $opts['elem_height'], $opts['elem_quantity']);
              break;
          case "falsebridgeboard":
              $product = new StairElement\PseudoBridgeBoard($opts['elem_length'], $opts['elem_width'], $opts['elem_height'], $opts['elem_quantity']);
              break;
          case "baluster":
              $product = new StairElement\Baluster($opts['elem_pcs']);
              break;
          case "balustradecolumn":
              $product = new StairElement\BalustradeColumn($opts['elem_pcs']);
              break;
          case "rodcolumn":
              $product = new StairElement\RodColumn($opts['elem_meter']);
              break;
          case "handrail":
              $product = new StairElement\Handrail($opts['elem_meter']);
              break;
          case "stairtrim":
              $product = new StairElement\StairTrim($opts['elem_meter']);
              break;
          case "balusterbottomboard":
              $product = new StairElement\BalusterBottomBoard($opts['elem_meter']);
              break;
          case "customboard":
              $product = new StairElement\CustomBoard($opts['elem_meter']);
              break;
          case "benthandrail":
              $product = new StairElement\BentHandrail($opts['elem_meter']);
              break;
          default:
              $product = false;
        }

        return $product;
      }
  }

?>