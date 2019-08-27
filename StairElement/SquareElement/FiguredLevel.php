<?php

namespace StairElement\SquareElement;

/* -------------------------------------------------------------------------- */
/*                   Непосредственные элементы (по площади)                   */
/* -------------------------------------------------------------------------- */

/* ---------------------------- Фигурная ступень ---------------------------- */

class FiguredLevel extends \StairElement\SquareElement
{
  public function getElementText()
  {
    return "Ступень фигурная {$this->length}x{$this->width} - {$this->quantity} шт.";
  }
}
?>