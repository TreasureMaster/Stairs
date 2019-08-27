<?php

namespace StairElement\PieceElement;

/* -------------------------------------------------------------------------- */
/*                    Непосредственные элементы (по штукам)                   */
/* -------------------------------------------------------------------------- */

/* --------------------------- Балюстрадный столб --------------------------- */

class BalustradeColumn extends \StairElement\PieceElement
{
  public function getElementText()
  {
    return "Столб заходной - {$this->quantity} шт.";
  }
}
?>