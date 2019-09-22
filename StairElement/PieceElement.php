<?php
  namespace StairElement;
/* -------------------------------------------------------------------------- */
/*            Абстрактные элементы лестницы (по единицам измерения)           */
/* -------------------------------------------------------------------------- */

/* ---------------- Абстрактный элемент лестницы (по штукам) ---------------- */

abstract class PieceElement extends StairElement
{
  // количество элементов (по умолчанию 0)
  protected $quantity;

  public function __construct($opts)
  {
    $this->quantity = $opts['quantity'];
    $this->material = $opts['material'];
    $this->marked = Mark::PIECES;
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

?>