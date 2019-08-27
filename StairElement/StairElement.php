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

?>