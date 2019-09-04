<?php

namespace StairElement\LinearMeterElement;

/* -------------------------------------------------------------------------- */
/*                    Непосредственные элементы (по штукам)                   */
/* -------------------------------------------------------------------------- */

/* -------------------------------- Поручень -------------------------------- */

class Handrail extends \StairElement\LinearMeterElement
{
  public function getElementText()
  {
    return "Поручень - {$this->length->getMeter()} пог.м";
  }
}
?>