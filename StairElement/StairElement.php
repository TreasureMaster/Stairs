<?php

  namespace StairElement;

/* ---------------------- Абстрактный элемент лестницы ---------------------- */

abstract class StairElement
{
  // массив сборки свойств для JSON
  protected $props = [];
  // переменная для маркировки массива вывода свойств объекта
  protected $marked;
  // материал элемента
  protected $material;
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
    // $button = '<button id="' . $this->getFullElementName() . '" class="button-option" type="button"><span>--</span></button><span>  ';
    // $button .= $this->getElementText() . '</span><br>';
    $button = "<p id='" . $this->getFullElementName() . "'><input type='radio' name='base_elem'> {$this->getElementText()}</p>";
    return $button;
  }

  // возвращает представление свойств объекта в виде JSON-строки
  public function getJsonProperties()
  {
    foreach ($this as $key => $value) {
      if ($key != 'props' && $key != 'marked') {
        // if ($key == 'length' || $key == 'width' || $key == 'height') {
        if (is_object($value)) {
          // раньше передавали базовую величину, теперь - введенную пользователем
          $this->props[$key]['value'] = $value->conversionFromBase($value->getMeasure());
          $this->props[$key]['measure'] = $value->getMeasure();
        } else {
        $this->props[$key] = $value;
        }
      }
    }
    $this->props['name'] = $this->getFullElementName();
    $this->props['stair_element'] = $this->getShortElementName();
    $this->props['text'] = $this->getHtmlButton();
    return json_encode($this->props);
  }
}

?>