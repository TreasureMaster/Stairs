<?php

namespace StairElement\LinearMeterElement;

/* -------------------------------------------------------------------------- */
/*                    Непосредственные элементы (по штукам)                   */
/* -------------------------------------------------------------------------- */

/* ---------------------------- Подбалясная доска --------------------------- */

class BalusterBottomBoard extends \StairElement\LinearMeterElement
{
  public function getElementText()
  {
    return "Подбалясная доска - {$this->length->getMeter()} пог.м";
  }
}
?>