/// <reference path="../typings/globals/jquery/index.d.ts" />

$(document).ready(function() {
  // массив, содержащий имена PIECES элементов
  let elem_pcs = ['baluster', 'balustradecolumn'];
  // массив, содержащий имена LINEAR элементов
  let elem_ln = ['rodcolumn', 'handrail', 'stairtrim', 'balusterbottomboard', 'customboard', 'benthandrail'];
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
    // установить мм по умолчанию для всех значений при смене типа элемента формы
    $("#addElemForm select[name*=measure] option[value=mm]").prop("selected", true);
    // установить надписи мм по умолчанию при смене типа элемента формы
    $("#addElemForm label[for*=value] span").text("mm");
    // определяем группу элементов в зависимости от принадлежности к массиву названий элементов
    if (elem_pcs.indexOf($("select#stair_element").val()) > -1) {
      $(".piece_elem").show();
      $(".square_elem, .linear_elem").hide();
      // выбираем flex_box, куда записываются полученные данные
      // add_elem = $("article#stair_baluster");
      add_elem = $("p.folddown").has("#editExtraElem");
    } else if (elem_ln.indexOf($("select#stair_element").val()) > -1) {
      $(".linear_elem").show();
      $(".square_elem, .piece_elem").hide();
      // выбираем flex_box, куда записываются полученные данные
      // add_elem = $("article#stair_baluster");
      add_elem = $("p.folddown").has("#editExtraElem");
    } else {
      $(".square_elem").show();
      $(".piece_elem, .linear_elem").hide();
      // выбираем flex_box, куда записываются полученные данные
      add_elem = $("p.folddown").has("#editBaseElem");
    }
  });

/* -------- Изменения при выборе единиц измерения размеров элементов -------- */

  // изменяет только единицы измерения в надписи тега span - мм, см или м
  // для элементов square
  $("#sq_length select").change(function() {
    $("#sq_length label span").text($("#sq_length select").val());
  });
  $("#sq_width select").change(function () {
    $("#sq_width label span").text($("#sq_width select").val());
  });
  $("#sq_height select").change(function () {
    $("#sq_height label span").text($("#sq_height select").val());
  });
  // для элементов linear
  $("#ln_length select").change(function () {
    $("#ln_length label span").text($("#ln_length select").val());
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
    $.post($("#addElemForm").attr('action'), searchdata, function(json) {
      // добавляем текст в тот флекс-бокс, который выбрали ранее в зависимости от типа данных
      // add_elem.append(json.text);
      add_elem.before(json.text);
      // и удаляем ненужную теперь строку
      delete json.text;
      // добавляем элемент в объект лестницы (вид: имя элемента => json-представление элемента)
      console.log(json);
      stair[json.name] = JSON.stringify(json);
      console.log(stair);
      $("#addElemForm input[type=radio][value=" + json.name + "]").data("element", JSON.stringify(json));
      // console.log(text);
    }, "json");
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

  /* ----------------- Нажатие клавиши "Изменить" для BaseElem ---------------- */

  // При нажатии кнопки "рассчитать" отправляется только название кнопки
  $("#editBaseElem").click(function (event) {
    // находим выбранные данные (затем нужно вывести их в окно редактирования)
    console.log($("#editBaseElem").closest("div").find("input[type=radio]:checked").data("element"));
    // $("#editBaseElem").closest("div").find("input[type=radio]").each(function(index, element) {
    //   console.log($(this).data("element"));
    // });

    // event.preventDefault();
    // добавляем информацию о нажатой кнопке в POST-запрос объекта stair
    // stair.button = event.currentTarget.id;

    // $.post($("#addElemForm").attr('action'), stair, function (text) {
      // здесь будет возврат в форму результатов расчета
      // console.log(text);
      // add_elem.append(text);
    // }, "text");
  });
  /* -------------------------------------------------------------------------- */

  /* ----------------- Нажатие клавиши "Удалить" для BaseElem ----------------- */

  // При нажатии кнопки "удалить" элемент удаляется из списка (вместе с данными)
  $("#delBaseElem").click(function (event) {
    // удалить выбранный элемент из списка
    $("#delBaseElem").closest("div").find("input[type=radio]:checked").parent().remove();

    event.preventDefault();
    // добавляем информацию о нажатой кнопке в POST-запрос объекта stair
    // stair.button = event.currentTarget.id;

    // $.post($("#addElemForm").attr('action'), stair, function (text) {
    // здесь будет возврат в форму результатов расчета
    // console.log(text);
    // add_elem.append(text);
    // }, "text");
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