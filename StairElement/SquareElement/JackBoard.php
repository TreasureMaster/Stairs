<?php

namespace StairElement\SquareElement;

/* -------------------------------------------------------------------------- */
/*                   Непосредственные элементы (по площади)                   */
/* -------------------------------------------------------------------------- */

/* ----------------------------- Отбойная доска ----------------------------- */

class JackBoard extends \StairElement\SquareElement
{
  public function getElementText()
  {
    return "Отбойная доска {$this->length}x{$this->width} - {$this->quantity} шт.";
  }
}
?>