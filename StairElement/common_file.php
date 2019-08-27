<?php
namespace StairElement;

/* -------------------------------------------------------------------------- */
/*                   Непосредственные элементы (по площади)                   */
/* -------------------------------------------------------------------------- */



/* ----------------------- Длинная ступень (свыше 1м) ----------------------- */

class LongLevel extends SquareElement
{
  public function getElementText()
  {
    return "Ступень длинная {$this->length}x{$this->width} - {$this->quantity} шт.";
  }
}

/* -------------------------------- Площадка -------------------------------- */

class StairLanding extends SquareElement
{
  public function getElementText()
  {
    return "Площадка {$this->length}x{$this->width} - {$this->quantity} шт.";
  }
}

/* ------------------------------- Подступенок ------------------------------ */

class StairRiser extends SquareElement
{
  public function getElementText()
  {
    return "Подступенок {$this->length}x{$this->width} - {$this->quantity} шт.";
  }
}

/* --------------------------------- Сапожок -------------------------------- */

class StairBaseboard extends SquareElement
{
  public function getElementText()
  {
    return "Сапожки {$this->length}x{$this->width} - {$this->quantity} шт.";
  }
}

/* ---------------------------- Фигурная ступень ---------------------------- */

class FiguredLevel extends SquareElement
{
  public function getElementText()
  {
    return "Ступень фигурная {$this->length}x{$this->width} - {$this->quantity} шт.";
  }
}

/* ------------------------------ Косоур/тетива ----------------------------- */

class BridgeBoard extends SquareElement
{
  // NotchBoard - вырезанная подходит для косоура, но поскольку описываются и тетивы, то BridgeBoard
  public function getElementText()
  {
    return "Косоур/тетива {$this->length}x{$this->width} - {$this->quantity} шт.";
  }
}

/* ----------------------------- Отбойная доска ----------------------------- */

class JackBoard extends SquareElement
{
  public function getElementText()
  {
    return "Отбойная доска {$this->length}x{$this->width} - {$this->quantity} шт.";
  }
}

/* ------------------------------- Фальшкосоур ------------------------------ */

class PseudoBridgeBoard extends SquareElement
{
  public function getElementText()
  {
    return "Фальшкосоур {$this->length}x{$this->width} - {$this->quantity} шт.";
  }
}

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