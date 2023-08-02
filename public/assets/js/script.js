$(document).ready(function (){
    //Модельное окно с левой стороны КАТАЛОГ
    let $popup_catalog_open = $(".popup_catalog")
    let $popup_catalog_closed = $(".popup_close")

    $popup_catalog_open.on("click", function (){
        $(".popup-menu-catalog").animate({
            left: 0,
        },500);
    })

    $popup_catalog_closed.on("click", function (e){
        e.preventDefault();
        $(".popup-menu-catalog").animate({
            left: -450,
        },500);
    })

    //Модельное окно авторизации
    $('.open-popup-auth').on('click', function(){
        let pupup = $('.pupup');
        pupup.fadeIn(500);
    })

    $('.closed-popup-auth').on('click', function(e){
        e.preventDefault();
        let pupup = $('.pupup');
        pupup.fadeOut(500);
    })
    
    //Сообщение о регистрации
    $(".message_register").fadeOut(2000);
})
