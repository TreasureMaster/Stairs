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
    return "Ступень фигурная {$this->getPostfixName()} - {$this->quantity} шт.";
  }
}
?>