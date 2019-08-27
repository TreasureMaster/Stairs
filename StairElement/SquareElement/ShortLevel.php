<?php
  namespace StairElement\SquareElement;

/* -------------------------------------------------------------------------- */
/*                   Непосредственные элементы (по площади)                   */
/* -------------------------------------------------------------------------- */

/* ------------------------ Короткая ступень (до 1 м) ----------------------- */

class ShortLevel extends \StairElement\SquareElement
{
  public function getElementText()
  {
    return "Ступень короткая {$this->length}x{$this->width} - {$this->quantity} шт.";
  }
}
?>