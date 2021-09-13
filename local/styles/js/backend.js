$(document).ready(function () {
  addBasket();
  delBasket();
  updBasket();
  catalogFilter();
});

//Ajax-фильтрация в каталоге
function catalogFilter() {
  let body = $('body');
  body.on('click', '.dropdown-menu li', function (event) {
    event.preventDefault();
    let elem = $(this);
    let code = elem.data('code');
    let prop = elem.closest('.dropdown').find('[type=hidden]').val();
    if(prop === 'Ориентация' || prop === 'Принадлежность'){
      prop = '';
    }
    $.ajax({
      type: "POST",
      url: window.location.href,
      data: {
        "code": code,
        "prop": prop
      },
      success: function (data) {
        let content = $(data).filter('.catalog-items');
        $('.catalog-items').replaceWith(content);
      }
    });
  });
}

//Ajax-добавление в корзину
function addBasket() {
  let body = $('body');
  body.on('click', '[data-target="#modalBasket"]', function (event) {
    event.preventDefault();
    let elem = $(this);
    let id = elem.data('id');
    $.ajax({
      type: "POST",
      url: "/local/ajax/add_basket.php",
      dataType: 'json',
      data: {
        "id": id
      },
      success: function (res) {
        if (res['status'] === 'success') {
          $('.btn.btn-basket .btn-basket__count').html(res['count']);

          //Очистим
          $('#modalBasket img.lazy').attr('data-src', '').attr('src', '');
          $('#modalBasket .label-wrap').html('');

          setTimeout(function () {
            $('#modalBasket img.lazy').attr('data-src', res['element']['PREVIEW_PICTURE']).attr('src', res['element']['PREVIEW_PICTURE']).attr('alt', res['element']['NAME']);
            if (res['element']['PROPERTIES']['NEW']['VALUE']) {
              $('#modalBasket .label-wrap').append('<span class="label label_small label_bg label_fiery-rose">Новинки</span>');
            }

            $('#modalBasket h4').html(res['element']['NAME']);

            let price = number_format(res['element']['PROPERTIES']['PRICE']['VALUE'], 0, ' ', ' ') + ' ₽';
            $('#modalBasket .price-now').html(price);

            if (res['element']['PROPERTIES']['OLD_PRICE']['VALUE'] !== null) {
              let oldPrice = number_format(res['element']['PROPERTIES']['OLD_PRICE']['VALUE'], 0, ' ', ' ') + ' ₽';
              $('#modalBasket .price-old').html(oldPrice);

              let discount = '-' + Math.ceil(((res['element']['PROPERTIES']['OLD_PRICE']['VALUE'] - res['element']['PROPERTIES']['PRICE']['VALUE']) * 100) / res['element']['PROPERTIES']['OLD_PRICE']['VALUE']) + '%';
              $('#modalBasket .label-wrap').append('<span class="label label_small label_bg label_fiery-rose">' + discount + '</span>');
            }

            let count = declension(+res['count'], ['товар', 'товара', 'товаров']);
            let sum = number_format(res['sum'], 0, ' ', ' ') + ' ₽';
            $('#modalBasket .popup__count').html('В корзине ' + res['count'] + ' ' + count + ' на сумму от ' + sum);

          }, 300)
        }
      }
    });
  });
}

//Ajax-удаление из корзины
function delBasket() {
  let body = $('body');
  body.on('click', 'span.basket-card__delete', function (event) {
    event.preventDefault();
    let elem = $(this);
    let id = elem.data('id');
    $.ajax({
      type: "POST",
      url: "/local/ajax/del_basket.php",
      dataType: 'json',
      data: {
        "id": id
      },
      success: function (res) {
        if (res['status'] === 'success') {
          $('.btn.btn-basket .btn-basket__count').html(res['count']);
          elem.closest('.basket-card').remove();

          if (res['count'] !== 0) {
            $('.price-base.counter').html(res['count'] + ' шт.');
            let sum = number_format(res['sum'], 0, ' ', ' ') + ' ₽';
            $('.price-base.sum').html('от ' + sum);
          } else {
            $('.basket-wrap').hide();
            $('.basket-empty').show();
          }
        }
      }
    });
  });
}

function updBasket() {
  let body = $('body');
  body.on('click', '.basket-card .count__nav', function (event) {
    event.preventDefault();
    let elem = $(this);
    let id = elem.closest('.count').data('id');
    let action;
    if (elem.hasClass('el-plus')) {
      action = 'plus';
    } else if (elem.hasClass('el-minus')) {
      action = 'minus';
    }

    $.ajax({
      type: "POST",
      url: "/local/ajax/upd_basket.php",
      dataType: 'json',
      data: {
        "action": action,
        "id": id
      },
      success: function (res) {
        if (res['status'] === 'success') {

          $('.btn.btn-basket .btn-basket__count').html(res['count']);

          if (res['method'] === 'update') {

            $('.price-base.counter').html(res['count'] + ' шт.');
            let sum = number_format(res['sum'], 0, ' ', ' ') + ' ₽';
            $('.price-base.sum').html('от ' + sum);

          } else if (res['method'] === 'delete') {

            elem.closest('.basket-card').remove();
            $('.price-base.counter').html(res['count'] + ' шт.');
            let sum = number_format(res['sum'], 0, ' ', ' ') + ' ₽';
            $('.price-base.sum').html('от ' + sum);

          } else if (res['count'] === 0) {

            $('.basket-wrap').hide();
            $('.basket-empty').show();

          }
        }
      }
    });
  });
}

//Number_format js
function number_format(number, decimals, dec_point, thousands_sep) {
  let i, j, kw, kd, km;
  if (isNaN(decimals = Math.abs(decimals))) {
    decimals = 2;
  }
  if (dec_point === undefined) {
    dec_point = ",";
  }
  if (thousands_sep === undefined) {
    thousands_sep = ".";
  }
  i = parseInt(number = (+number || 0).toFixed(decimals)) + "";
  if ((j = i.length) > 3) {
    j = j % 3;
  } else {
    j = 0;
  }
  km = (j ? i.substr(0, j) + thousands_sep : "");
  kw = i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands_sep);
  //kd = (decimals ? dec_point + Math.abs(number - i).toFixed(decimals).slice(2) : "");
  kd = (decimals ? dec_point + Math.abs(number - i).toFixed(decimals).replace(/-/, 0).slice(2) : "");
  return km + kw + kd;
}

//Валидация e-mail
function isValidEmailAddress(emailAddress) {
  let pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
  return pattern.test(emailAddress);
}

//Возвращает cookie с именем name, если есть, если нет, то undefined
function getCookie(name) {
  let matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}

//Устанавливает cookie
function setCookie(name, value, options, path) {
  options = options || {};

  let expires = options.expires;

  if (typeof expires == "number" && expires) {
    let d = new Date();
    d.setTime(d.getTime() + expires * 1000);
    expires = options.expires = d;
  }
  if (expires && expires.toUTCString) {
    options.expires = expires.toUTCString();
  }

  value = encodeURIComponent(value);

  let updatedCookie = name + "=" + value;

  for (let propName in options) {
    updatedCookie += "; " + propName;
    let propValue = options[propName];
    if (propValue !== true) {
      updatedCookie += "=" + propValue;
    }
  }

  if (path) {
    updatedCookie += "; path=" + path;
  }

  document.cookie = updatedCookie;
}

//Удаляет cookie
function deleteCookie(name) {
  setCookie(name, "", "", "/", {
    expires: -1
  });
}

//Склонятор слов  число, слова - "минута", "минуты", "минут"
function declension(num, expressions) {
  let result,
    count;
  count = num % 100;
  if (count >= 5 && count <= 20) {
    result = expressions['2'];
  } else {
    count = count % 10;
    if (count === 1) {
      result = expressions['0'];
    } else if (count >= 2 && count <= 4) {
      result = expressions['1'];
    } else {
      result = expressions['2'];
    }
  }
  return result;
}

//Проверка на историю переходов
function checkRefer() {
  if (document.referrer === "") {
    return false;
  } else {
    window.history.back();
  }
}

//Сравнение двух массивов
function getArrayDiff(a, b) {
  let ret = [],
    merged = [];
  merged = a.concat(b);
  for (let i = 0; i < merged.length; i++) {
    if (merged.indexOf(merged[i]) === merged.lastIndexOf(merged[i])) {
      ret.push(merged[i]);
    }
  }
  return ret;
}

//Замена битриксовых прелоадеров
BX.showWait = function (node, msg) {
  $('.profile-main-loader').show();
  $('.wrapper__loader').show();

};
BX.closeWait = function (node, obMsg) {
  $('.profile-main-loader').hide();
  $('.wrapper__loader').hide();
};