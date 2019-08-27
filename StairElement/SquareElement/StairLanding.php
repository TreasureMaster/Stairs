<?php

namespace StairElement\SquareElement;

/* -------------------------------------------------------------------------- */
/*                   Непосредственные элементы (по площади)                   */
/* -------------------------------------------------------------------------- */

/* -------------------------------- Площадка -------------------------------- */

class StairLanding extends \StairElement\SquareElement
{
  public function getElementText()
  {
    return "Площадка {$this->length}x{$this->width} - {$this->quantity} шт.";
  }
}
?>