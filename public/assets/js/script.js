$(document).ready(function () {
    //Модельное окно с левой стороны КАТАЛОГ
    let $popup_catalog_open = $(".popup_catalog");
    let $popup_catalog_closed = $(".popup_close");

    $popup_catalog_open.on("click", function () {
        $(".popup-menu-catalog").animate(
            {
                left: 0,
            },
            500
        );
    });

    $popup_catalog_closed.on("click", function (e) {
        e.preventDefault();
        $(".popup-menu-catalog").animate(
            {
                left: -450,
            },
            500
        );
    });

    //Модельное окно авторизации
    $(".open-popup-auth").on("click", function () {
        let pupup = $(".pupup");
        pupup.fadeIn(500);
    });

    $(".closed-popup-auth").on("click", function (e) {
        e.preventDefault();
        let pupup = $(".pupup");
        pupup.fadeOut(500);
    });

    //Сообщение о регистрации
    $(".message_register").fadeOut(2000);

    //Добовление товаров в корзину
    let $btn = $(".add-to-cart");
    $btn.on("click", function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr("href"),
            method: "GET",
            success: function (res) {
                let $sticky = $(".sticky-message");
                let message =
                    '<div class="alert alert-dark">' +
                    res["success"] +
                    "</div>";
                $sticky.fadeIn(10).html(message);
                $sticky.fadeOut(2000);

                let $headerCart = $(".header-cart");
                $headerCart.html(res["qty"]);
            },
        });
    });

    //Изменение количества товара в корзине
    $(".change-qty").on("change", function () {
        $(this).closest("form").submit();
    });

    //Маска телефона
    let $phone = $("#phone");
    if ($phone.length > 0) {
        $("#phone").inputmask({ mask: "+7 (999) 999-99-99" });
    }
});
