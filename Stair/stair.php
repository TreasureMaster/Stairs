<?php
namespace Stair;

// use StairMaterial;

/* -------------------------------------------------------------------------- */
/*                        Создание экземпляра лестницы                        */
/* -------------------------------------------------------------------------- */

class Stair
{
  // массив объектов - элементов лестницы
  private $elements = [];
  // материал лестницы
  private $material;
  // общая цена материалов и изготовления лестницы
  private $total_elements_price = 0;

  public function __construct(\StairMaterial\StairMaterial $material)
  {
    $this->material = $material;
  }

/* --------------------- добавление элемента в лестницу --------------------- */

  public function addStairElement(\StairElement\StairElement $element)
  {
    $this->elements[$element->getFullElementName()] = $element;
  }

/* ---------------- получить общую цену для данного элемента ---------------- */

  private function getTotalElementPrice($key)
  {
    return $this->elements[$key]->getTotalAmount() * $this->material->getPrice($this->elements[$key]->getShortElementName());
  }

/* -------------------- получить общую цену для лестницы -------------------- */

  public function getTotalStairPrice()
  {
    $this->total_elements_price = 0;
    foreach ($this->elements as $name =>$element) {
      $this->total_elements_price += $this->getTotalElementPrice($element->getFullElementName());
    }
    return $this->total_elements_price;
  }

/* ---- получение наименований ключей (в нормальной версии можно убрать) ---- */

  public function getNames()
  {
    foreach ($this->elements as $name => $element) {
      echo "Имя элемента: $name<br>";
    }
  }
}
?>