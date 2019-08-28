<?php

namespace StairElement\LinearMeterElement;

/* -------------------------------------------------------------------------- */
/*                    Непосредственные элементы (по штукам)                   */
/* -------------------------------------------------------------------------- */

/* -------------------------------- Раскладка ------------------------------- */

class StairTrim extends \StairElement\LinearMeterElement
{
  public function getElementText()
  {
    return "Раскладка - {$this->length} пог.м";
  }
}
?>