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
    $button = '<button id="' . $this->getFullElementName() . '" class="button-option" type="button"><span>--</span></button><span>  ';
    $button .= $this->getElementText() . '</span><br>';
    return $button;
  }

  // возвращаем JSON представление массива свойств объекта для отправки в js
  // abstract public function getJsonProperties();

  // возвращает представление свойств объекта в виде JSON-строки
  public function getJsonProperties()
  {
    $props = [];
    foreach ($this as $key => $value) {
      $props[$key] = $value;
    }
    // $json[$this->getFullElementName()] = $props;
    $props['name'] = $this->getFullElementName();
    $props['stair_element'] = $this->getShortElementName();
    $props['text'] = $this->getHtmlButton();
    return json_encode($props);
  }
}

?>