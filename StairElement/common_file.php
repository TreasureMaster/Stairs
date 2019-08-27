<?php
namespace StairElement;

/* -------------------------------------------------------------------------- */
/*                    Непосредственные элементы (по штукам)                   */
/* -------------------------------------------------------------------------- */

/* -------------------------------- Балясина -------------------------------- */

class Baluster extends PieceElement
{
  public function getElementText()
  {
    return "Балясина - {$this->quantity} шт.";
  }
}

/* --------------------------- Балюстрадный столб --------------------------- */

class BalustradeColumn extends PieceElement
{
  public function getElementText()
  {
    return "Столб заходной - {$this->quantity} шт.";
  }
}

/* -------------------------------------------------------------------------- */
/*               Непосредственные элементы (по погонным метрам)               */
/* -------------------------------------------------------------------------- */

/* ------------------------------ Опорный столб ----------------------------- */

class RodColumn extends LinearMeterElement
{
  public function getElementText()
  {
    return "Столб опорный - {$this->length} пог.м";
  }
}

/* -------------------------------- Поручень -------------------------------- */

class Handrail extends LinearMeterElement
{
  public function getElementText()
  {
    return "Поручень - {$this->length} пог.м";
  }
}

/* -------------------------------- Раскладка ------------------------------- */

class StairTrim extends LinearMeterElement
{
  public function getElementText()
  {
    return "Раскладка - {$this->length} пог.м";
  }
}

/* ---------------------------- Подбалясная доска --------------------------- */

class BalusterBottomBoard extends LinearMeterElement
{
  public function getElementText()
  {
    return "Подбалясная доска - {$this->length} пог.м";
  }
}

/* -------------------------- Нестандартный профиль ------------------------- */

class CustomBoard extends LinearMeterElement
{
  public function getElementText()
  {
    return "Нестандартный профиль - {$this->length} пог.м";
  }
}

/* ----------------------------- Гнутый поручень ---------------------------- */

class BentHandrail extends linearMeterElement
{
  public function getElementText()
  {
    return "Поручень гнутый - {$this->length} пог.м";
  }
}

// тест
// $elm = new Handrail(5);
// echo "Имя элемента: {$elm->getElementName()}<br>";
// echo "Общий объем элемента: {$elm->getTotalAmount()}<br>";
?>