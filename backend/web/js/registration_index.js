jQuery(document).on("change", "#make", function (event) {
    
    jQuery.ajax({
        method: "GET",
        url: AS.urlGetModels,
        data: { id: jQuery(this).val() },
        success: function(data) {
            jQuery("#registration-vehicle_model_id").html(data);
        }
    });
});