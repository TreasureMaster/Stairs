<?php
  namespace StairElement;

/* -------------------------------------------------------------------------- */
/*            Абстрактные элементы лестницы (по единицам измерения)           */
/* -------------------------------------------------------------------------- */

/* ------------ Абстрактный элемент лестницы (по погонным метрам) ----------- */

abstract class LinearMeterElement extends StairElement
{
  // погонная длина элемента
  protected $length;


  public function __construct($length = 0)
  {
    $this->length = $length['value'];
    $this->marked = Mark::LINEAR;
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
?>