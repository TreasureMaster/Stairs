<?php
namespace StairMaterial;
/* ------------------------ Временное получение прайса ---------------------- */
require_once('first_price.php');
/* -------------------------------------------------------------------------- */


/* -------------------------------------------------------------------------- */
/*                            Абстрактный материал                            */
/* -------------------------------------------------------------------------- */
abstract class StairMaterial
{
  // объект Singleton
  protected static $instance;

  // пустой прайс по всем элементам лестницы
  private $price = [
    'shortlevel'          => null,   // короткая ступень (до 1м)
    'longlevel'           => null,   // длинная ступень (свыше 1м)
    'stairlanding'        => null,   // площадка
    'stairriser'          => null,   // подступенок
    'stairbaseboard'      => null,   // сапожок
    'figeredlevel'        => null,   // фигурная ступень
    'bridgeboard'         => null,   // косоур/тетива
    'jackboard'           => null,   // отбойная доска
    'pseudobridgeboard'   => null,   // фальшкосоур
    'baluster'            => null,   // балясина
    'balustradecolumn'    => null,   // балюстрадный столб
    'rodcolumn'           => null,   // опорный столб
    'handrail'            => null,   // поручень
    'stairtrim'           => null,   // раскладка
    'balusterbottomboard' => null,   // подбалясная доска
    'customboard'         => null,   // нестандартный профиль
    'benthandrail'        => null    // гнутый поручень
  ];

  protected function __construct($price)
  {
    $this->price = $price;
  }

  public function getPrice($key)
  {
    $key = strtolower($key); // можно убрать в будущем ???
    return $this->price[$key] ?? false;
  }

  // создание объекта
  abstract public static function getInstance($price);
}

/* -------------------------------------------------------------------------- */
/*                             Конкретные материалы                           */
/* -------------------------------------------------------------------------- */

/* ---------------------------- Материал - Сосна ---------------------------- */

class PineMaterial extends StairMaterial
{
  public static function getInstance($price)
  {
    if ( empty( self::$instance)) {
      self::$instance = new PineMaterial($price);
    }
    return self::$instance;
  }
}

/* ------------------------- Материал - Лиственница ------------------------- */

class LarchMaterial extends StairMaterial
{
  public static function getInstance($price)
  {
    if ( empty( self::$instance)) {
      self::$instance = new LarchMaterial($price);
    }
    return self::$instance;
  }
}

/* ---------------------------- Материал - Ясень ---------------------------- */

class AshMaterial extends StairMaterial
{
  public static function getInstance($price)
  {
    if ( empty( self::$instance)) {
      self::$instance = new AshMaterial($price);
    }
    return self::$instance;
  }
}

/* ----------------------------- Материал - Дуб ----------------------------- */

class OakMaterial extends StairMaterial
{
  public static function getInstance($price)
  {
    if (empty( self::$instance)) {
      self::$instance = new OakMaterial($price);
    }
    return self::$instance;
  }
}

// тест
// $material = AshMaterial::getInstance($ash_price);
// echo "Цена ступени ясеня: {$material->getPrice('ShortLevel')}<br>";
// $mat2 = AshMaterial::getInstance($oak_price);
// echo "Цена ступени дуба: {$mat2->getPrice('ShortLevel')}";
?>