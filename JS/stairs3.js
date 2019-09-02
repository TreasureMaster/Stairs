/// <reference path="../typings/globals/jquery/index.d.ts" />

$(document).ready(function() {
  // переменная, содержащая номер группы элементов
  let elem_group;
  // собираем все элементы лестницы
  let stair = Object.create(null);
  // в переменной сохраняется объект, к которому будет добавлена строка
  // сделано более глобально, чтобы сократить код (хотя придется чуть использовать ресурсы компа для ошибочного выбора)
  let add_elem;
  // скрываем все элементы
  $(".piece_elem, .linear_elem, .square_elem").hide();

  // Сохраняем и выделяем элементы с checked (предыдущий проект, удалить)
  var saveattributes = [];
  saveattributes = fontWeight($('input[checked]'));

/* ------------- Изменение формы в зависимости от типа элемента ------------- */

  $("select#stair_element").change(function() {
    // очистить предыдущие значения формы
    $('#addElemForm input:not([type=submit])').val("");
    // получаем номер группы по выбранному элементу
    elem_group = Number(($("select#stair_element").val()).slice(-1));
    switch (elem_group) {
      case 1:
        $(".square_elem").show();
        $(".piece_elem, .linear_elem").hide();
        // выбираем flex_box, куда записываются полученные данные
        add_elem = $("article#stair_level");
        break;
      case 2:
        $(".piece_elem").show();
        $(".square_elem, .linear_elem").hide();
        // выбираем flex_box, куда записываются полученные данные
        add_elem = $("article#stair_baluster");
        break;
      case 3:
        $(".linear_elem").show();
        $(".square_elem, .piece_elem").hide();
        // выбираем flex_box, куда записываются полученные данные
        add_elem = $("article#stair_handrail");
        break;
    }
  });

/* ----------------------- Нажатие клавиши "Добавить" ----------------------- */

  // в данной версии занимается только отправкой данных формы и добавлением полученной от PHP строки
  $("#submitElement").click (function(event) {
    // отключить стандартное действие по событию click (отправку формы)
    event.preventDefault();
    // готовим данные для отправки
    let searchdata = $("#addElemForm").serializeArray();
    // добавляем название кнопки, при помощи которой отправляется форма
    searchdata.push(getSubmitName(event.currentTarget.id));
    console.log(searchdata);

    // отправка данных элемента лестницы и добавление в HTML (код создает PHP-скрипт)
    $.post($("#addElemForm").attr('action'), searchdata, function(text) {
      // добавляем текст в тот флекс-бокс, который выбрали ранее в зависимости от типа данных
      // add_elem.append(json.text);
      // и удаляем ненужную теперь строку
      // delete json.text;
      // добавляем элемент в объект лестницы (вид: имя элемента => json-представление элемента)
      // stair[json.name] = JSON.stringify(json);
      // console.log(stair);
      console.log(text);
    }, "text");
  });

  /* -------------------------------------------------------------------------- */

  /* ---------------------- Нажатие клавиши "Рассчитать" ---------------------- */

  // При нажатии кнопки "рассчитать" отправляется только название кнопки
  $("#submitStair").click(function (event) {
    event.preventDefault();
    // добавляем информацию о нажатой кнопке в POST-запрос объекта stair
    stair.button = event.currentTarget.id;

    $.post($("#addElemForm").attr('action'), stair, function (text) {
      // здесь будет возврат в форму результатов расчета
      console.log(text);
      // add_elem.append(text);
    }, "text");
  });
  /* -------------------------------------------------------------------------- */

  /* ----------------------- Нажатие клавиши "Изменить" ----------------------- */

  $("#changeView").click(function (event) {
    // Отключить стандартное действие при событии click (отправку формы)
    event.preventDefault();

    var data = $("#basicParamsForm").serializeArray();

    $.post($('#basicParamsForm').attr('action'), data, function (json) {
      // if (json.status == 'fail') {
      //   alert(json.message);
      // }
      // if (json.status == 'success') {
      //   alert(json.message);
      // }
      // $('#phpResult').empty();

      // Удаляем ранее выделенные атрибуты
      // delChecked(saveattributes);
      $(saveattributes).each(function (index) {
        $(this).prev().attr('checked', false);
        $(this).css('font-weight', 'normal');
      });

      $.each(json, function (key, value) {
        if (key != 'status') {
          // Это просто тестовая надпись
          // $('#phpResult').append('<p>Ключ: <strong>' + key + '</strong>, значение: <strong>' + value + '</strong></p>');
          $('#flexview').css(key, value); // присваиваем flex-контейнеру свойства
          $("#flex_" + value.replace("-", "_")).attr('checked', true); // устанавливаем атрибуты checked новым input`ам
        }
      });
      saveattributes = fontWeight($('input[checked]')); // выделяем новые checked
      // $('#phpResult').find('p strong').css('color', 'red');
    }, "json");
  });
/* -------------------------------------------------------------------------- */
}); // конец блока document.ready


/* --------- Функция для добавления в массив объекта-названия кнопки -------- */

function getSubmitName(button_name) {
  let submit_name = Object.create(null);
  submit_name.name = "button";
  submit_name.value = button_name;
  return submit_name;
}

/* ---------------------- Функция для формы "Изменить" ---------------------- */

// Функция выделения текста с атрибутом checked
function fontWeight(attributes) {
  var pastattribites = [];
  $(attributes).each(function(index) {
    $(this).next().css('font-weight', 'bold');
    pastattribites.push($(this).next());
  });
  // console.log(pastattribites);
  return pastattribites;
}