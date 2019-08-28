<?php

namespace StairElement\LinearMeterElement;

/* -------------------------------------------------------------------------- */
/*                    Непосредственные элементы (по штукам)                   */
/* -------------------------------------------------------------------------- */

/* ----------------------------- Гнутый поручень ---------------------------- */

class BentHandrail extends \StairElement\LinearMeterElement
{
  public function getElementText()
  {
    return "Поручень гнутый - {$this->length} пог.м";
  }
}
?>