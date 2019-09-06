<?php
  namespace Dimension;

  class Dimension
  {
    // массив констант для замены текста (можно вывести в отдельный класс и подключить в зависимости от принятой базы)
    const METER_BASE = [
      'm' => '0',
      'dm' => '1',
      'cm' => '2',
      'mm' => '3'
    ];
    // базовое значение в м (основная величина в СИ)
    private $base_value;
    // единица измерения, заданная при вводе данных (получаем из JS)
    private $current_measure;

    public function __construct($dim)
    {
      $this->current_measure = $dim['measure'];
      $this->base_value = $this->conversionToBase($dim['value']);
    }

    // конвертирует полученное число в базовую величину в зависимости от единицы измерения этого числа (сохраненной в объекте)
    private function conversionToBase($value)
    {
      return $value * pow(10, -strtr($this->current_measure, self::METER_BASE));
    }

    // конвертирует базовое число в заданную аргументом размерность
    public function conversionFromBase($dim)
    {
      return $this->base_value * pow(10, strtr($dim, self::METER_BASE));
    }
    // приведение к базовой размерности (мм) при создании объекта
    // private function conversionToBase($value)
    // {
    //   switch ($this->current_measure) {
    //     case 'm' : return $value * 1000;
    //     case 'cm': return $value * 10;
    //     case 'mm': default: return $value;
    //   }
    // }

    // приведение к размерности (м) для вычислений
    public function getMeter()
    {
      return $this->base_value / 1000;
    }

    // получение размера для вставки в имя объекта (базовое значение - в мм)
    public function getBaseValue()
    {
      return $this->base_value;
    }
    // Возврат названия текущей размерности (заданной пользователем)
    public function getMeasure()
    {
      return $this->current_measure;
    }
  }
?>