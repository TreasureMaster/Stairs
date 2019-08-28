<?php

namespace StairMaterial;

/* -------------------------------------------------------------------------- */
/*                             Конкретные материалы                           */
/* -------------------------------------------------------------------------- */

/* ----------------------------- Материал - Дуб ----------------------------- */

class OakMaterial extends StairMaterial
{
  public static function getInstance($price)
  {
    if (empty(self::$instance)) {
      self::$instance = new OakMaterial($price);
    }
    return self::$instance;
  }
}
?>