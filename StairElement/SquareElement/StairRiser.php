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
    return "Подступенок {$this->getPostfixName()} - {$this->quantity} шт.";
  }
}
?>