jQuery(document).on("change", "#type", function (event) {

    jQuery.ajax({
        method: "GET",
        url: AS.urlGetModels,
        data: {typeId: jQuery("#type").val(), makeId: jQuery("#make").val()},
        success: function (data) {
            jQuery("#registration-vehicle_model_id").html(data);
        }
    });
});

jQuery(document).on("change", "#make", function (event) {

    jQuery.ajax({
        method: "GET",
        url: AS.urlGetModels,
        data: {typeId: jQuery("#type").val(), makeId: jQuery("#make").val()},
        success: function (data) {
            jQuery("#registration-vehicle_model_id").html(data);
        }
    });
});