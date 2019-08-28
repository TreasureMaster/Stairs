<?php

namespace StairMaterial;

/* -------------------------------------------------------------------------- */
/*                             Конкретные материалы                           */
/* -------------------------------------------------------------------------- */

/* ---------------------------- Материал - Ясень ---------------------------- */

class AshMaterial extends StairMaterial
{
  public static function getInstance($price)
  {
    if (empty(self::$instance)) {
      self::$instance = new AshMaterial($price);
    }
    return self::$instance;
  }
}
?>