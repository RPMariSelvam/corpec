$(document).ready(function () {
    var AppConfig = new AppConfigs();
    var baseUrl = AppConfig.getBaseUrl();

    /*Addons Cart Section Starts*/
    $('input.qty').each(function() {
        let input_name = $(this).attr('name');
        let inputName = $(this).data('name');
        let closeclass = $(this).closest('.product-stellar');
        let checkBoxes = closeclass.find('input.addons-input');
        if(sessionStorage.getItem(input_name)){
            $('.add-ons-items-view-th').show();
            let qty = sessionStorage.getItem(input_name);
            $(this).val(qty);
            let packageprice =  $('.'+input_name).data('addonspackageprice');
            let packagePriceWithQty = qty * packageprice;

            $('#add_ons tbody').append('<tr class="'+input_name+'"><td>'+inputName+'</td><td class="quantity text-right">'+qty+'</td> <td class="addons-item-price text-right">'+accounting.formatMoney(packagePriceWithQty,window.currencySymbol) + window.plan_period_time +'</td> <td class="trash-item text-center"><i class="fa fa-trash" aria-hidden="true"></i></td></tr>')
            if(sessionStorage.getItem(input_name) && sessionStorage.getItem(input_name) > 0){
                sessionStorageCheck(checkBoxes);
            }

        }

    });

    $(document).on('click','.add-ons-item, .qty',function() {
        var checkBoxes = $(this).find('input.addons-input');
        $(this).prop('checked', !checkBoxes.prop('checked'));
        checkBoxes.prop('checked', !checkBoxes.prop('checked'));
        var packagename =  $(this).data('addonspackagename');
        if($('input.addons-input').filter(':checked').length == 0){
            $('.product-add-ons-items-view').hide();
        }else{
            $('.product-add-ons-items-view').show();
        }

        var closeclass_item = $(this).closest('.product-stellar');
        var addonsName_item =  closeclass_item.find('input.qty').attr('name');
        sessionStorage.removeItem(addonsName_item);
        checkoutCalculation();
        $('input.addons-input').each(function() {
            var addonspackage_name =  $(this).data('addonspackagename');
            if ($(this).is(':checked')) {
                $(this).next().addClass('procure');
                $(this).next().find('i.fa').addClass('fa-check').removeClass('fa-cart-plus');

            }else{
                $(this).next().find('i.fa').addClass('fa-cart-plus').removeClass('fa-check');
                $(this).next().removeClass('procure');
            }
            if ($(this).next().hasClass('procure')){
                $('.'+addonspackage_name).show();
            }else{
                $('.'+addonspackage_name).hide();
            }
        });

    });

    $(document).on('blur','.qty',function() {
        /*var closeclass = $(this).closest('.product-stellar');
        var checkBoxes = closeclass.find('input.addons-input');*/
        $('#add_ons tbody').html('');
        checkoutCalculation();
    });
    $(document).on('click','.trash-item',function() {
        var trash_class = $(this).parent('tr').attr('class');
        $(this).parent('tr').remove();
        $('#add_ons tbody').html('');
        if(trash_class){
            sessionStorage.clear();
            $('.addons-input.'+trash_class).prop('checked', false);
            checkoutCalculation();
        }

        $('input.addons-input').each(function() {
            if ($(this).is(':checked')) {
                $(this).next().addClass('procure');
                $(this).next().find('i.fa').addClass('fa-check').removeClass('fa-cart-plus');

            }else{
                $(this).next().find('i.fa').addClass('fa-cart-plus').removeClass('fa-check');
                $(this).next().removeClass('procure');
            }
        });
    });

    $('.paymentdetails').hide();

    $(document).on('click','.checkoutpackage',function() {
        //$(this).removeClass('checkoutpackage');
        $('.selectedpackagedetails').hide();
        $('#checkoutpackagedetails').hide();
        $('a.change-package').hide();
        $('a.change-addons').show().removeClass('active');
        $('.paymentdetails').slideDown();
        calculateTotal()
    });

    $('a.change-addons').click(function (e) {
        $('a.change-addons').hide();
        $('.paymentdetails').hide();
        $('.selectedpackagedetails').slideDown();
        $('#checkoutpackagedetails').slideDown();
        $('html, body').animate({
            scrollTop: $('.selectedpackagedetails').eq(1).offset().top
        }, 400);
        $('a.change-package').show();
    })
    /*Addons Cart Section Ends*/

    function sessionStorageCheck(checkBoxes){
        checkBoxes.prop('checked', !checkBoxes.prop('checked'));
        if ($(checkBoxes).is(':checked')) {
            checkoutCalculation();
            $(checkBoxes).next().addClass('procure');
            $(checkBoxes).next().find('i.fa').addClass('fa-check').removeClass('fa-cart-plus');
        }
    }

    function checkoutCalculation(){
        let totalPrice = window.totalPriceWithoutAddons;
        window.selectedAddons = [];
        if($('input.addons-input').filter(':checked').length == 0){
            $('.product-add-ons-items-view').hide();
        }else{
            $('.product-add-ons-items-view').show();
        }

        $('input.addons-input').each(function() {
            if ($(this).is(':checked')) {
                var qtyvalue = 1;
                var closeclass = $(this).closest('.product-stellar');
                qtyvalue = closeclass.find('input.qty').val();
                if(qtyvalue == ''){
                    qtyvalue = parseInt(1);
                    closeclass.find('input.qty').val(qtyvalue);
                }
                var packageprice =  $(this).data('addonspackageprice');
                var addonspackage_name =  $(this).data('addonspackagename');
                var addonspackage_id =  $(this).data('addonspackageid');
                var packagePriceWithQty = qtyvalue * packageprice;
                totalPrice = parseFloat(totalPrice) + parseFloat(packagePriceWithQty);

                let addonsName =  closeclass.find('input.qty').attr('name');
                let addons_name = closeclass.find('input.qty').data('name');

                $('.'+addonspackage_name).show();
                $('.add-ons-items-view-th').show();
                $('.'+addonspackage_name).find('.quantity').text(qtyvalue);
                $('.'+addonspackage_name).find('.addons-item-price').text(accounting.formatMoney(packagePriceWithQty,window.currencySymbol) + window.plan_period_time);

                if((typeof addonsName !== 'undefined') && (typeof qtyvalue !== 'undefined')){
                    window.selectedAddons.push({addons_name:addonsName, addons_qty:qtyvalue, addons_id: addonspackage_id});

                    if (window.sessionStorage) {
                        if ($('#add_ons tbody tr').hasClass(addonsName)) {
                            sessionStorage.removeItem(addonsName);
                            $('#add_ons tbody tr.'+addonsName).find('td.quantity').html(qtyvalue);
                        } else {
                            $('#add_ons tbody').append('<tr class="'+addonsName+'"><td>'+addons_name+'</td><td class="quantity text-right">'+qtyvalue+'</td> <td class="addons-item-price text-right">'+accounting.formatMoney(packagePriceWithQty,window.currencySymbol) + window.plan_period_time +'</td> <td class="trash-item text-center"><i class="fa fa-trash" aria-hidden="true"></i></td></tr>')
                        }
                        sessionStorage.setItem(addonsName, qtyvalue);
                    }
                }
            }
        });
        $('.p_price').text(accounting.formatMoney(totalPrice, window.currencySymbol) + window.plan_period_time);
        $('input[name="add_ons"]').val(JSON.stringify(window.selectedAddons))
        window.totalPrice = totalPrice;
    }

    $('#otherindustrydiv').hide();

    $(document).on('change', '#clients-industry', function () {
        var industry = $('#clients-industry').val();
        if (industry != '' && industry == 'Others') {
            $('#otherindustrydiv').show();
        } else {
            $('#otherindustrydiv').hide();
        }
    });

    $('select.apply_discount').change(function () {
        if ($(this).val() == 'enter_promo_code') {
            $('div.promo_code_inputs').show();
            $(this).hide();
        }
        calculateTotal();
    });

    /*
    //Auto Select first Option in dropdown
    if($('select.apply_discount').length > 0){
        setTimeout(function () {
            $('select.apply_discount').val($('select.apply_discount option').eq(1).val()).trigger('change');
        }, 400)
    }*/

    $('input.promo_code').change(function () {
        calculateTotal();
    });

    $('button.close_promo_code').click(function () {
        $('input.promo_code').val('');
        $('div.promo_code_inputs').hide();
        $('select.apply_discount').show().val('');
        calculateTotal();
    });
    var calcTotalXHR = null;

    function calculateTotal() {

        if (calcTotalXHR != null) {
            calcTotalXHR.abort();
        }

        var discount = 0;
        var numof_employees = 1;
        var promo_code = '';
        var apply_discount_ele = $('select.apply_discount');
        var promo_code_ele = $('input.promo_code');
        if (apply_discount_ele.length > 0) {
            if (apply_discount_ele.val().length > 0) {
                if (apply_discount_ele.val() == 'enter_promo_code') {
                    //Do Nothing
                } else {
                    discount = apply_discount_ele.val();
                }
            }
        }
        if (promo_code_ele.length > 0) {
            if (promo_code_ele.val().length > 0) {
                promo_code = promo_code_ele.val();
            }
        }
        if($('input[name="numof_employees"]').length == 1) {
            numof_employees = $('input[name="numof_employees"]').val();
        }
        NProgress.start();
        calcTotalXHR = $.ajax({
            url: 'site/payment/multiitemscalculateprice',
            type: 'post',
            dataType: 'json',
            data: {
                plan_id: $('input[name="plan_id"]').val(),
                numof_employees: numof_employees,
                product_ids: window.selectedItems,
                addons: window.selectedAddons,
                discount: discount,
                promo_code: promo_code,
            },
            success: function (response) {
                NProgress.done();
                if (response.invalidCoupon) {
                    toastr.error('Invalid Coupon!');
                    $('input.promo_code').val('');
                } else {
                    $('.p_price').html(accounting.formatMoney(response.totalPrice, window.currencySymbol));
                }
            }
        });
    }

    $('.stepforminput').keyup(function () {
        var name = $('#clients-cname').val();
        var clname = $('#clients-clname').val();
        var email = $('#clients-cemail').val();
        $('#clients-first_name').val(name);
        $('#clients-last_name').val(clname);
        $('#clients-email').val(email);
    });

    var stripe = Stripe(window.stripeKey);

    // Create an instance of Elements.
    var elements = stripe.elements();

    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    // Create an instance of the card Element.
    var card = elements.create('card', {hidePostalCode: true, style: style});

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');
    setTimeout(function () {
        if(window.focusCard){
            card.focus()
        }
    }, 600);
    // Handle real-time validation errors from the card Element.
    var hasError = false;
    card.addEventListener('change', function (event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            hasError = true;
            displayError.textContent = event.error.message;
            $('button#payBtn').attr('disabled', true);
            NProgress.done();
        } else {
            hasError = false;
            displayError.textContent = '';
            $('button#payBtn').removeAttr('disabled');
        }
    });

    $('button#payBtn').click(function (e) {
        e.preventDefault();
        $('#payment-form').data('yiiActiveForm').submitting = true;
        $('#payment-form').yiiActiveForm('validate');
        $('#card-element').trigger('change');
    });

    $('#payment-form').on('beforeSubmit', function (e) {
        if($('#payment-form .has-error').length == 0){
            NProgress.start();
            $('button#payBtn').attr('disabled', true);
            stripe
                .createPaymentMethod({
                    type: 'card',
                    card: card,
                    billing_details: {
                        name: $('input#clients-cname').val(),
                    },
                })
                .then(function(result) {
                    // Handle result.error or result.paymentMethod
                    NProgress.done();
                    if (result.paymentMethod) {
                        processPayment(result.paymentMethod.id)
                    } else if (result.error) {
                        $('button#payBtn').removeAttr('disabled');
                        toastr.error(result.error.message);
                    } else {
                        $('button#payBtn').removeAttr('disabled');
                        toastr.error("Something went wrong!");
                    }
                });

        }
        return false;
    });

    function processPayment(paymentMethodId) {

        let formData = $('form#payment-form').serializeArray();
        formData.push({ name : 'paymentMethodId', value : paymentMethodId});
        //console.log(formData)
        NProgress.start();
        $('button#payBtn').attr('disabled', true);
        $('div.paymentWrapper').hide();
        $('div.processingMessage').fadeIn();
        $('html, body').animate({ scrollTop: $('div.processingMessage').offset().top}, 400);
        $.ajax({
            url: 'site/payment/multiitemspaymentprocess',
            type: 'post',
            dataType: 'json',
            data: formData,
            success: function (response) {
                if (response.success && (response.payment_intent == null || response.payment_intent.status === 'succeeded')) {

                    // Successful subscription payment
                    formData.push({ name : 'subscriptionId', value : response.subscription_id});
                    formData.push({ name : 'paymentIntent', value : (response.payment_intent !== null) ? JSON.stringify(response.payment_intent) : null });
                    formData.push({ name : 'currencySymbol', value : window.currencySymbol});
                    formData.push({ name : 'country', value : window.country});
                    formData.push({ name : 'countryShortCode', value : window.countryShortCode});
                    formData.push({ name : 'currencyName', value : window.currencyName});
                    formData.push({ name : 'currencyCode', value : window.currencyCode});
                    //toastr.info("Payment Success!")
                    NProgress.done();
                    completePaymentProcessing(formData);

                } else if (response.success && (response.payment_intent.status === 'requires_action' || response.payment_intent.status === 'requires_confirmation')) {
                    stripe
                        .confirmCardPayment(response.payment_intent_client_secret, {
                            payment_method: paymentMethodId,
                        })
                        .then(function(result) {
                            //console.log(result);
                            if(result.error) {
                                toastr.error(result.error.message);
                                $('button#payBtn').removeAttr('disabled');
                                $('div.paymentWrapper').show();
                                $('div.processingMessage').fadeOut();
                                $('html, body').animate({ scrollTop: $('div.paymentdetails').offset().top}, 400);
                                NProgress.done();
                            } else {
                                // Successful subscription payment
                                formData.push({ name : 'subscriptionId', value : response.subscription_id});
                                formData.push({ name : 'paymentIntent', value : JSON.stringify(result.paymentIntent)});
                                formData.push({ name : 'currencySymbol', value : window.currencySymbol});
                                formData.push({ name : 'country', value : window.country});
                                formData.push({ name : 'countryShortCode', value : window.countryShortCode});
                                formData.push({ name : 'currencyName', value : window.currencyName});
                                formData.push({ name : 'currencyCode', value : window.currencyCode});
                                //toastr.info("Payment Success!")
                                NProgress.done();
                                completePaymentProcessing(formData);
                            }
                        });
                } else {
                    if(response.hasOwnProperty('messages') && response.messages.length > 0){
                        $(response.messages).each(function () {
                            toastr.error(this);
                        });
                    } else {
                        toastr.error(response.message);
                    }
                    $('button#payBtn').removeAttr('disabled');
                    $('div.paymentWrapper').show();
                    $('div.processingMessage').fadeOut();
                    $('html, body').animate({ scrollTop: $('div.paymentdetails').offset().top}, 400);
                    NProgress.done();
                }
            },
            error: function (response) {
                toastr.error("Something went wrong!");
                NProgress.done();
            }
        })
    }

    function completePaymentProcessing(formData)
    {
        NProgress.start();
        $.ajax({
            url: 'site/payment/multiitemscompletingpaymentprocess',
            type: 'post',
            dataType: 'json',
            data: formData,
            success: function (response) {
                if(response.success){
                    sessionStorage.clear();
                    toastr.success("Processing Completed!");
                    window.location.href = response.redirect_to;
                } else {
                    if(response.hasOwnProperty('messages') && response.messages.length > 0){
                        $(response.messages).each(function () {
                            toastr.error(this);
                        });
                    } else {
                        toastr.error(response.message);
                    }
                    $('button#payBtn').removeAttr('disabled');
                    $('div.paymentWrapper').show();
                    $('div.processingMessage').fadeOut();
                    $('html, body').animate({ scrollTop: $('div.paymentdetails').offset().top}, 400);
                }
                NProgress.done();
            },
            error: function (response) {
                toastr.error("Something went wrong!");
                NProgress.done();
            }
        })
    }
});