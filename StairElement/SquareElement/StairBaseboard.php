<?php

namespace StairElement\SquareElement;

/* -------------------------------------------------------------------------- */
/*                   Непосредственные элементы (по площади)                   */
/* -------------------------------------------------------------------------- */

/* --------------------------------- Сапожок -------------------------------- */

class StairBaseboard extends \StairElement\SquareElement
{
  public function getElementText()
  {
    return "Сапожки {$this->getPostfixName()} - {$this->quantity} шт.";
  }
}
?>