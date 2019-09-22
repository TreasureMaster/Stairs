<?php
  namespace StairElement;

/* -------------------------------------------------------------------------- */
/*            Абстрактные элементы лестницы (по единицам измерения)           */
/* -------------------------------------------------------------------------- */

/* ---------------- Абстрактный элемент лестницы (по площади) --------------- */

abstract class SquareElement extends StairElement
{
  // Объект длины элемента
  protected $length;
  // Объект ширины элемента
  protected $width;
  // Объект толщины элемента (пока неизвестно нужна ли)
  protected $height;
  // количество элементов (по умолчанию 0)
  protected $quantity;
  // цена одного элемента (возможно ссылка на объект прайса)
  // private $price;

  public function __construct($opts)
  {
    $this->length = new \Dimension\Dimension ($opts['sqr']['length']);
    $this->width = new \Dimension\Dimension($opts['sqr']['width']);
    $this->height = new \Dimension\Dimension($opts['sqr']['height']);
    $this->quantity = $opts['sqr']['quantity'];
    $this->material = $opts['material'];
    $this->marked = Mark::SQUARE;
    // $this->square = $this->getSquare();
  }

  // площадь одного элемента (для обычных прямоугольников или приведенных к ним фигур) в кв.м.
  private function getSquare()
  {
    return $this->length->conversionFromBase('m') * $this->width->conversionFromBase('m');
  }
  // общая площадь всех элементов (для обычных прямоугольников или приведенных к ним фигур)
  public function getTotalAmount()
  {
    return $this->quantity * $this->getSquare();
  }
  // Постфикс имени для SQUARE элемента (для названия - в мм)
  protected function getPostfixName()
  {
    return $this->length->conversionFromBase('mm') . 'x' . $this->width->conversionFromBase('mm');
  }
  // Полное имя для использования как ключ массива
  public function getFullElementName()
  {
    return $this->getShortElementName() . '_' . $this->getPostfixName();
  }
}
  /* -------------------------------------------------------------------------- */
?>