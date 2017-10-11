/**
 * Created by yanchuk on 10.10.2017.
 */

/* left slide bar */

function openNav(e) {
    // $('body').css('overflow', 'hidden').animate(300);
    $('.nav-bg').fadeIn(300);


    $('#mySidenav').animate({
        marginLeft: '0px'
    }, 250, 'swing');

    // $('body').animate({
    //     marginLeft: "290px"
    // }, 250, 'swing');

}

function closeNav(e) {
    // $('body').css('overflow', 'auto');
    $('.nav-bg').fadeOut(300);
    ;
    $('#mySidenav').animate({
        marginLeft: '-290px'
    }, 250, 'swing');
    // $('body').animate({
    //     marginLeft: "0px"
    // }, 250, 'swing');
}

$(document).ready(function () {
    var menuOpenLink = '[data-menu-open-link]',
        menuCloseLink = '[data-menu-close-link]',
        isMenuOpened = false;

    $('body').on('click', menuOpenLink, function (e) {
        e.stopPropagation();
        openNav(e);

        isMenuOpened = true;
    });

    $('body').on('click', menuCloseLink, function (e) {
        e.stopPropagation();
        closeNav(e);

        isMenuOpened = false;
    });

    $(document).on('click', 'body', function (e) {
        var $target = $(e.target);

        if (isMenuOpened &&
            ($target.attr('id') != 'mySidenav' &&
            $target.closest('#mySidenav').length === 0)) {

            closeNav(e);

            isMenuOpened = false;
        }
    });
});

/* left slide bar END */


/* DROPDOWN - BLOCK */
$( ".dropdown-div-btn" ).click(function() {
    var i = $(this).find('i');
    var display =  $(this).parent().next().css('display');

    switch (display){
        case 'none': {
            i.removeClass('fa-caret-down').addClass('fa-caret-up')
            // $(this).css('borderBottom', '1px solid #ccc')
            break;
        }
        case 'block': {
            i.removeClass('fa-caret-up').addClass('fa-caret-down')
            // $(this).css('borderBottom', '1px solid #ccc')
            break
        }
        default: {
            break
        }
    }
    $(this).parent().next().stop().slideToggle(300);
});
/* DROPDOWN - BLOCK END*/


/* DROPDOWN - BLOCK  SECOND*/
$( ".dropdown-div-btn-second" ).click(function() {
    var i = $(this).find('i');
    var display =  $(this).parent().next().css('display');

    switch (display){
        case 'none': {
            i.removeClass('fa-plus').addClass('fa-minus')
            // $(this).css('borderBottom', '1px solid #ccc')
            break;
        }
        case 'block': {
            i.removeClass('fa-minus').addClass('fa-plus')
            // $(this).css('borderBottom', '1px solid #ccc')
            break
        }
        default: {
            break
        }
    }
    $(this).parent().next().stop().slideToggle(300);
});
/* DROPDOWN - BLOCK END*/