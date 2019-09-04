<?php

namespace StairElement\SquareElement;

/* -------------------------------------------------------------------------- */
/*                   Непосредственные элементы (по площади)                   */
/* -------------------------------------------------------------------------- */

/* ----------------------- Длинная ступень (свыше 1м) ----------------------- */

class LongLevel extends \StairElement\SquareElement
{
  public function getElementText()
  {
    return "Ступень длинная {$this->getPostfixName()} - {$this->quantity} шт.";
  }
}

?>