<?php

namespace StairMaterial;

/* -------------------------------------------------------------------------- */
/*                             Конкретные материалы                           */
/* -------------------------------------------------------------------------- */

/* ---------------------------- Материал - Сосна ---------------------------- */

class PineMaterial extends StairMaterial
{
  public static function getInstance($price)
  {
    if (empty(self::$instance)) {
      self::$instance = new PineMaterial($price);
    }
    return self::$instance;
  }
}
?>