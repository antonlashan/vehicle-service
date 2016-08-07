jQuery(document).ready(function () {
    console.log(AS);

    jQuery(document).on("keyup", "#service-current_meter", function (event) {
        AS.setNextServiceMeter();
    });

    jQuery('#service-date').parent().on('changeDate', function (ev) {
        AS.setNextServiceDate();
    });

    jQuery(document).on("change", "#service-next_service", function (event) {
        AS.setNextServiceDate();
    });

    jQuery(document).on("change", "#service-engine_oil_id", function (event) {
        AS.setEngineOilPrice();
    });
    
    jQuery(document).on("change", "#service-oil_filter_id", function (event) {
        AS.setOilFilterPrice();
    });
    
    jQuery(document).on("change", "#service-diesel_filter_id", function (event) {
        AS.setDieselFilterPrice();
    });
    
    jQuery(document).on("change", "#service-air_filter_id", function (event) {
        AS.setAirFilterPrice();
    });
    
    jQuery(document).on("change", "#service-gear_oil_id", function (event) {
        AS.setGearOilPrice();
    });
    
    jQuery(document).on("change", "#service-differential_oil_id", function (event) {
        AS.setDifferentialOilPrice();
    });
    
    jQuery(document).on("change", "#service-steering_oil_id", function (event) {
        AS.setSteeringOilPrice();
    });
    
    jQuery(document).on("change", "#service-break_oil_id", function (event) {
        AS.setBreakOilPrice();
    });
    
    jQuery(document).on("change", "#service-coolent_oil_id", function (event) {
        AS.setCoolentOilPrice();
    });

    AS.setNextServiceMeter = function () {
        var val = jQuery("#service-current_meter").val();

        if (val && jQuery.isNumeric(val)) {
            jQuery("#service-next_service_meter").val(parseInt(val) + parseInt(AS.serviceThreshold));
        }
    };

    AS.setNextServiceDate = function () {
        jQuery("#next_service_date").html(AS.addWeeksToDate(jQuery('#service-date').val(), jQuery('#service-next_service').val()));
    };

    AS.setEngineOilPrice = function () {
        var val = parseInt(jQuery("#service-engine_oil_id").val());
        jQuery("#engine_oil_id_price").html(AS.allEquipments[AS.categories.oil_engine][val].price);
    };
    
    AS.setOilFilterPrice = function () {
        var val = parseInt(jQuery("#service-oil_filter_id").val());
        jQuery("#oil_filter_id_price").html(AS.allEquipments[AS.categories.filter_oil][val].price);
    };
    
    AS.setDieselFilterPrice = function () {
        var val = parseInt(jQuery("#service-diesel_filter_id").val());
        jQuery("#diesel_filter_id_price").html(AS.allEquipments[AS.categories.filter_diesel][val].price);
    };
    
    AS.setAirFilterPrice = function () {
        var val = parseInt(jQuery("#service-air_filter_id").val());
        jQuery("#air_filter_id_price").html(AS.allEquipments[AS.categories.filter_air][val].price);
    };
    
    AS.setGearOilPrice = function () {
        var val = parseInt(jQuery("#service-gear_oil_id").val());
        jQuery("#gear_oil_id_price").html(AS.allEquipments[AS.categories.oil_gear][val].price);
    };
    
    AS.setDifferentialOilPrice = function () {
        var val = parseInt(jQuery("#service-differential_oil_id").val());
        jQuery("#differential_oil_id_price").html(AS.allEquipments[AS.categories.oil_differential][val].price);
    };
    
    AS.setSteeringOilPrice = function () {
        var val = parseInt(jQuery("#service-steering_oil_id").val());
        jQuery("#steering_oil_id_price").html(AS.allEquipments[AS.categories.oil_power][val].price);
    };
    
    AS.setBreakOilPrice = function () {
        var val = parseInt(jQuery("#service-break_oil_id").val());
        jQuery("#break_oil_id_price").html(AS.allEquipments[AS.categories.oil_break][val].price);
    };
    
    AS.setCoolentOilPrice = function () {
        var val = parseInt(jQuery("#service-coolent_oil_id").val());
        jQuery("#coolent_oil_id_price").html(AS.allEquipments[AS.categories.oil_coolant][val].price);
    };

    AS.addWeeksToDate = function (date, weeks) {
        if (date && weeks) {

            var dArr = date.split('-');

            var dObj = new Date(dArr[0], dArr[1] - 1, dArr[2]);
            dObj.setDate(dObj.getDate() + parseInt(weeks) * 7);

            return dObj.getFullYear() + "-" + AS.pad((dObj.getMonth() + 1), 2) + "-" + AS.pad(dObj.getDate(), 2);
        } else {
            return null;
        }

    };

    AS.pad = function (number, length) {

        var str = '' + number;
        while (str.length < length) {
            str = '0' + str;
        }

        return str;

    };
});