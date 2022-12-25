$(document).ready(function () {
  addBasket();
  delBasket();
  updBasket();
  catalogFilter();
  ajaxTabs();
  ajaxPagination();
  forms();
  $(window).on('popstate', function (event) {
    let url = '';
    // Проверяем данные внутри события, и если там наш pagination
    if (event.originalEvent.state && event.originalEvent.state['pagination']) {
      url = event.originalEvent.state['pagination'];
    } else {
      url = document.location.href.split("?")[0];
    }
    loadPage(url);
  });
});

//Формы обратной связи
function forms() {
  let body = $('body');

  //Передадим название в форму
  body.on('click', '[data-toggle]', function (event) {
    event.preventDefault();
    if (typeof ($(this).data('theme')) !== 'undefined') {
      let theme = $(this).data('theme');
      setTimeout(function () {
        $('.modal.show').find('input[name=theme]:hidden').val('').val(theme);
      }, 500);
    }
  });

  body.on('submit', 'form.default-form:not(.no__ajax)', function (event) {
    event.preventDefault();
    let elem = $(this);
    grecaptcha.ready(function () {
      grecaptcha.execute('6LfeqZAjAAAAAHGhBFymI3eBTUARhrgckwVaSDlJ', {action: 'send_form'}).then(function (token) {
        elem.closest('form').find('input[name=g-recaptcha-response]').val(token);
        let url = elem.attr('action');
        let data = elem.serialize();
        let id_metrika = 88060052;
        let metrika = elem.data('metrika');
        if (elem.hasClass('file__form')) {
          data = new FormData(elem[0]);
          $.ajaxSetup({
            cache: false,
            contentType: false,
            processData: false,
          });
        }

        // Дополнение данными, если находимся на странице "Расчет похорон"
        let calculation = $('.calculation');
        if (
          elem.is('[id=formCalculationResult]')
          && calculation.length
          && elem.find('input[name=theme]:hidden').val() === 'Расчет похорон'
        ) {
          data = unSerialize(data);
          data.result = calculation.find('.calculation-result').html();
        }

        // Дополнение данными, если находимся на странице калькулятора рассрочки
        let calc = $('.calculator');
        if (
          elem.is('[id=formInstallmentPlan]')
          && calc.length
          && elem.find('input[name=theme]:hidden').val() === 'Калькулятор рассрочки'
        ) {
          data = unSerialize(data);
          data.SUM = calc.find('span.calc-sum').text() + ' руб.';
          data.COUNT = calc.find('span.calc-time').text() + ' мес.';
          data.TOTAL = calc.find('span.calc-generalSum').text() + ' руб.';
          data.FIRST_PAYMENT_PER = calc.find('span.calc-contributionPercent').text() + '%';
          data.FIRST_PAYMENT_RUB = calc.find('span.calc-contributionRuble').text() + ' руб.';
          data.MONTHLY_PAYMENT = calc.find('span.calc-payment').text() + ' руб.';
        }

        // Дополнение данными, если находимся в корзине
        if ($('.basket-wrap').length && $('[name=installment]').is(':checked')) {
          data = unSerialize(data);
          data.INSTALLMENT = 1;
        }

        $.ajax({
          type: "POST",
          url: url,
          data: data,
          dataType: "json",
          beforeSend: function () {
          },
          success: function (res) {
            if (res['status'] === 'ok') {
              if (typeof metrika !== 'undefined') {
                ym(id_metrika, 'reachGoal', metrika);
              }
              if (res['form'] === 'calculation') {
                elem.trigger('reset');
                formValidationSuccess();
              } else {
                if (elem.parents(".modal").length) {
                  elem.parents(".modal").addClass("is-success");
                } else {
                  $("#modalSuccess").modal("show");
                }

                elem.trigger('reset');
                elem.find('.form-control').removeClass('is-focus');

                setTimeout((function () {
                  $(".modal").modal("hide")
                }), 3e3);

                elem.parents(".modal").find('input[name=theme]').val('');
              }
              if (res['reload'] === 'ok') {
                setTimeout((function () {
                  window.location.reload();
                }), 3e3 + 100);
              }
            }
          }
        });
      });
    });
  });
}

//Событие запуска Ajax-пагинации
function ajaxPagination() {
  let body = $('body');
  body.on('click', 'a.pagination-link, a.pagination-icon, a.pagination__more', function (event) {
    event.preventDefault();
    let elem = $(this);
    let url = elem.attr('href');
    let oldBrowser = !(window.history && history.pushState);
    if (url != '') {
      // Если браузер не старый - добавляем адрес страницы ему в историю
      if (!oldBrowser) {
        window.history.pushState({pagination: url}, '', url);
      }
      // И загружаем её
      loadPage(url);
    }
  });
}

//Ajax-пагинация
function loadPage(url) {
  let props = {};
  let tabs = $('.ajax__tabs');
  if (tabs.length) {
    let IBlockID = tabs.data('iblock');
    let id = tabs.find('a.tags-item.tags-item_active').data('id');
    props.IBLOCK_ID = IBlockID;
    if (id) {
      props.SECTION_ID = id
    }
  }

  let sort = {};
  let filter = $('.filter');
  if (filter.length) {
    let inputs = filter.find('.filter-column');
    if ($('.filter-column_btn').is(":visible")) {
      inputs = filter.find('.ajax_filter__mobile .checkbox input[type=checkbox]');
    }
    let checkboxes = filter.find('.ajax__filter .checkbox input[type=checkbox]');

    inputs.each(function (index, element) {
      let code = $(element).find('[type=hidden]').data('code');
      props[code] = $(element).find('[type=hidden]').val();

      if ($('.filter-column_btn').is(":visible")) {
        // code = $(element).attr('id');
        // props[code] = $(element).is(':checked') ? $(element).val() : '';
        let code = $(element).attr('id').replace(/_\d+$/g, '');

        if ($(element).is(':checked')) {
          props[code] = $(element).val();
        }
      }
    });
    checkboxes.each(function (index, element) {
      let code = $(element).attr('id');
      props[code] = $(element).is(':checked') ? '1' : '';
    });
    props['>=PROPERTY_PRICE'] = $('#input-with-keypress-0').val();
    props['<=PROPERTY_PRICE'] = $('#input-with-keypress-1').val();

    let elSort = $('.ajax__sort');
    let sortBy = elSort.closest('.dropdown').find('.dropdown-value').data('sort');
    let sortOrder = elSort.closest('.dropdown').find('.dropdown-value').data('order');
    sort.BY = sortBy;
    sort.ORDER = sortOrder;
  }

  $('html,body').stop().animate({scrollTop: $('section .content').offset().top}, 1000, function () {
    $.ajax({
      type: "POST",
      url: url,
      data: {
        props: props,
        sort: sort
      },
      success: function (data) {
        let content = $(data).filter('.ajax__items');
        let items = $('.ajax__items');

        let pagination = $(data).filter('.filter-bottom');
        $('.filter-bottom').remove();
        if (pagination.length) {
          items.after(pagination);
        }

        items.replaceWith(content);

        initImgLazyLoad();
        dotdotdotInit();
        wowInit();
      }
    });
  });
}

//Ajax-tabs
function ajaxTabs() {
  let body = $('body');
  body.on('click', '.ajax__tabs a', function (event) {
    event.preventDefault();
    let elem = $(this);
    elem.closest('.ajax__tabs').find('a.tags-item').removeClass('tags-item_active');
    elem.addClass('tags-item_active');
    let IBlockID = elem.closest('.ajax__tabs').data('iblock');
    let id = elem.data('id');

    let ajaxBox = $('.ajax__box');
    if (ajaxBox.length) {
      ajaxBox.hide();
      let name = elem.data('name');
      let link = elem.data('link');

      ajaxBox.find('a.more__link span').html(name);
      ajaxBox.find('a.more__link').attr('href', link);

      if (link !== '') {
        ajaxBox.show();
      }

    }

    let props = {
      'IBLOCK_ID': IBlockID
    };
    if (id) {
      props.SECTION_ID = id
    }
    $.ajax({
      type: "POST",
      url: window.location.href,
      data: {
        props: props
      },
      success: function (data) {
        let content = $(data).filter('.ajax__items');
        let items = $('.ajax__items');

        let pagination = $(data).filter('.filter-bottom');
        $('.filter-bottom').remove();
        if (pagination.length) {
          items.after(pagination);
        }

        items.replaceWith(content);

        initImgLazyLoad();
        dotdotdotInit();
        wowInit();
      }
    });
  });
}

//Ajax-фильтрация в каталоге
function catalogFilter() {
  let body = $('body');

  //Фильтр на десктопе
  body.on('click', '.ajax__filter li, .ajax__filter input[type=checkbox]', function () {
    let elem = $(this);
    let inputs = elem.closest('.filter-row').find('.filter-column');
    if ($('.filter-column_btn').is(":visible")) {
      inputs = elem.closest('.filter-row').find('.ajax_filter__mobile .checkbox input[type=checkbox]');
    }
    let checkboxes = elem.closest('.filter-row').find('.ajax__filter .checkbox input[type=checkbox]');

    let props = {};
    inputs.each(function (index, element) {
      let code = $(element).find('[type=hidden]').data('code');
      props[code] = $(element).find('[type=hidden]').val();
      if ($('.filter-fixed').is(":visible")) {
        code = $(element).attr('id');
        props[code] = $(element).is(':checked') ? $(element).val() : '';
      }
    });
    checkboxes.each(function (index, element) {
      let code = $(element).attr('id');
      props[code] = $(element).is(':checked') ? '1' : '';
    });
    props['>=PROPERTY_PRICE'] = $('#input-with-keypress-0').val();
    props['<=PROPERTY_PRICE'] = $('#input-with-keypress-1').val();

    let sort = {};
    let elSort = $('.ajax__sort');
    let sortBy = elSort.closest('.dropdown').find('.dropdown-value').data('sort');
    let sortOrder = elSort.closest('.dropdown').find('.dropdown-value').data('order');
    sort.BY = sortBy;
    sort.ORDER = sortOrder;

    $.ajax({
      type: "POST",
      url: window.location.href,
      data: {
        props: props,
        sort: sort
      },
      success: function (data) {
        let content = $(data).filter('.catalog-items');
        $('.catalog-items').replaceWith(content);
        $('.filter-count').replaceWith($(data).find('.filter-count'));
        $('.ajax-count').replaceWith($(data).find('.ajax-count'));

        let pagination = $(data).filter('.filter-bottom');
        $('.filter-bottom').remove();
        if (pagination.length) {
          content.after(pagination);
        }

        initImgLazyLoad();
      }
    });
  });

  //Фильтр на телефоне и планшете
  body.on('click', '.ajax_filter__mobile input[type=checkbox]', function () {
    let elem = $(this);
    $(this).closest('.ajax_filter__mobile').find('input[type=checkbox]').not(this).prop('checked', false);
    let inputs = elem.closest('.filter-row').find('.ajax_filter__mobile .checkbox input[type=checkbox]');
    let checkboxes = elem.closest('.filter-row').find('.ajax__filter .checkbox input[type=checkbox]');

    let props = {};
    inputs.each(function (index, element) {
      // let code = $(element).attr('id');
      // props[code] = $(element).is(':checked') ? $(element).val() : '';
      let code = $(element).attr('id').replace(/_\d+$/g, '');

      if ($(element).is(':checked')) {
        props[code] = $(element).val();
      }
    });
    checkboxes.each(function (index, element) {
      let code = $(element).attr('id');
      props[code] = $(element).is(':checked') ? '1' : '';
    });
    props['>=PROPERTY_PRICE'] = $('#input-with-keypress-0').val();
    props['<=PROPERTY_PRICE'] = $('#input-with-keypress-1').val();

    let sort = {};
    let elSort = $('.ajax__sort');
    let sortBy = elSort.closest('.dropdown').find('.dropdown-value').data('sort');
    let sortOrder = elSort.closest('.dropdown').find('.dropdown-value').data('order');
    sort.BY = sortBy;
    sort.ORDER = sortOrder;

    $.ajax({
      type: "POST",
      url: window.location.href,
      data: {
        props: props,
        sort: sort
      },
      success: function (data) {
        let content = $(data).filter('.catalog-items');
        $('.catalog-items').replaceWith(content);
        $('.filter-count').replaceWith($(data).find('.filter-count'));
        $('.ajax-count').replaceWith($(data).find('.ajax-count'));

        let pagination = $(data).filter('.filter-bottom');
        $('.filter-bottom').remove();
        if (pagination.length) {
          content.after(pagination);
        }

        initImgLazyLoad();
      }
    });
  });

  // Фильтр по цене
  setTimeout(function () {
    const stepsSlider = document.getElementById('slider');
    if (!stepsSlider) return false;

    body.on('change', '#input-with-keypress-0', function () {
      stepsSlider.noUiSlider.set([this.value, null]);
    });
    body.on('change', '#input-with-keypress-1', function () {
      stepsSlider.noUiSlider.set([null, this.value]);
    });

    stepsSlider.noUiSlider.on('set', function (values) {
      let elem = $(stepsSlider);
      let inputs = elem.closest('.filter-row').find('.filter-column');
      if ($('.filter-column_btn').is(":visible")) {
        inputs = elem.closest('.filter-row').find('.ajax_filter__mobile .checkbox input[type=checkbox]');
      }
      let checkboxes = elem.closest('.filter-row').find('.ajax__filter .checkbox input[type=checkbox]');

      let props = {};
      inputs.each(function (index, element) {
        let code = $(element).find('[type=hidden]').data('code');
        props[code] = $(element).find('[type=hidden]').val();
        if ($('.filter-fixed').is(":visible")) {
          // code = $(element).attr('id');
          // props[code] = $(element).is(':checked') ? $(element).val() : '';
          let code = $(element).attr('id').replace(/_\d+$/g, '');

          if ($(element).is(':checked')) {
            props[code] = $(element).val();
          }
        }
      });
      checkboxes.each(function (index, element) {
        let code = $(element).attr('id');
        props[code] = $(element).is(':checked') ? '1' : '';
      });
      values.map(function (index, element) {
        let code = element ? '<=PROPERTY_PRICE' : '>=PROPERTY_PRICE';
        props[code] = Math.ceil(Number(index));
      });

      let sort = {};
      let elSort = $('.ajax__sort');
      let sortBy = elSort.closest('.dropdown').find('.dropdown-value').data('sort');
      let sortOrder = elSort.closest('.dropdown').find('.dropdown-value').data('order');
      sort.BY = sortBy;
      sort.ORDER = sortOrder;

      $.ajax({
        type: "POST",
        url: window.location.href,
        data: {
          props: props,
          sort: sort
        },
        success: function (data) {
          let content = $(data).filter('.catalog-items');
          $('.catalog-items').replaceWith(content);
          $('.filter-count').replaceWith($(data).find('.filter-count'));
          $('.ajax-count').replaceWith($(data).find('.ajax-count'));

          let pagination = $(data).filter('.filter-bottom');
          $('.filter-bottom').remove();
          if (pagination.length) {
            content.after(pagination);
          }

          initImgLazyLoad();
        }
      });
    });
  }, 500);

  //Сбросить фильтр
  body.on('click', '.filter-fixed__clear', function () {
    let filter = $('.filter-row');
    let inputs = filter.find('.filter-column');
    let inputsMob = filter.find('.ajax_filter__mobile .checkbox input[type=checkbox]');
    let checkboxes = filter.find('.ajax__filter .checkbox input[type=checkbox]');

    let props = {};
    inputs.each(function (index, element) {
      $(element).find('[type=hidden]').val('');
    });
    inputsMob.each(function (index, element) {
      $(element).is(':checked') ? $(element).trigger('click') : '';
    });
    checkboxes.each(function (index, element) {
      $(element).is(':checked') ? $(element).trigger('click') : '';
    });

    const stepsSlider = document.getElementById('slider');
    if (!stepsSlider) return false;
    let inputsPrice = [document.getElementById("input-with-keypress-0"), document.getElementById("input-with-keypress-1")];
    stepsSlider.noUiSlider.set([$(inputsPrice[0]).data('default'), $(inputsPrice[1]).data('default')])

    let sort = {};
    let elSort = $('.ajax__sort');
    let sortBy = elSort.closest('.dropdown').find('.dropdown-value').data('sort');
    let sortOrder = elSort.closest('.dropdown').find('.dropdown-value').data('order');
    sort.BY = sortBy;
    sort.ORDER = sortOrder;

    $.ajax({
      type: "POST",
      url: window.location.href,
      data: {
        props: props,
        sort: sort
      },
      success: function (data) {
        let content = $(data).filter('.catalog-items');
        $('.catalog-items').replaceWith(content);
        $('.filter-count').replaceWith($(data).find('.filter-count'));
        $('.ajax-count').replaceWith($(data).find('.ajax-count'));

        let pagination = $(data).filter('.filter-bottom');
        $('.filter-bottom').remove();
        if (pagination.length) {
          content.after(pagination);
        }

        initImgLazyLoad();
      }
    });
  });

  //Сортировка
  body.on('click', '.ajax__sort li', function () {
    let filter = $('.filter');
    let inputs = filter.find('.filter-column');
    if ($('.filter-column_btn').is(":visible")) {
      inputs = filter.find('.ajax_filter__mobile .checkbox input[type=checkbox]');
    }
    let checkboxes = filter.find('.ajax__filter .checkbox input[type=checkbox]');

    let props = {};
    inputs.each(function (index, element) {
      let code = $(element).find('[type=hidden]').data('code');
      props[code] = $(element).find('[type=hidden]').val();
      if ($('.filter-column_btn').is(":visible")) {
        // code = $(element).attr('id');
        // props[code] = $(element).is(':checked') ? $(element).val() : '';
        let code = $(element).attr('id').replace(/_\d+$/g, '');

        if ($(element).is(':checked')) {
          props[code] = $(element).val();
        }
      }
    });
    checkboxes.each(function (index, element) {
      let code = $(element).attr('id');
      props[code] = $(element).is(':checked') ? '1' : '';
    });
    props['>=PROPERTY_PRICE'] = $('#input-with-keypress-0').val();
    props['<=PROPERTY_PRICE'] = $('#input-with-keypress-1').val();

    let sort = {};
    let elSort = $('.ajax__sort');
    let sortBy = elSort.closest('.dropdown').find('.dropdown-value').data('sort');
    let sortOrder = elSort.closest('.dropdown').find('.dropdown-value').data('order');
    sort.BY = sortBy;
    sort.ORDER = sortOrder;

    $.ajax({
      type: "POST",
      url: window.location.href,
      data: {
        props: props,
        sort: sort
      },
      success: function (data) {
        let content = $(data).filter('.catalog-items');
        $('.catalog-items').replaceWith(content);
        $('.filter-count').replaceWith($(data).find('.filter-count'));
        $('.ajax-count').replaceWith($(data).find('.ajax-count'));

        let pagination = $(data).filter('.filter-bottom');
        $('.filter-bottom').remove();
        if (pagination.length) {
          content.after(pagination);
        }

        initImgLazyLoad();
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
          $('.btn-basket__add').html(res['count']);

          //Очистим
          $('#modalBasket img.lazy').attr('data-src', '').attr('src', '');
          $('#modalBasket .label-wrap').html('');

          setTimeout(function () {
            $('#modalBasket img.lazy').attr('data-src', res['element']['PREVIEW_PICTURE']).attr('src', res['element']['PREVIEW_PICTURE']).attr('alt', res['element']['NAME']).addClass('loaded');
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
          $('.btn-basket__add').html(res['count']);
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

//Обновление корзины
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
          $('.btn-basket__add').html(res['count']);

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

//Склонятор слов число, слова - "минута", "минуты", "минут"
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

// Функция обратная serialize() и возвращает данные json
function unSerialize(data) {
  data = data.split('&');
  let response = {};
  for (let k in data) {
    let newData = data[k].split('=');
    response[newData[0]] = decodeURIComponent(newData[1]);
  }
  return response;
}