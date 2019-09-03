<?php
  namespace StairElement;

/* -------------------------------------------------------------------------- */
/*            Абстрактные элементы лестницы (по единицам измерения)           */
/* -------------------------------------------------------------------------- */

/* ---------------- Абстрактный элемент лестницы (по площади) --------------- */

abstract class SquareElement extends StairElement
{
  // длина элемента
  protected $length;
  // ширина элемента
  protected $width;
  // толщина элемента (пока неизвестно нужна ли)
  protected $height;
  // количество элементов (по умолчанию 0)
  protected $quantity;
  // цена одного элемента (возможно ссылка на объект прайса)
  // private $price;

  public function __construct($opts)
  {
    $this->length = $opts['length']['sq']['value'];
    $this->width = $opts['width']['sq']['value'];
    $this->height = $opts['height']['sq']['value'];
    $this->quantity = $opts['quantity']['sq'];
    $this->marked = Mark::SQUARE;
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
?>