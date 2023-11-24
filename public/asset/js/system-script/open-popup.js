$(document).ready(function () {
    var prevClass = '';
    $(".lion_pop_btn").click(async function () {
        let lionpid = $(this).attr("lion-pop-id");
        let id = $(this).attr('id');

        if ($("#" + lionpid).hasClass('active') && $("#" + lionpid).hasClass(id)) {
            $(".lion_popup_wrrpr").removeClass("active");
            $("#" + lionpid).removeClass(id);
            $("#wrapper").removeClass("full_height");
            $(".main-content-wrapper").show();
        } else {
            await $(".lion_popup_wrrpr").removeClass("active");
            $(".lion_popup_wrrpr").removeClass(prevClass);
            $("#wrapper").addClass("full_height");
            $("#" + lionpid).addClass("active");
            $("#" + lionpid).addClass(id);
            prevClass = id;
            $(".main-content-wrapper").hide();
        }
    });
});
$(document).ready(function () {
    $(".lion_pop_close").click(function () {
        $(".lion_popup_wrrpr").removeClass("active");
        $("#wrapper").removeClass("full_height");
    });
});