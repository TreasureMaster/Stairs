<?php

namespace StairElement\LinearMeterElement;

/* -------------------------------------------------------------------------- */
/*                    Непосредственные элементы (по штукам)                   */
/* -------------------------------------------------------------------------- */

/* ------------------------------ Опорный столб ----------------------------- */

class RodColumn extends \StairElement\LinearMeterElement
{
  public function getElementText()
  {
    return "Столб опорный - {$this->length->conversionFromBase('m')} пог.м";
  }
}
?>