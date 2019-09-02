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
        // $regname = substr($opts['stair_element'], 0, strrpos($opts['stair_element'], '_'));
        $regname = $opts['stair_element'];
        if ($regname == 'shortlevel' || $regname == 'longlevel') { $regname = 'level';}
        switch ($regname) {
          case "level":
              if ($opts["length"]["sq"] > 1000) {
                $product = new \StairElement\SquareElement\LongLevel($opts['length']['sq'], $opts['width']['sq'], $opts['height']['sq'], $opts['quantity']['sq']);
                break;
              } else {
                $product = new \StairElement\SquareElement\ShortLevel($opts['length']['sq'], $opts['width']['sq'], $opts['height']['sq'], $opts['quantity']['sq']);
                break;
              }
          case "stairlanding":
              $product = new \StairElement\SquareElement\StairLanding($opts['length']['sq'], $opts['width']['sq'], $opts['height']['sq'], $opts['quantity']['sq']);
              break;
          case "stairriser":
              $product = new \StairElement\SquareElement\StairRiser($opts['length']['sq'], $opts['width']['sq'], $opts['height']['sq'], $opts['quantity']['sq']);
              break;
          case "figuredlevel":
              $product = new \StairElement\SquareElement\FiguredLevel($opts['length']['sq'], $opts['width']['sq'], $opts['height']['sq'], $opts['quantity']['sq']);
              break;
          case "bridgeboard":
              $product = new \StairElement\SquareElement\BridgeBoard($opts['length']['sq'], $opts['width']['sq'], $opts['height']['sq'], $opts['quantity']['sq']);
              break;
          case "jackboard":
              $product = new \StairElement\SquareElement\JackBoard($opts['length']['sq'], $opts['width']['sq'], $opts['height']['sq'], $opts['quantity']['sq']);
              break;
          case "stairbaseboard":
              $product = new \StairElement\SquareElement\StairBaseboard($opts['length']['sq'], $opts['width']['sq'], $opts['height']['sq'], $opts['quantity']['sq']);
              break;
          case "pseudobridgeboard":
              $product = new \StairElement\SquareElement\PseudoBridgeBoard($opts['length']['sq'], $opts['width']['sq'], $opts['height']['sq'], $opts['quantity']['sq']);
              break;
          case "baluster":
              $product = new \StairElement\PieceElement\Baluster($opts['quantity']['pcs']);
              break;
          case "balustradecolumn":
              $product = new \StairElement\PieceElement\BalustradeColumn($opts['quantity']['pcs']);
              break;
          case "rodcolumn":
              $product = new \StairElement\LinearMeterElement\RodColumn($opts['length']['ln']);
              break;
          case "handrail":
              $product = new \StairElement\LinearMeterElement\Handrail($opts['length']['ln']);
              break;
          case "stairtrim":
              $product = new \StairElement\LinearMeterElement\StairTrim($opts['length']['ln']);
              break;
          case "balusterbottomboard":
              $product = new \StairElement\LinearMeterElement\BalusterBottomBoard($opts['length']['ln']);
              break;
          case "customboard":
              $product = new \StairElement\LinearMeterElement\CustomBoard($opts['length']['ln']);
              break;
          case "benthandrail":
              $product = new \StairElement\LinearMeterElement\BentHandrail($opts['length']['ln']);
              break;
          default:
              $product = false;
        }

        return $product;
      }
  }

?>