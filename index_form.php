<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Расчет лестницы</title>
</head>

<body>
  <h1>Расчет лестницы</h1>
  <form id="levels" action="registry.php" method="POST">
    <h4>1. Прямые ступени:</h4>
    <!-- Неправильно !!! -->
    <label for="level_1">Первая прямая ступень</label>
    <input type="text" name="level_1" value="Длина">
    <input type="text" name="level_1" value="Ширина">
    <button type="button">
      +
    </button><br>
    <h4>2. Фигурные ступени:</h4>
    <label for="figured_1">Первая фигурная ступень</label>
    <input type="text" name="figured_1">
    <button type="button">
      +
    </button><br>
    <h4>3. Подступенки:</h4>
    <label for="riser_1">Первый подступенок</label>
    <input type="text" name="riser_1">
    <button type="button">
      +
    </button><br>
    <h4>4. Площадки:</h4>
    <label for="landing_1">Первая площадка</label>
    <input type="text" name="landing_1">
    <button type="button">
      +
    </button><br>
    <h4>5. Косоуры/тетивы:</h4>
    <label for="bridgeboard_1">Первый косоур/тетива</label>
    <input type="text" name="bridgeboard_1">
    <button type="button">
      +
    </button><br>
    <h4>6. Отбойные доски:</h4>
    <label for="jackboard_1">Первая отбойная доска</label>
    <input type="text" name="jackboard_1">
    <button type="button">
      +
    </button><br>
    <h4>7. Фальшкосоуры:</h4>
    <label for="falseboard_1">Первый фальшкосоур</label>
    <input type="text" name="falseboard_1">
    <button type="button">
      +
    </button><br>
    <h4>8. Сапожки:</h4>
    <label for="boots_1">Первые сапожки</label>
    <input type="text" name="boots_1">
    <button type="button">
      +
    </button><br>
  </form>
</body>

</html>