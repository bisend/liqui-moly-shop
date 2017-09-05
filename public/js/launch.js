var LANGUAGE = $('html').attr('lang'),
    DEFAULT_LANGUAGE = 'uk';

var IncorrectFieldClass = 'incorrect-field',
    RequiredFieldText = (LANGUAGE == DEFAULT_LANGUAGE) ? 'Обов`язкове поле.' : 'Обязательное поле.',
    IncorrectFieldText = (LANGUAGE == DEFAULT_LANGUAGE) ? 'Невірно введені дані.' : 'Неправильные данные.',
    ServerError = (LANGUAGE == DEFAULT_LANGUAGE) ? 'Сталася помилка, спробуйте ще.' : 'Произошла ошибка, попробуйте еще.',
    EmailNotValid = (LANGUAGE == DEFAULT_LANGUAGE) ? 'Користувач з таким e-mail вже існує.' : 'Пользователь c таким e-mail уже существует.',
    EmailConfirmNotValid = (LANGUAGE == DEFAULT_LANGUAGE) ? 'E-mail не підтверджено.' : 'E-mail не подтвержден.',
    EmailNotExists = (LANGUAGE == DEFAULT_LANGUAGE) ? 'Такого e-mail не існує.' : 'Такой e-mail не существует.',
    RegisterSuccess = (LANGUAGE == DEFAULT_LANGUAGE) ? 'Реєстрація пройшла успішно, на вказаний e-mail відправлено лист для підтвердження.' : 'Регистрация прошла успешно, на указанный e-mail отправлено письмо для подтверждения.',
    RestoreSuccess = (LANGUAGE == DEFAULT_LANGUAGE) ? 'На ваш e-mail відправлено лист з паролем для входу.' : 'На ваш e-mail отправлено письмо с паролем для входа.',
    InCart = (LANGUAGE == DEFAULT_LANGUAGE) ? 'В кошику' : 'В корзине',
    AddToCart = (LANGUAGE == DEFAULT_LANGUAGE) ? 'В кошик' : 'В корзину',
    ORDER_CREATED_MESSAGE = (LANGUAGE == DEFAULT_LANGUAGE) ? 'Замовлення прийнято. Незабаром з вами зв\'яжеться наш менеджер.' : 'Заказ принят. Скоро с вами свяжется наш менеджер.';

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function Launch() {
    var ctx = this;

    var sendMainAjax = function () {
        $.ajax({
            type: 'get',
            url: '/main-ajax',
            success: function (data) {
                if (data.isOrderCreated && data.status == 'success')
                {
                    showPopup(ORDER_CREATED_MESSAGE);
                }
            },
            error: function (data) {

            }
        });
    };
    
    ctx.init = function () {
        sendMainAjax();
    };
    
    ctx.launch = function () {

        ctx.init();
        
    };
    
    ctx.launch();
}

$(document).ready(function() {
    
    // cart.cartFunctions.initCart();
});

$(window).load(function () {
    // new Launch();
});






//helpers

//REDIRECT TO '/' IF EMPTY CART
function redirectEmptyCart() {
    if (document.URL.indexOf('order') !== -1) {
        window.location.href = buildUrlWithLang('http://liqui-moly.app');
    }
}




function showLoader() {
    $('[data-big-loader]').fadeIn();
}

function hideLoader() {
    $('[data-big-loader]').fadeOut();
}



//URL WITH LANGUAGE
function buildUrlWithLang(url) 
{
    if (LANGUAGE == DEFAULT_LANGUAGE)
    {
        return url;
    }
    else
    {
        return url += '/' + LANGUAGE;
    }
}

//URL FOR SEARCH
function buildSearchUrl(series) 
{
    series = series
        .toLowerCase()
        .replace(/[^a-zA-Zа-яА-ЯїЇіІьЬєЄэЭъЪёЁґҐ0-9 ]/gi, ' ')
        .replace(/\s+/g, ' ')
        .trim()
        .replace(/\s/g, '+');

    return series;
}


//////////////////////////////TODO MOVE TO POPUP CLASS
function showPopup(message) {
    var popup = $('[data-popup]'),
        popupMessage = $('[data-popup-text]');
    popupMessage.text(message);
    popup.fadeIn();
}

function hidePopup() {
    var popup = $('[data-popup]'),
        popupMessage = $('[data-popup-text]');
    popup.fadeOut();
    popupMessage.text('');
}

$('body').on('click', '[data-popup-close]', function () {
    hidePopup();
});

$('body').on('click', '[data-popup]', function (e) {
    if ($(e.target).hasClass('pop-up-message'))
    {
        hidePopup();
    }
});
////////////////////////////////