/// <reference path="../typings/globals/jquery/index.d.ts" />

$(document).ready(function() {
  // массив, содержащий имена PIECES элементов
  let elem_pcs = ['baluster', 'balustradecolumn'];
  // массив, содержащий имена LINEAR элементов
  let elem_ln = ['rodcolumn', 'handrail', 'stairtrim', 'balusterbottomboard', 'customboard', 'benthandrail'];
  // Объект, отвечающий за переключение замка
  let lock = {
    lock: $("#lock"),
    // изменение материала элемента запрещено полностью и соответствует основному материалу
    stop: function() {
      this.lock.removeClass("button-grant").addClass("button-stop").html("&#128274").prop("disabled", true);
      $("#elem_material").prop("disabled", true);
      $("#lock, #elem_material").css("cursor", "not-allowed");
      $("#elem_material").val($("#stair_material").prop("value"));
    },
    // изменение материала запрещено, но возможно разрешить
    grant: function() {
      this.lock.removeClass("button-stop").addClass("button-grant").html("&#128274")
               .prop("disabled", false).css("cursor", "default");
      $("#elem_material").prop("disabled", true);
      $("#elem_material").val($("#stair_material").prop("value"));
    },
    // изменение материала элемента разрешено
    unlock: function() {
      this.lock.removeClass("button-stop").addClass("button-grant").html("&#128275").prop("disabled", false);
      $("#elem_material").prop("disabled", false);
      $("#lock, #elem_material").css("cursor", "default");
    },
    // переключение между grant и unlock
    turn: function() {
      // сравниваем только второй символ с "замком"
      $("#lock").text().charCodeAt(1) - 0xDD12 ? this.grant() : this.unlock();
    },
    // включение grant или unlock в соответствии со старым значением
    repair: function() {
      $("#lock").text().charCodeAt(1) - 0xDD12 ? this.unlock() : this.grant();
    } 
  };
  // в начальном положении все запрещено
  lock.stop();
  // в переменной сохраняется объект, к которому будет добавлена строка
  // сделано более глобально, чтобы сократить код (хотя придется чуть использовать ресурсы компа для ошибочного выбора)
  let add_elem;
  // скрываем все элементы
  $(".pcs, .lnr, .sqr").hide();

  // Сохраняем и выделяем элементы с checked (предыдущий проект, удалить)
  var saveattributes = [];
  saveattributes = fontWeight($('input[checked]'));

/* ------------------------ Выбор основного материала ----------------------- */

  $("#stair_material").change(function() {
    // Если элемент еще не определен, то меняем материал для выбора элементов
    if ($("#stair_element").val() == null) {
      lock.stop();
      // если определен и changeable = true, то пока ничего не делаем
    } else if ($("option:selected", "#stair_element").data("changeable")) {
      lock.repair();
    } else {
      lock.stop();
    }
  });

/* ------------------- Нажатие замка при выборе материала ------------------- */

  $("#lock").click(function() {
    lock.turn();
  });
/* ------------- Изменение формы в зависимости от типа элемента ------------- */

  $("#stair_element").change(function() {
    // если можно изменять материал элемента
    if ($("option:selected", "#stair_element").data("changeable")) {
      lock.grant();
      // иначе запрещаем выбор
    } else {
      lock.stop();
    }
    // очистить предыдущие значения формы
/* -------------------- (!!! это стирает значения value) -------------------- */
    $('#addElemForm input:not([type=submit])').val("");
    // установить мм по умолчанию для всех значений при смене типа элемента формы
    $("#addElemForm select[name*=measure] option[value=mm]").prop("selected", true);
    // установить надписи мм по умолчанию при смене типа элемента формы
    $("#addElemForm label[for*=value] span").text("mm");
    // определяем группу элементов в зависимости от принадлежности к массиву названий элементов
    if (elem_pcs.indexOf($("#stair_element").val()) > -1) {
      $(".pcs").show();
      $(".sqr, .lnr").hide();
      // выбираем flex_box, куда записываются полученные данные
      add_elem = $(".folddown").has("#editExtraElem");
    } else if (elem_ln.indexOf($("#stair_element").val()) > -1) {
      $(".lnr").show();
      $(".sqr, .pcs").hide();
      // выбираем flex_box, куда записываются полученные данные
      add_elem = $(".folddown").has("#editExtraElem");
    } else {
      $(".sqr").show();
      $(".pcs, .lnr").hide();
      // выбираем flex_box, куда записываются полученные данные
      add_elem = $(".folddown").has("#editBaseElem");
    }
  });

/* -------- Изменения при выборе единиц измерения размеров элементов -------- */

  // изменяет только единицы измерения в надписи тега span - мм, см или м
  // для элементов square
  $("#sq_length select").change(function() {
    $("span", "#sq_length").text($("#sq_length select").val());
  });
  $("#sq_width select").change(function () {
    $("span", "#sq_width").text($("#sq_width select").val());
  });
  $("#sq_height select").change(function () {
    $("span", "#sq_height").text($("#sq_height select").val());
  });
  // для элементов linear
  $("#ln_length select").change(function () {
    $("span", "#ln_length").text($("#ln_length select").val());
  });
/* ----------------------- Нажатие клавиши "Добавить" ----------------------- */

  // в данной версии занимается только отправкой данных формы и добавлением полученной от PHP строки
  $("#submitElement").click (function(event) {
    // отключить стандартное действие по событию click (отправку формы)
    event.preventDefault();
    // готовим данные для отправки
    let searchdata = $("#addElemForm").serializeArray();
    // добавляем название кнопки, при помощи которой отправляется форма
    searchdata.push(getSubmitObject("button", event.currentTarget.id));
    // добавляем тип материала для элемента лестницы
    // console.log(searchdata);
    // let testing = searchdata.find(item => item.name == "material");
    // console.log(testing);
    // если свойство material отсутствует в форме (из-за атрибута disabled), то принудительно отправляем его
    if (!searchdata.find(item => item.name == "material")) {
      searchdata.push(getSubmitObject("material", $("#elem_material").prop("value")));
    }
    
    // searchdata = JSON.stringify(searchdata);
    // console.log(searchdata);
    // отправка данных элемента лестницы и добавление в HTML (код создает PHP-скрипт)
    $.post($("#addElemForm").attr('action'), searchdata, function(json) {
      // console.log(text);
      // добавляем текст в тот флекс-бокс, который выбрали ранее в зависимости от типа данных
      // если такой элемент есть, заменяем его (название основывается на ширине и длине или только длине)
      // иначе - просто вставляем (в т.ч. и то же, но с другими размерами)
      if (add_elem.siblings().is("#" + json.name)) {
        add_elem.siblings("#" + json.name).replaceWith(json.text);
      } else {
        add_elem.before(json.text);
      }
      // и удаляем ненужную теперь строку
      delete json.text;
      // добавляем элемент в объект лестницы (вид: имя элемента => json-представление элемента)
      console.log("Объект JSON");
      console.log(json);
      // stair[json.name] = JSON.stringify(json);
      // console.log("Объект stair");
      // console.log(stair);
      $("#addElemForm p[id=" + json.name + "]").data("element", JSON.stringify(json));
      // console.log(text);
    }, "json");
  });

  /* -------------------------------------------------------------------------- */

  /* ---------------------- Нажатие клавиши "Рассчитать" ---------------------- */

  // При нажатии кнопки "рассчитать" отправляется только название кнопки
  $("#submitStair").click(function (event) {
    event.preventDefault();
    // собираем объект лестницы для отправки сценарию
    let stair = Object.create(null);
    $("#editBaseElem, #editExtraElem").closest("div").find("p").filter(function () {
      return $(this).data("element") != null;
    }).each(function(index, value) {
      stair[value.id] = $(this).data("element");
    });
    // добавляем информацию о нажатой кнопке в POST-запрос объекта stair
    stair.button = event.currentTarget.id;
    console.log(stair);
    $.post($("#addElemForm").attr('action'), stair, function (text) {
      // здесь будет возврат в форму результатов расчета
      console.log(text);
      // add_elem.append(text);
    }, "text");
  });
  /* -------------------------------------------------------------------------- */

  /* ----------------------- Нажатие клавиши "Изменить" ----------------------- */

  // При нажатии кнопки "изменить" для BaseElem обрабатываем только SQUARE-элементы
  $("#editBaseElem, #editExtraElem").click(function (event) {
    event.preventDefault();
    // читаем данные, прикрепленные к строке элемента
    let edit_elem = JSON.parse($("#" + event.target.id)
                        .closest("div")
                        .find("input[type=radio]:checked")
                        .parent()
                        .data("element"));
    // выбираем и выводим название элемента
    let elem_name = (edit_elem.stair_element == 'shortlevel' || edit_elem.stair_element == 'longlevel') ? 'level' : edit_elem.stair_element;
    $("#stair_element option[value=" + elem_name + "]").prop("selected", true);
    // активация события для показа соответствующих полей ввода
    $("#stair_element").trigger("change");
    // установка предыдущих данных для редактирования
    if ("sq" in edit_elem.quantity) {
      setPreviousValue("length", edit_elem);
      setPreviousValue("width", edit_elem);
      setPreviousValue("height", edit_elem);
      $("#elem_quantity").val(edit_elem.quantity.sq);
      $("#elem_material").val(edit_elem.material.sq);
    } else if ("pcs" in edit_elem.quantity) {
      $("#elem_pcs").val(edit_elem.quantity.pcs);
    } else if ("ln" in edit_elem.quantity) {
      setPreviousValue("length", edit_elem, "ln");
      $("#line_quantity").val(edit_elem.quantity.ln);
    }
  });
  /* -------------------------------------------------------------------------- */

  /* ------------------------ Нажатие клавиши "Удалить" ----------------------- */

  // При нажатии кнопки "удалить" элемент удаляется из списка (вместе с данными)
  $("#delBaseElem, #delExtraElem").click(function (event) {
    event.preventDefault();
    // удалить выбранный элемент из списка
    $("#" + event.target.id).closest("div").find("input[type=radio]:checked").parent().remove();
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

function getSubmitObject(name, value) {
  let submit_name = Object.create(null);
  submit_name.name = name;
  submit_name.value = value;
  return submit_name;
}

/* --------- Функция вывода сохраненных значений при редактировании --------- */

function setPreviousValue(dim, edit_elem, type = "sq") {
  let prefix = "#" + type + "_" + dim; // создание префикса вида #sq_length
  $("span", prefix).text(edit_elem[dim][type].measure);
  $(prefix + " input").val(edit_elem[dim][type].value);
  $(prefix + ' select option[value=' + edit_elem[dim][type].measure + ']').prop("selected", true);
}
/* -------------------------------------------------------------------------- */

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