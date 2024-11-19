/*  ---------------------------------------------------
    Template Name: Male Fashion
    Description: Male Fashion - ecommerce teplate
    Author: Colorib
    Author URI: https://www.colorib.com/
    Version: 1.0
    Created: Colorib
---------------------------------------------------------  */

"use strict";

(function ($) {
    /*------------------
        Preloader
    --------------------*/
    $(window).on("load", function () {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");

        /*------------------
            Gallery filter
        --------------------*/
        $(".filter__controls li").on("click", function () {
            $(".filter__controls li").removeClass("active");
            $(this).addClass("active");
        });
        if ($(".product__filter").length > 0) {
            var containerEl = document.querySelector(".product__filter");
            var mixer = mixitup(containerEl);
        }
    });

    /*------------------
        Background Set
    --------------------*/
    $(".set-bg").each(function () {
        var bg = $(this).data("setbg");
        $(this).css("background-image", "url(" + bg + ")");
    });

    //Search Switch
    $(".search-switch").on("click", function () {
        $(".search-model").fadeIn(400);
    });

    $(".search-close-switch").on("click", function () {
        $(".search-model").fadeOut(400, function () {
            $("#search-input").val("");
        });
    });

    /*------------------
		Navigation
	--------------------*/
    $(".mobile-menu").slicknav({
        prependTo: "#mobile-menu-wrap",
        allowParentLinks: true,
    });

    /*------------------
        Accordin Active
    --------------------*/
    $(".collapse").on("shown.bs.collapse", function () {
        $(this).prev().addClass("active");
    });

    $(".collapse").on("hidden.bs.collapse", function () {
        $(this).prev().removeClass("active");
    });

    //Canvas Menu
    $(".canvas__open").on("click", function () {
        $(".offcanvas-menu-wrapper").addClass("active");
        $(".offcanvas-menu-overlay").addClass("active");
    });

    $(".offcanvas-menu-overlay").on("click", function () {
        $(".offcanvas-menu-wrapper").removeClass("active");
        $(".offcanvas-menu-overlay").removeClass("active");
    });

    /*-----------------------
        Hero Slider
    ------------------------*/
    $(".hero__slider").owlCarousel({
        loop: true,
        margin: 0,
        items: 1,
        dots: false,
        animateOut: "fadeOut",
        animateIn: "fadeIn",
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
    });

    /*--------------------------
        Select
    ----------------------------*/
    $("select").niceSelect();

    /*-------------------
		Radio Btn
	--------------------- */
    $(
        ".product__color__select label, .shop__sidebar__size label, .product__details__option__size label"
    ).on("click", function () {
        $(
            ".product__color__select label, .shop__sidebar__size label, .product__details__option__size label"
        ).removeClass("active");
        $(this).addClass("active");
    });

    /*-------------------
		Scroll
	--------------------- */
    $(".nice-scroll").niceScroll({
        cursorcolor: "#0d0d0d",
        cursorwidth: "5px",
        background: "#e5e5e5",
        cursorborder: "",
        autohidemode: true,
        horizrailenabled: false,
    });

    /*------------------
        CountDown
    --------------------*/
    // For demo preview start
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, "0");
    var mm = String(today.getMonth() + 1).padStart(2, "0"); //January is 0!
    var yyyy = today.getFullYear();

    if (mm == 12) {
        mm = "01";
        yyyy = yyyy + 1;
    } else {
        mm = parseInt(mm) + 1;
        mm = String(mm).padStart(2, "0");
    }
    var timerdate = mm + "/" + dd + "/" + yyyy;
    // For demo preview end

    // Uncomment below and use your date //

    /* var timerdate = "2020/12/30" */

    $("#countdown").countdown(timerdate, function (event) {
        $(this).html(
            event.strftime(
                "<div class='cd-item'><span>%D</span> <p>Days</p> </div>" +
                    "<div class='cd-item'><span>%H</span> <p>Hours</p> </div>" +
                    "<div class='cd-item'><span>%M</span> <p>Minutes</p> </div>" +
                    "<div class='cd-item'><span>%S</span> <p>Seconds</p> </div>"
            )
        );
    });

    /*------------------
		Magnific
	--------------------*/
    $(".video-popup").magnificPopup({
        type: "iframe",
    });

    /*-------------------
		Quantity change
	--------------------- */
    // Xử lý cho .pro-qty
    var proQty = $(".pro-qty");
    proQty.prepend('<span class="fa fa-angle-down inc qtybtn"></span>'); // Mũi tên lên tăng
    proQty.append('<span class="fa fa-angle-up dec qtybtn"></span>'); // Mũi tên xuống giảm
    proQty.on("click", ".qtybtn", function () {
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();
        if ($button.hasClass("dec")) {
            // Tăng số lượng
            var newVal = parseFloat(oldValue) + 1;
        } else if ($button.hasClass("inc")) {
            // Giảm số lượng, không giảm xuống dưới 0
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find("input").val(newVal);
    });

    // Xử lý cho .pro-qty-2
    var proQty2 = $(".pro-qty-2");
    proQty2.prepend('<span class="fa fa-angle-left dec qtybtn"></span>'); // Mũi tên trái giảm
    proQty2.append('<span class="fa fa-angle-right inc qtybtn"></span>'); // Mũi tên phải tăng
    proQty2.on("click", ".qtybtn", function () {
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();
        if ($button.hasClass("inc")) {
            // Tăng số lượng
            var newVal = parseFloat(oldValue) + 1;
        } else if ($button.hasClass("dec")) {
            // Giảm số lượng, không giảm xuống dưới 0
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find("input").val(newVal);
    });

    /*------------------
        Achieve Counter
    --------------------*/
    $(".cn_num").each(function () {
        $(this)
            .prop("Counter", 0)
            .animate(
                {
                    Counter: $(this).text(),
                },
                {
                    duration: 4000,
                    easing: "swing",
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    },
                }
            );
    });

    const togglePassword = document.getElementById("togglePassword");
    const passwordField = document.getElementById("password");

    togglePassword.classList.add("fa-eye-slash");

    togglePassword.addEventListener("click", function () {
        const type =
            passwordField.getAttribute("type") === "password"
                ? "text"
                : "password";
        passwordField.setAttribute("type", type);

        if (type === "password") {
            this.classList.remove("fa-eye");
            this.classList.add("fa-eye-slash");
        } else {
            this.classList.remove("fa-eye-slash");
            this.classList.add("fa-eye");
        }
    });

    document.addEventListener("DOMContentLoaded", function () {
        const togglePassword = document.getElementById("passwordXN");
        const passwordField = document.getElementById("password-xn");

        // Đảm bảo mắt bị gạch hiển thị khi trang tải
        togglePassword.classList.add("fa-eye-slash"); // Mắt gạch ban đầu

        togglePassword.addEventListener("click", function () {
            // Kiểm tra loại input hiện tại và chuyển đổi giữa 'password' và 'text'
            const type =
                passwordField.getAttribute("type") === "password"
                    ? "text"
                    : "password";
            passwordField.setAttribute("type", type);

            // Thay đổi icon giữa 'fa-eye' và 'fa-eye-slash'
            if (type === "password") {
                this.classList.remove("fa-eye");
                this.classList.add("fa-eye-slash");
            } else {
                this.classList.remove("fa-eye-slash");
                this.classList.add("fa-eye");
            }
        });
    });
})(jQuery);
