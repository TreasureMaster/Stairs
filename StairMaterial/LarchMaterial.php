<?php

namespace StairMaterial;

/* -------------------------------------------------------------------------- */
/*                             Конкретные материалы                           */
/* -------------------------------------------------------------------------- */

/* ------------------------- Материал - Лиственница ------------------------- */

class LarchMaterial extends StairMaterial
{
  public static function getInstance($price)
  {
    if (empty(self::$instance)) {
      self::$instance = new LarchMaterial($price);
    }
    return self::$instance;
  }
}
?>