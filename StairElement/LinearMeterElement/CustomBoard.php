<?php

namespace StairElement\LinearMeterElement;

/* -------------------------------------------------------------------------- */
/*                    Непосредственные элементы (по штукам)                   */
/* -------------------------------------------------------------------------- */

/* -------------------------- Нестандартный профиль ------------------------- */

class CustomBoard extends \StairElement\LinearMeterElement
{
  public function getElementText()
  {
    return "Нестандартный профиль - {$this->length->conversionFromBase('m')} пог.м";
  }
}
?>