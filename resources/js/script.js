var baseurl="<?php print Yii::app()->request->baseUrl;?>";
$(document).ready(function() {

    $(".normal1").addClass('businessServicesInline');
    $(".normal2").addClass('businessServicesInline');
    $(".normal3").addClass('businessServicesInline');
    $(".normal4").addClass('businessServicesInline');
    $(".normal6").addClass('businessServicesInline');
    $(".normal9").addClass('businessServicesInline');
    $(".normal3").addClass('businessServicesInline');

    $(".normal5").addClass('businessServicesInline');
    $(".normal7").addClass('businessServicesInline');
    $(".normal8").addClass('businessServicesInline');
    $(".normal10").addClass('businessServicesInline');
    $(".normal11").addClass('businessServicesInline');
    $(".normal12").addClass('businessServicesInline');

    $("img.hover1").addClass('businessServicesNone');
    $("img.hover10").addClass('businessServicesNone');
    $("img.hover11").addClass('businessServicesNone');
    $("img.hover12").addClass('businessServicesNone');
    $("img.hover13").addClass('businessServicesNone');
    $("img.hover14").addClass('businessServicesNone');
    $("img.hover15").addClass('businessServicesNone');
    $("img.hover16").addClass('businessServicesNone');
    $("img.hover17").addClass('businessServicesNone');
    $("img.hover18").addClass('businessServicesNone');
    $("img.hover19").addClass('businessServicesNone');
    $("img.hover2").addClass('businessServicesNone');
    $("img.hover20").addClass('businessServicesNone');
    $("img.hover21").addClass('businessServicesNone');
    $("img.hover3").addClass('businessServicesNone');
    $("img.hover4").addClass('businessServicesNone');
    $("img.hover5").addClass('businessServicesNone');
    $("img.hover6").addClass('businessServicesNone');
    $("img.hover7").addClass('businessServicesNone');
    $("img.hover8").addClass('businessServicesNone');
    $("img.hover9").addClass('businessServicesNone');

    $("#professional-servicestoggle").addClass('businessServicesNone');

    var selectedPlan = "yearlyPlanInput";
    $("#monthly-plan").click(function() {
        selectedPlan = "monthlyPlanInput";
        $(".monthlyPlanInput").show();
        $(".yearlyPlanInput").hide();
        $(".price-value-monthly").show();
        $(".price-value-yearly").hide();
        $(this).addClass('pricebutton_act');
        $("#twelve_monthly-plan").removeClass("pricebutton_act");
    });
    $("#twelve_monthly-plan").click(function() {
        selectedPlan = "yearlyPlanInput";
        $(".monthlyPlanInput").hide();
        $(".yearlyPlanInput").show();
        $(".price-value-yearly").show();
        $(".price-value-monthly").hide();
        $(this).addClass('pricebutton_act');
        $("#monthly-plan").removeClass("pricebutton_act");
    });

    $('.pricing-label-monthly').css('color', '#898989');
    $('#yearly_monthly_switch').on('change', function() {
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
            $(this).attr('data-plan-id', 2);
            $('#plan_id').val(2);
        } else {
            $('.monthlyPlanInput').hide();
            $('.yearlyPlanInput').show();
            $('.price-value-yearly').show();
            $('.price-value-monthly').hide();
            $(this).addClass('pricebutton_act');
            $('.pricing-label-Annually').css('color', '#c02434');
            $('.pricing-label-monthly').css('color', '#898989');
            $(this).attr('data-plan-id', 1);
            $('#plan_id').val(1);
        }
    });

    $(document).on('click', '#have_promo_code', function() {
        $('#have_promo_code_input').toggle();
        if($('#have_promo_code_input').is(':visible')){

        }
        else{
            $(".promo_code").val('');
        }
    });
    // $("div.pricingTable").click(function() {
    //     $(this).parent().find("div." + selectedPlan + " input[name='package_id']").not(":disabled").iCheck('check');
    // });
    var md = new MobileDetect(window.navigator.userAgent);
    if (md.mobile()) {
        (function() {
            $('.nicescroll-rails.nicescroll-rails-hr').remove();
        });
    } else if (md.phone()) {
        (function() {
            $('.nicescroll-rails.nicescroll-rails-hr').remove();
        });
    } else {
        var nice = $("html").niceScroll();
        //$("#nicescrollbar").html($("#nicescrollbar").html() + ' ' + nice.version);
        $(function() {
            $('#ascrail2000-hr').remove();
        });
        (function() {
            $('.nicescroll-rails.nicescroll-rails-hr').remove();
        });
    }
    $(".asalta_discount").tooltip({
        html: !0,
        title: '<p style="text-align:justify">Get 30% discount for your First Year subscription. This discount is applicable only for new customers for this product.</p>'
    }),
    $(".pos_discount").tooltip({
        html: !0,
        title: '<p style="text-align:justify">Get 30% discount for your First Year subscription. This discount is applicable only for new customers for this product.</p>'
    }),
    $(".ecommerce_discount").tooltip({
        html: !0,
        title: '<p style="text-align:justify">Get 30% discount for your First Year subscription. This discount is applicable only for new customers for this product.</p>'
    }),
    $('[data-toggle="tooltip"]').tooltip();
    $("i.fa-angle-left").hide(), $("i.fa-angle-right").hide(), $("#slider3").mouseover(function() {
        $("i.fa-angle-left").show(), $("i.fa-angle-right").show()
    }), $("#slider3").mouseout(function() {
        $("i.fa-angle-left").hide(), $("i.fa-angle-right").hide()
    }), $("span.fa-angle-left").hide(), $("span.fa-angle-right").hide(), $(".testimonialsblock").mouseover(function() {
        $("span.fa-angle-left").show(), $("span.fa-angle-right").show()
    }), $(".testimonialsblock").mouseout(function() {
        $("span.fa-angle-left").hide(), $("span.fa-angle-right").hide()
    }), $("button.slick-prev").hide(), $(".professionalservice").click(function() {
        $(".retailhide, .customizedthide").removeClass('businessServicesInline').addClass('businessServicesNone'), $("#professional-servicestoggle").toggle()
    }), $(".retail").click(function() {
        $(".professional-serviceshide, .customizedthide").hide(), $("#retailtoggle").toggle()
    }), $(".customized").click(function() {
        $(".professional-serviceshide, .retailhide").hide(), $("#customizedtoggle").toggle()
    }), $("#professional-service").hover(function() {
        $(".normal1").removeClass('businessServicesInline').addClass('businessServicesNone'), $(".hover1").removeClass('businessServicesNone').addClass('businessServicesInline')
    }, function() {
        $(".hover1").removeClass('businessServicesInline').addClass('businessServicesNone'), $(".normal1").removeClass('businessServicesNone').addClass('businessServicesInline')
    }), $("#retail").hover(function() {
        $(".normal3").removeClass('businessServicesInline').addClass('businessServicesNone'), $(".hover3").removeClass('businessServicesNone').addClass('businessServicesInline')
    }, function() {
        $(".hover3").removeClass('businessServicesInline').addClass('businessServicesNone'), $(".normal3").removeClass('businessServicesNone').addClass('businessServicesInline')
    }), $("#customized").hover(function() {
        $(".normal12").removeClass('businessServicesInline').addClass('businessServicesNone'), $(".hover12").removeClass('businessServicesNone').addClass('businessServicesInline')
    }, function() {
        $(".hover12").removeClass('businessServicesInline').addClass('businessServicesNone'), $(".normal12").removeClass('businessServicesNone').addClass('businessServicesInline')
    }), $("#telemarketing ").hover(function() {
        $(".normal5").removeClass('businessServicesInline').addClass('businessServicesNone'), $(".hover5").removeClass('businessServicesNone').addClass('businessServicesInline')
    }, function() {
        $(".hover5").removeClass('businessServicesInline').addClass('businessServicesNone'), $(".normal5").removeClass('businessServicesNone').addClass('businessServicesInline')
    }), $("#social-marketing ").hover(function() {
        $(".normal6").removeClass('businessServicesInline').addClass('businessServicesNone'), $(".hover6").removeClass('businessServicesNone').addClass('businessServicesInline')
    }, function() {
        $(".hover6").removeClass('businessServicesInline').addClass('businessServicesNone'), $(".normal6").removeClass('businessServicesNone').addClass('businessServicesInline')
    }), $("#advertising ").hover(function() {
        $(".normal7").removeClass('businessServicesInline').addClass('businessServicesNone'), $(".hover7").removeClass('businessServicesNone').addClass('businessServicesInline')
    }, function() {
        $(".hover7").removeClass('businessServicesInline').addClass('businessServicesNone'), $(".normal7").removeClass('businessServicesNone').addClass('businessServicesInline')
    }), $("#design-agencies ").hover(function() {
        $(".normal8").removeClass('businessServicesInline').addClass('businessServicesNone'), $(".hover8").removeClass('businessServicesNone').addClass('businessServicesInline')
    }, function() {
        $(".hover8").removeClass('businessServicesInline').addClass('businessServicesNone'), $(".normal8").removeClass('businessServicesNone').addClass('businessServicesInline')
    }), $(".icons-style2 ").hover(function() {
        $(".normal2").removeClass('businessServicesInline').addClass('businessServicesNone'), $(".hover2").removeClass('businessServicesNone').addClass('businessServicesInline')
    }, function() {
        $(".hover2").removeClass('businessServicesInline').addClass('businessServicesNone'), $(".normal2").removeClass('businessServicesNone').addClass('businessServicesInline')
    }), $("#wellness ").hover(function() {
        $(".normal9").removeClass('businessServicesInline').addClass('businessServicesNone'), $(".hover9").removeClass('businessServicesNone').addClass('businessServicesInline')
    }, function() {
        $(".hover9").removeClass('businessServicesInline').addClass('businessServicesNone'), $(".normal9").removeClass('businessServicesNone').addClass('businessServicesInline')
    }), $("#saloon ").hover(function() {
        $(".normal10").removeClass('businessServicesInline').addClass('businessServicesNone'), $(".hover10").removeClass('businessServicesNone').addClass('businessServicesInline')
    }, function() {
        $(".hover10").removeClass('businessServicesInline').addClass('businessServicesNone'), $(".normal10").removeClass('businessServicesNone').addClass('businessServicesInline')
    }), $("#eyecare ").hover(function() {
        $(".normal11").removeClass('businessServicesInline').addClass('businessServicesNone'), $(".hover11").removeClass('businessServicesNone').addClass('businessServicesInline')
    }, function() {
        $(".hover11").removeClass('businessServicesInline').addClass('businessServicesNone'), $(".normal11").removeClass('businessServicesNone').addClass('businessServicesInline')
    }), $("#submit").click(function() {
        $("#re_captcha"), 0 != grecaptcha.getResponse().length && $("#recaptcha").val(1)
    }), jQuery("#integration-dropdown").on("change", function() {
        jQuery(".integration-list").hide(), "all" == jQuery(this).val() ? jQuery("#all").show() : "paymentgateway" == jQuery(this).val() ? jQuery("#paymentgateway").show() : "crm" == jQuery(this).val() ? jQuery("#crm").show() : "hrm" == jQuery(this).val() ? jQuery("#hrm").show() : "ecommerce" == jQuery(this).val() ? jQuery("#ecommerce").show() : "accounting" == jQuery(this).val() ? jQuery("#accounting").show() : "marketing" == jQuery(this).val() ? jQuery("#marketing").show() :  "edi" == jQuery(this).val() ? jQuery("#edi").show() : "reports" == jQuery(this).val() ? jQuery("#reports").show() : "shipping" == jQuery(this).val() ? jQuery("#shipping").show() : "forecast" == jQuery(this).val() ? jQuery("#forecast").show() : "pos" == jQuery(this).val() ? jQuery("#pos").show() : "fulfillment" == jQuery(this).val() && jQuery("#fulfillment").show()
    }), $("#contactnumber").keydown(function(e) { 
        -1 !== $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) || 65 === e.keyCode && (!0 === e.ctrlKey || !0 === e.metaKey) || e.keyCode >= 35 && e.keyCode <= 40 || (e.shiftKey || e.keyCode < 48 || e.keyCode > 57) && (e.keyCode < 96 || e.keyCode > 105) && e.preventDefault()
    }), $(".track1").on("click", function() {
        $("#asaltaAudio")[0].play()
    }), window.onscroll = function() {
        scrollFunction()
    };
    $('a[href="#lead-management"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".crm-lead-management-background").offset().top - 60
        }, 1000);
    });
    $('a[href="#prospect-management"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".crm-prospect-management-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#product-management"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".crm-product-management-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#contact-management"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".crm-product-management-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#invoicing-system"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".crm-invoicing-system-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#user-module"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".crm-user-model-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#sms-marketing"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".sms-marketing-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#task-and-event-management"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".crm-task-and-event-management-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#loyalty-management"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".crm-loylty-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#quotation-management"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".crm-quotation-management-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#reminder"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".crm-reminder-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#project-management"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".crm-project-management-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#to-do-task"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".crm-to-do-task").offset().top - 60
        }, 1000);
    });
    $('a[href="#email-marketing"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".crm-email-marketing-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#report"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".crm-report-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#employee-directory"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".hrm-employee-directory-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#time-tracking-attendance"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".hrm-time-tracking-attendance-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#leave"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".hrm-leave-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#claims"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".hrm-claims-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#commissions"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".hrm-commissions-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#payroll-software"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".hrm-payroll-software-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#employee-self-service"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".hrm-employee-self-service-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#announcements"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".hrm-announcements-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#recruitment"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".hrm-recruitment-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#employee-directory"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".hrm-employee-directory-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#appraisal-management"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".hrm-appraisal-management-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#on-boarding-off-boarding"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".hrm-on-boarding-off-boarding-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#rostering"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".hrm-rostering-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#inventory-product-management"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".inventory-product-management-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#purchase"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".inventory-purchase-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#barcode-and-scanners"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".inventory-barcode-scanners-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#sales"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".inventory-sales-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#stock-management"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".inventory-stock-management-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#consignment"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".inventory-consignment-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#warehouse-management"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".inventory-warehouse-management-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#integration"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".inventory-integrations-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#point-of-sale"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".pointofsale-features-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#user-management"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".pointofsale-user-management-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#pointofsale-contact-management"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".pointofsale-contact-management-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#location-management"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".pointofsale-location-management-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#barcode-management"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".pointofsale-barcode-management-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#bundle-management"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".pointofsale-bundle-management-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#pointofsale-integration"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".pointofsale-integration-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#pointofsale-loyalty-management"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".pointofsale-loyalty-management-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#customer-management"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".w3-display-container").position().top
        }, 1000);
    });
    $('a[href="#reports"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".pointofsale-report-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#procurement-contact-management"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".procurement-contact-management-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#procurement-work-order"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".procurement-work-order-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#procurement-purchase"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".procurement-purchase-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#procurement-sales"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".procurement-sales-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#procurement-packing"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".procurement-packing-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#procurement-order-processing"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".procurement-order-processing-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#procurement-delivery-management"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".procurement-delivery-management-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#procurement-invoice-management"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".procurement-invoice-management-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#procurement-payable-management"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".procurement-payables-management-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#procurement-accounts-receivable"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".procurement-accounts-receivable-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#procurement-accounts-payable"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".procurement-accounts-payable-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#procurement-inventory"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".procurement-inventory-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#procurement-integrations"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".procurement-integrations-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#admin-area"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".dms-admin-area-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#file-manager"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".dms-file-manager-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#file-downloads"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".dms-file-downloads-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#security"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".dms-security-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#sharing"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".dms-sharing-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#upload-files"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".dms-upload-files-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#detailed-file-statistics"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".dms-detailed-file-statistics-div").offset().top - 60
        }, 1000);
    });
    $('a[href="#dynamicwebforms"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".crm-dynamic-forms").offset().top - 60
        }, 1000);
    });
    $('a[href="#calendarfeatures"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".crm-calendarfeatures").offset().top - 60
        }, 1000);
    });
    $('a[href="#workflowautomation"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".crm-workflowautomation").offset().top - 60
        }, 1000);
    });
    $('a[href="#whatsappmessaging"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".crm-whatsappmessaging").offset().top - 60
        }, 1000);
    });
    $('a[href="#multiplechats"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".crm-multiplechats").offset().top - 60
        }, 1000);
    });
    $('a[href="#googledriveasaltacrm"]').click(function() {
        $('html, body').animate({
            scrollTop: $(".crm-googledriveasaltacrm").offset().top - 60
        }, 1000);
    });
    // $(".dropdown").hover(
    //     function() { $('.dropdown-menu', this).fadeIn("fast");
    //     },
    //     function() { $('.dropdown-menu', this).fadeOut("fast");
    // });
    $("#hrm_comberplane").click(function() {
        $("#hrm_comberplane_table").toggle();
    });
    if ($(window).width() < 768) {
        $("header").removeClass("banner");
    } else {
        $("header").addClass("banner");
    }
    setTimeout(function() {
        /*if ($(document).find(".banner").length > 0) {
            var options = {
                classes: {
                    clone: 'banner--clone',
                    stick: 'banner--stick',
                    unstick: 'banner--unstick'
                }
            };
            var banner = new Headhesive('.banner1', options);
        }*/
        if ($(window).width() < 768) {
            /*if ($(document).find(".sub-header").length == 1) {
                $(".sub-header").hide();
                $("body header.banner1:first").remove();
            }*/
        }
    }, 1000)
     $("[href]").each(function() {
        if (this.href == window.location.href) {
            $(this).addClass("active");
              if($(this).closest('ul').hasClass('dropdown-menu')){
            $(this).parents('li').addClass('active');
            }
        }
       
    });

    if($("div.offerTimer").length > 0){
        var startDate = new Date("Jul 25, 2020 00:00:00").getTime();
        var now = new Date().getTime();
        var difference = startDate - now;
        var days = Math.abs(Math.floor(difference / (1000 * 60 * 60 * 24)));
        var nextEndDay = (Math.ceil(days / 7) * 7);
        var countDownDate = startDate + (nextEndDay * (1000 * 60 * 60 * 24))
        var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = countDownDate - now;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            $("div.offerTimer span").text(days + "d " + hours + "h " + minutes + "m " + seconds + "s ");
            $("div.offerTimer").fadeIn(400);
            if (distance < 0) {
                clearInterval(x);
                $("div.offerTimer").hide()
            }
        }, 1000);
    }


});
var slideIndex = 1;

function plusDivs(e) {
    showDivs(slideIndex += e)
}

function showDivs(e) {
    var t, n = document.getElementsByClassName("mySlides");
    if (n !== undefined) {
        for (e > n.length && (slideIndex = 1), e < 1 && (slideIndex = n.length), t = 0; t < n.length; t++) n[t].style.display = "none";
        if (n[slideIndex - 1] !== undefined) {
            n[slideIndex - 1].style.display = "block"
        }
    }
}

function scrollFunction() {
    document.body.scrollTop > 300 || document.documentElement.scrollTop > 300 ? ($("#scrollUp").show(), $(".header-one").css({
        display: "none"
    }), setTimeout(function() {
        //if ($(window).width() < 768) {
            $("header.sub-header").addClass("banner1"), $(".sub-header").css({
                display: "block"
            });
            if ($(document).find(".banner1").length == 1) {
                var options = {
                    classes: {
                        clone: 'banner--clone',
                        stick: 'banner--stick',
                        unstick: 'banner--unstick'
                    }
                };
                var banner = new Headhesive('.banner1', options);
            }
        //}
    }, 1), $(".header-two").css({
        position: "fixed",
        display: "block",
        width: "100%"
    })) : ($("#scrollUp").hide(), $(".header-two").css({
        display: "none"
    }), setTimeout(function() {
        if ($(window).width() < 768) {
            //$("header.sub-header").removeClass("banner1");
            /*if ($(document).find(".sub-header").length > 1) {
                $(".sub-header").hide();
                $("body header.banner--clone:first").remove();
            }*/
            $("body header.banner--clone:first").remove();
        }
    }, 1), $(".header-one").css({
        position: "relative",
        display: "block"
    }))
}

function topFunction() {
    document.body.scrollTop = 0, document.documentElement.scrollTop = 0
}
showDivs(slideIndex), jQuery(document).resize(function() {
    $(window).width < 768 ? $(".animatable .bounceInLeft .bounceInRight").hide() : $(".animatable .bounceInLeft .bounceInRight").show()
});

$(document).on('mouseenter', 'ul.list-unstyled  > li', function() {
    $(this).addClass('active').siblings().removeClass('active');
    var imageName = $(this).find('img').attr('imageName');
    $(this).css('background', '#fcedee');
    $(this).find('span').css('color', '#b31b1d');
    console.log(baseurl)
    $(this).find('.imgloaded'+imageName).attr('src',baseurl+'/images/'+imageName+'-color.png');
});
$(document).on('mouseleave', 'ul.list-unstyled  > li', function() {
    $(this).addClass('active').siblings().removeClass('active');
    var imageName = $(this).find('img').attr('imageName');
    $(this).css('background', '#ffffff');
    $(this).find('span').css('color', '#393a3d');
    $(this).find('.imgloaded'+imageName).attr('src','/images/'+imageName+'-grey.png');
});

$(document).on('click', '.footerhrmlink', function() {
    var pathname = window.location.href;
    if(pathname.search("/hrm") != -1){
        var pathname = $(this).attr("linkname");
        footerHrmLink(pathname);
    }
});
$(document).ready(function () {
    var pathname = window.location.hash;
    footerHrmLink(pathname);
});
function footerHrmLink(pathname) {
    if(pathname == "#rostering")
    {
        $('html, body').animate({
            scrollTop: $(".hrm-rostering-div").offset().top - 60
        }, 1000);
    }
    if(pathname == "#payroll-software")
    {
        $('html, body').animate({
            scrollTop: $(".hrm-payroll-software-div").offset().top - 60
        }, 1000);
    } if(pathname == "#time-tracking-attendance")
    {
        $('html, body').animate({
            scrollTop: $(".hrm-time-tracking-attendance-div").offset().top - 60
        }, 1000);
    }
}