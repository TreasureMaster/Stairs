<?php

namespace StairElement\SquareElement;

/* -------------------------------------------------------------------------- */
/*                   Непосредственные элементы (по площади)                   */
/* -------------------------------------------------------------------------- */

/* ------------------------------- Подступенок ------------------------------ */

class StairRiser extends \StairElement\SquareElement
{
  public function getElementText()
  {
    return "Подступенок {$this->length}x{$this->width} - {$this->quantity} шт.";
  }
}
?>