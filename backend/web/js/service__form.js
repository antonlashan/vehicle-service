jQuery(document).ready(function () {

    var total = 0;

    /** ************ starting user change events *********************** */
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
    jQuery(document).on("change", "#service-no_of_grease_nipples", function (event) {
        AS.setGreaseNippleCharge();
    });
    jQuery(document).on("change", "#service-full_wash", function (event) {
        AS.triggerFullWash();
    });
    jQuery(document).on("change", "#service-body_wash", function (event) {
        AS.setBodyWashCharge();
    });
    jQuery(document).on("change", "#service-vacuume_cleaning", function (event) {
        AS.setVacuumeCleaningCharge();
    });
    jQuery(document).on("change", "#service-under_wash", function (event) {
        AS.setUnderWashCharge();
    });
    jQuery(document).on("change", "#service-engine_wash", function (event) {
        AS.setEngineWashCharge();
    });
    jQuery(document).on("change", "#service-discount", function (event) {
        AS.setDiscount();
    });
    jQuery(document).on("keyup", "#service-service_charge", function (event) {
        AS.setServiceCharge();
    });
    /** ************ end user change events *********************** */


    /** ************ start setters *********************** */
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

        if (val) {
            jQuery("#engine_oil_id_price").html(AS.formatToDecimal(AS.allEquipments[AS.categories.oilEngine][val].price));
            AS.setTotal();
        }
    };

    AS.setOilFilterPrice = function () {
        var val = parseInt(jQuery("#service-oil_filter_id").val());

        if (val) {
            jQuery("#oil_filter_id_price").html(AS.formatToDecimal(AS.allEquipments[AS.categories.filterOil][val].price));
            AS.setTotal();
        }
    };

    AS.setDieselFilterPrice = function () {
        var val = parseInt(jQuery("#service-diesel_filter_id").val());

        if (val) {
            jQuery("#diesel_filter_id_price").html(AS.formatToDecimal(AS.allEquipments[AS.categories.filterDiesel][val].price));
            AS.setTotal();
        }
    };

    AS.setAirFilterPrice = function () {
        var val = parseInt(jQuery("#service-air_filter_id").val());

        if (val) {
            jQuery("#air_filter_id_price").html((AS.allEquipments[AS.categories.filterAir][val].price));
            AS.setTotal();
        }
    };

    AS.setGearOilPrice = function () {
        var val = parseInt(jQuery("#service-gear_oil_id").val());

        if (val) {
            jQuery("#gear_oil_id_price").html(AS.formatToDecimal(AS.allEquipments[AS.categories.oilGear][val].price));
            AS.setTotal();
        }
    };

    AS.setDifferentialOilPrice = function () {
        var val = parseInt(jQuery("#service-differential_oil_id").val());

        if (val) {
            jQuery("#differential_oil_id_price").html(AS.formatToDecimal(AS.allEquipments[AS.categories.oilDifferential][val].price));
            AS.setTotal();
        }
    };

    AS.setSteeringOilPrice = function () {
        var val = parseInt(jQuery("#service-steering_oil_id").val());

        if (val) {
            jQuery("#steering_oil_id_price").html(AS.formatToDecimal(AS.allEquipments[AS.categories.oilPower][val].price));
            AS.setTotal();
        }
    };

    AS.setBreakOilPrice = function () {
        var val = parseInt(jQuery("#service-break_oil_id").val());

        if (val) {
            jQuery("#break_oil_id_price").html(AS.formatToDecimal(AS.allEquipments[AS.categories.oilBreak][val].price));
            AS.setTotal();
        }
    };

    AS.setCoolentOilPrice = function () {
        var val = parseInt(jQuery("#service-coolent_oil_id").val());

        if (val) {
            jQuery("#coolent_oil_id_price").html(AS.formatToDecimal(AS.allEquipments[AS.categories.oilCoolant][val].price));
            AS.setTotal();
        }
    };

    AS.setGreaseNippleCharge = function () {
        var val = parseInt(jQuery("#service-no_of_grease_nipples").val());

//        if (val) {
            jQuery("#no_of_grease_nipples_price").html(AS.formatToDecimal(val * parseFloat(AS.globalCharges[AS.globalChargeTypes.typeGreasePerNipple])));
            AS.setTotal();
//        }
    };

    AS.triggerFullWash = function () {
        if (jQuery("#service-full_wash").is(':checked')) {
            jQuery("#full_wash_price").html(AS.formatToDecimal(AS.globalCharges[AS.globalChargeTypes.typeFullWashCharge]));
            AS.disableWashCategories();
        } else {
            jQuery("#full_wash_price").empty();
            AS.enableWashCategories();
        }

        AS.setBodyWashCharge();
        AS.setVacuumeCleaningCharge();
        AS.setUnderWashCharge();
        AS.setEngineWashCharge();

        AS.setTotal();
    };

    AS.setBodyWashCharge = function () {
        if (jQuery("#service-body_wash").is(':checked:not(:disabled)')) {
            jQuery("#body_wash_price").html(AS.formatToDecimal(AS.globalCharges[AS.globalChargeTypes.typeBodyWash]));
        } else {
            jQuery("#body_wash_price").empty();
        }

        AS.setDiscount();
        AS.setTotal();
    };

    AS.setVacuumeCleaningCharge = function () {
        if (jQuery("#service-vacuume_cleaning").is(':checked:not(:disabled)')) {
            jQuery("#vacuume_cleaning_price").html(AS.formatToDecimal(AS.globalCharges[AS.globalChargeTypes.typeVacuumeCleaning]));
        } else {
            jQuery("#vacuume_cleaning_price").empty();
        }

        AS.setDiscount();
        AS.setTotal();
    };

    AS.setUnderWashCharge = function () {
        if (jQuery("#service-under_wash").is(':checked:not(:disabled)')) {
            jQuery("#under_wash_price").html(AS.formatToDecimal(AS.globalCharges[AS.globalChargeTypes.typeUnderWash]));
        } else {
            jQuery("#under_wash_price").empty();
        }

        AS.setDiscount();
        AS.setTotal();
    };

    AS.setEngineWashCharge = function () {
        if (jQuery("#service-engine_wash").is(':checked:not(:disabled)')) {
            jQuery("#engine_wash_price").html(AS.formatToDecimal(AS.globalCharges[AS.globalChargeTypes.typeEngineWash]));
        } else {
            jQuery("#engine_wash_price").empty();
        }

        AS.setDiscount();
        AS.setTotal();
    };

    AS.setDiscount = function () {
        jQuery("#discount_price").html("-" + AS.formatToDecimal(AS.getDiscount()));
        jQuery("#service-discount_amount").val(AS.getDiscount());
        AS.setTotal();
    };

    AS.setServiceCharge = function () {
        AS.setTotal();
    };
    /** ************ end setters *********************** */

    AS.enableWashCategories = function () {
        jQuery("#service-body_wash, #service-vacuume_cleaning, #service-under_wash, #service-engine_wash").removeAttr("disabled");
//        jQuery("#service-body_wash, #service-vacuume_cleaning, #service-under_wash, #service-engine_wash").prop('checked', false);
    };
    AS.disableWashCategories = function () {
        jQuery("#service-body_wash, #service-vacuume_cleaning, #service-under_wash, #service-engine_wash").prop('checked', true);
        jQuery("#service-body_wash, #service-vacuume_cleaning, #service-under_wash, #service-engine_wash").attr("disabled", true);
    };

    AS.getDiscount = function () {
        var val = parseInt(jQuery("#service-discount").val());

        return parseInt(val) * AS.getWashCharges() / 100;
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

    AS.setTotal = function () {
        total = 0;
        if (jQuery("#service-engine_oil_id").val()) {
            total += parseFloat(AS.allEquipments[AS.categories.oilEngine][parseInt(jQuery("#service-engine_oil_id").val())].price);
        }
        if (jQuery("#service-oil_filter_id").val()) {
            total += parseFloat(AS.allEquipments[AS.categories.filterOil][parseInt(jQuery("#service-oil_filter_id").val())].price);
        }
        if (jQuery("#service-diesel_filter_id").val()) {
            total += parseFloat(AS.allEquipments[AS.categories.filterDiesel][parseInt(jQuery("#service-diesel_filter_id").val())].price);
        }
        if (jQuery("#service-air_filter_id").val()) {
            total += parseFloat(AS.allEquipments[AS.categories.filterAir][parseInt(jQuery("#service-air_filter_id").val())].price);
        }
        if (jQuery("#service-gear_oil_id").val()) {
            total += parseFloat(AS.allEquipments[AS.categories.oilGear][parseInt(jQuery("#service-gear_oil_id").val())].price);
        }
        if (jQuery("#service-differential_oil_id").val()) {
            total += parseFloat(AS.allEquipments[AS.categories.oilDifferential][parseInt(jQuery("#service-differential_oil_id").val())].price);
        }
        if (jQuery("#service-steering_oil_id").val()) {
            total += parseFloat(AS.allEquipments[AS.categories.oilPower][parseInt(jQuery("#service-steering_oil_id").val())].price);
        }
        if (jQuery("#service-break_oil_id").val()) {
            total += parseFloat(AS.allEquipments[AS.categories.oilBreak][parseInt(jQuery("#service-break_oil_id").val())].price);
        }
        if (jQuery("#service-coolent_oil_id").val()) {
            total += parseFloat(AS.allEquipments[AS.categories.oilCoolant][parseInt(jQuery("#service-coolent_oil_id").val())].price);
        }
//        if (jQuery("#service-no_of_grease_nipples").val()) {
            total += parseFloat(parseInt(jQuery("#service-no_of_grease_nipples").val()) * parseFloat(AS.globalCharges[AS.globalChargeTypes.typeGreasePerNipple]));
//        }
        if (jQuery("#service-service_charge").val()) {
            total += parseFloat(jQuery("#service-service_charge").val());
        }
        total += AS.getWashCharges();
        total -= AS.getDiscount();

        jQuery("#service-total").val(AS.formatToDecimal(total));
    };

    AS.getWashCharges = function () {
        var subTotal = 0;

        if (jQuery("#service-full_wash").is(':checked')) {
            subTotal += parseFloat(parseFloat(AS.globalCharges[AS.globalChargeTypes.typeFullWashCharge]));
        }
        if (jQuery("#service-body_wash").is(':checked:not(:disabled)')) {
            subTotal += parseFloat(parseFloat(AS.globalCharges[AS.globalChargeTypes.typeBodyWash]));
        }
        if (jQuery("#service-vacuume_cleaning").is(':checked:not(:disabled)')) {
            subTotal += parseFloat(parseFloat(AS.globalCharges[AS.globalChargeTypes.typeVacuumeCleaning]));
        }
        if (jQuery("#service-under_wash").is(':checked:not(:disabled)')) {
            subTotal += parseFloat(parseFloat(AS.globalCharges[AS.globalChargeTypes.typeUnderWash]));
        }
        if (jQuery("#service-engine_wash").is(':checked:not(:disabled)')) {
            subTotal += parseFloat(parseFloat(AS.globalCharges[AS.globalChargeTypes.typeEngineWash]));
        }

        return subTotal;
    }

    AS.init = function () {
        AS.setNextServiceMeter();
        AS.setNextServiceDate();
        AS.setEngineOilPrice();
        AS.setOilFilterPrice();
        AS.setDieselFilterPrice();
        AS.setAirFilterPrice();
        AS.setGearOilPrice();
        AS.setDifferentialOilPrice();
        AS.setSteeringOilPrice();
        AS.setBreakOilPrice();
        AS.setCoolentOilPrice();
        AS.setGreaseNippleCharge();
        AS.triggerFullWash();
        AS.setBodyWashCharge();
        AS.setVacuumeCleaningCharge();
        AS.setUnderWashCharge();
        AS.setEngineWashCharge();
        AS.setServiceCharge();
    };

    AS.pad = function (number, length) {

        var str = '' + number;
        while (str.length < length) {
            str = '0' + str;
        }

        return str;

    };

    AS.formatToDecimal = function (val) {
        return parseFloat(val).toFixed(2);
    }

    //initial all existing values/charges
    AS.init();
});