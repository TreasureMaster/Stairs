<?php
// обернуто в функцию, т.к. автозагрузчик не подгружает переменные
function specifyMaterial($material)
{
/* -------------------------------------------------------------------------- */
/*                      Фиксированный прайс по материалам                     */
/* -------------------------------------------------------------------------- */

/* ------------------------------- Прайс сосна ------------------------------ */

$pine_price = [
    'shortlevel'          => 4180,    // короткая ступень (до 1м)
    'longlevel'           => 4400,    // длинная ступень (свыше 1м)
    'stairlanding'        => null,    // площадка
    'stairriser'          => 2860,    // подступенок
    'stairbaseboard'      => 2750,    // сапожок
    'figeredlevel'        => 10780,   // фигурная ступень
    'bridgeboard'         => 9350,    // косоур/тетива
    'jackboard'           => 3630,    // отбойная доска
    'pseudobridgeboard'   => 3630,    // фальшкосоур
    'baluster'            => 390,     // балясина
    'balustradecolumn'    => 990,     // балюстрадный столб
    'rodcolumn'           => 810,     // опорный столб
    'handrail'            => 930,     // поручень
    'stairtrim'           => 170,     // раскладка
    'balusterbottomboard' => 390,     // подбалясная доска
    'customboard'         => 220,     // нестандартный профиль
    'benthandrail'        => 2530     // гнутый поручень
  ];

/* ---------------------------- Прайс лиственница --------------------------- */

$larch_price = [
  'shortlevel'          => 6050,    // короткая ступень (до 1м)
  'longlevel'           => 6600,    // длинная ступень (свыше 1м)
  'stairlanding'        => null,    // площадка
  'stairriser'          => 3850,    // подступенок
  'stairbaseboard'      => 3630,    // сапожок
  'figeredlevel'        => 12870,   // фигурная ступень
  'bridgeboard'         => 12320,   // косоур/тетива
  'jackboard'           => 4240,    // отбойная доска
  'pseudobridgeboard'   => 4240,    // фальшкосоур
  'baluster'            => 520,     // балясина
  'balustradecolumn'    => 1820,    // балюстрадный столб
  'rodcolumn'           => 1320,    // опорный столб
  'handrail'            => 1380,    // поручень
  'stairtrim'           => 170,     // раскладка
  'balusterbottomboard' => 390,     // подбалясная доска
  'customboard'         => 250,     // нестандартный профиль
  'benthandrail'        => 2970     // гнутый поручень
  ];

/* ------------------------------- Прайс Ясень ------------------------------ */

$ash_price = [
  'shortlevel'          => 7700,    // короткая ступень (до 1м)
  'longlevel'           => 8580,    // длинная ступень (свыше 1м)
  'stairlanding'        => 6270,    // площадка
  'stairriser'          => 5170,    // подступенок
  'stairbaseboard'      => 4840,    // сапожок
  'figeredlevel'        => 14280,   // фигурная ступень
  'bridgeboard'         => 13310,   // косоур/тетива
  'jackboard'           => 5170,    // отбойная доска
  'pseudobridgeboard'   => 5170,    // фальшкосоур
  'baluster'            => 550,     // балясина
  'balustradecolumn'    => 2150,    // балюстрадный столб
  'rodcolumn'           => 1540,    // опорный столб
  'handrail'            => 1430,    // поручень
  'stairtrim'           => 190,     // раскладка
  'balusterbottomboard' => 440,     // подбалясная доска
  'customboard'         => 290,     // нестандартный профиль
  'benthandrail'        => 3760     // гнутый поручень
  ];

/* -------------------------------- Прайс Дуб ------------------------------- */

$oak_price = [
  'shortlevel'          => 9130,    // короткая ступень (до 1м)
  'longlevel'           => 10010,   // длинная ступень (свыше 1м)
  'stairlanding'        => 6710,    // площадка
  'stairriser'          => 5610,    // подступенок
  'stairbaseboard'      => 5170,    // сапожок
  'figeredlevel'        => 15730,   // фигурная ступень
  'bridgeboard'         => 16390,   // косоур/тетива
  'jackboard'           => 5670,    // отбойная доска
  'pseudobridgeboard'   => 5670,    // фальшкосоур
  'baluster'            => 640,     // балясина
  'balustradecolumn'    => 2640,    // балюстрадный столб
  'rodcolumn'           => 1980,    // опорный столб
  'handrail'            => 1700,    // поручень
  'stairtrim'           => 220,     // раскладка
  'balusterbottomboard' => 490,     // подбалясная доска
  'customboard'         => 330,     // нестандартный профиль
  'benthandrail'        => 4480     // гнутый поручень
  ];

  switch ($material) {
    case 'pine':
      return $pine_price;
      break;
    case 'larch':
      return $larch_price;
      break;
    case 'ash':
      return $ash_price;
      break;
    case 'oak':
      return $oak_price;
      break;
    default:
      return false;
      break;
  }
}
?>