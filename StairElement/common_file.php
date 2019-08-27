<?php
namespace StairElement;
/* ---------------------- Абстрактный элемент лестницы ---------------------- */

abstract class StairElement
{
  // название элемента, по которому ищется цена в прайсе
  // private $element_name;
  // Функция, общая для всех элементов. Выдает общую сущность для расчета (общая площадь, общее кол-во, общий погонаж)
  abstract public function getTotalAmount();

  // возвращаем имя класса, к которому принадлежит объект
  public function getShortElementName()
  {
    // return strtolower(get_class($this));
    return strtolower((new \ReflectionClass($this))->getShortName());
  }
  // возвращаем полное имя объекта (это будет ключ для массива элементов лестницы)
  abstract function getFullElementName();
  // возвращаем текст для HTML-страницы
  abstract public function getElementText();

  // возвращаем HTML-код кнопки
  public function getHtmlButton()
  {
    $button = '<button id="' . $this->getFullElementName() . '"class="button-option" type="button"><span>--</span></button><span>  ';
    $button .= $this->getElementText() . '</span><br>';
    return $button;
  }
}

/* -------------------------------------------------------------------------- */
/*            Абстрактные элементы лестницы (по единицам измерения)           */
/* -------------------------------------------------------------------------- */
/* -------------------------------------------------------------------------- */

/* ---------------- Абстрактный элемент лестницы (по площади) --------------- */
abstract class SquareElement extends StairElement
{
  // длина элемента
  protected $length;
  // ширина элемента
  protected $width;
  // площадь элемента
  // private $square;
  // ??? толщина элемента (пока неизвестно нужна ли)
  private $height;
  // количество элементов (по умолчанию 0)
  protected $quantity;
  // цена одного элемента (возможно ссылка на объект прайса)
  // private $price;

  public function __construct($length, $width, $height, $quantity = 0)
  {
    $this->length = $length;
    $this->width = $width;
    $this->height = $height;
    $this->quantity = $quantity;
    // $this->square = $this->getSquare();
  }

  // площадь одного элемента (для обычных прямоугольников или приведенных к ним фигур)
  private function getSquare()
  {
    return ($this->length / 1000) * ($this->width / 1000);
  }
  // общая площадь всех элементов (для обычных прямоугольников или приведенных к ним фигур)
  public function getTotalAmount()
  {
    return $this->quantity * $this->getSquare();
  }
  // Полное имя для использования как ключ массива
  public function getFullElementName()
  {
    return $this->getShortElementName() . '_' . $this->length . 'x' . $this->width;
  }
}
/* -------------------------------------------------------------------------- */

/* ---------------- Абстрактный элемент лестницы (по штукам) ---------------- */
abstract class PieceElement extends StairElement
{
  // количество элементов (по умолчанию 0)
  protected $quantity;

  public function __construct($quantity = 0)
  {
    $this->quantity = $quantity;
  }
  // общее количество элементов
  public function getTotalAmount()
  {
    return $this->quantity;
  }
  // имя соответствует короткому имени, но возможно изменение, если будут использоваться разные элементы (балясины, столбы)
  public function getFullElementName()
  {
    return $this->getShortElementName();
  }
}

/* ------------ Абстрактный элемент лестницы (по погонным метрам) ----------- */
abstract class LinearMeterElement extends StairElement
{
  // погонная длина элемента
  protected $length;


  public function __construct($length = 0)
  {
    $this->length = $length;
  }

  // общая длина для расчетов
  public function getTotalAmount()
  {
    return $this->length;
  }
  // имя соответствует короткому имени, но возможно изменение, если будут использоваться разные элементы (раскладка, поручень)
  public function getFullElementName()
  {
    return $this->getShortElementName();
  }
}

/* -------------------------------------------------------------------------- */
/*                   Непосредственные элементы (по площади)                   */
/* -------------------------------------------------------------------------- */

/* ------------------------ Короткая ступень (до 1 м) ----------------------- */

class ShortLevel extends SquareElement
{
  public function getElementText()
  {
    return "Ступень короткая {$this->length}x{$this->width} - {$this->quantity} шт.";
  }
}

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