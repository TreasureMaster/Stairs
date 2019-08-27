<?php

namespace StairElement\SquareElement;

/* -------------------------------------------------------------------------- */
/*                   Непосредственные элементы (по площади)                   */
/* -------------------------------------------------------------------------- */

/* ------------------------------ Косоур/тетива ----------------------------- */

class BridgeBoard extends \StairElement\SquareElement
{
  // NotchBoard - вырезанная подходит для косоура, но поскольку описываются и тетивы, то BridgeBoard
  public function getElementText()
  {
    return "Косоур/тетива {$this->length}x{$this->width} - {$this->quantity} шт.";
  }
}
?>