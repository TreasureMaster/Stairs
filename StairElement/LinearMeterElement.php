<?php
  namespace StairElement;

/* -------------------------------------------------------------------------- */
/*            Абстрактные элементы лестницы (по единицам измерения)           */
/* -------------------------------------------------------------------------- */

/* ------------ Абстрактный элемент лестницы (по погонным метрам) ----------- */

abstract class LinearMeterElement extends StairElement
{
  // Объект длины элемента
  protected $length;
  // количество одинаковых элементов
  protected $quantity;

  public function __construct($opts)
  {
    $this->length = new \Dimension\Dimension($opts['length']);
    $this->quantity = $opts['quantity'];
    $this->material = $opts['material'];
    $this->marked = Mark::LINEAR;
  }

  // общая длина для расчетов
  public function getTotalAmount()
  {
    return $this->length->conversionFromBase('m');
  }
  // имя соответствует короткому имени, но возможно изменение, если будут использоваться разные элементы (раскладка, поручень)
  // для названия - в мм
  public function getFullElementName()
  {
    return $this->getShortElementName() . '_' . $this->length->conversionFromBase('mm');
  }
}
?>