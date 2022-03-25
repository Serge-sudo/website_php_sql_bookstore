$(document).ready(function() {

    $(".image").click(function() {

        var img = $(this);

        var src = img.attr('src');

        $("body").append("<div class='popup'>" +

            "<div class='popup_bg'></div>" +

            "<img src='" + src + "' class='popup_img' />" +

            "</div>");

        $(".popup").fadeIn(1000);

        $(".popup_img,.popup_bg").click(function() {

            $(".popup").fadeOut(1000);
            setTimeout(function() {

                $(".popup").remove();

            }, 800);

        });

    });


});
