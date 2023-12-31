(function (root, factory) {
    if (typeof define === "function" && define.amd) {
        define([], function () {
            return factory();
        });
    } else if (typeof exports === "object") {
        module.exports = factory();
    } else {
        root.Headhesive = factory();
    }
})(this, function () {
    "use strict";
    var _mergeObj = function (to, from) {
        for (var p in from) {
            if (from.hasOwnProperty(p)) {
                to[p] = typeof from[p] === "object" ? _mergeObj(to[p], from[p]) : from[p];
            }
        }
        return to;
    };
    var _throttle = function (func, wait) {
        var _now = Date.now || function () {
                return new Date().getTime();
            };
        var context, args, result;
        var timeout = null;
        var previous = 0;
        var later = function () {
            previous = _now();
            timeout = null;
            result = func.apply(context, args);
            context = args = null;
        };
        return function () {
            var now = _now();
            var remaining = wait - (now - previous);
            context = this;
            args = arguments;
            if (remaining <= 0) {
                clearTimeout(timeout);
                timeout = null;
                previous = now;
                result = func.apply(context, args);
                context = args = null;
            } else if (!timeout) {
                timeout = setTimeout(later, remaining);
            }
            return result;
        };
    };
    var _getScrollY = function () {
        return window.pageYOffset !== undefined ? window.pageYOffset : (document.documentElement || document.body.parentNode || document.body).scrollTop;
    };
    var _getElemY = function (elem, side) {
        var pos = 0;
        var elemHeight = elem.offsetHeight;
        while (elem) {
            pos += elem.offsetTop;
            elem = elem.offsetParent;
        }
        if (side === "bottom") {
            pos = pos + elemHeight;
        }
        return pos;
    };
    var Headhesive = function (elem, options) {
        if (!("querySelector"in document && "addEventListener"in window)) {
            return;
        }
        this.visible = false;
        this.options = {
            offset: 300,
            offsetSide: "top",
            classes: {clone: "headhesive", stick: "headhesive--stick", unstick: "headhesive--unstick"},
            throttle: 250,
            onInit: function () {
            },
            onStick: function () {
            },
            onUnstick: function () {
            },
            onDestroy: function () {
            }
        };
        this.elem = typeof elem === "string" ? document.querySelector(elem) : elem;
        this.options = _mergeObj(this.options, options);
        this.init();
    };
    Headhesive.prototype = {
        constructor: Headhesive, init: function () {
            this.clonedElem = this.elem.cloneNode(true);
            this.clonedElem.className += " " + this.options.classes.clone;
            document.body.insertBefore(this.clonedElem, document.body.firstChild);
            if (typeof this.options.offset === "number") {
                this.scrollOffset = this.options.offset;
            } else if (typeof this.options.offset === "string") {
                this._setScrollOffset();
            } else {
                throw new Error("Invalid offset: " + this.options.offset);
            }

            var pathname = window.location.pathname;
            if((pathname.search("/inventory") != -1) || (pathname.search("/sg/inventory") != -1) || (pathname.search("/in/inventory") != -1) || (pathname.search("/my/inventory") != -1) || (pathname.search("/ph/inventory") != -1) || (pathname.search("/hrm") != -1) || (pathname.search("/sg/hrm") != -1) || (pathname.search("/in/hrm") != -1) || (pathname.search("/my/hrm") != -1) || (pathname.search("/ph/hrm") != -1) || (pathname.search("/crm") != -1) || (pathname.search("/sg/crm") != -1) || (pathname.search("/in/crm") != -1) || (pathname.search("/my/crm") != -1) || (pathname.search("/ph/crm") != -1) || (pathname.search("/pos") != -1) || (pathname.search("/sg/pos") != -1) || (pathname.search("/in/pos") != -1) || (pathname.search("/my/pos") != -1) || (pathname.search("/ph/pos") != -1) || (pathname.search("/asalta-retail-suite") != -1) || (pathname.search("/sg/asalta-retail-suite") != -1) || (pathname.search("/in/asalta-retail-suite") != -1) || (pathname.search("/my/asalta-retail-suite") != -1) || (pathname.search("/ph/asalta-retail-suite") != -1))
            {
                $(".contentdiv").removeClass('productMenuDisable').addClass('productMenuEnable');
                var AppConfig = new AppConfigs();
                var getbsaeurl = AppConfig.getBaseUrl();
                var bsaeurl = getbsaeurl.slice(0, getbsaeurl.length-2);
                if((pathname.search("/inventory") != -1) || (pathname.search("/sg/inventory") != -1) || (pathname.search("/in/inventory") != -1) || (pathname.search("/my/inventory") != -1) || (pathname.search("/ph/inventory") != -1))
                {
                    $("#inventoryimg").attr("src",bsaeurl+"images/inventorypsd.png");
                    $("#inventoryimg").css("margin", "0px");
                    $("#inventoryimg").css("padding-left", "0px");
                }
                if((pathname.search("/hrm") != -1) || (pathname.search("/sg/hrm") != -1) || (pathname.search("/in/hrm") != -1) || (pathname.search("/my/hrm") != -1) || (pathname.search("/ph/hrm") != -1))
                {
                    $("#hrmimg").attr("src",bsaeurl+"images/hrmlogo.png");
                    $("#hrmimg").css("margin", "0px");
                    $("#hrmimg").css("padding-left", "0px");
                }
                if((pathname.search("/crm") != -1) || (pathname.search("/sg/crm") != -1) || (pathname.search("/in/crm") != -1) || (pathname.search("/my/crm") != -1) || (pathname.search("/ph/crm") != -1))
                {
                    $("#crmimg").attr("src",bsaeurl+"images/crmlogo.png");
                    $("#crmimg").css("margin", "0px");
                    $("#crmimg").css("padding-left", "0px");
                }
                if((pathname.search("/pos") != -1) || (pathname.search("/sg/pos") != -1) || (pathname.search("/in/pos") != -1) || (pathname.search("/my/pos") != -1) || (pathname.search("/ph/pos") != -1))
                {
                    $("#posimg").attr("src",bsaeurl+"images/asalta-pos-logo.png");
                    $("#posimg").css("margin", "0px");
                    $("#posimg").css("padding-left", "0px");
                }
                if((pathname.search("/asalta-retail-suite") != -1) || (pathname.search("/sg/asalta-retail-suite") != -1) || (pathname.search("/in/asalta-retail-suite") != -1))
                {
                    $("#retailimg").attr("src",bsaeurl+"images/Retail-Suite-logo.png");
                    $("#retailimg").css("margin", "0px");
                    $("#retailimg").css("padding-left", "0px");
                }
                if((pathname.search("/ecommerce") != -1) || (pathname.search("/sg/ecommerce") != -1) || (pathname.search("/in/ecommerce") != -1) || (pathname.search("/my/ecommerce") != -1) || (pathname.search("/ph/ecommerce") != -1))
                {
                    $("#ecommerceimg").attr("src",bsaeurl+"images/asalta-E-commerce.png");
                    $("#ecommerceimg").css("margin", "0px");
                    $("#ecommerceimg").css("padding-left", "0px");
                }
            }else{
                $(".contentdiv").removeClass('productMenuEnable').addClass('productMenuDisable');
            }
            this._throttleUpdate = _throttle(this.update.bind(this), this.options.throttle);
            this._throttleScrollOffset = _throttle(this._setScrollOffset.bind(this), this.options.throttle);
            window.addEventListener("scroll", this._throttleUpdate, false);
            window.addEventListener("resize", this._throttleScrollOffset, false);
            this.options.onInit.call(this);
        }, _setScrollOffset: function () {
            if (typeof this.options.offset === "string") {
                this.scrollOffset = _getElemY(document.querySelector(this.options.offset), this.options.offsetSide);
            }
        }, destroy: function () {
            document.body.removeChild(this.clonedElem);
            window.removeEventListener("scroll", this._throttleUpdate);
            window.removeEventListener("resize", this._throttleScrollOffset);
            this.options.onDestroy.call(this);
        }, stick: function () {
            if (!this.visible) {
                this.clonedElem.className = this.clonedElem.className.replace(new RegExp("(^|s)*" + this.options.classes.unstick + "(s|$)*", "g"), "");
                this.clonedElem.className += " " + this.options.classes.stick;
                var pathname = window.location.pathname;
                if(this.options.classes.stick == "banner--stick"){
                    /*$(".banner1").css("margin-top", "0px");
                    $(".banner1").css("display", "block");*/
                    $(".banner1").removeClass('banner1MenuDisable').addClass('banner1MenuEnable');
                    var AppConfig = new AppConfigs();
                    var getbsaeurl = AppConfig.getBaseUrl();
                    var bsaeurl = getbsaeurl.slice(0, getbsaeurl.length-2);
                    if((pathname.search("/inventory") != -1) || (pathname.search("/sg/inventory") != -1) || (pathname.search("/in/inventory") != -1) || (pathname.search("/my/inventory") != -1) || (pathname.search("/ph/inventory") != -1))
                    {
                        $("#inventoryimg").attr("src",bsaeurl+"images/inventorypsd.png");
                        $("#inventoryimg").css("margin", "0px");
                        $("#inventoryimg").css("padding-left", "0px");
                    }
                    if((pathname.search("/hrm") != -1) || (pathname.search("/sg/hrm") != -1) || (pathname.search("/in/hrm") != -1) || (pathname.search("/my/hrm") != -1) || (pathname.search("/ph/hrm") != -1))
                    {
                        $("#hrmimg").attr("src",bsaeurl+"images/hrmlogo.png");
                        $("#hrmimg").css("margin", "0px");
                        $("#hrmimg").css("padding-left", "0px");
                    }
                    if((pathname.search("/crm") != -1) || (pathname.search("/sg/crm") != -1) || (pathname.search("/in/crm") != -1) || (pathname.search("/my/crm") != -1) || (pathname.search("/ph/crm") != -1))
                    {
                        $("#crmimg").attr("src",bsaeurl+"images/crmlogo.png");
                        $("#crmimg").css("margin", "0px");
                        $("#crmimg").css("padding-left", "0px");
                    }
                    if((pathname.search("/pos") != -1) || (pathname.search("/sg/pos") != -1) || (pathname.search("/in/pos") != -1) || (pathname.search("/my/pos") != -1) || (pathname.search("/ph/pos") != -1))
                    {
                        $("#posimg").attr("src",bsaeurl+"images/asalta-pos-logo.png");
                        $("#posimg").css("margin", "0px");
                        $("#posimg").css("padding-left", "0px");
                    }
                    if((pathname.search("/asalta-retail-suite") != -1) || (pathname.search("/sg/asalta-retail-suite") != -1) || (pathname.search("/in/asalta-retail-suite") != -1))
                    {
                        $("#retailimg").attr("src",bsaeurl+"images/Retail-Suite-logo.png");
                        $("#retailimg").css("margin", "0px");
                        $("#retailimg").css("padding-left", "0px");
                    }
                    if((pathname.search("/ecommerce") != -1) || (pathname.search("/sg/ecommerce") != -1) || (pathname.search("/in/ecommerce") != -1) || (pathname.search("/my/ecommerce") != -1) || (pathname.search("/ph/ecommerce") != -1))
                    {
                        $("#ecommerceimg").attr("src",bsaeurl+"images/asalta-E-commerce.png");
                        $("#ecommerceimg").css("margin", "0px");
                        $("#ecommerceimg").css("padding-left", "0px");
                    }
                }
                this.visible = true;
                this.options.onStick.call(this);
            }
        }, unstick: function () {
            if (this.visible) {
                this.clonedElem.className = this.clonedElem.className.replace(new RegExp("(^|s)*" + this.options.classes.stick + "(s|$)*", "g"), "");
                this.clonedElem.className += " " + this.options.classes.unstick;

                var pathname = window.location.pathname;
                if((pathname.search("/inventory") != -1) || (pathname.search("/sg/inventory") != -1) || (pathname.search("/in/inventory") != -1) || (pathname.search("/my/inventory") != -1) || (pathname.search("/ph/inventory") != -1) || (pathname.search("/hrm") != -1) || (pathname.search("/sg/hrm") != -1) || (pathname.search("/in/hrm") != -1) || (pathname.search("/my/hrm") != -1) || (pathname.search("/ph/hrm") != -1) || (pathname.search("/crm") != -1) || (pathname.search("/sg/crm") != -1) || (pathname.search("/in/crm") != -1) || (pathname.search("/my/crm") != -1) || (pathname.search("/ph/crm") != -1) || (pathname.search("/pos") != -1) || (pathname.search("/sg/pos") != -1) || (pathname.search("/my/pos") != -1) || (pathname.search("/ph/pos") != -1) || (pathname.search("/in/pos") != -1) || (pathname.search("/asalta-retail-suite") != -1) || (pathname.search("/sg/asalta-retail-suite") != -1) || (pathname.search("/in/asalta-retail-suite") != -1) || (pathname.search("/ecommerce") != -1) || (pathname.search("/sg/ecommerce") != -1) || (pathname.search("/in/ecommerce") != -1) || (pathname.search("/my/ecommerce") != -1) || (pathname.search("/ph/ecommerce") != -1) )
                {
                    if(this.options.classes.unstick == "banner--unstick"){
                        $(".banner1").removeClass('banner1MenuDisable').addClass('banner1MenuEnable');
                        /*$(".banner1").css("margin-top", "0px");
                        $(".banner1").css("dispaly", "block");*/
                        $(".contentdiv").removeClass('productMenuDisable').addClass('productMenuEnable');
                        if($(".nav-container header.sub-header").hasClass("banner1")){
                            $(".nav-container header.sub-header").css("display", "block");
                        }else{
                            $(".nav-container header.sub-header").css("display", "none");
                        }

                    }
                }else{
                    if(this.options.classes.unstick == "banner--unstick"){
                        $(".banner1").removeClass('banner1MenuEnable').addClass('banner1MenuDisable');
                        //$(".banner1").css("margin-top", "-75px");
                        $(".contentdiv").removeClass('productMenuEnable').addClass('productMenuDisable');
                        if($(".nav-container header.sub-header").hasClass("banner1")){
                            $(".nav-container header.sub-header").css("display", "none");
                        }else{
                            $(".nav-container header.sub-header").css("display", "none");
                        }
                    }
                }
                this.visible = false;
                this.options.onUnstick.call(this);
            }
        }, update: function () {
            if (_getScrollY() > this.scrollOffset) {
                this.stick();
            } else {
                this.unstick();
            }
        }
    };
    return Headhesive;
});