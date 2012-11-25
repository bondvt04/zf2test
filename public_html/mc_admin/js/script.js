/* JS для основного шаблона
------------------------------------------------------------------------------*/

$(window).load(function() {
    formSubmitOperaHack();
    
    leftMenuRightSideHide()
    
    contentResize();
    
    leftMenuCloseNotActive();
    
    $('ul.sidebar_leftmenu li.withsubmenu a').click(leftMenuItemToggle);
});

$(window).resize(function() {
    contentResize();
});
