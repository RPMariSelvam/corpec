$(document).ready(function () {
    var AppConfig = new AppConfigs();
    var baseUrl = AppConfig.getBaseUrl();

    $('#otherindustrydiv').hide();
    $(document).on('change', '#clients-industry', function () {
        var industry = $('#clients-industry').val();
        if (industry != '' && industry == 'Others') {
            $('#otherindustrydiv').show();
        } else {
            $('#otherindustrydiv').hide();
        }
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
            $('#payment-form').css({opacity: 1});
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

    var numof_employees_input = $("input[name='numof_employees']");

    numof_employees_input.change(function(){
        var numof_employees = numof_employees_input.val();
        if(numof_employees_input.length == 1 && numof_employees !== undefined){
            numof_employees = parseInt(numof_employees);
            if(numof_employees < 1){
                numof_employees_input.val(1);
                toastr.error("Invalid value in number of users!");
                return;
            }
        }
        calculateTotal();
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

        var product = $('input[name="product"]').val();
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
        if(numof_employees_input.length == 1) {
            numof_employees = $('input[name="numof_employees"]').val();
        }
        NProgress.start();
        calcTotalXHR = $.ajax({
            url: 'site/payment/calculateprice',
            //url: AppConfig.getBaseUrl() + '/payment/calculateprice',
            type: 'post',
            dataType: 'json',
            data: {
                plan_id: $('input[name="plan_id"]').val(),
                package_id: $('input[name="id"]').val(),
                numof_employees: numof_employees,
                discount: discount,
                product: product,
                promo_code: promo_code
            },
            success: function (response) {
                NProgress.done();
                if (response.invalidCoupon) {
                    toastr.error('Invalid Coupon!');
                    $('input.promo_code').val();
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

    function processPayment(paymentMethodId)
    {

        let formData = $('form#payment-form').serializeArray();
        formData.push({ name : 'paymentMethodId', value : paymentMethodId});
        //console.log(formData)
        NProgress.start();
        $('button#payBtn').attr('disabled', true);
        $('div.paymentWrapper').hide();
        $('div.processingMessage').fadeIn();
        $('html, body').animate({ scrollTop: $('div.processingMessage').offset().top}, 400);
        $.ajax({
            url: 'site/payment/processing',
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
            url: 'site/payment/completingprocess',
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