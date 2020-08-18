$(document).ready(function() {
        $(".nav-trigger").click(function() {
            $(".side-nav").toggleClass("visible");
        });
    }),
    $(document).ready(function() {
        $(".menu-icon").on("click", function() {
            $("nav ul").toggleClass("showing");
        });
    }),
    $(document).ready(function() {
        $(".menu-icon").on("click", function() {
            $("nav ul").toggleClass("showing");
        });
    }),
    $(window).on("scroll", function() {
        $(window).scrollTop() ? $("nav").addClass("black") : $("nav").removeClass("black");
    }),
    $(function() {
        $("#whatsapp").mask("55(00)00000-0000");
    });