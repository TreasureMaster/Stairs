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
?>