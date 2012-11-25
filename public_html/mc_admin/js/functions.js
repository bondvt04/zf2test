/* Функции для контента
------------------------------------------------------------------------------*/

/*
 * Подстраивает размер содержимого под высоту окна
 */
function contentResize() {
    // для мобильных ОС не выполняем
    if(/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
        return;
    }
    
    // высота контента
    contentHeight = $(window).outerHeight()
                  - $('#header').outerHeight() - $('#footer').outerHeight();
    
    // высота меню слева
    sidebarLeftMenuHeight = contentHeight - $('.sidebar_logo').outerHeight();
    
    $('#content').outerHeight(contentHeight);
    $('#sideLeft').outerHeight(contentHeight);
    $('.sidebar_leftmenu_block').css('min-height', sidebarLeftMenuHeight + 'px');
}

/* Функции меню слева
------------------------------------------------------------------------------*/

/*
 * Раскрывает/скрывает все подменю
 */
function leftMenuCloseAll() {
    $('ul.sidebar_leftmenu_submenu').hide();
    $('ul.sidebar_leftmenu li.withsubmenu').removeClass('opened');
}

/*
 * Раскрывает/скрывает все неактивные подменю
 */
function leftMenuCloseNotActive() {
    $.each($('ul.sidebar_leftmenu_submenu'), function() {
        if(0 == $(this).find('li.active').length) {
            $(this).hide();
            $(this).parent('li.withsubmenu').removeClass('opened');
        }
    });
}

/*
 * Раскрывает/скрывает одно подменю
 */
function leftMenuItemToggle() {
    $(this).parent('li.withsubmenu').children('ul').slideToggle('fast');
    $(this).parent('li.withsubmenu').toggleClass('opened');
}

/*
 * Прикрывает правую сторону меню
 */
function leftMenuRightSideHide() {
    // для мобильных ОС не выполняем
    if(/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
        return;
    }

    $('#sideLeft ul.sidebar_leftmenu li.active').prepend(
        '<div class="sidebar_leftmenu_submenu_right_active"></div>'
    );

    $('#sideLeft ul.sidebar_leftmenu li[class!=active]').prepend(
        '<div class="sidebar_leftmenu_submenu_right"></div>'
    );
}

/* Функции для форм
------------------------------------------------------------------------------*/

/*
 * Хак для кнопки в Opera. Позволяет убрать уродскую окантовку.
 * Работает путём отключения border'а у кнопки и обрамления кнопки в div
 * с нужным border'ом
 */
function formSubmitOperaHack() {
    if($.browser.opera){
        $.each($('input[type=submit]'), function() {
            $(this).css('border', 'none');
            $(this).wrap('<div class="button_wrapper">');
        });
    }
}
