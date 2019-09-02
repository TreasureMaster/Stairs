<?php

  namespace StairElement;

/* ---------------------- Абстрактный элемент лестницы ---------------------- */

abstract class StairElement
{
  // массив сборки свойств для JSON
  protected $props = [];
  // переменная для маркировки массива вывода свойств объекта
  protected $marked;
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
    foreach ($this as $key => $value) {
      if ($key != 'props' && $key != 'marked') {
        $this->props[$key][$this->marked] = $value;
      }
    }
    $this->props['name'] = $this->getFullElementName();
    $this->props['stair_element'] = $this->getShortElementName();
    $this->props['text'] = $this->getHtmlButton();
    return json_encode($this->props);
  }
}

?>