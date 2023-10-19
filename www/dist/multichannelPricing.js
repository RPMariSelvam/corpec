$(document).ready(function () {
    let appConfigs = new AppConfigs;

    $('.main-table').clone(true).appendTo('#table-scroll').addClass('clone');
    $('.add_on-table').clone(true).appendTo('#add_on_table-scroll').addClass('clone');

    initPlansBlockSticky();

    $('.pricing-label-monthly').css('color', '#898989');
    $('#yearly_monthly_switch').on('change', function () {
        var checkBoxes = $('#yearly_monthly_switch');
        $(this).prop('checked', !checkBoxes.prop('checked'));
        checkBoxes.prop('checked', !checkBoxes.prop('checked'));

        if ($('#yearly_monthly_switch').prop('checked')) {
            $('.monthlyPlanInput').show();
            $('.yearlyPlanInput').hide();
            $('.price-value-monthly').show();
            $('.price-value-yearly').hide();
            $(this).addClass('pricebutton_act');
            $('.pricing-label-monthly').css('color', '#c02434');
            $('.pricing-label-Annually').css('color', '#898989');
        } else {
            $('.monthlyPlanInput').hide();
            $('.yearlyPlanInput').show();
            $('.price-value-yearly').show();
            $('.price-value-monthly').hide();
            $(this).addClass('pricebutton_act');
            $('.pricing-label-Annually').css('color', '#c02434');
            $('.pricing-label-monthly').css('color', '#898989');
        }
        sessionStorage.setItem('plan_id', $('input#plan_id').val())
    });

    $('.orders-item a').click(function () {
        $('#multichannel_pricing_table li.salesOrderPlan').hide();
        var thistxt = $(this).text();
        $($(this).data('tier')).show();
        $('.orders-item').removeClass('active');
        $('.asalta-black span').text(thistxt);
        $('.sales-orders .dropdown-menu').hide();
        $(this).addClass('active');
        sessionStorage.setItem('selectedTier', $(this).data('tier'))
        return false;
    });

    $(document).on('mouseover', '.sales-orders .dropdown', function () {
        $('.sales-orders .dropdown-menu').show();
    });
    $(document).on('mousehide', '.sales-orders .dropdown', function () {
        $('.sales-orders .dropdown-menu').hide();
    });

    $(document).on('click', '.panel-heading a', function (e) {
        var closeclass = $(this).closest('.panel-heading');
        var liToShow = $(this).attr('href');
        var itemclass = liToShow.replace('#', '.');
        var itemclassname = liToShow.replace('#', '');

        if (closeclass.find('input').prop('checked')) {
            if ($(liToShow).hasClass(itemclassname)) {
                $(itemclass).show();
            }
        } else {
            if ($(liToShow).hasClass(itemclassname)) {
                $(itemclass).hide();
            }
        }
    });

    $(document).on('click', '.subPackageheading a', function (e) {
        var closeclass = $(this).closest('.subPackageheading');
        var liToShow = $(this).attr('href');
        var itemclass = liToShow.replace('#', '.');

        if (closeclass.find('input.subPackage').prop('checked')) {
            if ($('.subPackageheading a.sublink').hasClass('collapsed')) {
                $('.subPackageheading a.sublink').removeClass('collapsed');
                $(itemclass).addClass('in');
            } else {
                $('.subPackageheading a.sublink').addClass('collapsed');
                $(itemclass).removeClass('in');
            }
        } else {
            if ($('.subPackageheading a.sublink').hasClass('collapsed')) {
                $('.subPackageheading a.sublink').removeClass('collapsed');
                $(itemclass).addClass('in');
            } else {
                $('.subPackageheading a.sublink').addClass('collapsed');
                $(itemclass).removeClass('in');
            }

        }
    });

    $('#multichannel_pricing_table li.salesOrderPlan:nth-child(2)').hide();
    $('#multichannel_pricing_table li.salesOrderPlan:nth-child(3)').hide();

    var inventoryEnabledDisabledSwitch = document.querySelector('#inventory_enabled_disabled_switch');
    if (inventoryEnabledDisabledSwitch != null) {
        inventoryEnabledDisabledSwitch.onchange = function () {
            if (inventoryEnabledDisabledSwitch.checked == '0') {
                $(this).prop('checked', true);
            }
        }
    }

    /* ecommerceItems Starts */

    $('.inven_pricing_table_div .ecommerceItem').on('change', function () {

        var checkBoxes = $('.inven_pricing_table_div .ecommerceItem');
        $(this).prop('checked', !checkBoxes.prop('checked'));
        checkBoxes.prop('checked', !checkBoxes.prop('checked'));
        var closeclass = $(this).closest('.panel-heading');
        closeclass.find('a').trigger('click');
        if ($('.inven_pricing_table_div .ecommerceItem').prop('checked')) {
            $('.inven_pricing_table_div .ecommerceItem').next('.slider').addClass('active');
            closeclass = $(this).closest('.panel');
            closeclass.find('.subPackage_ecommerce_small').trigger('click');
            planEnabledDisabledFunction();
        } else {
            $('.pricingContent .ecommerceItem').next('.slider').removeClass('active');
            closeclass = $(this).closest('.panel');
            if (closeclass.find('.subPackage_ecommerce_small').is(':checked')) {
                closeclass.find('.subPackage_ecommerce_small').trigger('click');
            }
            if (closeclass.find('.subPackage_ecommerce_medium').is(':checked')) {
                closeclass.find('.subPackage_ecommerce_medium').trigger('click');
            }
            if (closeclass.find('.subPackage_ecommerce_large').is(':checked')) {
                closeclass.find('.subPackage_ecommerce_large').trigger('click');
            }
            planEnabledDisabledFunction();
        }
    });

    $('.inven_pricing_table_div .multichannel.subPackage_ecommerce_small').on('change', function () {
        var subPackName = $(this).data('subpackagename');
        var closeclass = $(this).closest('.FeaturesContent');
        var checkBoxes = $('.inven_pricing_table_div .multichannel.subPackage_ecommerce_small');
        $(this).prop('checked', !checkBoxes.prop('checked'));
        checkBoxes.prop('checked', !checkBoxes.prop('checked'));

        var closesubclass = $(this).closest('.subPackageheading');
        closesubclass.find('a.sublink').trigger('click');

        if ($('.inven_pricing_table_div .multichannel.subPackage_ecommerce_small').prop('checked')) {
            $('.inven_pricing_table_div .multichannel.subPackage_ecommerce_small').next('.slider').addClass('active');

            if (subPackName == 'Small') {
                if (closeclass.find('.subPackage_ecommerce_medium').is(':checked')) {
                    closeclass.find('.subPackage_ecommerce_medium').trigger('click');
                }
                if (closeclass.find('.subPackage_ecommerce_large').is(':checked')) {
                    closeclass.find('.subPackage_ecommerce_large').trigger('click');
                }
            }

            planEnabledDisabledFunction();
        } else {
            $('.pricingContent .subPackage_ecommerce_small').next('.slider').removeClass('active');
            planEnabledDisabledFunction();
        }
    });

    $('.inven_pricing_table_div .multichannel.subPackage_ecommerce_medium').on('change', function () {
        var subPackName = $(this).data('subpackagename');
        var closeclass = $(this).closest('.FeaturesContent');
        var checkBoxes = $('.inven_pricing_table_div .multichannel.subPackage_ecommerce_medium');
        $(this).prop('checked', !checkBoxes.prop('checked'));
        checkBoxes.prop('checked', !checkBoxes.prop('checked'));

        var closesubclass = $(this).closest('.subPackageheading');
        closesubclass.find('a.sublink').trigger('click');

        if ($('.inven_pricing_table_div .multichannel.subPackage_ecommerce_medium').prop('checked')) {
            $('.inven_pricing_table_div .multichannel.subPackage_ecommerce_medium').next('.slider').addClass('active');

            if (subPackName == 'Medium') {
                if (closeclass.find('.subPackage_ecommerce_large').is(':checked')) {
                    closeclass.find('.subPackage_ecommerce_large').trigger('click');
                }
                if (closeclass.find('.subPackage_ecommerce_small').is(':checked')) {
                    closeclass.find('.subPackage_ecommerce_small').trigger('click');
                }
            }
            planEnabledDisabledFunction();
        } else {
            $('.pricingContent .subPackage_ecommerce_medium').next('.slider').removeClass('active');
            planEnabledDisabledFunction();
        }
    });

    $('.inven_pricing_table_div .multichannel.subPackage_ecommerce_large').on('change', function () {
        var subPackName = $(this).data('subpackagename');
        var closeclass = $(this).closest('.FeaturesContent');
        var checkBoxes = $('.inven_pricing_table_div .multichannel.subPackage_ecommerce_large');
        $(this).prop('checked', !checkBoxes.prop('checked'));
        checkBoxes.prop('checked', !checkBoxes.prop('checked'));

        var closesubclass = $(this).closest('.subPackageheading');
        closesubclass.find('a.sublink').trigger('click');

        if ($('.inven_pricing_table_div .multichannel.subPackage_ecommerce_large').prop('checked')) {
            $('.inven_pricing_table_div .multichannel.subPackage_ecommerce_large').next('.slider').addClass('active');

            if (subPackName == 'Large') {
                if (closeclass.find('.subPackage_ecommerce_medium').is(':checked')) {
                    closeclass.find('.subPackage_ecommerce_medium').trigger('click');
                }
                if (closeclass.find('.subPackage_ecommerce_small').is(':checked')) {
                    closeclass.find('.subPackage_ecommerce_small').trigger('click');
                }
            }
            planEnabledDisabledFunction();
        } else {
            $('.pricingContent .subPackage_ecommerce_large').next('.slider').removeClass('active');
            planEnabledDisabledFunction();
        }
    });

    /* ecommerceItems Ends */

    /* wholesaleItems Starts */

    $('.inven_pricing_table_div .wholesaleItem').on('change', function () {

        var checkBoxes = $('.inven_pricing_table_div .wholesaleItem');
        $(this).prop('checked', !checkBoxes.prop('checked'));
        checkBoxes.prop('checked', !checkBoxes.prop('checked'));
        var closeclass = $(this).closest('.panel-heading');
        closeclass.find('a').trigger('click');
        if ($('.inven_pricing_table_div .wholesaleItem').prop('checked')) {
            $('.inven_pricing_table_div .wholesaleItem').next('.slider').addClass('active');
            planEnabledDisabledFunction();
        } else {
            $('.pricingContent .wholesaleItem').next('.slider').removeClass('active');
            planEnabledDisabledFunction();
        }
    });

    /* wholesaleItems Ends */

    /* posItems Starts */

    $('.inven_pricing_table_div .posItem').on('change', function () {

        var checkBoxes = $('.inven_pricing_table_div .posItem');
        $(this).prop('checked', !checkBoxes.prop('checked'));
        checkBoxes.prop('checked', !checkBoxes.prop('checked'));
        var closeclass = $(this).closest('.panel-heading');
        closeclass.find('a').trigger('click');
        if ($('.inven_pricing_table_div .posItem').prop('checked')) {
            $('.inven_pricing_table_div .posItem').next('.slider').addClass('active');
            closeclass = $(this).closest('.panel');
            closeclass.find('.subPackage_pos_small').trigger('click');
            planEnabledDisabledFunction();
        } else {
            $('.pricingContent .posItem').next('.slider').removeClass('active');
            closeclass = $(this).closest('.panel');
            if (closeclass.find('.subPackage_pos_small').is(':checked')) {
                closeclass.find('.subPackage_pos_small').trigger('click');
            }
            if (closeclass.find('.subPackage_pos_medium').is(':checked')) {
                closeclass.find('.subPackage_pos_medium').trigger('click');
            }
            if (closeclass.find('.subPackage_pos_large').is(':checked')) {
                closeclass.find('.subPackage_pos_large').trigger('click');
            }
            planEnabledDisabledFunction();
        }
    });

    $('.inven_pricing_table_div .multichannel.subPackage_pos_small').on('change', function () {
        var subPackName = $(this).data('subpackagename');
        var closeclass = $(this).closest('.FeaturesContent');
        var checkBoxes = $('.inven_pricing_table_div .multichannel.subPackage_pos_small');
        $(this).prop('checked', !checkBoxes.prop('checked'));
        checkBoxes.prop('checked', !checkBoxes.prop('checked'));

        var closesubclass = $(this).closest('.subPackageheading');
        closesubclass.find('a.sublink').trigger('click');

        if ($('.inven_pricing_table_div .multichannel.subPackage_pos_small').prop('checked')) {
            $('.inven_pricing_table_div .multichannel.subPackage_pos_small').next('.slider').addClass('active');

            if (subPackName == 'Small') {
                if (closeclass.find('.subPackage_pos_medium').is(':checked')) {
                    closeclass.find('.subPackage_pos_medium').trigger('click');
                }
                if (closeclass.find('.subPackage_pos_large').is(':checked')) {
                    closeclass.find('.subPackage_pos_large').trigger('click');
                }
            }

            planEnabledDisabledFunction();
        } else {
            $('.pricingContent .subPackage_pos_small').next('.slider').removeClass('active');
            planEnabledDisabledFunction();
        }
    });

    $('.inven_pricing_table_div .multichannel.subPackage_pos_medium').on('change', function () {
        var subPackName = $(this).data('subpackagename');
        var closeclass = $(this).closest('.FeaturesContent');
        var checkBoxes = $('.inven_pricing_table_div .multichannel.subPackage_pos_medium');
        $(this).prop('checked', !checkBoxes.prop('checked'));
        checkBoxes.prop('checked', !checkBoxes.prop('checked'));

        var closesubclass = $(this).closest('.subPackageheading');
        closesubclass.find('a.sublink').trigger('click');

        if ($('.inven_pricing_table_div .multichannel.subPackage_pos_medium').prop('checked')) {
            $('.inven_pricing_table_div .multichannel.subPackage_pos_medium').next('.slider').addClass('active');

            if (subPackName == 'Medium') {
                if (closeclass.find('.subPackage_pos_large').is(':checked')) {
                    closeclass.find('.subPackage_pos_large').trigger('click');
                }
                if (closeclass.find('.subPackage_pos_small').is(':checked')) {
                    closeclass.find('.subPackage_pos_small').trigger('click');
                }
            }
            planEnabledDisabledFunction();
        } else {
            $('.pricingContent .subPackage_pos_medium').next('.slider').removeClass('active');
            planEnabledDisabledFunction();
        }
    });

    $('.inven_pricing_table_div .multichannel.subPackage_pos_large').on('change', function () {
        var subPackName = $(this).data('subpackagename');
        var closeclass = $(this).closest('.FeaturesContent');
        var checkBoxes = $('.inven_pricing_table_div .multichannel.subPackage_pos_large');
        $(this).prop('checked', !checkBoxes.prop('checked'));
        checkBoxes.prop('checked', !checkBoxes.prop('checked'));

        var closesubclass = $(this).closest('.subPackageheading');
        closesubclass.find('a.sublink').trigger('click');

        if ($('.inven_pricing_table_div .multichannel.subPackage_pos_large').prop('checked')) {
            $('.inven_pricing_table_div .multichannel.subPackage_pos_large').next('.slider').addClass('active');

            if (subPackName == 'Large') {
                if (closeclass.find('.subPackage_pos_medium').is(':checked')) {
                    closeclass.find('.subPackage_pos_medium').trigger('click');
                }
                if (closeclass.find('.subPackage_pos_small').is(':checked')) {
                    closeclass.find('.subPackage_pos_small').trigger('click');
                }
            }
            planEnabledDisabledFunction();
        } else {
            $('.pricingContent .subPackage_pos_large').next('.slider').removeClass('active');
            planEnabledDisabledFunction();
        }
    });

    /* posItems Ends */

    /* crmItems Starts */

    $('.inven_pricing_table_div .crmItem').on('change', function () {

        var checkBoxes = $('.inven_pricing_table_div .crmItem');
        $(this).prop('checked', !checkBoxes.prop('checked'));
        checkBoxes.prop('checked', !checkBoxes.prop('checked'));
        var closeclass = $(this).closest('.panel-heading');
        closeclass.find('a').trigger('click');
        if ($('.inven_pricing_table_div .crmItem').prop('checked')) {
            $('.inven_pricing_table_div .crmItem').next('.slider').addClass('active');
            closeclass = $(this).closest('.panel');
            closeclass.find('.subPackage_crm_small').trigger('click');
            planEnabledDisabledFunction();
        } else {
            $('.pricingContent .crmItem').next('.slider').removeClass('active');
            closeclass = $(this).closest('.panel');
            if (closeclass.find('.subPackage_crm_small').is(':checked')) {
                closeclass.find('.subPackage_crm_small').trigger('click');
            }
            if (closeclass.find('.subPackage_crm_medium').is(':checked')) {
                closeclass.find('.subPackage_crm_medium').trigger('click');
            }
            if (closeclass.find('.subPackage_crm_large').is(':checked')) {
                closeclass.find('.subPackage_crm_large').trigger('click');
            }
            planEnabledDisabledFunction();
        }
    });

    $('.inven_pricing_table_div .multichannel.subPackage_crm_small').on('change', function () {
        var subPackName = $(this).data('subpackagename');
        var closeclass = $(this).closest('.FeaturesContent');
        var checkBoxes = $('.inven_pricing_table_div .multichannel.subPackage_crm_small');
        $(this).prop('checked', !checkBoxes.prop('checked'));
        checkBoxes.prop('checked', !checkBoxes.prop('checked'));

        var closesubclass = $(this).closest('.subPackageheading');
        closesubclass.find('a.sublink').trigger('click');

        if ($('.inven_pricing_table_div .multichannel.subPackage_crm_small').prop('checked')) {
            $('.inven_pricing_table_div .multichannel.subPackage_crm_small').next('.slider').addClass('active');

            if (subPackName == 'Small') {
                if (closeclass.find('.subPackage_crm_medium').is(':checked')) {
                    closeclass.find('.subPackage_crm_medium').trigger('click');
                }
                if (closeclass.find('.subPackage_crm_large').is(':checked')) {
                    closeclass.find('.subPackage_crm_large').trigger('click');
                }
            }

            planEnabledDisabledFunction();
        } else {
            $('.pricingContent .subPackage_crm_small').next('.slider').removeClass('active');
            planEnabledDisabledFunction();
        }
    });

    $('.inven_pricing_table_div .multichannel.subPackage_crm_medium').on('change', function () {
        var subPackName = $(this).data('subpackagename');
        var closeclass = $(this).closest('.FeaturesContent');
        var checkBoxes = $('.inven_pricing_table_div .multichannel.subPackage_crm_medium');
        $(this).prop('checked', !checkBoxes.prop('checked'));
        checkBoxes.prop('checked', !checkBoxes.prop('checked'));

        var closesubclass = $(this).closest('.subPackageheading');
        closesubclass.find('a.sublink').trigger('click');

        if ($('.inven_pricing_table_div .multichannel.subPackage_crm_medium').prop('checked')) {
            $('.inven_pricing_table_div .multichannel.subPackage_crm_medium').next('.slider').addClass('active');

            if (subPackName == 'Medium') {
                if (closeclass.find('.subPackage_crm_large').is(':checked')) {
                    closeclass.find('.subPackage_crm_large').trigger('click');
                }
                if (closeclass.find('.subPackage_crm_small').is(':checked')) {
                    closeclass.find('.subPackage_crm_small').trigger('click');
                }
            }
            planEnabledDisabledFunction();
        } else {
            $('.pricingContent .subPackage_crm_medium').next('.slider').removeClass('active');
            planEnabledDisabledFunction();
        }
    });

    $('.inven_pricing_table_div .multichannel.subPackage_crm_large').on('change', function () {
        var subPackName = $(this).data('subpackagename');
        var closeclass = $(this).closest('.FeaturesContent');
        var checkBoxes = $('.inven_pricing_table_div .multichannel.subPackage_crm_large');
        $(this).prop('checked', !checkBoxes.prop('checked'));
        checkBoxes.prop('checked', !checkBoxes.prop('checked'));

        var closesubclass = $(this).closest('.subPackageheading');
        closesubclass.find('a.sublink').trigger('click');

        if ($('.inven_pricing_table_div .multichannel.subPackage_crm_large').prop('checked')) {
            $('.inven_pricing_table_div .multichannel.subPackage_crm_large').next('.slider').addClass('active');

            if (subPackName == 'Large') {
                if (closeclass.find('.subPackage_crm_medium').is(':checked')) {
                    closeclass.find('.subPackage_crm_medium').trigger('click');
                }
                if (closeclass.find('.subPackage_crm_small').is(':checked')) {
                    closeclass.find('.subPackage_crm_small').trigger('click');
                }
            }
            planEnabledDisabledFunction();
        } else {
            $('.pricingContent .subPackage_crm_large').next('.slider').removeClass('active');
            planEnabledDisabledFunction();
        }
    });

    /* crmItems Ends */

    /* hrmItems Starts */

    $('.inven_pricing_table_div .hrmItem').on('change', function () {

        var checkBoxes = $('.inven_pricing_table_div .hrmItem');
        $(this).prop('checked', !checkBoxes.prop('checked'));
        checkBoxes.prop('checked', !checkBoxes.prop('checked'));
        var closeclass = $(this).closest('.panel-heading');
        closeclass.find('a').trigger('click');
        if ($('.inven_pricing_table_div .hrmItem').prop('checked')) {
            $('.inven_pricing_table_div .hrmItem').next('.slider').addClass('active');
            closeclass = $(this).closest('.panel');
            closeclass.find('.subPackage_hrm_micro').trigger('click');
            planEnabledDisabledFunction();
        } else {
            $('.pricingContent .hrmItem').next('.slider').removeClass('active');
            closeclass = $(this).closest('.panel');
            if (closeclass.find('.subPackage_hrm_micro').is(':checked')) {
                closeclass.find('.subPackage_hrm_micro').trigger('click');
            }
            if (closeclass.find('.subPackage_hrm_small').is(':checked')) {
                closeclass.find('.subPackage_hrm_small').trigger('click');
            }
            if (closeclass.find('.subPackage_hrm_medium').is(':checked')) {
                closeclass.find('.subPackage_hrm_medium').trigger('click');
            }
            if (closeclass.find('.subPackage_hrm_large').is(':checked')) {
                closeclass.find('.subPackage_hrm_large').trigger('click');
            }
            planEnabledDisabledFunction();
        }
    });

    $('.inven_pricing_table_div .multichannel.subPackage_hrm_micro').on('change', function () {
        var subPackName = $(this).data('subpackagename');
        var closeclass = $(this).closest('.FeaturesContent');
        var checkBoxes = $('.inven_pricing_table_div .multichannel.subPackage_hrm_micro');
        $(this).prop('checked', !checkBoxes.prop('checked'));
        checkBoxes.prop('checked', !checkBoxes.prop('checked'));

        var closesubclass = $(this).closest('.subPackageheading');
        closesubclass.find('a.sublink').trigger('click');

        if ($('.inven_pricing_table_div .multichannel.subPackage_hrm_micro').prop('checked')) {
            $('.inven_pricing_table_div .multichannel.subPackage_hrm_micro').next('.slider').addClass('active');

            if (subPackName == 'Micro') {
                if (closeclass.find('.subPackage_hrm_small').is(':checked')) {
                    closeclass.find('.subPackage_hrm_small').trigger('click');
                }
                if (closeclass.find('.subPackage_hrm_medium').is(':checked')) {
                    closeclass.find('.subPackage_hrm_medium').trigger('click');
                }
                if (closeclass.find('.subPackage_hrm_large').is(':checked')) {
                    closeclass.find('.subPackage_hrm_large').trigger('click');
                }
            }

            planEnabledDisabledFunction();
        } else {
            $('.pricingContent .subPackage_hrm_micro').next('.slider').removeClass('active');
            planEnabledDisabledFunction();
        }
    });

    $('.inven_pricing_table_div .multichannel.subPackage_hrm_small').on('change', function () {
        var subPackName = $(this).data('subpackagename');
        var closeclass = $(this).closest('.FeaturesContent');
        var checkBoxes = $('.inven_pricing_table_div .multichannel.subPackage_hrm_small');
        $(this).prop('checked', !checkBoxes.prop('checked'));
        checkBoxes.prop('checked', !checkBoxes.prop('checked'));

        var closesubclass = $(this).closest('.subPackageheading');
        closesubclass.find('a.sublink').trigger('click');

        if ($('.inven_pricing_table_div .multichannel.subPackage_hrm_small').prop('checked')) {
            $('.inven_pricing_table_div .multichannel.subPackage_hrm_small').next('.slider').addClass('active');

            if (subPackName == 'Small') {
                if (closeclass.find('.subPackage_hrm_micro').is(':checked')) {
                    closeclass.find('.subPackage_hrm_micro').trigger('click');
                }
                if (closeclass.find('.subPackage_hrm_medium').is(':checked')) {
                    closeclass.find('.subPackage_hrm_medium').trigger('click');
                }
                if (closeclass.find('.subPackage_hrm_large').is(':checked')) {
                    closeclass.find('.subPackage_hrm_large').trigger('click');
                }
            }

            planEnabledDisabledFunction();
        } else {
            $('.pricingContent .subPackage_hrm_small').next('.slider').removeClass('active');
            planEnabledDisabledFunction();
        }
    });

    $('.inven_pricing_table_div .multichannel.subPackage_hrm_medium').on('change', function () {
        var subPackName = $(this).data('subpackagename');
        var closeclass = $(this).closest('.FeaturesContent');
        var checkBoxes = $('.inven_pricing_table_div .multichannel.subPackage_hrm_medium');
        $(this).prop('checked', !checkBoxes.prop('checked'));
        checkBoxes.prop('checked', !checkBoxes.prop('checked'));

        var closesubclass = $(this).closest('.subPackageheading');
        closesubclass.find('a.sublink').trigger('click');

        if ($('.inven_pricing_table_div .multichannel.subPackage_hrm_medium').prop('checked')) {
            $('.inven_pricing_table_div .multichannel.subPackage_hrm_medium').next('.slider').addClass('active');

            if (subPackName == 'Medium') {
                if (closeclass.find('.subPackage_hrm_micro').is(':checked')) {
                    closeclass.find('.subPackage_hrm_micro').trigger('click');
                }
                if (closeclass.find('.subPackage_hrm_large').is(':checked')) {
                    closeclass.find('.subPackage_hrm_large').trigger('click');
                }
                if (closeclass.find('.subPackage_hrm_small').is(':checked')) {
                    closeclass.find('.subPackage_hrm_small').trigger('click');
                }
            }
            planEnabledDisabledFunction();
        } else {
            $('.pricingContent .subPackage_hrm_medium').next('.slider').removeClass('active');
            planEnabledDisabledFunction();
        }
    });

    $('.inven_pricing_table_div .multichannel.subPackage_hrm_large').on('change', function () {
        var subPackName = $(this).data('subpackagename');
        var closeclass = $(this).closest('.FeaturesContent');
        var checkBoxes = $('.inven_pricing_table_div .multichannel.subPackage_hrm_large');
        $(this).prop('checked', !checkBoxes.prop('checked'));
        checkBoxes.prop('checked', !checkBoxes.prop('checked'));

        var closesubclass = $(this).closest('.subPackageheading');
        closesubclass.find('a.sublink').trigger('click');

        if ($('.inven_pricing_table_div .multichannel.subPackage_hrm_large').prop('checked')) {
            $('.inven_pricing_table_div .multichannel.subPackage_hrm_large').next('.slider').addClass('active');

            if (subPackName == 'Large') {
                if (closeclass.find('.subPackage_hrm_micro').is(':checked')) {
                    closeclass.find('.subPackage_hrm_micro').trigger('click');
                }
                if (closeclass.find('.subPackage_hrm_medium').is(':checked')) {
                    closeclass.find('.subPackage_hrm_medium').trigger('click');
                }
                if (closeclass.find('.subPackage_hrm_small').is(':checked')) {
                    closeclass.find('.subPackage_hrm_small').trigger('click');
                }
            }
            planEnabledDisabledFunction();
        } else {
            $('.pricingContent .subPackage_hrm_large').next('.slider').removeClass('active');
            planEnabledDisabledFunction();
        }
    });

    $('input.numof_employees').change(function () {
        if($(this).val().length == 0 || $(this).val() <= 0){
            $(this).val('1');
        }
        $('input.numof_employees').val($(this).val())
        planEnabledDisabledFunction()
    })
    /* hrmItems Ends */

    initLoadSelectedItems();
});

function initLoadSelectedItems() {
    if(sessionStorage.getItem('selectedTier')){
        $('#multichannel_pricing_table li.salesOrderPlan').hide();
        let selectedTier = sessionStorage.getItem('selectedTier')
        let thistxt = $('a[data-tier="' + selectedTier + '"]').text();
        $('a[data-tier="' + selectedTier + '"]').addClass('active')
        $('.asalta-black span').text(thistxt);
        $('li'+selectedTier).show();
    }
    if(sessionStorage.getItem('plan_id')){
        console.log(sessionStorage.getItem('plan_id'))
        let plan_id = sessionStorage.getItem('plan_id')
        $('input#plan_id').val(plan_id);
        if(plan_id == 2){
            $('input#yearly_monthly_switch').attr('checked', true)
        }
        $('input#yearly_monthly_switch').trigger('change')
    }
    if(sessionStorage.getItem('selectedItems')){
        let selectedItems = sessionStorage.getItem('selectedItems');
        selectedItems = JSON.parse(selectedItems)
        //console.log(selectedItems);
        $(selectedItems).each(function(){
            //console.log(this);
            if(this.id){
                $('input.' + this.product.toLowerCase() + 'Item').attr('checked', true).next('.slider').addClass('active');
                $('input.' + this.product.toLowerCase() + 'Item').parent().next('a').trigger('click')
                $('input.subPackage_' + this.product.toLowerCase() + '_' + this.subpackagename.toLowerCase()).attr('checked', true).next('.slider').addClass('active');
                $('input.subPackage_' + this.product.toLowerCase() + '_' + this.subpackagename.toLowerCase()).parent().next('a').trigger('click')
                if(this.numof_employees){
                    $('input.numof_employees').val(this.numof_employees)
                }
            }
        });
        planEnabledDisabledFunction();
    }
}

function planEnabledDisabledFunction() {
    $('.yearlyPlanInput').each(function () {
        let closeclass = $(this).closest('.inven_pricing_table_div');
        let buyNowLink = closeclass.find('.price-value-yearly a');
        let defaultpackageid = buyNowLink.data('packageid');
        let defaultproductname = buyNowLink.data('productname');
        let default_package_price_yearly = buyNowLink.data('actualpackageprice');
        let selecteddata = {items: [{id: defaultpackageid, product: defaultproductname}]};
        $(this).find('.multichannel').each(function () {
            if ($(this).is(':checked')) {
                let packageid = $(this).data('packageid');
                let productname = $(this).data('productname');
                let packageprice = $(this).data('packageprice');
                let subpackagename = $(this).data('subpackagename');
                if(productname == "HRM"){
                    let numof_employees = parseInt($(this).parents('ul').find('input.numof_employees').val());
                    if(isNaN(numof_employees) || numof_employees == 0){
                        numof_employees = 1;
                    }
                    default_package_price_yearly = parseInt(default_package_price_yearly) + (parseInt(packageprice) * parseInt(numof_employees));
                    selecteddata.items.push(
                        {id: packageid, product: productname, numof_employees: numof_employees, subpackagename: subpackagename},
                    );
                } else {
                    default_package_price_yearly = parseInt(default_package_price_yearly) + parseInt(packageprice);
                    selecteddata.items.push({id: packageid, product: productname, subpackagename: subpackagename});
                }
            }
        });
        closeclass.find('.price-yearly').text(accounting.formatMoney(default_package_price_yearly, {precision: 0, symbol: ''}));
        sessionStorage.setItem('selectedItems', JSON.stringify(selecteddata.items));
        selecteddata.items = JSON.stringify(selecteddata.items);
        buyNowLink.attr('data-params', JSON.stringify(selecteddata));
    });

    $('.monthlyPlanInput').each(function () {
        let closeclass = $(this).closest('.inven_pricing_table_div');
        let buyNowLink = closeclass.find('.price-value-monthly a');
        let defaultpackageid = buyNowLink.data('packageid');
        let defaultproductname = buyNowLink.data('productname');
        let default_package_price_monthly = buyNowLink.data('actualpackageprice');
        let selecteddata = {items: [{id: defaultpackageid, product: defaultproductname}]};
        $(this).find('.multichannel').each(function () {
            if ($(this).is(':checked')) {
                let packageid = $(this).data('packageid');
                let productname = $(this).data('productname');
                let packageprice = $(this).data('packageprice');
                if(productname == "HRM"){
                    let numof_employees = parseInt($(this).parents('ul').find('input.numof_employees').val());
                    if(isNaN(numof_employees) || numof_employees == 0){
                        numof_employees = 1;
                    }
                    default_package_price_monthly = parseInt(default_package_price_monthly) + (parseInt(packageprice) * parseInt(numof_employees));
                    selecteddata.items.push(
                        {id: packageid, product: productname, numof_employees: numof_employees},
                    );
                } else {
                    default_package_price_monthly = parseInt(default_package_price_monthly) + parseInt(packageprice);
                    selecteddata.items.push(
                        {id: packageid, product: productname},
                    );
                }

            }
        });
        closeclass.find('.price-monthly').text(accounting.formatMoney(default_package_price_monthly, {precision: 0, symbol: ''}));
        selecteddata.items = JSON.stringify(selecteddata.items);
        buyNowLink.attr('data-params', JSON.stringify(selecteddata));
    });
}

function initPlansBlockSticky() {
    /*V1 Try*/
    // Set options
    /*let options = {
        offset: '.pricingContent',
        classes: {
            clone:   'pricing-info--clone',
            stick:   'pricing-info--stick',
            unstick: 'pricing-info--unstick'
        }
    };

    // Initialise with options
    let hseaderBacked = document.getElementsByClassName('pricingTable-heading-wrapper')
    console.log(hseaderBacked);
    $(hseaderBacked).each(function () {
        new Headhesive(this, options)
    })*/
    //let banner = new Headhesive('.pricingTable-heading-wrapper', options);

    // Headhesive destroy
    // banner.destroy();

    /*V2 Try*/
    let windowWidth = $(window).width();
    if(windowWidth >= 992){
        $(document).on('scroll', function() {
            if(windowWidth >= 992) {
                let documentScrollTop = $(this).scrollTop();
                let divBottom = $('.inven_pricing_restable').outerHeight(true);
                $('.inven_pricing_table_div').each(function () {
                    if (documentScrollTop >= ($(this).find('.pricingContent').position().top + 400)/* && documentScrollTop <= divBottom*/) {
                        //console.log('I have been reached');
                        let parentwidth = $(this).find(".pricingTable-heading-wrapper").width();
                        $(this).find('.pricingTable-heading-wrapper').addClass('pricing-info--stick').width(parentwidth)
                        $(this).find('.ribbon_pricing').hide();
                    } else {
                        $(this).find('.pricingTable-heading-wrapper').removeClass('pricing-info--stick').removeAttr('style')
                        $(this).find('.ribbon_pricing').show();
                    }
                    let faq_position = $('#frequently_asked_questions').offset().top + $('#frequently_asked_questions').outerHeight() - window.innerHeight;
                    if (documentScrollTop >= (faq_position)) {
                        $(this).find('.pricingTable-heading-wrapper').removeClass('pricing-info--stick').removeAttr('style')
                        $(this).find('.ribbon_pricing').show();
                    }
                })
            }
        })
    }

}
