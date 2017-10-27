var LANGUAGE = $('html').attr('lang'),
    DEFAULT_LANGUAGE = 'uk';

var IS_USER_AUTH = false,
    WISH_W_S,
    CART_W_S;

var IncorrectFieldClass = 'incorrect-field',
    RequiredFieldText = (LANGUAGE == DEFAULT_LANGUAGE) ? 'Обов`язкове поле' : 'Обязательное поле',
    IncorrectFieldText = (LANGUAGE == DEFAULT_LANGUAGE) ? 'Невірно введені дані' : 'Неправильные данные',
    ServerError = (LANGUAGE == DEFAULT_LANGUAGE) ? 'Сталася помилка, спробуйте ще.' : 'Произошла ошибка, попробуйте еще.',
    EmailNotValid = (LANGUAGE == DEFAULT_LANGUAGE) ? 'Користувач з таким e-mail вже існує.' : 'Пользователь c таким e-mail уже существует.',
    EmailConfirmNotValid = (LANGUAGE == DEFAULT_LANGUAGE) ? 'E-mail не підтверджено.' : 'E-mail не подтвержден.',
    EmailNotExists = (LANGUAGE == DEFAULT_LANGUAGE) ? 'Такого e-mail не існує.' : 'Такой e-mail не существует.',
    RegisterSuccess = (LANGUAGE == DEFAULT_LANGUAGE) ? 'Реєстрація пройшла успішно, на вказаний e-mail відправлено лист для підтвердження.' : 'Регистрация прошла успешно, на указанный e-mail отправлено письмо для подтверждения.',
    RestoreSuccess = (LANGUAGE == DEFAULT_LANGUAGE) ? 'На ваш e-mail відправлено лист з паролем для входу.' : 'На ваш e-mail отправлено письмо с паролем для входа.',
    InCart = (LANGUAGE == DEFAULT_LANGUAGE) ? 'В кошику' : 'В корзине',
    AddToCart = (LANGUAGE == DEFAULT_LANGUAGE) ? 'В кошик' : 'В корзину',
    ADD_TO_CART_PRODUCT = (LANGUAGE == DEFAULT_LANGUAGE) ? 'Додати в кошик' : 'Добавить в корзину',
    ORDER_CREATED_MESSAGE = (LANGUAGE == DEFAULT_LANGUAGE) ? 'Замовлення прийнято. Незабаром з вами зв\'яжеться наш менеджер.' : 'Заказ принят. Скоро с вами свяжется наш менеджер.',
    PERSONAL_INFO_SAVED = (LANGUAGE == DEFAULT_LANGUAGE) ? 'Дані збережено.' : 'Данные сохранены.',
    EMAIL_CHANGED_MESSAGE = (LANGUAGE == DEFAULT_LANGUAGE) ? 'Дані збережено. Ви змінили e-mail, Вам відправлено лист для підтвердження нової електронної адреси.' : 'Данные сохранены. Вы изменили e-mail, Вам отправлено письмо для подтверждения нового електронного адреса.',
    PASSWORD_CHANGED_MESSAGE = (LANGUAGE == DEFAULT_LANGUAGE) ? 'Пароль змінено.' : 'Пароль сохранен.',
    WRONG_OLD_PASSWORD = (LANGUAGE == DEFAULT_LANGUAGE) ? 'Неправильний старий пароль.' : 'Неверный старый пароль.',
    IN_WISH = (LANGUAGE == DEFAULT_LANGUAGE) ? 'В обраному' : 'В избранном',
    ADD_TO_WISH = (LANGUAGE == DEFAULT_LANGUAGE) ? 'В обране' : 'В избранное',
    ADD_TO_WISH_PRODUCT = (LANGUAGE == DEFAULT_LANGUAGE) ? 'Додати в обране' : 'Добавить в избранное',
    REVIEW_ADDED = (LANGUAGE == DEFAULT_LANGUAGE) ? 'Дякуємо! Модератор перегляне Ваш відгук, після чого він з`явиться на сайті.' : 'Спасибо! Модератор пересмотрит Ваш отзыв, после чего он появится на сайте.',
    CALL_ORDERED = (LANGUAGE == DEFAULT_LANGUAGE) ? 'Дякуємо! Скоро з Вами зв`яжеться наш менеджер.' : 'Спасибо! Скоро с Вами свяжется наш менеджер.',
    BUY_ONE_CLICK_CREATED = (LANGUAGE == DEFAULT_LANGUAGE) ? 'Дякуємо! Скоро з Вами зв`яжеться наш менеджер.' : 'Спасибо! Скоро с Вами свяжется наш менеджер.',
    PLEASE_RATE_PRODUCT = (LANGUAGE == DEFAULT_LANGUAGE) ? 'Оцініть товар' : 'Оцените товар',
    CONTACT_FORM_SENDED = (LANGUAGE == DEFAULT_LANGUAGE) ? 'Дякуємо! Ваш лист відправлено.' : 'Спасибо! Ваше письмо отправлено.';

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
            success: WISH_W_S.wrap(
                'mainAjax',
                function (data) {
                    if (data.isOrderCreated && data.status == 'success')
                    {
                        showPopup(ORDER_CREATED_MESSAGE);
                    }

                    if (data.isUserAuth && data.status == 'success')
                    {
                        IS_USER_AUTH = data.isUserAuth;
                    }
                }
            ),
            error: WISH_W_S.wrap(
                'mainAjax',
                function (data) {
                    if (data.isOrderCreated && data.status == 'success')
                    {
                        showPopup(ORDER_CREATED_MESSAGE);
                    }

                    if (data.isUserAuth && data.status == 'success')
                    {
                        IS_USER_AUTH = data.isUserAuth;
                    }
                }
            )
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
    new Launch();
    // cart.cartFunctions.initCart();
});

$(window).load(function () {
    // new Launch();
});






//helpers

//REDIRECT TO '/' IF EMPTY CART
function redirectEmptyCart() {
    if (document.URL.indexOf('order') !== -1) {
        window.location.href = buildUrlWithLang('/');
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
        return url += LANGUAGE;
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