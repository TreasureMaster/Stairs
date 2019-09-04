<?php

namespace StairElement\SquareElement;

/* -------------------------------------------------------------------------- */
/*                   Непосредственные элементы (по площади)                   */
/* -------------------------------------------------------------------------- */

/* ------------------------------- Фальшкосоур ------------------------------ */

class PseudoBridgeBoard extends \StairElement\SquareElement
{
  public function getElementText()
  {
    return "Фальшкосоур {$this->getPostfixName()} - {$this->quantity} шт.";
  }
}
?>