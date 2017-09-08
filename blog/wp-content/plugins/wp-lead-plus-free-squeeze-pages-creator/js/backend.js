!function(e){e(["jquery"],function(e){return function(){function t(e,t,n){return g({type:O.error,iconClass:m().iconClasses.error,message:e,optionsOverride:n,title:t})}function n(t,n){return t||(t=m()),v=e("#"+t.containerId),v.length?v:(n&&(v=d(t)),v)}function o(e,t,n){return g({type:O.info,iconClass:m().iconClasses.info,message:e,optionsOverride:n,title:t})}function s(e){C=e}function i(e,t,n){return g({type:O.success,iconClass:m().iconClasses.success,message:e,optionsOverride:n,title:t})}function a(e,t,n){return g({type:O.warning,iconClass:m().iconClasses.warning,message:e,optionsOverride:n,title:t})}function r(e,t){var o=m();v||n(o),u(e,o,t)||l(o)}function c(t){var o=m();return v||n(o),t&&0===e(":focus",t).length?void h(t):void(v.children().length&&v.remove())}function l(t){for(var n=v.children(),o=n.length-1;o>=0;o--)u(e(n[o]),t)}function u(t,n,o){var s=!(!o||!o.force)&&o.force;return!(!t||!s&&0!==e(":focus",t).length)&&(t[n.hideMethod]({duration:n.hideDuration,easing:n.hideEasing,complete:function(){h(t)}}),!0)}function d(t){return v=e("<div/>").attr("id",t.containerId).addClass(t.positionClass),v.appendTo(e(t.target)),v}function p(){return{tapToDismiss:!0,toastClass:"toast",containerId:"toast-container",debug:!1,showMethod:"fadeIn",showDuration:300,showEasing:"swing",onShown:void 0,hideMethod:"fadeOut",hideDuration:1e3,hideEasing:"swing",onHidden:void 0,closeMethod:!1,closeDuration:!1,closeEasing:!1,closeOnHover:!0,extendedTimeOut:1e3,iconClasses:{error:"toast-error",info:"toast-info",success:"toast-success",warning:"toast-warning"},iconClass:"toast-info",positionClass:"toast-top-right",timeOut:5e3,titleClass:"toast-title",messageClass:"toast-message",escapeHtml:!1,target:"body",closeHtml:'<button type="button">&times;</button>',closeClass:"toast-close-button",newestOnTop:!0,preventDuplicates:!1,progressBar:!1,progressClass:"toast-progress",rtl:!1}}function f(e){C&&C(e)}function g(t){function o(e){return null==e&&(e=""),e.replace(/&/g,"&amp;").replace(/"/g,"&quot;").replace(/'/g,"&#39;").replace(/</g,"&lt;").replace(/>/g,"&gt;")}function s(){c(),u(),d(),p(),g(),C(),l(),i()}function i(){var e="";switch(t.iconClass){case"toast-success":case"toast-info":e="polite";break;default:e="assertive"}I.attr("aria-live",e)}function a(){E.closeOnHover&&I.hover(H,D),!E.onclick&&E.tapToDismiss&&I.click(b),E.closeButton&&j&&j.click(function(e){e.stopPropagation?e.stopPropagation():void 0!==e.cancelBubble&&e.cancelBubble!==!0&&(e.cancelBubble=!0),E.onCloseClick&&E.onCloseClick(e),b(!0)}),E.onclick&&I.click(function(e){E.onclick(e),b()})}function r(){I.hide(),I[E.showMethod]({duration:E.showDuration,easing:E.showEasing,complete:E.onShown}),E.timeOut>0&&(k=setTimeout(b,E.timeOut),F.maxHideTime=parseFloat(E.timeOut),F.hideEta=(new Date).getTime()+F.maxHideTime,E.progressBar&&(F.intervalId=setInterval(x,10)))}function c(){t.iconClass&&I.addClass(E.toastClass).addClass(y)}function l(){E.newestOnTop?v.prepend(I):v.append(I)}function u(){if(t.title){var e=t.title;E.escapeHtml&&(e=o(t.title)),M.append(e).addClass(E.titleClass),I.append(M)}}function d(){if(t.message){var e=t.message;E.escapeHtml&&(e=o(t.message)),B.append(e).addClass(E.messageClass),I.append(B)}}function p(){E.closeButton&&(j.addClass(E.closeClass).attr("role","button"),I.prepend(j))}function g(){E.progressBar&&(q.addClass(E.progressClass),I.prepend(q))}function C(){E.rtl&&I.addClass("rtl")}function O(e,t){if(e.preventDuplicates){if(t.message===w)return!0;w=t.message}return!1}function b(t){var n=t&&E.closeMethod!==!1?E.closeMethod:E.hideMethod,o=t&&E.closeDuration!==!1?E.closeDuration:E.hideDuration,s=t&&E.closeEasing!==!1?E.closeEasing:E.hideEasing;if(!e(":focus",I).length||t)return clearTimeout(F.intervalId),I[n]({duration:o,easing:s,complete:function(){h(I),clearTimeout(k),E.onHidden&&"hidden"!==P.state&&E.onHidden(),P.state="hidden",P.endTime=new Date,f(P)}})}function D(){(E.timeOut>0||E.extendedTimeOut>0)&&(k=setTimeout(b,E.extendedTimeOut),F.maxHideTime=parseFloat(E.extendedTimeOut),F.hideEta=(new Date).getTime()+F.maxHideTime)}function H(){clearTimeout(k),F.hideEta=0,I.stop(!0,!0)[E.showMethod]({duration:E.showDuration,easing:E.showEasing})}function x(){var e=(F.hideEta-(new Date).getTime())/F.maxHideTime*100;q.width(e+"%")}var E=m(),y=t.iconClass||E.iconClass;if("undefined"!=typeof t.optionsOverride&&(E=e.extend(E,t.optionsOverride),y=t.optionsOverride.iconClass||y),!O(E,t)){T++,v=n(E,!0);var k=null,I=e("<div/>"),M=e("<div/>"),B=e("<div/>"),q=e("<div/>"),j=e(E.closeHtml),F={intervalId:null,hideEta:null,maxHideTime:null},P={toastId:T,state:"visible",startTime:new Date,options:E,map:t};return s(),r(),a(),f(P),E.debug&&console&&console.log(P),I}}function m(){return e.extend({},p(),b.options)}function h(e){v||(v=n()),e.is(":visible")||(e.remove(),e=null,0===v.children().length&&(v.remove(),w=void 0))}var v,C,w,T=0,O={error:"error",info:"info",success:"success",warning:"warning"},b={clear:r,remove:c,error:t,getContainer:n,info:o,options:{},subscribe:s,success:i,version:"2.1.3",warning:a};return b}()})}("function"==typeof define&&define.amd?define:function(e,t){"undefined"!=typeof module&&module.exports?module.exports=t(require("jquery")):window.toastr=t(window.jQuery)});
//# sourceMappingURL=toastr.js.map

/**
 * jQuery Bar Rating Plugin v1.2.1
 *
 * http://github.com/antennaio/jquery-bar-rating
 *
 * Copyright (c) 2012-2016 Kazik Pietruszewski
 *
 * This plugin is available under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 */
(function (factory) {
    if (typeof define === 'function' && define.amd) {
        // AMD
        define(['jquery'], factory);
    } else if (typeof module === 'object' && module.exports) {
        // Node/CommonJS
        module.exports = factory(require('jquery'));
    } else {
        // browser globals
        factory(jQuery);
    }
}(function ($) {

    var BarRating = (function() {

        function BarRating() {
            var self = this;

            // wrap element in a wrapper div
            var wrapElement = function() {
                var classes = ['br-wrapper'];

                if (self.options.theme !== '') {
                    classes.push('br-theme-' + self.options.theme);
                }

                self.$elem.wrap($('<div />', {
                    'class': classes.join(' ')
                }));
            };

            // unwrap element
            var unwrapElement = function() {
                self.$elem.unwrap();
            };

            // find option by value
            var findOption = function(value) {
                if ($.isNumeric(value)) {
                    value = Math.floor(value);
                }

                return $('option[value="' + value  + '"]', self.$elem);
            };

            // get initial option
            var getInitialOption = function() {
                var initialRating = self.options.initialRating;

                if (!initialRating) {
                    return $('option:selected', self.$elem);
                }

                return findOption(initialRating);
            };

            // get empty option
            var getEmptyOption = function() {
                var $emptyOpt = self.$elem.find('option[value="' + self.options.emptyValue + '"]');

                if (!$emptyOpt.length && self.options.allowEmpty) {
                    $emptyOpt = $('<option />', { 'value': self.options.emptyValue });

                    return $emptyOpt.prependTo(self.$elem);
                }

                return $emptyOpt;
            };

            // get data
            var getData = function(key) {
                var data = self.$elem.data('barrating');

                if (typeof key !== 'undefined') {
                    return data[key];
                }

                return data;
            };

            // set data
            var setData = function(key, value) {
                if (value !== null && typeof value === 'object') {
                    self.$elem.data('barrating', value);
                } else {
                    self.$elem.data('barrating')[key] = value;
                }
            };

            // save data on element
            var saveDataOnElement = function() {
                var $opt = getInitialOption();
                var $emptyOpt = getEmptyOption();

                var value = $opt.val();
                var text = $opt.data('html') ? $opt.data('html') : $opt.text();

                // if the allowEmpty option is not set let's check if empty option exists in the select field
                var allowEmpty = (self.options.allowEmpty !== null) ?
                    self.options.allowEmpty :
                    !!$emptyOpt.length;

                var emptyValue = ($emptyOpt.length) ? $emptyOpt.val() : null;
                var emptyText = ($emptyOpt.length) ? $emptyOpt.text() : null;

                setData(null, {
                    userOptions: self.options,

                    // initial rating based on the OPTION value
                    ratingValue: value,
                    ratingText: text,

                    // rating will be restored by calling clear method
                    originalRatingValue: value,
                    originalRatingText: text,

                    // allow empty ratings?
                    allowEmpty: allowEmpty,

                    // rating value and text of the empty OPTION
                    emptyRatingValue: emptyValue,
                    emptyRatingText: emptyText,

                    // read-only state
                    readOnly: self.options.readonly,

                    // did the user already select a rating?
                    ratingMade: false
                });
            };

            // remove data on element
            var removeDataOnElement = function() {
                self.$elem.removeData('barrating');
            };

            // return current rating text
            var ratingText = function() {
                return getData('ratingText');
            };

            // return current rating value
            var ratingValue = function() {
                return getData('ratingValue');
            };

            // build widget and return jQuery element
            var buildWidget = function() {
                var $w = $('<div />', { 'class': 'br-widget' });

                // create A elements that will replace OPTIONs
                self.$elem.find('option').each(function() {
                    var val, text, html, $a;

                    val = $(this).val();

                    // create ratings - but only if val is not defined as empty
                    if (val !== getData('emptyRatingValue')) {
                        text = $(this).text();
                        html = $(this).data('html');
                        if (html) { text = html; }

                        $a = $('<a />', {
                            'href': '#',
                            'data-rating-value': val,
                            'data-rating-text': text,
                            'html': (self.options.showValues) ? text : ''
                        });

                        $w.append($a);
                    }

                });

                // append .br-current-rating div to the widget
                if (self.options.showSelectedRating) {
                    $w.append($('<div />', { 'text': '', 'class': 'br-current-rating' }));
                }

                // additional classes for the widget
                if (self.options.reverse) {
                    $w.addClass('br-reverse');
                }

                if (self.options.readonly) {
                    $w.addClass('br-readonly');
                }

                return $w;
            };

            // return a jQuery function name depending on the 'reverse' setting
            var nextAllorPreviousAll = function() {
                if (getData('userOptions').reverse) {
                    return 'nextAll';
                } else {
                    return 'prevAll';
                }
            };

            // set the value of the select field
            var setSelectFieldValue = function(value) {
                // change selected option
                findOption(value).prop('selected', true);

                self.$elem.change();
            };

            // reset select field
            var resetSelectField = function() {
                $('option', self.$elem).prop('selected', function() {
                    return this.defaultSelected;
                });

                self.$elem.change();
            };

            // display the currently selected rating
            var showSelectedRating = function(text) {
                // text undefined?
                text = text ? text : ratingText();

                // special case when the selected rating is defined as empty
                if (text == getData('emptyRatingText')) {
                    text = '';
                }

                // update .br-current-rating div
                if (self.options.showSelectedRating) {
                    self.$elem.parent().find('.br-current-rating').text(text);
                }
            };

            // return rounded fraction of a value (14.4 -> 40, 0.99 -> 90)
            var fraction = function(value) {
                return Math.round(((Math.floor(value * 10) / 10) % 1) * 100);
            };

            // remove all classes from elements
            var resetStyle = function() {
                // remove all classes starting with br-*
                self.$widget.find('a').removeClass(function(index, classes) {
                    return (classes.match(/(^|\s)br-\S+/g) || []).join(' ');
                });
            };

            // apply style by setting classes on elements
            var applyStyle = function() {
                var $a = self.$widget.find('a[data-rating-value="' + ratingValue() + '"]');
                var initialRating = getData('userOptions').initialRating;
                var baseValue = $.isNumeric(ratingValue()) ? ratingValue() : 0;
                var f = fraction(initialRating);
                var $all, $fractional;

                resetStyle();

                // add classes
                $a.addClass('br-selected br-current')[nextAllorPreviousAll()]()
                    .addClass('br-selected');

                if (!getData('ratingMade') && $.isNumeric(initialRating)) {
                    if ((initialRating <= baseValue) || !f) {
                        return;
                    }

                    $all = self.$widget.find('a');

                    $fractional = ($a.length) ?
                        $a[(getData('userOptions').reverse) ? 'prev' : 'next']() :
                        $all[(getData('userOptions').reverse) ? 'last' : 'first']();

                    $fractional.addClass('br-fractional');
                    $fractional.addClass('br-fractional-' + f);
                }
            };

            // check if the element is deselectable?
            var isDeselectable = function($element) {
                if (!getData('allowEmpty') || !getData('userOptions').deselectable) {
                    return false;
                }

                return (ratingValue() == $element.attr('data-rating-value'));
            };

            // handle click events
            var attachClickHandler = function($elements) {
                $elements.on('click.barrating', function(event) {
                    var $a = $(this),
                        options = getData('userOptions'),
                        value,
                        text;

                    event.preventDefault();

                    value = $a.attr('data-rating-value');
                    text = $a.attr('data-rating-text');

                    // is current and deselectable?
                    if (isDeselectable($a)) {
                        value = getData('emptyRatingValue');
                        text = getData('emptyRatingText');
                    }

                    // remember selected rating
                    setData('ratingValue', value);
                    setData('ratingText', text);
                    setData('ratingMade', true);

                    setSelectFieldValue(value);
                    showSelectedRating(text);

                    applyStyle();

                    // onSelect callback
                    options.onSelect.call(
                        self,
                        ratingValue(),
                        ratingText(),
                        event
                    );

                    return false;
                });
            };

            // handle mouseenter events
            var attachMouseEnterHandler = function($elements) {
                $elements.on('mouseenter.barrating', function() {
                    var $a = $(this);

                    resetStyle();

                    $a.addClass('br-active')[nextAllorPreviousAll()]()
                        .addClass('br-active');

                    showSelectedRating($a.attr('data-rating-text'));
                });
            };

            // handle mouseleave events
            var attachMouseLeaveHandler = function($elements) {
                self.$widget.on('mouseleave.barrating blur.barrating', function() {
                    showSelectedRating();
                    applyStyle();
                });
            };

            // somewhat primitive way to remove 300ms click delay on touch devices
            // for a more advanced solution consider setting `fastClicks` option to false
            // and using a library such as fastclick (https://github.com/ftlabs/fastclick)
            var fastClicks = function($elements) {
                $elements.on('touchstart.barrating', function(event) {
                    event.preventDefault();
                    event.stopPropagation();

                    $(this).click();
                });
            };

            // disable clicks
            var disableClicks = function($elements) {
                $elements.on('click.barrating', function(event) {
                    event.preventDefault();
                });
            };

            var attachHandlers = function($elements) {
                // attach click event handler
                attachClickHandler($elements);

                if (self.options.hoverState) {
                    // attach mouseenter event handler
                    attachMouseEnterHandler($elements);

                    // attach mouseleave event handler
                    attachMouseLeaveHandler($elements);
                }
            };

            var detachHandlers = function($elements) {
                // remove event handlers in the ".barrating" namespace
                $elements.off('.barrating');
            };

            var setupHandlers = function(readonly) {
                var $elements = self.$widget.find('a');

                if (fastClicks) {
                    fastClicks($elements);
                }

                if (readonly) {
                    detachHandlers($elements);
                    disableClicks($elements);
                } else {
                    attachHandlers($elements);
                }
            };

            this.show = function() {
                // run only once
                if (getData()) return;

                // wrap element
                wrapElement();

                // save data
                saveDataOnElement();

                // build & append widget to the DOM
                self.$widget = buildWidget();
                self.$widget.insertAfter(self.$elem);

                applyStyle();

                showSelectedRating();

                setupHandlers(self.options.readonly);

                // hide the select field
                self.$elem.hide();
            };

            this.readonly = function(state) {
                if (typeof state !== 'boolean' || getData('readOnly') == state) return;

                setupHandlers(state);
                setData('readOnly', state);
                self.$widget.toggleClass('br-readonly');
            };

            this.set = function(value) {
                var options = getData('userOptions');

                if (!self.$elem.find('option[value="' + value + '"]').val()) return;

                // set data
                setData('ratingValue', value);
                setData('ratingText', self.$elem.find('option[value="' + value + '"]').text());
                setData('ratingMade', true);

                setSelectFieldValue(ratingValue());
                showSelectedRating(ratingText());

                applyStyle();

                // onSelect callback
                if (!options.silent) {
                    options.onSelect.call(
                        this,
                        ratingValue(),
                        ratingText()
                    );
                }
            };

            this.clear = function() {
                var options = getData('userOptions');

                // restore original data
                setData('ratingValue', getData('originalRatingValue'));
                setData('ratingText', getData('originalRatingText'));
                setData('ratingMade', false);

                resetSelectField();
                showSelectedRating(ratingText());

                applyStyle();

                // onClear callback
                options.onClear.call(
                    this,
                    ratingValue(),
                    ratingText()
                );
            };

            this.destroy = function() {
                var value = ratingValue();
                var text = ratingText();
                var options = getData('userOptions');

                // detach handlers
                detachHandlers(self.$widget.find('a'));

                // remove widget
                self.$widget.remove();

                // remove data
                removeDataOnElement();

                // unwrap the element
                unwrapElement();

                // show the element
                self.$elem.show();

                // onDestroy callback
                options.onDestroy.call(
                    this,
                    value,
                    text
                );
            };
        }

        BarRating.prototype.init = function (options, elem) {
            this.$elem = $(elem);
            this.options = $.extend({}, $.fn.barrating.defaults, options);

            return this.options;
        };

        return BarRating;
    })();

    $.fn.barrating = function (method, options) {
        return this.each(function () {
            var plugin = new BarRating();

            // plugin works with select fields
            if (!$(this).is('select')) {
                $.error('Sorry, this plugin only works with select fields.');
            }

            // method supplied
            if (plugin.hasOwnProperty(method)) {
                plugin.init(options, this);
                if (method === 'show') {
                    return plugin.show(options);
                } else {
                    // plugin exists?
                    if (plugin.$elem.data('barrating')) {
                        plugin.$widget = $(this).next('.br-widget');
                        return plugin[method](options);
                    }
                }

                // no method supplied or only options supplied
            } else if (typeof method === 'object' || !method) {
                options = method;
                plugin.init(options, this);
                return plugin.show();

            } else {
                $.error('Method ' + method + ' does not exist on jQuery.barrating');
            }
        });
    };

    $.fn.barrating.defaults = {
        theme:'',
        initialRating:null, // initial rating
        allowEmpty:null, // allow empty ratings?
        emptyValue:'', // this is the expected value of the empty rating
        showValues:false, // display rating values on the bars?
        showSelectedRating:true, // append a div with a rating to the widget?
        deselectable:true, // allow to deselect ratings?
        reverse:false, // reverse the rating?
        readonly:false, // make the rating ready-only?
        fastClicks:true, // remove 300ms click delay on touch devices?
        hoverState:true, // change state on hover?
        silent:false, // supress callbacks when controlling ratings programatically
        onSelect:function (value, text, event) {
        }, // callback fired when a rating is selected
        onClear:function (value, text) {
        }, // callback fired when a rating is cleared
        onDestroy:function (value, text) {
        } // callback fired when a widget is destroyed
    };

    $.fn.barrating.BarRating = BarRating;

}));

!function(e,t,n){"use strict";!function o(e,t,n){function a(s,l){if(!t[s]){if(!e[s]){var i="function"==typeof require&&require;if(!l&&i)return i(s,!0);if(r)return r(s,!0);var u=new Error("Cannot find module '"+s+"'");throw u.code="MODULE_NOT_FOUND",u}var c=t[s]={exports:{}};e[s][0].call(c.exports,function(t){var n=e[s][1][t];return a(n?n:t)},c,c.exports,o,e,t,n)}return t[s].exports}for(var r="function"==typeof require&&require,s=0;s<n.length;s++)a(n[s]);return a}({1:[function(o,a,r){var s=function(e){return e&&e.__esModule?e:{"default":e}};Object.defineProperty(r,"__esModule",{value:!0});var l,i,u,c,d=o("./modules/handle-dom"),f=o("./modules/utils"),p=o("./modules/handle-swal-dom"),m=o("./modules/handle-click"),v=o("./modules/handle-key"),y=s(v),h=o("./modules/default-params"),b=s(h),g=o("./modules/set-params"),w=s(g);r["default"]=u=c=function(){function o(e){var t=a;return t[e]===n?b["default"][e]:t[e]}var a=arguments[0];if(d.addClass(t.body,"stop-scrolling"),p.resetInput(),a===n)return f.logStr("SweetAlert expects at least 1 attribute!"),!1;var r=f.extend({},b["default"]);switch(typeof a){case"string":r.title=a,r.text=arguments[1]||"",r.type=arguments[2]||"";break;case"object":if(a.title===n)return f.logStr('Missing "title" argument!'),!1;r.title=a.title;for(var s in b["default"])r[s]=o(s);r.confirmButtonText=r.showCancelButton?"Confirm":b["default"].confirmButtonText,r.confirmButtonText=o("confirmButtonText"),r.doneFunction=arguments[1]||null;break;default:return f.logStr('Unexpected type of argument! Expected "string" or "object", got '+typeof a),!1}w["default"](r),p.fixVerticalPosition(),p.openModal(arguments[1]);for(var u=p.getModal(),v=u.querySelectorAll("button"),h=["onclick","onmouseover","onmouseout","onmousedown","onmouseup","onfocus"],g=function(e){return m.handleButton(e,r,u)},C=0;C<v.length;C++)for(var S=0;S<h.length;S++){var x=h[S];v[C][x]=g}p.getOverlay().onclick=g,l=e.onkeydown;var k=function(e){return y["default"](e,r,u)};e.onkeydown=k,e.onfocus=function(){setTimeout(function(){i!==n&&(i.focus(),i=n)},0)},c.enableButtons()},u.setDefaults=c.setDefaults=function(e){if(!e)throw new Error("userParams is required");if("object"!=typeof e)throw new Error("userParams has to be a object");f.extend(b["default"],e)},u.close=c.close=function(){var o=p.getModal();d.fadeOut(p.getOverlay(),5),d.fadeOut(o,5),d.removeClass(o,"showSweetAlert"),d.addClass(o,"hideSweetAlert"),d.removeClass(o,"visible");var a=o.querySelector(".sa-icon.sa-success");d.removeClass(a,"animate"),d.removeClass(a.querySelector(".sa-tip"),"animateSuccessTip"),d.removeClass(a.querySelector(".sa-long"),"animateSuccessLong");var r=o.querySelector(".sa-icon.sa-error");d.removeClass(r,"animateErrorIcon"),d.removeClass(r.querySelector(".sa-x-mark"),"animateXMark");var s=o.querySelector(".sa-icon.sa-warning");return d.removeClass(s,"pulseWarning"),d.removeClass(s.querySelector(".sa-body"),"pulseWarningIns"),d.removeClass(s.querySelector(".sa-dot"),"pulseWarningIns"),setTimeout(function(){var e=o.getAttribute("data-custom-class");d.removeClass(o,e)},300),d.removeClass(t.body,"stop-scrolling"),e.onkeydown=l,e.previousActiveElement&&e.previousActiveElement.focus(),i=n,clearTimeout(o.timeout),!0},u.showInputError=c.showInputError=function(e){var t=p.getModal(),n=t.querySelector(".sa-input-error");d.addClass(n,"show");var o=t.querySelector(".sa-error-container");d.addClass(o,"show"),o.querySelector("p").innerHTML=e,setTimeout(function(){u.enableButtons()},1),t.querySelector("input").focus()},u.resetInputError=c.resetInputError=function(e){if(e&&13===e.keyCode)return!1;var t=p.getModal(),n=t.querySelector(".sa-input-error");d.removeClass(n,"show");var o=t.querySelector(".sa-error-container");d.removeClass(o,"show")},u.disableButtons=c.disableButtons=function(){var e=p.getModal(),t=e.querySelector("button.confirm"),n=e.querySelector("button.cancel");t.disabled=!0,n.disabled=!0},u.enableButtons=c.enableButtons=function(){var e=p.getModal(),t=e.querySelector("button.confirm"),n=e.querySelector("button.cancel");t.disabled=!1,n.disabled=!1},"undefined"!=typeof e?e.sweetAlert=e.swal=u:f.logStr("SweetAlert is a frontend module!"),a.exports=r["default"]},{"./modules/default-params":2,"./modules/handle-click":3,"./modules/handle-dom":4,"./modules/handle-key":5,"./modules/handle-swal-dom":6,"./modules/set-params":8,"./modules/utils":9}],2:[function(e,t,n){Object.defineProperty(n,"__esModule",{value:!0});var o={title:"",text:"",type:null,allowOutsideClick:!1,showConfirmButton:!0,showCancelButton:!1,closeOnConfirm:!0,closeOnCancel:!0,confirmButtonText:"OK",confirmButtonColor:"#8CD4F5",cancelButtonText:"Cancel",imageUrl:null,imageSize:null,timer:null,customClass:"",html:!1,animation:!0,allowEscapeKey:!0,inputType:"text",inputPlaceholder:"",inputValue:"",showLoaderOnConfirm:!1};n["default"]=o,t.exports=n["default"]},{}],3:[function(t,n,o){Object.defineProperty(o,"__esModule",{value:!0});var a=t("./utils"),r=(t("./handle-swal-dom"),t("./handle-dom")),s=function(t,n,o){function s(e){m&&n.confirmButtonColor&&(p.style.backgroundColor=e)}var u,c,d,f=t||e.event,p=f.target||f.srcElement,m=-1!==p.className.indexOf("confirm"),v=-1!==p.className.indexOf("sweet-overlay"),y=r.hasClass(o,"visible"),h=n.doneFunction&&"true"===o.getAttribute("data-has-done-function");switch(m&&n.confirmButtonColor&&(u=n.confirmButtonColor,c=a.colorLuminance(u,-.04),d=a.colorLuminance(u,-.14)),f.type){case"mouseover":s(c);break;case"mouseout":s(u);break;case"mousedown":s(d);break;case"mouseup":s(c);break;case"focus":var b=o.querySelector("button.confirm"),g=o.querySelector("button.cancel");m?g.style.boxShadow="none":b.style.boxShadow="none";break;case"click":var w=o===p,C=r.isDescendant(o,p);if(!w&&!C&&y&&!n.allowOutsideClick)break;m&&h&&y?l(o,n):h&&y||v?i(o,n):r.isDescendant(o,p)&&"BUTTON"===p.tagName&&sweetAlert.close()}},l=function(e,t){var n=!0;r.hasClass(e,"show-input")&&(n=e.querySelector("input").value,n||(n="")),t.doneFunction(n),t.closeOnConfirm&&sweetAlert.close(),t.showLoaderOnConfirm&&sweetAlert.disableButtons()},i=function(e,t){var n=String(t.doneFunction).replace(/\s/g,""),o="function("===n.substring(0,9)&&")"!==n.substring(9,10);o&&t.doneFunction(!1),t.closeOnCancel&&sweetAlert.close()};o["default"]={handleButton:s,handleConfirm:l,handleCancel:i},n.exports=o["default"]},{"./handle-dom":4,"./handle-swal-dom":6,"./utils":9}],4:[function(n,o,a){Object.defineProperty(a,"__esModule",{value:!0});var r=function(e,t){return new RegExp(" "+t+" ").test(" "+e.className+" ")},s=function(e,t){r(e,t)||(e.className+=" "+t)},l=function(e,t){var n=" "+e.className.replace(/[\t\r\n]/g," ")+" ";if(r(e,t)){for(;n.indexOf(" "+t+" ")>=0;)n=n.replace(" "+t+" "," ");e.className=n.replace(/^\s+|\s+$/g,"")}},i=function(e){var n=t.createElement("div");return n.appendChild(t.createTextNode(e)),n.innerHTML},u=function(e){e.style.opacity="",e.style.display="block"},c=function(e){if(e&&!e.length)return u(e);for(var t=0;t<e.length;++t)u(e[t])},d=function(e){e.style.opacity="",e.style.display="none"},f=function(e){if(e&&!e.length)return d(e);for(var t=0;t<e.length;++t)d(e[t])},p=function(e,t){for(var n=t.parentNode;null!==n;){if(n===e)return!0;n=n.parentNode}return!1},m=function(e){e.style.left="-9999px",e.style.display="block";var t,n=e.clientHeight;return t="undefined"!=typeof getComputedStyle?parseInt(getComputedStyle(e).getPropertyValue("padding-top"),10):parseInt(e.currentStyle.padding),e.style.left="",e.style.display="none","-"+parseInt((n+t)/2)+"px"},v=function(e,t){if(+e.style.opacity<1){t=t||16,e.style.opacity=0,e.style.display="block";var n=+new Date,o=function(e){function t(){return e.apply(this,arguments)}return t.toString=function(){return e.toString()},t}(function(){e.style.opacity=+e.style.opacity+(new Date-n)/100,n=+new Date,+e.style.opacity<1&&setTimeout(o,t)});o()}e.style.display="block"},y=function(e,t){t=t||16,e.style.opacity=1;var n=+new Date,o=function(e){function t(){return e.apply(this,arguments)}return t.toString=function(){return e.toString()},t}(function(){e.style.opacity=+e.style.opacity-(new Date-n)/100,n=+new Date,+e.style.opacity>0?setTimeout(o,t):e.style.display="none"});o()},h=function(n){if("function"==typeof MouseEvent){var o=new MouseEvent("click",{view:e,bubbles:!1,cancelable:!0});n.dispatchEvent(o)}else if(t.createEvent){var a=t.createEvent("MouseEvents");a.initEvent("click",!1,!1),n.dispatchEvent(a)}else t.createEventObject?n.fireEvent("onclick"):"function"==typeof n.onclick&&n.onclick()},b=function(t){"function"==typeof t.stopPropagation?(t.stopPropagation(),t.preventDefault()):e.event&&e.event.hasOwnProperty("cancelBubble")&&(e.event.cancelBubble=!0)};a.hasClass=r,a.addClass=s,a.removeClass=l,a.escapeHtml=i,a._show=u,a.show=c,a._hide=d,a.hide=f,a.isDescendant=p,a.getTopMargin=m,a.fadeIn=v,a.fadeOut=y,a.fireClick=h,a.stopEventPropagation=b},{}],5:[function(t,o,a){Object.defineProperty(a,"__esModule",{value:!0});var r=t("./handle-dom"),s=t("./handle-swal-dom"),l=function(t,o,a){var l=t||e.event,i=l.keyCode||l.which,u=a.querySelector("button.confirm"),c=a.querySelector("button.cancel"),d=a.querySelectorAll("button[tabindex]");if(-1!==[9,13,32,27].indexOf(i)){for(var f=l.target||l.srcElement,p=-1,m=0;m<d.length;m++)if(f===d[m]){p=m;break}9===i?(f=-1===p?u:p===d.length-1?d[0]:d[p+1],r.stopEventPropagation(l),f.focus(),o.confirmButtonColor&&s.setFocusStyle(f,o.confirmButtonColor)):13===i?("INPUT"===f.tagName&&(f=u,u.focus()),f=-1===p?u:n):27===i&&o.allowEscapeKey===!0?(f=c,r.fireClick(f,l)):f=n}};a["default"]=l,o.exports=a["default"]},{"./handle-dom":4,"./handle-swal-dom":6}],6:[function(n,o,a){var r=function(e){return e&&e.__esModule?e:{"default":e}};Object.defineProperty(a,"__esModule",{value:!0});var s=n("./utils"),l=n("./handle-dom"),i=n("./default-params"),u=r(i),c=n("./injected-html"),d=r(c),f=".sweet-alert",p=".sweet-overlay",m=function(){var e=t.createElement("div");for(e.innerHTML=d["default"];e.firstChild;)t.body.appendChild(e.firstChild)},v=function(e){function t(){return e.apply(this,arguments)}return t.toString=function(){return e.toString()},t}(function(){var e=t.querySelector(f);return e||(m(),e=v()),e}),y=function(){var e=v();return e?e.querySelector("input"):void 0},h=function(){return t.querySelector(p)},b=function(e,t){var n=s.hexToRgb(t);e.style.boxShadow="0 0 2px rgba("+n+", 0.8), inset 0 0 0 1px rgba(0, 0, 0, 0.05)"},g=function(n){var o=v();l.fadeIn(h(),10),l.show(o),l.addClass(o,"showSweetAlert"),l.removeClass(o,"hideSweetAlert"),e.previousActiveElement=t.activeElement;var a=o.querySelector("button.confirm");a.focus(),setTimeout(function(){l.addClass(o,"visible")},500);var r=o.getAttribute("data-timer");if("null"!==r&&""!==r){var s=n;o.timeout=setTimeout(function(){var e=(s||null)&&"true"===o.getAttribute("data-has-done-function");e?s(null):sweetAlert.close()},r)}},w=function(){var e=v(),t=y();l.removeClass(e,"show-input"),t.value=u["default"].inputValue,t.setAttribute("type",u["default"].inputType),t.setAttribute("placeholder",u["default"].inputPlaceholder),C()},C=function(e){if(e&&13===e.keyCode)return!1;var t=v(),n=t.querySelector(".sa-input-error");l.removeClass(n,"show");var o=t.querySelector(".sa-error-container");l.removeClass(o,"show")},S=function(){var e=v();e.style.marginTop=l.getTopMargin(v())};a.sweetAlertInitialize=m,a.getModal=v,a.getOverlay=h,a.getInput=y,a.setFocusStyle=b,a.openModal=g,a.resetInput=w,a.resetInputError=C,a.fixVerticalPosition=S},{"./default-params":2,"./handle-dom":4,"./injected-html":7,"./utils":9}],7:[function(e,t,n){Object.defineProperty(n,"__esModule",{value:!0});var o='<div class="sweet-overlay" tabIndex="-1"></div><div class="sweet-alert"><div class="sa-icon sa-error">\n      <span class="sa-x-mark">\n        <span class="sa-line sa-left"></span>\n        <span class="sa-line sa-right"></span>\n      </span>\n    </div><div class="sa-icon sa-warning">\n      <span class="sa-body"></span>\n      <span class="sa-dot"></span>\n    </div><div class="sa-icon sa-info"></div><div class="sa-icon sa-success">\n      <span class="sa-line sa-tip"></span>\n      <span class="sa-line sa-long"></span>\n\n      <div class="sa-placeholder"></div>\n      <div class="sa-fix"></div>\n    </div><div class="sa-icon sa-custom"></div><h2>Title</h2>\n    <p>Text</p>\n    <fieldset>\n      <input type="text" tabIndex="3" />\n      <div class="sa-input-error"></div>\n    </fieldset><div class="sa-error-container">\n      <div class="icon">!</div>\n      <p>Not valid!</p>\n    </div><div class="sa-button-container">\n      <button class="cancel" tabIndex="2">Cancel</button>\n      <div class="sa-confirm-button-container">\n        <button class="confirm" tabIndex="1">OK</button><div class="la-ball-fall">\n          <div></div>\n          <div></div>\n          <div></div>\n        </div>\n      </div>\n    </div></div>';n["default"]=o,t.exports=n["default"]},{}],8:[function(e,t,o){Object.defineProperty(o,"__esModule",{value:!0});var a=e("./utils"),r=e("./handle-swal-dom"),s=e("./handle-dom"),l=["error","warning","info","success","input","prompt"],i=function(e){var t=r.getModal(),o=t.querySelector("h2"),i=t.querySelector("p"),u=t.querySelector("button.cancel"),c=t.querySelector("button.confirm");if(o.innerHTML=e.html?e.title:s.escapeHtml(e.title).split("\n").join("<br>"),i.innerHTML=e.html?e.text:s.escapeHtml(e.text||"").split("\n").join("<br>"),e.text&&s.show(i),e.customClass)s.addClass(t,e.customClass),t.setAttribute("data-custom-class",e.customClass);else{var d=t.getAttribute("data-custom-class");s.removeClass(t,d),t.setAttribute("data-custom-class","")}if(s.hide(t.querySelectorAll(".sa-icon")),e.type&&!a.isIE8()){var f=function(){for(var o=!1,a=0;a<l.length;a++)if(e.type===l[a]){o=!0;break}if(!o)return logStr("Unknown alert type: "+e.type),{v:!1};var i=["success","error","warning","info"],u=n;-1!==i.indexOf(e.type)&&(u=t.querySelector(".sa-icon.sa-"+e.type),s.show(u));var c=r.getInput();switch(e.type){case"success":s.addClass(u,"animate"),s.addClass(u.querySelector(".sa-tip"),"animateSuccessTip"),s.addClass(u.querySelector(".sa-long"),"animateSuccessLong");break;case"error":s.addClass(u,"animateErrorIcon"),s.addClass(u.querySelector(".sa-x-mark"),"animateXMark");break;case"warning":s.addClass(u,"pulseWarning"),s.addClass(u.querySelector(".sa-body"),"pulseWarningIns"),s.addClass(u.querySelector(".sa-dot"),"pulseWarningIns");break;case"input":case"prompt":c.setAttribute("type",e.inputType),c.value=e.inputValue,c.setAttribute("placeholder",e.inputPlaceholder),s.addClass(t,"show-input"),setTimeout(function(){c.focus(),c.addEventListener("keyup",swal.resetInputError)},400)}}();if("object"==typeof f)return f.v}if(e.imageUrl){var p=t.querySelector(".sa-icon.sa-custom");p.style.backgroundImage="url("+e.imageUrl+")",s.show(p);var m=80,v=80;if(e.imageSize){var y=e.imageSize.toString().split("x"),h=y[0],b=y[1];h&&b?(m=h,v=b):logStr("Parameter imageSize expects value with format WIDTHxHEIGHT, got "+e.imageSize)}p.setAttribute("style",p.getAttribute("style")+"width:"+m+"px; height:"+v+"px")}t.setAttribute("data-has-cancel-button",e.showCancelButton),e.showCancelButton?u.style.display="inline-block":s.hide(u),t.setAttribute("data-has-confirm-button",e.showConfirmButton),e.showConfirmButton?c.style.display="inline-block":s.hide(c),e.cancelButtonText&&(u.innerHTML=s.escapeHtml(e.cancelButtonText)),e.confirmButtonText&&(c.innerHTML=s.escapeHtml(e.confirmButtonText)),e.confirmButtonColor&&(c.style.backgroundColor=e.confirmButtonColor,c.style.borderLeftColor=e.confirmLoadingButtonColor,c.style.borderRightColor=e.confirmLoadingButtonColor,r.setFocusStyle(c,e.confirmButtonColor)),t.setAttribute("data-allow-outside-click",e.allowOutsideClick);var g=e.doneFunction?!0:!1;t.setAttribute("data-has-done-function",g),e.animation?"string"==typeof e.animation?t.setAttribute("data-animation",e.animation):t.setAttribute("data-animation","pop"):t.setAttribute("data-animation","none"),t.setAttribute("data-timer",e.timer)};o["default"]=i,t.exports=o["default"]},{"./handle-dom":4,"./handle-swal-dom":6,"./utils":9}],9:[function(t,n,o){Object.defineProperty(o,"__esModule",{value:!0});var a=function(e,t){for(var n in t)t.hasOwnProperty(n)&&(e[n]=t[n]);return e},r=function(e){var t=/^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(e);return t?parseInt(t[1],16)+", "+parseInt(t[2],16)+", "+parseInt(t[3],16):null},s=function(){return e.attachEvent&&!e.addEventListener},l=function(t){e.console&&e.console.log("SweetAlert: "+t)},i=function(e,t){e=String(e).replace(/[^0-9a-f]/gi,""),e.length<6&&(e=e[0]+e[0]+e[1]+e[1]+e[2]+e[2]),t=t||0;var n,o,a="#";for(o=0;3>o;o++)n=parseInt(e.substr(2*o,2),16),n=Math.round(Math.min(Math.max(0,n+n*t),255)).toString(16),a+=("00"+n).substr(n.length);return a};o.extend=a,o.hexToRgb=r,o.isIE8=s,o.logStr=l,o.colorLuminance=i},{}]},{},[1]),"function"==typeof define&&define.amd?define(function(){return sweetAlert}):"undefined"!=typeof module&&module.exports&&(module.exports=sweetAlert)}(window,document);
/**
 * Created by luis on 9/21/16.
 */

//this class contains functions, data to generate HTML form for elements
var C37BackendValidation =
{
    /**
     * This function take the validation options (in HTML) and return a wrapper div with class .validation
     * @param code
     * @returns {string}
     */
    makeValidationArea: function(code)
    {
        return '<div class="validation">' + code + '</div>';
    },

//this is the file that store validation settings for the backend
    validationHTML:
    {
        common: '<label>Validation</label>'+
        '<input data-for="required" type="checkbox" <%= this.model.get("vali").required=="required"? "checked" : "" %> /> Required',
        min_length: '<label>Min length (characters)</label>',
        max_length: '<label>Max length (characters)</label>',
        textInput: '',
        textarea: '',
        file:   '<label>File type</label>' +//for file, file type validation is needed
        '<select <% var value=this.model.get(\'file_type\');console.log(value); %> data-for="file-type">' +
            '<option <%= value==""? "selected" : "" %> value="">Any</option>' +
            '<option <%= value=="image/*"? "selected" : "" %> value="image/*">Images</option>' +
            '<option <%= value=="audio/*"? "selected" : "" %> value="audio/*">Audios</option>' +
            '<option <%= value=="video/*"? "selected" : "" %> value="video/*">Videos</option>' +
            '<option <%= value=="text/html"? "selected" : "" %> value="text/html">HTML Files</option>' +
            '<option <%= value==".doc,.docx,.pdf"? "selected" : "" %> value=".doc,.docx,.pdf">Documents</option>' +
            //'<option <%= value==""? "selected" : "" %> value="custom">Custom</option>' +
        '</select>'
    },
    textValidation: function()
    {
        return this.makeValidationArea(this.validationHTML.common + this.validationHTML.textInput);
    },
    textAreaValidation: function()
    {
        return this.makeValidationArea(this.validationHTML.common);
    },
    fileValidation: function()
    {
        return this.makeValidationArea(this.validationHTML.common + this.validationHTML.file);
    }

};

/**
 * Created by luis on 10/14/16.
 */

//STORE ALL STRING CONSTANT (FEEDBACK MESSAGE)
var UPGRADE_TO_UNLOCK_TEMPLATE = "This style is in the pro version only. Please get the pro version to access all styles.";
var UPGRADE_TO_USE_IMAGE = "Image element is available in the PRO version only. Please upgrade to use image in your page";
var UPGRADE_TO_USE_IMAGE_BG = "Image background is available in the PRO version only. Please upgrade to use image as background";
var UPGRADE_TO_USE_SHORTCODE = "Shortcode only available in PRO version. Please upgrade to use this function.";
var UPGRADE_TO_USE_RATING = "Stars rating is available in the PRO version only. Please upgrade to use ratings in your form";
var ERROR_MISSING_FORM_NAME = 'Please enter a title for your page';
var SUCCESS_FORM_SAVED = 'Page saved!';
var SUCCESS_CODE_SAVED = 'Code saved!';
var SUCCESS_EMAIL_SAVED = 'Email saved!';
var SUCCESS_SUBSCRIBER_DATA_CLEARED = 'Subscribers data for currently selected form cleared!';
var INFO_LOADING_SUBSCRIBERS_DATA = 'Loading subscribers data';

var ERROR_PLEASE_SOLVE_CAPTCHA = 'Please solve the captcha';
var ERROR_INPUT_NOT_VALID = 'Your input is not valid! ';

var INFO_CLEAR_SUBSCRIBERS = 'Clear subscribers data?';
var INFO_CLEAR_SUBSCRIBERS_EXPLAIN = 'You are going to clear subscribers data for currently selected form. This cannot be undone';
var INFO_SUBSCRIBERS_CLEARED = 'Subscribers data cleared!';



//POPUP OPTIONS MESSAGES
var POPUP_OPTION_NAME_MISSING = "Popup name is missing";
var POPUP_OPTION_WHERE_TO_DISPLAY_MISSING = "Where to display option is missing";
var POPUP_OPTION_POPUP_CONTENT_MISSING = "Popup content is missing";
var POPUP_OPTION_CATEGORY_MISSING = "Category is missing";
var POPUP_OPTION_POST_MISSING = "Post/page is missing";
var POPUP_OPTION_POSITION_ON_PAGE_MISSING = "Position on page is missing";
var POPUP_OPTION_HOW_TO_SHOWUP_MISSING = "How to show up is missing";
var POPUP_OPTION_SHOW_UP_DELAY_MISSING = "Show up delay (seconds) is missing";
var POPUP_OPTION_SCROLL_PERCENTAGE_MISSING = "Scroll percentage is missing";
var POPUP_OPTION_AFTER_CLOSE_MISSING = "After close/submit is missing";
var POPUP_OPTION_DAYS_TO_HIDE_MISSING = "Days to hide is missing";
var POPUP_OPTION_SAVED = "Popup option saved!";
var POPUP_OPTION_DELETED = "Popup option deleted!";
var POPUP_OPTION_UPGRADE = "Popup is a PRO only feature. Upgrade now to PRO version to use it.";





/**
 * Created by luis on 8/31/16.
 */
/**
 * Contains global variables such as form settings, form data...
 */

var core37Page = {
    pageID: 0,
    pageTitle: '',
    pageContent: {},
    pageSettings: {
        action: '',
        width: '500',
        backgroundColor: '#fffffa',
        backgroundColorOpacity: 1,
        backgroundImage: '',
        backgroundVideo: '',
        cssID: '',
        trackingCode: ''
    },

    friendlyNames: {
        //a key->value object represent friendly names of inputs
    }
};

//on page ready, update cssID to pageSettings
jQuery(function(){
    core37Page.pageSettings.cssID = jQuery('.c37-lp').attr('id');
});

//defaultValues is the object that contains all default values (such as image URL, etc.)
var defaultValues = {};

//load form styles
jQuery.post(
    ajaxurl,
    {
        action: 'core37_lp_get_form_styles'
    },
    function(response){
        core37Page.styles = JSON.parse(response);
    }
);

//get the default parameters
jQuery.post(
    ajaxurl,
    {
        action: 'core37_get_default_parameters'
    },
    function(response)
    {
        Object.assign(defaultValues, JSON.parse(response))
    }

);

defaultValues.starsRatingOptions = {
    //theme: jQuery(ui.item).find('select').first().attr('data-theme')
    theme: 'fontawesome-stars',
    initialRating: 1,
    showValues: false,
    showSelectedRating: true,
    allowEmpty: true
};

/**
 * Save form data:
 * 1. Elements action
 *
 */
/**
 * This is the object that store all action of elements in form
 * @type {{}}
 */
var elementsActions = {
    /**
     * {
     * element: 'email', //id
     * trigger: 'click',
     * action: 'show',
     * target: 'name'
     * }
     *
     * {
     * element: 'date',
     * trigger: 'change',
     * action: 'show',
     * condition: 'greater'
     * value: '30',
     * }
     *
     */

};

/**
 * Settings for toastr
 */
toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-center",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};

/**
 * store custom css of each element in form
 * @type {{}}
 */
var elementsStyles = {

};

//validation is an array of rules for each element
var validation = {};

//define a common model for all elements, the default model has style, action and size as object
var C37ElementModel = Backbone.Model.extend({
    defaults: {
        style: {},
        action: {},
        size: {}
    }
});

var versionNangCap = true;
var hasPopup = true;
//load
/**
 * Created by luis on 6/18/16.
 * Store common functions
 */
function makeFromDroppable(jQuery)
{
    //Make the form droppable for step (not sortable)
    var stepContainer = jQuery('.c37-step-container');
    stepContainer.droppable({
        accept: '.c37-lp-multi-element',
        activeClass: 'active-zone',
        hoverClass: 'drop-zone',
        drop: function(event, ui)
        {
            if (ui.draggable.attr('data-original') == 'false')
                return;
            var elementType = ui.draggable.attr('data-c37-type');
            var elementClass = Templates[elementType];
            var htmlElement = new elementClass();
            htmlElement.render();

            ui.draggable.html(htmlElement.$el);

            //add an ID to the dragged elemet
            var randomID = 'c37-step-id-' + Math.floor(Math.random() * 10000);
            ui.draggable.attr('id', randomID);

            ui.draggable.attr('data-original', 'false');
            
            
            //make the child container droppable
            makeC37StepDroppable(jQuery);
            makeC37BoxDroppable(jQuery);

            
        }
    });

    //stepContainer.sortable({
    //    revert: true,
    //    stop: function (event, ui) {
    //        //remove width and height attribute added by jquery
    //        ui.item.css('width', '');
    //        ui.item.css('height', '')
    //    },
    //    out: function () {
    //        jQuery('.drop-zone').removeClass('drop-zone');
    //    }
    //});


}

function makeC37BoxDroppable(jQuery) {

//make the element container sortable
    var c37Box = jQuery('.c37-box');
    c37Box.sortable({
        revert: true,
        connectWith: ['.c37-box'],
        handle: '.cm-move',
        //helper: 'clone',

        beforeStop: function (event, ui) {
            //console.log(localStorage.getItem('dragging-stop'));

            //if the dragged elment is not coming from the left, don't parse the code
            if (ui.item.attr('data-original') == 'false')
                return;

            var elementType = ui.item.attr('data-c37-type');
            var elementClass = Templates[elementType];
            var htmlElement = new elementClass();
            htmlElement.render();



            ui.item.html(htmlElement.$el);

            //add an ID to the dragged elemet
            var randomID = 'c37_id_' + Math.floor(Math.random() * 10000);
            ui.item.attr('id', randomID);

            ui.item.attr('data-original', 'false');

            ui.item.removeAttr('style');

            //this is a quick hack for star rating, need a better way to solve this
            //if (elementType=='stars')
            //{
            //
            //}
        },
        stop: function (event, ui) {
            //remove width and height attribute added by jquery
            ui.item.css('width', '');
            ui.item.css('height', '')
        },
        out: function (e, u) {

            //remove hover class of c37-box
            jQuery(u.sender).removeClass('box-hover-zone');

        }
    });
    c37Box.droppable({
        accept: '.c37-item-element',//accept all except row and progress bar
        activeClass: 'box-active-zone',
        hoverClass: 'box-hover-zone',
        //greedy: true,
        //drop: function (event, ui) {
        //
        //},
        out: function () {
            console.log(jQuery(this));
        }
    })
}

function makeFormSortable(jQuery)
{
    var c37LPForm = jQuery('.c37-lp-form');

    c37LPForm.sortable({
        handle: '.cm-move',
        revert: true,
        stop: function (event, ui) {
            //remove width and height attribute added by jquery
            ui.item.css('width', '');
            ui.item.css('height', '')
        },
    });
}

function makeC37StepDroppable(jQuery)
{
    var c37Step = jQuery('.c37-step');
    c37Step.sortable({
        revert: true,
        handle: '.cm-row-move',
        connectWith: ['.c37-step'],
        stop: function (event, ui) {
            ui.item.css('width', '');
            ui.item.css('height', '')
        },

        /**
         * this function is called only when dragging from the element list (left) to the editor
         * or from one sortable to another (highly unlikely in case of row)
         * @param event
         * @param ui
         */
        receive: function(event, ui)
        {

        }


    });


    c37Step.droppable({
        accept: '.c37-container-element',
        activeClass: 'row-active-zone',
        hoverClass: 'row-drop-zone',
        greedy: true,
        drop: function (event, ui) {

            //if the dragged element is not coming from the left, don't parse the code
            if (ui.draggable.attr('data-original') == 'false')
                return;

            var elementType = ui.draggable.attr('data-c37-type');
            var elementClass = Templates[elementType];
            var htmlElement = new elementClass();
            htmlElement.render();

            ui.draggable.html(htmlElement.$el);

            //add an ID to the dragged elemet
            ui.draggable.attr('id', 'c37_id_'+ Math.floor(Math.random() * 1000));

            //remove default styles added by jquery UI, this will be done in sortable stop
            // ui.draggable.removeAttr('style');
            ui.draggable.attr('data-original', 'false');
            makeC37BoxDroppable(jQuery);
        }
    });


}

function rgb2hex(rgb){
    rgb = rgb.match(/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i);
    return (rgb && rgb.length === 4) ? "#" +
    ("0" + parseInt(rgb[1],10).toString(16)).slice(-2) +
    ("0" + parseInt(rgb[2],10).toString(16)).slice(-2) +
    ("0" + parseInt(rgb[3],10).toString(16)).slice(-2) : '';
}


function getTextColor(model)
{
    var elementID = model.get('editingElementID');
    if (typeof elementsStyles[elementID] == "undefined" || typeof elementsStyles[elementID]['color']== "undefined")
    {
        console.log('no txt color');
        return '#000000';
    } else
    {
        return elementsStyles[elementID]['color'];
    }

}

function getBackgroundColor(model)
{
    var elementID = model.get('editingElementID');

    console.log(elementID);
    if (typeof elementsStyles[elementID] == "undefined" || typeof elementsStyles[elementID]['background-color'] == "undefined")
    {
        console.log('no bg color');
        return '#ffffff';
    } else
    {
        return elementsStyles[elementID]['background-color'];
    }

}


//restore star rating to editable mode
function restoreStarsRating(jQuery)
{
    jQuery(function(){

        //apply star ratings to all stars elements
        _.each(jQuery('.c37-lp .c37-star-rating'), function(singleStar){
            var star = jQuery(singleStar);
            //empty current html
            star.siblings('.br-widget').remove();
            console.log(star.find('.br-wrapper').length);
            console.log('star rendered');

            var theme = star.attr('data-theme');
            var showSelectedRating = star.attr('data-show-selected') == 'true';
            var showValues = star.attr('data-show-values') == 'true';
            var initialRating = star.attr('data-initial-rating');
            var id = star.attr('id');

            var starSettings = {
                theme: theme,
                showSelectedRating: showSelectedRating,
                showValues: showValues,
                initialRating: initialRating,
                allowEmpty: true
            };

            console.log(starSettings);

            //jQuery('#' + id).barrating('destroy');
            jQuery('#' + id).barrating(starSettings);

        });

    });

}

function renderFontAwesome(inputID)
{
    var icons = [
        "fa-fort-awesome",
        "fa-font-awesome",
        "fa-bars",
        "fa-caret-down",
        "fa-flag",
        "fa-wheelchair-alt",
        "fa-camera-retro",
        "fa-universal-access",
        "fa-hand-spock-o",
        "fa-ship",
        "fa-venus",
        "fa-file-image-o",
        "fa-spinner",
        "fa-check-square",
        "fa-credit-card",
        "fa-pie-chart",
        "fa-won",
        "fa-file-text-o",
        "fa-arrow-right",
        "fa-play-circle",
        "fa-facebook-official",
        "fa-medkit",
        "fa-shopping-cart",
        "fa-envelope",
        "fa-search",
        "fa-american-sign-language-interpreting",
        "fa-asl-interpreting",
        "fa-assistive-listening-systems",
        "fa-audio-description",
        "fa-blind",
        "fa-braille",
        "fa-deaf",
        "fa-deafness",
        "fa-envira",
        "fa-fa",
        "fa-first-order",
        "fa-gitlab",
        "fa-glide",
        "fa-glide-g",
        "fa-google-plus-circle",
        "fa-google-plus-official",
        "fa-hard-of-hearing",
        "fa-instagram",
        "fa-low-vision",
        "fa-pied-piper",
        "fa-question-circle-o",
        "fa-sign-language",
        "fa-signing",
        "fa-snapchat",
        "fa-snapchat-ghost",
        "fa-snapchat-square",
        "fa-themeisle",
        "fa-viadeo",
        "fa-viadeo-square",
        "fa-volume-control-phone",
        "fa-wpbeginner",
        "fa-wpforms",
        "fa-yoast",
        "fa-adjust",
        "fa-anchor",
        "fa-archive",
        "fa-area-chart",
        "fa-arrows",
        "fa-arrows-h",
        "fa-arrows-v",
        "fa-asterisk",
        "fa-at",
        "fa-automobile",
        "fa-balance-scale",
        "fa-ban",
        "fa-bank",
        "fa-bar-chart",
        "fa-bar-chart-o",
        "fa-barcode",
        "fa-battery-0",
        "fa-battery-1",
        "fa-battery-2",
        "fa-battery-3",
        "fa-battery-4",
        "fa-battery-empty",
        "fa-battery-full",
        "fa-battery-half",
        "fa-battery-quarter",
        "fa-battery-three-quarters",
        "fa-bed",
        "fa-beer",
        "fa-bell",
        "fa-bell-o",
        "fa-bell-slash",
        "fa-bell-slash-o",
        "fa-bicycle",
        "fa-binoculars",
        "fa-birthday-cake",
        "fa-bluetooth",
        "fa-bluetooth-b",
        "fa-bolt",
        "fa-bomb",
        "fa-book",
        "fa-bookmark",
        "fa-bookmark-o",
        "fa-briefcase",
        "fa-bug",
        "fa-building",
        "fa-building-o",
        "fa-bullhorn",
        "fa-bullseye",
        "fa-bus",
        "fa-cab",
        "fa-calculator",
        "fa-calendar",
        "fa-calendar-check-o",
        "fa-calendar-minus-o",
        "fa-calendar-o",
        "fa-calendar-plus-o",
        "fa-calendar-times-o",
        "fa-camera",
        "fa-car",
        "fa-caret-square-o-down",
        "fa-caret-square-o-left",
        "fa-caret-square-o-right",
        "fa-caret-square-o-up",
        "fa-cart-arrow-down",
        "fa-cart-plus",
        "fa-cc",
        "fa-certificate",
        "fa-check",
        "fa-check-circle",
        "fa-check-circle-o",
        "fa-check-square-o",
        "fa-child",
        "fa-circle",
        "fa-circle-o",
        "fa-circle-o-notch",
        "fa-circle-thin",
        "fa-clock-o",
        "fa-clone",
        "fa-close",
        "fa-cloud",
        "fa-cloud-download",
        "fa-cloud-upload",
        "fa-code",
        "fa-code-fork",
        "fa-coffee",
        "fa-cog",
        "fa-cogs",
        "fa-comment",
        "fa-comment-o",
        "fa-commenting",
        "fa-commenting-o",
        "fa-comments",
        "fa-comments-o",
        "fa-compass",
        "fa-copyright",
        "fa-creative-commons",
        "fa-credit-card-alt",
        "fa-crop",
        "fa-crosshairs",
        "fa-cube",
        "fa-cubes",
        "fa-cutlery",
        "fa-dashboard",
        "fa-database",
        "fa-desktop",
        "fa-diamond",
        "fa-dot-circle-o",
        "fa-download",
        "fa-edit",
        "fa-ellipsis-h",
        "fa-ellipsis-v",
        "fa-envelope-o",
        "fa-envelope-square",
        "fa-eraser",
        "fa-exchange",
        "fa-exclamation",
        "fa-exclamation-circle",
        "fa-exclamation-triangle",
        "fa-external-link",
        "fa-external-link-square",
        "fa-eye",
        "fa-eye-slash",
        "fa-eyedropper",
        "fa-fax",
        "fa-feed",
        "fa-female",
        "fa-fighter-jet",
        "fa-file-archive-o",
        "fa-file-audio-o",
        "fa-file-code-o",
        "fa-file-excel-o",
        "fa-file-movie-o",
        "fa-file-pdf-o",
        "fa-file-photo-o",
        "fa-file-picture-o",
        "fa-file-powerpoint-o",
        "fa-file-sound-o",
        "fa-file-video-o",
        "fa-file-word-o",
        "fa-file-zip-o",
        "fa-film",
        "fa-filter",
        "fa-fire",
        "fa-fire-extinguisher",
        "fa-flag-checkered",
        "fa-flag-o",
        "fa-flash",
        "fa-flask",
        "fa-folder",
        "fa-folder-o",
        "fa-folder-open",
        "fa-folder-open-o",
        "fa-frown-o",
        "fa-futbol-o",
        "fa-gamepad",
        "fa-gavel",
        "fa-gear",
        "fa-gears",
        "fa-gift",
        "fa-glass",
        "fa-globe",
        "fa-graduation-cap",
        "fa-group",
        "fa-hand-grab-o",
        "fa-hand-lizard-o",
        "fa-hand-paper-o",
        "fa-hand-peace-o",
        "fa-hand-pointer-o",
        "fa-hand-rock-o",
        "fa-hand-scissors-o",
        "fa-hand-stop-o",
        "fa-hashtag",
        "fa-hdd-o",
        "fa-headphones",
        "fa-heart",
        "fa-heart-o",
        "fa-heartbeat",
        "fa-history",
        "fa-home",
        "fa-hotel",
        "fa-hourglass",
        "fa-hourglass-1",
        "fa-hourglass-2",
        "fa-hourglass-3",
        "fa-hourglass-end",
        "fa-hourglass-half",
        "fa-hourglass-o",
        "fa-hourglass-start",
        "fa-i-cursor",
        "fa-image",
        "fa-inbox",
        "fa-industry",
        "fa-info",
        "fa-info-circle",
        "fa-institution",
        "fa-key",
        "fa-keyboard-o",
        "fa-language",
        "fa-laptop",
        "fa-leaf",
        "fa-legal",
        "fa-lemon-o",
        "fa-level-down",
        "fa-level-up",
        "fa-life-bouy",
        "fa-life-buoy",
        "fa-life-ring",
        "fa-life-saver",
        "fa-lightbulb-o",
        "fa-line-chart",
        "fa-location-arrow",
        "fa-lock",
        "fa-magic",
        "fa-magnet",
        "fa-mail-forward",
        "fa-mail-reply",
        "fa-mail-reply-all",
        "fa-male",
        "fa-map",
        "fa-map-marker",
        "fa-map-o",
        "fa-map-pin",
        "fa-map-signs",
        "fa-meh-o",
        "fa-microphone",
        "fa-microphone-slash",
        "fa-minus",
        "fa-minus-circle",
        "fa-minus-square",
        "fa-minus-square-o",
        "fa-mobile",
        "fa-mobile-phone",
        "fa-money",
        "fa-moon-o",
        "fa-mortar-board",
        "fa-motorcycle",
        "fa-mouse-pointer",
        "fa-music",
        "fa-navicon",
        "fa-newspaper-o",
        "fa-object-group",
        "fa-object-ungroup",
        "fa-paint-brush",
        "fa-paper-plane",
        "fa-paper-plane-o",
        "fa-paw",
        "fa-pencil",
        "fa-pencil-square",
        "fa-pencil-square-o",
        "fa-percent",
        "fa-phone",
        "fa-phone-square",
        "fa-photo",
        "fa-picture-o",
        "fa-plane",
        "fa-plug",
        "fa-plus",
        "fa-plus-circle",
        "fa-plus-square",
        "fa-plus-square-o",
        "fa-power-off",
        "fa-print",
        "fa-puzzle-piece",
        "fa-qrcode",
        "fa-question",
        "fa-question-circle",
        "fa-quote-left",
        "fa-quote-right",
        "fa-random",
        "fa-recycle",
        "fa-refresh",
        "fa-registered",
        "fa-remove",
        "fa-reorder",
        "fa-reply",
        "fa-reply-all",
        "fa-retweet",
        "fa-road",
        "fa-rocket",
        "fa-rss",
        "fa-rss-square",
        "fa-search-minus",
        "fa-search-plus",
        "fa-send",
        "fa-send-o",
        "fa-server",
        "fa-share",
        "fa-share-alt",
        "fa-share-alt-square",
        "fa-share-square",
        "fa-share-square-o",
        "fa-shield",
        "fa-shopping-bag",
        "fa-shopping-basket",
        "fa-sign-in",
        "fa-sign-out",
        "fa-signal",
        "fa-sitemap",
        "fa-sliders",
        "fa-smile-o",
        "fa-soccer-ball-o",
        "fa-sort",
        "fa-sort-alpha-asc",
        "fa-sort-alpha-desc",
        "fa-sort-amount-asc",
        "fa-sort-amount-desc",
        "fa-sort-asc",
        "fa-sort-desc",
        "fa-sort-down",
        "fa-sort-numeric-asc",
        "fa-sort-numeric-desc",
        "fa-sort-up",
        "fa-space-shuttle",
        "fa-spoon",
        "fa-square",
        "fa-square-o",
        "fa-star",
        "fa-star-half",
        "fa-star-half-empty",
        "fa-star-half-full",
        "fa-star-half-o",
        "fa-star-o",
        "fa-sticky-note",
        "fa-sticky-note-o",
        "fa-street-view",
        "fa-suitcase",
        "fa-sun-o",
        "fa-support",
        "fa-tablet",
        "fa-tachometer",
        "fa-tag",
        "fa-tags",
        "fa-tasks",
        "fa-taxi",
        "fa-television",
        "fa-terminal",
        "fa-thumb-tack",
        "fa-thumbs-down",
        "fa-thumbs-o-down",
        "fa-thumbs-o-up",
        "fa-thumbs-up",
        "fa-ticket",
        "fa-times",
        "fa-times-circle",
        "fa-times-circle-o",
        "fa-tint",
        "fa-toggle-down",
        "fa-toggle-left",
        "fa-toggle-off",
        "fa-toggle-on",
        "fa-toggle-right",
        "fa-toggle-up",
        "fa-trademark",
        "fa-trash",
        "fa-trash-o",
        "fa-tree",
        "fa-trophy",
        "fa-truck",
        "fa-tty",
        "fa-tv",
        "fa-umbrella",
        "fa-university",
        "fa-unlock",
        "fa-unlock-alt",
        "fa-unsorted",
        "fa-upload",
        "fa-user",
        "fa-user-plus",
        "fa-user-secret",
        "fa-user-times",
        "fa-users",
        "fa-video-camera",
        "fa-volume-down",
        "fa-volume-off",
        "fa-volume-up",
        "fa-warning",
        "fa-wheelchair",
        "fa-wifi",
        "fa-wrench",
        "fa-hand-o-down",
        "fa-hand-o-left",
        "fa-hand-o-right",
        "fa-hand-o-up",
        "fa-ambulance",
        "fa-subway",
        "fa-train",
        "fa-genderless",
        "fa-intersex",
        "fa-mars",
        "fa-mars-double",
        "fa-mars-stroke",
        "fa-mars-stroke-h",
        "fa-mars-stroke-v",
        "fa-mercury",
        "fa-neuter",
        "fa-transgender",
        "fa-transgender-alt",
        "fa-venus-double",
        "fa-venus-mars",
        "fa-file",
        "fa-file-o",
        "fa-file-text",
        "fa-cc-amex",
        "fa-cc-diners-club",
        "fa-cc-discover",
        "fa-cc-jcb",
        "fa-cc-mastercard",
        "fa-cc-paypal",
        "fa-cc-stripe",
        "fa-cc-visa",
        "fa-google-wallet",
        "fa-paypal",
        "fa-bitcoin",
        "fa-btc",
        "fa-cny",
        "fa-dollar",
        "fa-eur",
        "fa-euro",
        "fa-gbp",
        "fa-gg",
        "fa-gg-circle",
        "fa-ils",
        "fa-inr",
        "fa-jpy",
        "fa-krw",
        "fa-rmb",
        "fa-rouble",
        "fa-rub",
        "fa-ruble",
        "fa-rupee",
        "fa-shekel",
        "fa-sheqel",
        "fa-try",
        "fa-turkish-lira",
        "fa-usd",
        "fa-yen",
        "fa-align-center",
        "fa-align-justify",
        "fa-align-left",
        "fa-align-right",
        "fa-bold",
        "fa-chain",
        "fa-chain-broken",
        "fa-clipboard",
        "fa-columns",
        "fa-copy",
        "fa-cut",
        "fa-dedent",
        "fa-files-o",
        "fa-floppy-o",
        "fa-font",
        "fa-header",
        "fa-indent",
        "fa-italic",
        "fa-link",
        "fa-list",
        "fa-list-alt",
        "fa-list-ol",
        "fa-list-ul",
        "fa-outdent",
        "fa-paperclip",
        "fa-paragraph",
        "fa-paste",
        "fa-repeat",
        "fa-rotate-left",
        "fa-rotate-right",
        "fa-save",
        "fa-scissors",
        "fa-strikethrough",
        "fa-subscript",
        "fa-superscript",
        "fa-table",
        "fa-text-height",
        "fa-text-width",
        "fa-th",
        "fa-th-large",
        "fa-th-list",
        "fa-underline",
        "fa-undo",
        "fa-unlink",
        "fa-angle-double-down",
        "fa-angle-double-left",
        "fa-angle-double-right",
        "fa-angle-double-up",
        "fa-angle-down",
        "fa-angle-left",
        "fa-angle-right",
        "fa-angle-up",
        "fa-arrow-circle-down",
        "fa-arrow-circle-left",
        "fa-arrow-circle-o-down",
        "fa-arrow-circle-o-left",
        "fa-arrow-circle-o-right",
        "fa-arrow-circle-o-up",
        "fa-arrow-circle-right",
        "fa-arrow-circle-up",
        "fa-arrow-down",
        "fa-arrow-left",
        "fa-arrow-up",
        "fa-arrows-alt",
        "fa-caret-left",
        "fa-caret-right",
        "fa-caret-up",
        "fa-chevron-circle-down",
        "fa-chevron-circle-left",
        "fa-chevron-circle-right",
        "fa-chevron-circle-up",
        "fa-chevron-down",
        "fa-chevron-left",
        "fa-chevron-right",
        "fa-chevron-up",
        "fa-long-arrow-down",
        "fa-long-arrow-left",
        "fa-long-arrow-right",
        "fa-long-arrow-up",
        "fa-backward",
        "fa-compress",
        "fa-eject",
        "fa-expand",
        "fa-fast-backward",
        "fa-fast-forward",
        "fa-forward",
        "fa-pause",
        "fa-pause-circle",
        "fa-pause-circle-o",
        "fa-play",
        "fa-play-circle-o",
        "fa-step-backward",
        "fa-step-forward",
        "fa-stop",
        "fa-stop-circle",
        "fa-stop-circle-o",
        "fa-youtube-play",
        "fa-500px",
        "fa-adn",
        "fa-amazon",
        "fa-android",
        "fa-angellist",
        "fa-apple",
        "fa-behance",
        "fa-behance-square",
        "fa-bitbucket",
        "fa-bitbucket-square",
        "fa-black-tie",
        "fa-buysellads",
        "fa-chrome",
        "fa-codepen",
        "fa-codiepie",
        "fa-connectdevelop",
        "fa-contao",
        "fa-css3",
        "fa-dashcube",
        "fa-delicious",
        "fa-deviantart",
        "fa-digg",
        "fa-dribbble",
        "fa-dropbox",
        "fa-drupal",
        "fa-edge",
        "fa-empire",
        "fa-expeditedssl",
        "fa-facebook",
        "fa-facebook-f",
        "fa-facebook-square",
        "fa-firefox",
        "fa-flickr",
        "fa-fonticons",
        "fa-forumbee",
        "fa-foursquare",
        "fa-ge",
        "fa-get-pocket",
        "fa-git",
        "fa-git-square",
        "fa-github",
        "fa-github-alt",
        "fa-github-square",
        "fa-gittip",
        "fa-google",
        "fa-google-plus",
        "fa-google-plus-square",
        "fa-gratipay",
        "fa-hacker-news",
        "fa-houzz",
        "fa-html5",
        "fa-internet-explorer",
        "fa-ioxhost",
        "fa-joomla",
        "fa-jsfiddle",
        "fa-lastfm",
        "fa-lastfm-square",
        "fa-leanpub",
        "fa-linkedin",
        "fa-linkedin-square",
        "fa-linux",
        "fa-maxcdn",
        "fa-meanpath",
        "fa-medium",
        "fa-mixcloud",
        "fa-modx",
        "fa-odnoklassniki",
        "fa-odnoklassniki-square",
        "fa-opencart",
        "fa-openid",
        "fa-opera",
        "fa-optin-monster",
        "fa-pagelines",
        "fa-pied-piper-alt",
        "fa-pied-piper-pp",
        "fa-pinterest",
        "fa-pinterest-p",
        "fa-pinterest-square",
        "fa-product-hunt",
        "fa-qq",
        "fa-ra",
        "fa-rebel",
        "fa-reddit",
        "fa-reddit-alien",
        "fa-reddit-square",
        "fa-renren",
        "fa-resistance",
        "fa-safari",
        "fa-scribd",
        "fa-sellsy",
        "fa-shirtsinbulk",
        "fa-simplybuilt",
        "fa-skyatlas",
        "fa-skype",
        "fa-slack",
        "fa-slideshare",
        "fa-soundcloud",
        "fa-spotify",
        "fa-stack-exchange",
        "fa-stack-overflow",
        "fa-steam",
        "fa-steam-square",
        "fa-stumbleupon",
        "fa-stumbleupon-circle",
        "fa-tencent-weibo",
        "fa-trello",
        "fa-tripadvisor",
        "fa-tumblr",
        "fa-tumblr-square",
        "fa-twitch",
        "fa-twitter",
        "fa-twitter-square",
        "fa-usb",
        "fa-viacoin",
        "fa-vimeo",
        "fa-vimeo-square",
        "fa-vine",
        "fa-vk",
        "fa-wechat",
        "fa-weibo",
        "fa-weixin",
        "fa-whatsapp",
        "fa-wikipedia-w",
        "fa-windows",
        "fa-wordpress",
        "fa-xing",
        "fa-xing-square",
        "fa-y-combinator",
        "fa-y-combinator-square",
        "fa-yahoo",
        "fa-yc",
        "fa-yc-square",
        "fa-yelp",
        "fa-youtube",
        "fa-youtube-square",
        "fa-h-square",
        "fa-hospital-o",
        "fa-stethoscope",
        "fa-user-md"
    ];

    jQuery('[data-for=icon]').autocomplete({
        source: icons,
        html: true,
        select: function(event, ui)
        {
            jQuery(this).siblings('i').first().attr('class', 'fa ' + ui.item.value);
        }

    }).data('ui-autocomplete')._renderItem = function(ul, item)
    {
        var content = '<li><i class="fa '+item.value+'"></i> '+item.value+'</li>';

        return jQuery(content)
            .appendTo(ul);
    }
}


//get video URL from embed code
function getYouTubeID(url)
{
    var regExp = /^.*(youtu\.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
    var match = url.match(regExp);
    if (match && match[2].length == 11) {
        return match[2];
    } else {
        return 'uqXVAo7dVRU';
    }
}

function enableAccordionStyleTab()
{
    jQuery('#style-tab').accordion({
        header: '.section-header',
        heightStyle: 'content'
    });
}

function hideOptionsWindow()
{
    jQuery('#options-window').hide('slide', {direction: 'right'}, 500);
}

/**
 * Created by luis on 6/11/16.
 */

/**
 * 
 * @param name: name of the form to get
 */
function getEditForm(name)
{
    var element = Forms[name];

    var content = [];

    if (element.general != '')
    {
        content.push({
            'tab': '<li><a class="active-tab" href="#general-tab">General</a></li>',
            'tabContent': '<div id="general-tab">'+element.general+'</div>'
        })
    }

    if (element.advanced != '')
    {
        content.push({
            'tab': '<li><a href="#advanced-tab">Advanced</a></li>',
            'tabContent': '<div id="advanced-tab">'+element.advanced+'</div>'
        })
    }

    if (element.style != '')
    {
        content.push({
            'tab': '<li><a href="#style-tab">Styles</a></li>',
            'tabContent': '<% var styles = elementsStyles[this.model.get(\'editingElementID\')]; if (typeof styles == "undefined") { styles = {}; } %><div id="style-tab">'+element.style+'</div>'
        })
    }

    if (element.action != '')
    {
        content.push({
            'tab': '<li><a href="#action-tab">Action</a></li>',
            'tabContent': '<div id="action-tab">'+element.action+'</div>'
        })
    }

    var head = '';
    var body = '';

    var width = 100/content.length;
    _.each(content, function(c){
        head+= c.tab.replace('<li>', '<li style="width: '+width+'%;">');
        body+= c.tabContent;
    });

    return '<div class="'+element.parentClass+'" id="setting-tabs">' +
                '<div id="settings-micro-panel">' +
                    '<span id="close-panel"><i class="fa fa-close"></i> </span>' +//close panel button
                    '<span id="move-panel"><i class="fa fa-arrows"></i> </span>' +//close panel button
                '</div>'+

                '<ul>' +

                    head +
                    //'<li><a class="active-tab" href="#general-tab">General</a></li>' +
                    //'<li><a href="#style-tab">Styles</a></li>' +
                    //'<li><a href="#advanced-tab">Advanced</a></li>' +
                    //'<li><a href="#action-tab">Action</a></li>' +
                '</ul>' +

                body +
            '</div><div class="clear"></div>';

    //return '<div class="'+element.parentClass+'">'+code + '</div>';
    
}

/**
 * define HTML style tab, different elements may have different style area
 * @type {{colors: string, elementSize: string, formStyle: string, textStyle: string, buttonStyle: string}}
 */
var elementStyle = {
    textColor: '<div class="css-styles">'+
                '<label class="section-header">Text color:</label>' +
                    '<div>' + //solely for accordion purpose
                        '<input data-for="color" type="color" value="<%= styles[\'color\'] == null || styles[\'color\'] ==\'\' ? "#fffffa" : styles[\'color\'] %>"> <i class="fa fa-hand-paper-o reset-color"></i>' +
                    '</div>'+//accordion div
                '</div>',

    background:'<div class="css-styles">'+
            '<div id="c37-background-settings">' +
                '<label class="section-header">Background</label>' +
                '<div>' +//solely for accordion purpose
                    '<div class="c37-col-xs-4"  data-for="background-color">' +
                        '<label>Color:</label>' +
                        '<input type="color" value="<%= styles[\'background-color\'] == null || styles[\'background-color\'] == ""? "#fffffa" : styles[\'background-color\'] %>" > <i class="fa fa-hand-paper-o reset-color"></i>' +
                    '</div>' +

                    '<div class="c37-col-xs-4"  data-for="background-image">' +
                        '<label>Image:</label>' +
                        '<img src="<%= styles[\'background-image\'] %>" id="c37-image-preview" /><br />' +
                        '<input type="hidden" value="<%= styles[\'background-image\'] %>" />'+
                        '<a href="#" id="change-background-image">Change...</a>'+
                    '</div>' +

                    '<div class="c37-col-xs-4"  data-for="background-image-style">' +
                        '<label>Style:</label>' +
                        '<select>' +
                            '<option <%= styles[\'background-image-style\'] == "no-repeat" ? "selected" : "" %> value="no-repeat">no repeat</option>'+
                            '<option <%= styles[\'background-image-style\'] == "repeat" ? "selected" : "" %> value="repeat">repeat</option>'+
                            '<option <%= styles[\'background-image-style\'] == "repeat-x" ? "selected" : "" %> value="repeat-x">repeat x</option>'+
                            '<option <%= styles[\'background-image-style\'] == "repeat-y" ? "selected" : "" %> value="repeat-y">repeat y</option>'+
                            '<option <%= styles[\'background-image-style\'] == "cover" ? "selected" : "" %> value="cover">cover</option>'+
                        '</select>'+
                    '</div>' +
                    '<div class="clearfix"></div>' +
                '</div>' + //accordion div tag
            '</div></div>',
    elementSize:
                '<div class="c37-col-xs-12">' +
                    '<label class="section-header">Element width:</label>' +
                    '<div>'+//solely for accordion purpose
                        '<select <% var size = (this.model.get(\'size\')); %> data-for="element-width">' +
                        '<option <%= size.size == 2 ? "selected": "" %> value="2">2</option>'+
                        '<option <%= size.size == 3 ? "selected": "" %>  value="3">3</option>'+
                        '<option <%= size.size == 4 ? "selected": "" %>  value="4">4</option>'+
                        '<option <%= size.size == 5 ? "selected": "" %>  value="5">5</option>'+
                        '<option <%= size.size == 6 ? "selected": "" %>  value="6">6</option>'+
                        '<option <%= size.size == 7 ? "selected": "" %>  value="7">7</option>'+
                        '<option <%= size.size == 8 ? "selected": "" %>  value="8">8</option>'+
                        '<option <%= size.size == 9 ? "selected": "" %>  value="9">9</option>'+
                        '<option <%= size.size == 10 ? "selected": "" %>  value="10">10</option>'+
                        '<option <%= size.size == 11 ? "selected": "" %>  value="11">11</option>'+
                        '<option <%= size.size == 12 ? "selected": "" %>  value="12">12</option>'+
                        '</select>'+
                        '<br /><span><input type="checkbox" <%= size.expand? "checked" : "" %>  data-for="expand" /> Expand full on small screen</span>' +
                    '</div>' +

                    '</div>',
    border: '<div class="css-styles">' +
            '<div id="c37-border-settings">' +
                '<label class="section-header">Border</label>' +
                    '<div>'+//solely for accordion purpose
                        '<div class="c37-col-xs-3">' +
                                '<label>Style:  ' +
                                        '<select data-for="border-style">' +
                                            '<option  <%= styles[\'border-style\'] == "none" ? "selected" : "" %>  value="none">none</option>' +
                                            '<option  <%= styles[\'border-style\'] == "solid" ? "selected" : "" %>  value="solid">solid</option>' +
                                            '<option  <%= styles[\'border-style\'] == "dashed" ? "selected" : "" %>  value="dashed">dashed</option>' +
                                            '<option  <%= styles[\'border-style\'] == "dotted" ? "selected" : "" %>  value="dotted">dotted</option>' +
                                        '</select></label>' +
                        '</div>' +
                        '<div class="c37-col-xs-3">' +
                            '<label>Width: <input value="<%= styles[\'border-width\'] %>" type="number" data-for="border-width" /></label>' +
                        '</div>' +
                        '<div class="c37-col-xs-3">' +
                            '<label>Color: <input value="<%= styles[\'border-color\'] == null || styles[\'border-color\'] ==\'\' ? \'#fffffa\' : styles[\'border-color\'] %>" type="color" data-for="border-color" /></label>' +
                        '</div>' +
                        '<div class="c37-col-xs-3">' +
                            '<label>Radius: <input value="<%= styles[\'border-radius\'] %>" type="number" data-for="border-radius" /></label>' +
                        '</div>' +
                '</div>'+//accordion div
            '</div></div>',

    margin: '<div class="css-styles">' +
            '<div id="c37-margin-padding-settings">' +
                '<label class="section-header">Margin</label>' +
                //'<div>'+//solely for accordion purpose
                '<div id="c37-margin-settings" data-for="margin">' +
                    '<label class="c37-col-xs-3">' +
                        'Top: <input value="<%= styles[\'margin-top\'] %>" type="number" class="top" />' +
                    '</label>'+

                    '<label class="c37-col-xs-3">' +
                    'Right: <input value="<%= styles[\'margin-right\'] %>" type="number" class="right" />' +
                    '</label>'+

                    '<label class="c37-col-xs-3">' +
                    'Bottom: <input value="<%= styles[\'margin-bottom\'] %>" type="number" class="bottom" />' +
                    '</label>'+

                    '<label class="c37-col-xs-3">' +
                    'Left: <input value="<%= styles[\'margin-left\'] %>" type="number" class="left" />' +
                    '</label>'+
                '</div>' +

                '<label class="section-header">Padding</label>' +
                '<div id="c37-padding-settings" data-for="padding">' +
                    '<label class="c37-col-xs-3">' +
                    'Top: <input value="<%= styles[\'padding-top\'] %>" type="number" class="top" />' +
                    '</label>'+

                    '<label class="c37-col-xs-3">' +
                    'Right: <input value="<%= styles[\'padding-right\'] %>" type="number" class="right" />' +
                    '</label>'+

                    '<label class="c37-col-xs-3">' +
                    'Bottom: <input value="<%= styles[\'padding-bottom\'] %>" type="number" class="bottom" />' +
                    '</label>'+

                    '<label class="c37-col-xs-3">' +
                    'Left: <input value="<%= styles[\'padding-left\'] %>" type="number" class="left" />' +
                    '</label>'+
                '</div>' +
    '</div></div>'
};

var actionArea =
    '<div class="element-action">' +
        '<% var action = this.model.get("action"); %>'+
        '<div data-for="trigger">'+
        '<label>Trigger</label>'+
        '<select>' +
            '<option value="no-trigger"></option>' +
            '<option <%= action.trigger=="click" ? "selected" : "" %> value="click">On this element click</option>' +
            //'<option <%= action.trigger=="change" ? "selected" : "" %> value="change">On value change</option>' +
        '</select>' +
        '</div>'+

        '<div data-for="action">' +
            '<label>Action</label>'+
            '<select>' +
                '<option  value="do-nothing"></option>' +
                '<option <%= action.action=="open-link" ? "selected" : "" %> value="open-link">Open Link</option>' +
                '<option <%= action.action=="submit-form" ? "selected" : "" %> value="submit-form">Submit form</option>' +
                //'<option <%= action.action=="next-step" ? "selected" : "" %> value="next-step">Next step</option>' +
                //'<option <%= action.action=="previous-step" ? "selected" : "" %> value="previous-step">Previous step</option>' +
                //'<option <%= action.action=="show-element" ? "selected" : "" %> value="show-element">Show element</option>' +
                //'<option <%= action.action=="hide-element" ? "selected" : "" %> value="hide-element">Hide element</option>' +
            '</select>' +
        '</div>'+
        //
        //'<div>'+
        //    '<label>Trigger value</label>' +//
        //    '<input type="text" data-for="trigger-value" value="<%= action["trigger-value"] %>" placeholder="trigger value">' +
        //'</div>'+
        //
        //hide the target URL div by default
        '<div <%= action.action == "open-link" ? "" : \'class="hidden"\' %> data-for="target-url">'+
            '<label>Target URL</label>' +
            '<input type="text" value="<%= action.action== \'open-link\'? action.target : \'\' %>" placeholder="target url">' +
        '</div>'+
        //'<div>'+
        //    '<label>Target element <small>(to show/hide)</small></label>' +
        //    '<select data-for="target-element" class="c37-col-xs-8">' +
        //    '<option value="">no element selected</option>' +
        //
        //    '<% _.each(allElements, function(element){ %>' +
        //        '<option <%= action.target==element.id? "selected" : "" %> value="<%= element.id %>"><%= element.name %></option>'+
        //    '<% }) %>' +
        //    '</select>'+
        //    '<h3 id="element-identifier">&nbsp;&nbsp;<i class="fa fa-eye"></i></h3>'+
        //'</div>'+

    '</div>';


var textEditOptions =
{
    general:    '<label>Placeholder: </label>'+
                '<input type="text" data-for="placeholder" value="<%= this.model.get(\'placeholder\') %>" />' +
                '<label>Label</label>' +
                '<input type="text" value="<%= this.model.get(\'label\') %>" data-for="input-label" placeholder="enter label" />'+
                '<label>Value</label>' +
                '<input type="text" value="<%= this.model.get(\'value\') %>" data-for="input-value" placeholder="enter value" />'+


                '<label>Type:</label>'+
                '<select <% var type = this.model.get(\'type\') %> data-for="input-type">' +
                    '<option <%= type=="text"? "selected" : "" %> value="text">Text</option>'+
                    '<option <%= type=="email"? "selected" : "" %> value="email">Email</option>'+
                    '<option <%= type=="url"? "selected" : "" %> value="url">URL</option>'+
                    '<option <%= type=="number"? "selected" : "" %> value="number">Number</option>'+
                    '<option <%= type=="password"? "selected" : "" %> value="password">Password</option>'+
                    '<option <%= type=="tel"? "selected" : "" %> value="tel">Phone</option>'+
                    '<option <%= type=="submit"? "selected" : "" %> value="submit">Submit</option>'+
                '</select>' +
                '<label>Icon</label>' +
                '<div class="fa-icon"><i class="fa <%= this.model.get(\'icon\') ? this.model.get(\'icon\'): \'\' %>"></i><input data-for="icon" value="<%= this.model.get(\'icon\')? this.model.get(\'icon\'): \'\' %> " type="text" id="fa-icon-input" /> </div>' +
                '',
    advanced:   '<label>Field name:</label>' +
                '<input type="text" data-for="name" value="<%= this.model.get(\'name\') %>" />' +
                C37BackendValidation.textValidation(),
    action: '',
    style: elementStyle.background + elementStyle.elementSize

};



var fileEditOptions =
{
    general:    '<label>Upload multiple files?</label>' +
                '<input <%= this.model.get(\'multiple\')? "checked" : "" %> type="checkbox" data-for="multiple" />' +
                '<label>Text</label>' +
                '<input data-for="text" type="text" value="<%= this.model.get(\'text\') %>" placeholder="upload text" />' +
                '<label>Icon</label>' +
                '<div class="fa-icon"><i class="fa <%= this.model.get(\'icon\') ? this.model.get(\'icon\'): \'\' %>"></i><input <%= versionNangCap ? ""  : "disabled" %> data-for="icon" value="<%= this.model.get(\'icon\')? this.model.get(\'icon\'): \'\' %> " type="text" id="fa-icon-input" /> </div>',

    advanced:   '<label>Field name: </label>' +
                '<input type="text" data-for="name" value="<%= this.model.get(\'name\').replace(\'[\',\'\').replace(\']\',\'\') %>" />' +
                C37BackendValidation.fileValidation(this.model),
    style: '',
    action: ''

};


var checkboxEditOptions =
{
    general:    '<label>Options: </label>'+
                '<div class="row options">' +
                    '<span class="c37-col-xs-6"><label>Value</label></span>' +
                    '<span class="c37-col-xs-2"><label>Check</label></span>'+
                    '<% var options = this.model.get(\'options\'); _.each(options, function(o){ %>  ' +
                        '<div>' +
                        '<span class="c37-col-xs-8"><input type="text" data-for="value" value="<%= decodeURIComponent(o.value) %>" />  </span>' +
                        '<span class="c37-col-xs-4"><input type="checkbox" data-for="checked" <%= o.checked? "checked" : "" %> />  </span>'+
                        '<span class="hidden"><input type="text" data-for="id" value="<%= o.id %>" /></span>'+
                        '</div>' +
                    '<%}) %>' +
                '</div>'+
                '<button class="add-option"><i class="fa fa-plus"></i> Add option</button>',

    advanced:   '<label>Name</label>'+
                '<input data-for="name" type="text" value="<%= this.model.get(\'name\') %>" placeholder="enter a name for your field" />'+
                '<label>Options alignment</label>'+
                '<select <% var alignment = this.model.get(\'alignment\'); %> data-for="alignment">' +
                '<option <%= alignment=="c37-vertical"? "selected" : "" %> value="c37-vertical">Vertical</option>'+
                '<option <%= alignment=="c37-horizontal"? "selected" : "" %> value="c37-horizontal">Horizontal</option>'+
                '</select>',
    style: elementStyle.background + elementStyle.elementSize,
    action: actionArea
};


var radioEditOptions  =
{
    general:    '<label>Options: </label>'+
                '<div class="row options">' +
                    '<span class="c37-col-xs-8"><label>Value</label></span>' +
                    '<span class="c37-col-xs-4"><label>Select</label></span>'+
                '<% var options = this.model.get(\'options\'); _.each(options, function(o){ %>  ' +
                    '<div>' +
                    '<span class="c37-col-xs-8"><input type="text" data-for="value" value="<%= decodeURIComponent(o.value) %>" />  </span>' +
                    '<span class="c37-col-xs-4"><input type="radio" data-for="checked" name="radio-settings" <%= o.checked? "checked" : "" %> />  </span>'+
                    '<span class="hidden"><input type="text" data-for="id" value="<%= o.id %>" /></span>'+
                    '</div>' +
                '<%}) %>' +
                '</div>'+
                '<button class="add-option"><i class="fa fa-plus"></i> Add option</button>',
    advanced:   '<label>Name</label>'+
                '<input data-for="name" type="text" value="<%= this.model.get(\'name\') %>" placeholder="enter a name for your field" />'+
                '<label>Options alignment</label>'+
                '<select <% var alignment = this.model.get(\'alignment\'); %> data-for="alignment">' +
                '<option <%= alignment=="c37-vertical"? "selected" : "" %> value="c37-vertical">Vertical</option>'+
                '<option <%= alignment=="c37-horizontal"? "selected" : "" %> value="c37-horizontal">Horizontal</option>'+
                '</select>',
    style: elementStyle.background + elementStyle.elementSize,
    action: actionArea
};



var labelEditOptions =
{
    general:    '<label>Content: </label>'+
                '<input type="text" data-for="label" placeholder="enter your label" value="<%= this.model.get(\'content\') %>" /> ' +
                '<input type="checkbox" <%= this.model.get("required") ? "checked" : "" %> data-for="required"> Field is required',
    advanced: '',
    style: elementStyle.background + elementStyle.elementSize,
    action: null
};


var headingEditOptions =
{
    general:    '<label>Content: </label>'+
                '<input type="text" data-for="heading" placeholder="enter text content" value="<%= this.model.get(\'content\') %>" /> '+
                '<label>Type: </label>'+
                '<select <% var tagName = this.model.get(\'tagName\'); %> data-for="tagName">' +
                    '<option <%= tagName=="h1"? "selected" : ""  %> value="h1">h1</option>' +
                    '<option <%= tagName=="h2"? "selected" : ""  %>  value="h2">h2</option>' +
                    '<option <%= tagName=="h3"? "selected" : ""  %>  value="h3">h3</option>' +
                    '<option <%= tagName=="h4"? "selected" : ""  %>  value="h4">h4</option>' +
                    '<option <%= tagName=="h5"? "selected" : ""  %>  value="h5">h5</option>' +
                    '<option <%= tagName=="h6"? "selected" : ""  %>  value="h6">h6</option>' +
                '</select>',
    advanced: '',
    style: elementStyle.background + elementStyle.elementSize,
    action: null
};

var paragraphEditOptions =
{
    general:    '<textarea id="c37-text-edit" data-for="paragraph" placeholder="enter text content"></textarea> ',
    advanced: '',
    style: elementStyle.background + elementStyle.border + elementStyle.margin,
    action: ''
};

var textAreaEditOptions =
{
    general:    '<label>Placeholder: </label>'+
                '<input type="text" data-for="placeholder" placeholder="enter placeholder" value="<%= this.model.get(\'placeholder\') %>" /> ' +
                '<label>Label</label>' +
                '<input value="<%= this.model.get(\'label\') %>" type="text" data-for="input-label" placeholder="enter label" />',


    advanced:   '<label>Field name: </label>'+
                '<input type="text" data-for="name" placeholder="enter field name" value="<%= this.model.get(\'name\') %>" /> ' +
                C37BackendValidation.textAreaValidation(),

    style: elementStyle.background + elementStyle.elementSize,
    action: actionArea
};

var buttonEditOptions =
{
    general:    '<label>Button Text: </label>'+
                '<input type="text" data-for="text" placeholder="button text" value="<%= this.model.get(\'text\') %>" /> ',
    advanced: '',
    //'<label>Field name: </label>'+
    //            '<input type="text" data-for="name" placeholder="enter field name" value="<%= name %>" />',
    style:  '<label class="section-header">Preset Styles</label>' +
            '<% var preset = this.model.get("preset"); %>'+
            '<div class="row" id="button-presets">' +
                '<span class="c37-col-xs-3">' +
                    '<label>Style</label>' +
                    '<select data-for="style">' +
                        '<option value=""></option>' +
                        '<option <%= preset.style== "c37-button-3d"? "selected" : "" %>  value="c37-button-3d">3D</option>' +
                        '<option <%= preset.style== "c37-button-raised"? "selected" : "" %> value="c37-button-raised">Raised</option>' +
                        '<option <%= preset.style== "c37-button-glow"? "selected" : "" %> value="c37-button-glow">Glow</option>' +
                        '<option <%= preset.style== "c37-button-border"? "selected" : "" %> value="c37-button-border">Border</option>' +
                    '</select>' +
                '</span>' +
                '<span class="c37-col-xs-3">' +
                    '<label>Shape</label>' +
                    '<select data-for="shape">' +
                        '<option value=""></option>' +
                        '<option <%= preset.shape== "c37-button-square"? "selected" : "" %> value="c37-button-square">square</option>' +
                        '<option <%= preset.shape== "c37-button-box"? "selected" : "" %> value="c37-button-box">box</option>' +
                        '<option <%= preset.shape== "c37-button-rounded"? "selected" : "" %> value="c37-button-rounded">rounded</option>' +
                        '<option <%= preset.shape== "c37-button-pill"? "selected" : "" %> value="c37-button-pill">pill</option>' +
                        '<option <%= preset.shape== "c37-button-circle"? "selected" : "" %> value="c37-button-circle">circle</option>' +
                    '</select>' +
                '</span>' +
                '<span class="c37-col-xs-3">' +
                    '<label>Color</label>' +
                    '<select data-for="color">' +
                        '<option value=""></option>' +
                        '<option <%= preset.color== "c37-button-primary"? "selected" : "" %> value="c37-button-primary">primary</option>' +
                        '<option <%= preset.color== "c37-button-plain"? "selected" : "" %> value="c37-button-plain">plain</option>' +
                        '<option <%= preset.color== "c37-button-inverse"? "selected" : "" %> value="c37-button-inverse">inverse</option>' +
                        '<option <%= preset.color== "c37-button-action"? "selected" : "" %> value="c37-button-action">action</option>' +
                        '<option <%= preset.color== "c37-button-highlight"? "selected" : "" %> value="c37-button-highlight">highlight</option>' +
                        '<option <%= preset.color== "c37-button-caution"? "selected" : "" %> value="c37-button-caution">caution</option>' +
                        '<option <%= preset.color== "c37-button-royal"? "selected" : "" %> value="c37-button-royal">royal</option>' +
                    '</select>' +
                '</span>' +
                '<span class="c37-col-xs-3">' +
                    '<label>Size</label>' +
                    '<select data-for="size">' +
                        '<option value=""></option>' +
                        '<option <%= preset.size== "c37-button-giant"? "selected" : "" %>  value="c37-button-giant">giant</option>' +
                        '<option <%= preset.size== "c37-button-jumbo"? "selected" : "" %>  value="c37-button-jumbo">jumbo</option>' +
                        '<option <%= preset.size== "c37-button-large"? "selected" : "" %>  value="c37-button-large">large</option>' +
                        '<option <%= preset.size== "c37-button-normal"? "selected" : "" %>  value="c37-button-normal">normal</option>' +
                        '<option <%= preset.size== "c37-button-small"? "selected" : "" %>  value="c37-button-small">small</option>' +
                        '<option <%= preset.size== "c37-button-tiny"? "selected" : "" %>  value="c37-button-tiny">tiny</option>' +
                    '</select>' +
                '</span>' +
            '</div>'+
            elementStyle.textColor +
            elementStyle.background +
            elementStyle.margin +
            elementStyle.elementSize,

    action: actionArea
};

var dateEditOptions =
{
    general:    '<label <% var type = this.model.get(\'type\'); %> >Default value: </label>'+
                '<input type="<%= type %>" data-for="default-value" value="<%= this.model.get(\'value\') %>" />'+
                '<label>Type:</label>'+
                '<select data-for="date-type">' +
                '<option <%= type=="date"? "selected" : "" %> value="date">Date</option>'+
                //'<option <%= type=="time"? "selected" : "" %> value="time">Time</option>'+
                //'<option <%= type=="week"? "selected" : "" %> value="week">Week</option>'+
                //'<option <%= type=="month"? "selected" : "" %> value="month">Month</option>'+
                //'<option <%= type=="datetime"? "selected" : "" %> value="datetime">DateTime</option>'+
                //'<option <%= type=="datetime-local"? "selected" : "" %> value="datetime-local">DateTime Local</option>'+
                '</select>',
    advanced:   '<label>Field name:</label>' +
                '<input type="text" data-for="name" value="<%= this.model.get(\'name\') %>" />',
    style: elementStyle.background + elementStyle.elementSize,
    action: actionArea
};



var selectEditOptions =
{
    general:    '<label>Options: </label>'+
                '<div class="row options">' +
                '<span class="c37-col-xs-12"><label>Values</label></span>' +
                '<% var options = this.model.get(\'options\'); var allValue= \'\'; _.each(options, function(o){ %>  ' +
                    '<% allValue+=o.value+\'\\n\';  %>'+
                '<%}) %>' +
                '<textarea data-for="value"><%= decodeURIComponent(allValue) %></textarea>'+
                '</div>' +
                '<label>Selected value</label>' +
                '<select data-for="selected">' +
                    '<% var selected_value = this.model.get(\'selected_value\'); _.each(options, function(option){ %>' +
                        '<option <%= option.value == selected_value? \'selected\': \'\' %> value="<%= option.value %>"><%= decodeURIComponent(option.value) %></option>' +
                    '<% }) %>' +
                '</select>',
    advanced:   '<label>Name</label>'+
                '<input data-for="name" type="text" value="<%= this.model.get(\'name\') %>" placeholder="enter a name for your field" />',
    style: elementStyle.background + elementStyle.elementSize,
    action: actionArea
};


var acceptanceEditOptions =
{
    general:    '<label>Text: </label>'+
                '<input type="text" data-for="text" placeholder="enter acceptance text" value="<%= this.model.get(\'text\') %>" />'+
                '<label>Error message(<small>When not checked</small>)</label>'+

                '<input type="text" data-for="error" placeholder="enter error message" value="<%= this.model.get(\'error_message\') %>" /> ',
    advanced:   '<label>Field name:</label>' +
                '<input disabled type="text" data-for="name" value="<%= this.model.get(\'name\') %>" />',
    style: elementStyle.background,
    action: actionArea
};

var rowEditOptions =
{
    general:    '<label>Row layout</label>' +
                '<select data-for="layout">' +
                    '<option <%= layout=="12"? "selected" : "" %> value="12">1</option>' +
                    '<option <%= layout=="6-6"? "selected" : "" %> value="6-6">1/2 + 1/2</option>' +
                    '<option <%= layout=="4-4-4"? "selected" : "" %> value="4-4-4">1/3 + 1/3 + 1/3</option>' +
                    '<option <%= layout=="4-8"? "selected" : "" %> value="4-8">1/3 + 2/3</option>' +
                    '<option <%= layout=="8-4"? "selected" : "" %> value="8-4">2/3 + 1/3</option>' +
                    '<option <%= layout=="3-3-3-3"? "selected" : "" %> value="3-3-3-3">1/4 + 1/4 + 1/4 + 1/4</option>' +
                    '<option <%= layout=="3-3-6"? "selected" : "" %> value="3-3-6">1/4 + 1/4 + 2/4</option>' +
                    '<option <%= layout=="3-9"? "selected" : "" %> value="3-9">1/4 + 3/4</option>' +
                    '<option <%= layout=="3-6-3"? "selected" : "" %> value="3-6-3">1/4 + 2/4 + 1/4</option>' +
                    '<option <%= layout=="6-3-3"? "selected" : "" %> value="6-3-3">2/4 + 1/4 + 1/4</option>' +
                    '<option <%= layout=="9-3"? "selected" : "" %> value="9-3">3/4 + 1/4</option>' +
                '</select>',
    advanced:   '',
    style: elementStyle.background + elementStyle.border + elementStyle.margin,
    action: actionArea
};

var boxEditOptions = {
    general: '',
    style: elementStyle.background + elementStyle.border + elementStyle.margin,
    advanced: '',
    action: ''
}

var formEditOptions =
{
    general:    '<label>Page title</label>' +
                '<input id="form-name" type="text" value="<%= core37Page.pageTitle %>" placeholder="page title" data-for="name" />' +
                '<label>Form width (<small><em>in px, leave blank for full width</em></small>)</label>'+
                '<span><input type="number" value="<%= this.model.get("width") %>" data-for="width" /></span>',

    advanced:   '<label>Tracking code <small>(GA, FB pixel)</small></label>' +
                '<textarea data-for="tracking-code" placeholder="enter your tracking code (Google Analytics, Facebook Pixel here)"><%= core37Page.pageSettings.trackingCode %></textarea>',

    style:      '<label class="section-header">Background</label>' +
                //'<label><input type="radio" name="background" value="color"/>Color  <input type="radio" name="background" value="image"/>Image </label>' +
                '<div id="c37-color-bg">' +
                    '<input value="<%= core37Page.pageSettings.backgroundColor %>" type="color" data-for="bg-color" /> <span class="fa fa-hand-stop-o reset-color"></span>' +
                    //'<label>Opacity <input value="<%= core37Page.pageSettings.backgroundColorOpacity %>" type="number" min="0" max="1" data-for="opacity" /></label>' +
                '</div>' +
                '<div id="c37-color-image">' +
                    '<img src="<%= core37Page.pageSettings.backgroundImage %>" class="c37-image-preview" />' +

                    '<button id="c37-image-picker">Select image...</button> <span class="fa fa-times-circle remove-image"></span>'+
                '</div>' +
    '' +
    ''
                //'<label>Background color</label>' +
                //'<input type="color" value="<%= this.model.get(\'bgColor\') %>" data-for="bgColor"/>' +
                //'<br/>'+
                //'<label>Background image</label>' +
                //    '<input type="text" value="<%= this.model.get(\'bgImage\') %>" data-for="bgColor"/>'+

                ,
    action: ''
};

var imageEditOptions = {
    general : '<label>Select image</label>' +
            //preview the current image
            '<img class="c37-image-preview" src="<%= this.model.get( \'imgSrc\')%>" />' +
            //set a picker to pick new image
            '<button id="c37-image-picker">Change image...</button>',
    advanced: '',
    style   : elementStyle.background + elementStyle.border + elementStyle.margin,
    action  : ''
};

var starsEditOptions = {
    general: '<% var initialRating = this.model.get("initialRating"); var theme = this.model.get("theme"); var id = this.model.get("id"); var optionsString = ""; var options = this.model.get("options"); _.each(options, function(option){ optionsString += option.value + "\\n"; }) %>' +
            '<label>Select style</label>' +
            '<select data-for="theme">' +
                '<option <%= theme == "fontawesome-stars" ? "selected" : ""  %> value="fontawesome-stars">Round-edges Stars</option>' +
                '<option <%= theme == "css-stars" ? "selected" : ""  %> value="css-stars">Sharp-edges Stars</option>' +
                '<option <%= theme == "bars-1to10" ? "selected" : ""  %> value="bars-1to10">Bars</option>' +
                '<option <%= theme == "bars-horizontal" ? "selected" : ""  %> value="bars-horizontal">Stack bars</option>' +
                '<option <%= theme == "bars-movie" ? "selected" : ""  %> value="bars-movie">Flat bar</option>' +
                '<option <%= theme == "bars-pill" ? "selected" : ""  %> value="bars-pill">Pills</option>' +
                '<option <%= theme == "bars-square" ? "selected" : ""  %> value="bars-square">Blue boxes</option>' +
            '</select>' +
            '<label>Values</label>' +
            '<textarea data-for="options"><%= jQuery.trim(optionsString) %></textarea>' +
            '<label>Initial value</label>' +
            '<select data-for="initial-rating">' +
            '<% _.each(options, function(option) {  %>' +
                '<option <%= option.value == initialRating ? "selected" : "" %>  value="<%= option.value %>"> <%= option.text %> </option>' +
            '<% }) %>' +
            '</select>'+
            '<label>Show values</label>' +
            '<input <%= this.model.get("showValues")? "checked" : ""%> type="checkbox" data-for="show-labels" /> Show values for each rating' +
            '<label>Show selected value</label>' +
            '<input <%= this.model.get("showSelectedRating")? "checked" : ""%>  type="checkbox" data-for="show-selected" /> Show currently selected value' +
    '' +
    '' +
    '',
    advanced: '<label>Field name</label>' +
                '<input data-for="name" type="text" placeholder="set a name for your field" value="<%= this.model.get(\'name\') %>" />' +
    '',
    style: '<label>Stars color</label>' +
            '<input type="color" data-for="star-color" />' +
    '',
    action: ''
};

var videoEditOptions = {
    general: '<label>Video URL/Embed code</label>' +
            '<textarea data-for="video-code"><%= this.model.get(\'videoURL\') %></textarea>' +
            '<label><input <%= this.model.get(\'hideInfo\') ? "checked" : "" %> type="checkbox" data-for="hide-info" /> Hide info (title) </label>' +
            '<label><input <%= this.model.get(\'hideControls\') ? "checked" : "" %> type="checkbox" data-for="hide-controls" /> Hide controls</label>' +
            '<label><input <%= this.model.get(\'autoPlay\') ? "checked" : "" %> type="checkbox" data-for="auto-play" /> auto play </label>' +
            '<label><input type="number" value="<%= this.model.get(\'width\') %>" data-for="width" placeholder="video width" /> </label>' +
            '<label><input value="<%= this.model.get(\'height\') %>" type="number" data-for="height" placeholder="video height" /></label>',
    advanced: '',
    style: elementStyle.background + elementStyle.border + elementStyle.margin,
    action: ''

};

var ulEditOptions = {
    general: '<textarea id="ul-editor"></textarea>',
    style: '<label>Select icon</label>' +
            '<div class="fa-icon"><i class="fa <%= this.model.get(\'icon\') %>"></i><input type="text" data-for="icon" value="<%= this.model.get(\'icon\') %>"  /></div>' +
            '<label>Icon color</label>' +
            '<input type="color" value="<%= this.model.get(\'iconColor\') %>"  data-for="icon-color">' +
            '<label>Icon background color</label>' +
            '<input type="color"  value="<%= this.model.get(\'iconBgColor\') %>"  data-for="icon-bg-color">' +
            '<label>Icon style</label>' +
            '<select data-for="style">' +
                '<option value="">None</option>' +
                '<option <%= this.model.get(\'iconStyle\') == "c37-li-icon-square" ? "selected" : "" %>  value="c37-li-icon-square">Square</option>' +
                '<option <%= this.model.get(\'iconStyle\') == "c37-li-icon-round" ? "selected" : "" %>  value="c37-li-icon-round">Round</option>' +
            '</select>' +
    '',
    advanced: '',
    action: ''
};

var formContainerOptions = {
    general: '<label>Put your form code here</label>' +
            '<textarea data-for="form-code"><%= this.model.get(\'formCode\') %></textarea>' +
    '',
    style:
    '<label class="section-header">Preset styles</label>'+
    '<select data-for="form-style">' +
    '<% _.each(core37Page.styles, function(s){  %>'+
    '<option <%= s.class==core37Page.pageSettings.presetCSSStyle? \'selected\' : \'\' %> value="<%= s.class %>" > <%= "Style "+ s.class.slice(-1) %> </option>' +
    '<% }) %>' +
    '</select>' +
    elementStyle.background + elementStyle.border + elementStyle.margin,
    advanced: '',
    action: ''
}



var Forms = {
    textEdit: {
        general: textEditOptions.general,
        advanced: textEditOptions.advanced,
        style: textEditOptions.style,
        action: textEditOptions.action,
        parentClass: 'for-text'
    },
    checkboxEdit: {
        general: checkboxEditOptions.general,
        advanced: checkboxEditOptions.advanced,
        style: checkboxEditOptions.style,
        action: checkboxEditOptions.action,
        parentClass: 'for-checkbox'
    },
    radioEdit: {
        general: radioEditOptions.general,
        advanced: radioEditOptions.advanced,
        style: radioEditOptions.style,
        action: radioEditOptions.action,
        parentClass: 'for-radio'
    },
    labelEdit: {
        general: labelEditOptions.general,
        advanced: labelEditOptions.advanced,
        style: labelEditOptions.style,
        action: labelEditOptions.action,
        parentClass: 'for-label'
    },
    headingEdit: {
        general: headingEditOptions.general,
        advanced: headingEditOptions.advanced,
        style: headingEditOptions.style,
        action: headingEditOptions.action,
        parentClass: 'for-heading'
    },
    paragraphEdit: {
        general: paragraphEditOptions.general,
        advanced: paragraphEditOptions.advanced,
        style: paragraphEditOptions.style,
        action: paragraphEditOptions.action,
        parentClass: 'for-paragraph'
    },
    textAreaEdit: {
        general: textAreaEditOptions.general,
        advanced: textAreaEditOptions.advanced,
        style: textAreaEditOptions.style,
        action: textAreaEditOptions.action,
        parentClass: 'for-textarea'
    },
    buttonEdit: {
        general: buttonEditOptions.general,
        advanced: buttonEditOptions.advanced,
        style: buttonEditOptions.style,
        action: buttonEditOptions.action,
        parentClass: 'for-button'
    },
    dateEdit: {
        general: dateEditOptions.general,
        advanced: dateEditOptions.advanced,
        style: dateEditOptions.style,
        action: dateEditOptions.action,
        parentClass: 'for-date'
    },
    selectEdit: {
        general: selectEditOptions.general,
        advanced: selectEditOptions.advanced,
        style: selectEditOptions.style,
        action: selectEditOptions.action,
        parentClass: 'for-select'
    },
    acceptanceEdit: {
        general: acceptanceEditOptions.general,
        advanced: acceptanceEditOptions.advanced,
        style: acceptanceEditOptions.style,
        action: acceptanceEditOptions.action,
        parentClass: 'for-acceptance'
    },
    formEdit: {
        general: formEditOptions.general,
        advanced: formEditOptions.advanced,
        style: formEditOptions.style,
        action: formEditOptions.action,
        parentClass: 'for-page'
    },

    rowEdit: {
        general: rowEditOptions.general,
        advanced: rowEditOptions.advanced,
        style: rowEditOptions.style,
        action: '',
        parentClass: 'for-row'
    },
    fileEdit: {
        general: fileEditOptions.general,
        advanced: fileEditOptions.advanced,
        style: fileEditOptions.style,
        action: fileEditOptions.action,
        parentClass: 'for-file'
    },

    imageEdit: {
        general: imageEditOptions.general,
        advanced: '',
        style: '',
        action: '',
        parentClass: 'for-image'
    },

    starsEdit: {
        general: starsEditOptions.general,
        advanced: starsEditOptions.advanced,
        style: '',
        action: starsEditOptions.action,
        parentClass: 'for-stars'
    },

    videoEdit: {
        general: videoEditOptions.general,
        advanced: videoEditOptions.advanced,
        style: videoEditOptions.style,
        action: videoEditOptions.action,
        parentClass: 'for-video'
    },
    ulEdit: {
        general: ulEditOptions.general,
        advanced: ulEditOptions.advanced,
        style: ulEditOptions.style,
        action: '',
        parentClass: 'for-ul'
    },
    formContainerEdit: {
        general: formContainerOptions.general,
        advanced: formContainerOptions.advanced,
        style: formContainerOptions.style,
        action: formContainerOptions.action,
        parentClass: 'for-form-container'
    },
    boxEdit: {
        general: boxEditOptions.general,
        style: boxEditOptions.style,
        advanced: boxEditOptions.advanced,
        action: boxEditOptions.action,
        parentClass: 'for-box'
    }



};
/**
 * Created by luis on 9/18/16.
 */
/**
 * Created by luis on 6/9/16.
 */
var C37FormElement = Backbone.View.extend({

    renderSize: function ()
    {
        if (!this.model)
            return;

        if (this.model.get('size'))
        {
            var sizeClass = 'c37-col-md-'+this.model.get('size').size;
            if (this.model.get('size').expand)
                sizeClass+=' c37-col-xs-12';
            //remove all previous class
            for (var i = 1; i <=12; i++)
                this.$el.removeClass('c37-col-md-' + i);
            this.$el.addClass(sizeClass);
        }

    }

});

function removeElement() {
    console.log('start removing');
    this.editingElement().remove();
    jQuery('#element-settings').html('');
}


//remove size class and return the element with size class removed
function removeSizeClass(element)
{
    element.attr('class',
        function(i, c){
            return c.replace(/(^|\s)c37-col-md\S+/g, '');
        });

    return element;
}

/**
 * Render CSS style for each element in form
 */
function renderCSS()
{
    var elementID = this.model.get('editingElementID');
    var textColor = this.$el.find('[data-for=text-color] input').first().val();
    var backgroundColor = this.$el.find('[data-for=background-color] input').first().val();;
    if (typeof elementsStyles[elementID] == "undefined")
        elementsStyles[elementID] = {};
    elementsStyles[elementID]['background-color'] = backgroundColor;
    elementsStyles[elementID]['color'] = textColor;

    applyCSS();
}

//take the global object elementsStyles and render it to a style tag in the head
function applyCSS()
{
    var style = '';
    for (var element in elementsStyles)
    {
        var styles = elementsStyles[element];

        var rule = '';
        for (var s in styles)
            rule+= s + ":" + styles[s] + ";";

        style += '#' + core37Page.pageSettings.cssID +  ' #'+element + " .c37-child{" + rule + "}";

    }

    var elementStylesInHead = jQuery('#element-styles')
    //append style to the head
    if (elementStylesInHead.length == 0)
        jQuery('head').append('<style id="element-styles"></style>');

    elementStylesInHead.text("");
    elementStylesInHead.text(style);
}


/**
 *
 */
function renderAction()
{
    console.log('rendering action');
    var currentElement = this;
    var $el = currentElement.$el;

    /**
     * trigger div contains the select box that define the trigger value (click, change)
     * action div contains the select box that define the action (submit form/open link)
     */

    var editingElementID = currentElement.model.get('editingElementID');
    /*
     | if the editing element id is not defined, return, since the current config doesn't associate with
     | a particular element
     */

    if (typeof editingElementID === 'undefined')
        return;


    var triggerDiv = $el.find('.element-action [data-for=trigger]').first();
    var actionDiv = $el.find('.element-action [data-for=action]').first();
    var targetURLDiv = $el.find('.element-action [data-for=target-url]').first();

    /*
    | The @trigger variable is either click or change, currently, it's click only
     */
    var trigger = triggerDiv.find('select').first().val();
    var action = actionDiv.find('select').first().val();

    console.log(action + ' was selected');
    console.log('trigger is : ' + trigger);


    /*
     | If the user choose not to set the @trigger to no-trigger, clear the current object contains
     | the action settings for this element
     */
    if (trigger =="no-trigger")
    {
        delete elementsActions[editingElementID];
        jQuery(actionDiv).hide();
        jQuery(targetURLDiv).hide();
        return;
    } else if (trigger == 'click')
    {
        actionDiv.show();
        /*
         | If action has two possible values: submit form or open URL. If action is submit form,
         | hide the @targetURLDiv, else, show it
         */
        if (action == 'open-link')
        {
            console.log('link to open');
            targetURLDiv.show();
        } else
        {
            targetURLDiv.hide();
        }

    }


    //construct the new action object based on user's settings
    var actionObject = {};
    var editingElement = jQuery('#' + editingElementID);
    actionObject['element-type'] = editingElement.attr('data-c37-type');
    actionObject['trigger'] = trigger;
    actionObject['action'] = action;

    if (action == 'open-link')
        actionObject['target'] = targetURLDiv.find('input').first().val();

    elementsActions[editingElementID] = actionObject;
}


var Heading = C37FormElement.extend({
    initialize: function () {
        this.render();
    },

    template: _.template(
        '<h1 class="c37-child">This is heading</h1>'
    ),

    render: function()
    {
        if (!this.model)
            this.$el.html(this.template);
        else
        {
            var content = ('<'+this.model.get('tagName')+'  class="c37-child">'+this.model.get('content')+'</'+this.model.get('tagName')+'>');
            console.log('tagName' + this.model.get('tagName'));
            this.$el.html(content);
        }
    }
});

var Paragraph = C37FormElement.extend({
    initialize: function () {
        this.render();
    },

    template: _.template(
        '<div class="c37-text-content">This is a text element</div>'
    ),

    render: function()
    {
        if (!this.model)
            this.$el.html(this.template());
        else
        {
            this.$el.html('<div class="c37-text-content">'+this.model.get('content')+'</div>');
        }
    }
});

var Row = Backbone.View.extend({
    initialize: function(){
        this.render();
    },

    template: _.template(
        '<div id="<%= boxID %>" class="c37-box c37-col-md-12"></div>'
    ),
    render: function() {
        this.setElement(this.template({
            boxID: 'c37-box-' + Math.floor(Math.random() * 10000)
        }));
    }
});

var Step = C37FormElement.extend({
    initialize: function () {
        this.render();
    },

    template: _.template(
        '<div class="c37-step c37-style-1 c37-container">' +
        '<div class="c37-row" id="c37-row-0" data-c37-layout="12">' +
        '<div id="c37-box'+Math.floor(Math.random() * 10000)+'" class="c37-box c37-col-md-12"></div>' +
        '</div>' +
        '</div>'
    ),

    render: function()
    {
        this.setElement(this.template({}));
    }

});
//checkbox
var CheckBox = C37FormElement.extend({

    initialize: function(){
        this.render();
    },
    template: _.template(
        '<span class="c37-single-checkbox" class="c37-child" <% var cid= \'checkbox_id_\' + Math.floor(Math.random() * 10000) %> ><input id="<%= cid %>" type="checkbox" name="<%= name %>" value="First"/><label class="c37-blank-label" for="<%= cid %>"></label> <span> First</span></span> ' +
        '<span class="c37-single-checkbox" class="c37-child" <% var cid= \'checkbox_id_\' + Math.floor(Math.random() * 10000) %> ><input id="<%= cid %>" type="checkbox" name="<%= name %>" value="Second"/><label class="c37-blank-label" for="<%= cid %>"></label> <span> Second</span></span> '
    ),
    render: function () {
        if (!this.model)
            this.$el.html(this.template({name: 'checkbox_'+Math.floor(Math.random()*1000)}));
        else
        {
            var checkboxHTML = '';
            var name = this.model.get('name');

            _.each(this.model.get('options'), function(option){
                var checked = option.checked? 'checked' : '';
                checkboxHTML+=
                    '<span class="c37-child c37-single-checkbox">' +
                    '<input id="'+option.id+'"  type="checkbox" '+checked+'  name="'+name+'" value="'+(option.value)+'"/>' +
                        //Replace space with html space entity
                    '<label class="c37-blank-label" for="'+option.id+'"></label> '+
                    '<span>'+decodeURIComponent(option.value)+'</span>' +

                    '</span> ';
            });

            //apply alignment class
            jQuery(this.$el).closest('.c37-lp-element').removeClass('c37-vertical');
            jQuery(this.$el).closest('.c37-lp-element').removeClass('c37-horizontal');
            jQuery(this.$el).closest('.c37-lp-element').addClass(this.model.get('alignment'));

            this.$el.html(checkboxHTML);
        }
    }
});

//Radio
var Radio = C37FormElement.extend({

    initialize: function(){
        this.render();
    },
    template: _.template(
        '<span class="c37-single-radio c37-child" <% var cid= \'radio_id_\' + Math.floor(Math.random() * 10000) %>><input id="<%= cid %>" type="radio" name="<%= name %>" value="First" /><label class="c37-blank-label" for="<%= cid %>"></label> <span >First</span></span> ' +
        '<span class="c37-single-radio c37-child" <% var cid= \'radio_id_\' + Math.floor(Math.random() * 10000) %>><input id="<%= cid %>" type="radio" name="<%= name %>" value="Second" /><label class="c37-blank-label" for="<%= cid %>"></label> <span >Second</span></span> '
    ),
    render: function () {
        if (!this.model)
            this.$el.html(this.template({name: 'radio_'+Math.floor(Math.random()*1000) }));
        else
        {
            var radioHTML = '';
            var name = this.model.get('name');

            _.each(this.model.get('options'), function(option){
                var checked = option.checked? 'checked' : '';
                radioHTML+=
                    '<span class="c37-child c37-single-radio">' +
                    '<input id="'+option.id+'"  type="radio" '+checked+'  name="'+name+'" value="'+(option.value)+'"/> ' +
                        //Replace space with html space entity
                    '<label class="c37-blank-label" for="'+option.id+'"></label> '+
                    '<span>'+decodeURIComponent(option.value)+'</span>' +

                    '</span> ';
            });

            //apply alignment class
            jQuery(this.$el).closest('.c37-lp-element').removeClass('c37-vertical');
            jQuery(this.$el).closest('.c37-lp-element').removeClass('c37-horizontal');
            jQuery(this.$el).closest('.c37-lp-element').addClass(this.model.get('alignment'));

            this.$el.html(radioHTML);
        }
    }
});

//Input text
var Text = C37FormElement.extend({

    initialize: function(){
        this.render();
    },
    template: _.template(
        '<i class="fa fa-envelope c37-suggest-icon"></i><input class="c37-child" id="<%= id %>" name="<%= name %>" type="text" placeholder="enter something" />'
    ),
    render: function () {
        if (!this.model)
        {
            this.$el.html(this.template({
                name: 'input_'+Math.floor(Math.random()*1000),
                id: 'input_'+Math.floor(Math.random()*1000)
            }));
        }
        else
        {
            var required = this.model.get('required') ? 'required' : '';
            var content = '';
            //append label if the attribute is defined or not blank, other than that, don't add label element
            if (typeof this.model.get('label') != 'undefined' && this.model.get('label') !='')
            {
                content+= '<label for="'+this.model.get('cssID')+'">'+this.model.get('label')+'</label>';
            }


            //Set a default icon for the input
            if (typeof this.model.get('icon') == 'undefined')
                this.model.set({icon: 'fa-envelope'});
//<i class="fa fa-envelope c37-suggest-icon"></i>
            content +=
                '<i class="fa '+this.model.get('icon')+' c37-suggest-icon"></i>' +
                '<input value="'+this.model.get('value')+'" id="'+this.model.get('cssID')+'" class="c37-child" type="'+this.model.get("type")+'" name="'+this.model.get("name")+'" '+required+' value="'+this.model.get('value')+'" placeholder="'+this.model.get("placeholder")+'" />';
            this.$el.html(content);
            this.renderSize();
        }
    }
});

//Input date
var DateInput = C37FormElement.extend({

    initialize: function(){
        this.render();
    },
    template: _.template(
        '<i class="fa fa-calendar c37-suggest-icon"></i><input class="c37-child" name="<%= name %>" type="date"/>'
    ),
    render: function () {
        if (!this.model)
            this.$el.html(this.template({name: 'date_input_'+Math.floor(Math.random()*1000) }));
        else
        {
            var dateElement = '<i class="fa fa-calendar c37-suggest-icon"></i><input name="'+this.model.get('name')+'" type="'+this.model.get('type')+'" value="'+this.model.get('value')+'"/>';
            this.$el.html(dateElement);
        }
    }
});

//Select box
var Select = C37FormElement.extend({

    initialize: function(){
        this.render();
    },
    template: _.template(
        '<select class="c37-child" name="<%= name %>">' +
        '<option value="Cat">Cat</option>' +
        '<option value="Dog">Dog</option>' +
        '<option value="Chicken">Chicken</option>' +
        '</select>'
    ),
    render: function () {
        if (!this.model)
            this.$el.html(this.template({name: 'select_'+Math.floor(Math.random()*1000) }));
        else
        {
            var selectHTML = '';
            var model = this.model;

            _.each(this.model.get('options'), function(option){

                var selected = option.value == model.get('selected_value')? 'selected' : '';
                selectHTML+=
                    '<option '+selected+' value="'+option.value+'">'+decodeURIComponent(option.value)+'</option>'
            });

            selectHTML = '<select name="'+name+'">'+selectHTML+'</select>';

            this.$el.html(selectHTML);

        }
    }
});

//Label
var Label = C37FormElement.extend({

    initialize: function(){
        this.render();
    },
    template: _.template(
        '<label for="<%= forID %>"><%= content %></label>'
    ),
    render: function () {

        if (!this.model)
        {
            this.$el.html(this.template(
                {
                    forID: 'input_'+Math.floor(Math.random()*1000),
                    content: 'Label'
                }
            ));
        } else
        {
            if (this.model.get('required'))
            {
                this.$el.html('<label>'+this.model.get('content')+'<sup class="required">*</sup></label>');

            } else
            {
                var content = this.model.get('content');
                this.$el.html(this.template({
                    forID: 'input_'+Math.floor(Math.random()*1000),
                    content: content
                }));
            }
        }
        this.renderSize();
    }
});

//Button
var Button = C37FormElement.extend({

    initialize: function(){
        this.render();
    },
    template: _.template(
        '<button data-role="submit" data-preset="'+encodeURIComponent(JSON.stringify({style: "c37-button-3d", shape: "c37-button-rounded", color: "c37-button-primary", size: "c37-button-normal"}))+'" class="c37-child c37-button c37-button-3d c37-button-normal c37-button-primary c37-button-rounded">Button</button>'
    ),
    render: function () {
        if (!this.model)
            this.$el.html(this.template(/*{name: 'button_'+Math.floor(Math.random()*1000) }*/));
        else
        {
            var preset = this.model.get('preset');
            var presetClasses = preset.style + ' ' + preset.size + ' ' + preset.shape + ' ' + preset.color;


            var content = '<button data-role="submit" data-preset="'+encodeURIComponent(JSON.stringify(preset))+'" class="c37-child c37-button '+presetClasses+'">'+this.model.get('text')+'</button>';
            this.$el.html(content);
            this.renderSize();
        }
    }
});


//Input submit (input type=submit, button, image)
var InputSubmit = C37FormElement.extend({

    initialize: function(){
        this.render();
    },
    template: _.template(
        '<input type="submit" value="click here" data-role="submit" data-preset="'+encodeURIComponent(JSON.stringify({style: "c37-button-3d", shape: "c37-button-rounded", color: "c37-button-primary", size: "c37-button-normal"}))+'" class="c37-child c37-button c37-button-3d c37-button-normal c37-button-primary c37-button-rounded" />'
    ),
    render: function () {
        if (!this.model)
            this.$el.html(this.template());
        else
        {
            var preset = this.model.get('preset');
            var presetClasses = preset.style + ' ' + preset.size + ' ' + preset.shape + ' ' + preset.color;
            console.log('text value: '+ this.model.get('text'));
            var content = '<input type="submit" value="'+this.model.get('text')+'" data-role="submit" data-preset="'+encodeURIComponent(JSON.stringify(preset))+'" class="c37-child c37-button '+presetClasses+'" />';
            this.$el.html(content);
            this.renderSize();
        }
    }
});


//Textarea
var TextArea = C37FormElement.extend({

    initialize: function(){
        this.render();
    },
    template: _.template(
        '<i class="fa fa-edit c37-suggest-icon"></i><textarea id="<%= id %>" class="c37-child" name="<%= name %>" placeholder="enter something"></textarea>'
    ),
    render: function () {
        if (!this.model)
            this.$el.html(this.template({
                name: 'textarea_'+Math.floor(Math.random()*1000),
                id: 'textarea_'+Math.floor(Math.random()*1000)
            }));
        else
        {
            var required = this.model.get('required')? 'required' : '';
            //Class need to be re-render after style options are added
            var content = '';
            if (typeof this.model.get('label') != 'undefined' && this.model.get('label') != '')
            {
                content+= '<label for="'+this.model.get('cssID')+'">'+this.model.get('label')+'</label>';
            }

            content += '<i class="fa fa-edit c37-suggest-icon"></i><textarea id="'+this.model.get('cssID')+'" class="c37-child" '+required+' name="'+this.model.get('name')+'" placeholder="'+this.model.get('placeholder')+'"></textarea>';
            this.$el.html(content);
            this.renderSize();
        }
    }
});


//Input text
var File = C37FormElement.extend({

    initialize: function(){
        this.render();
    },
    template: _.template(
        '<div class="c37-child"></label><input id="<%= field_id %>" class="c37-child" name="<%= name %>" type="file" /><label class="c37-file-label" for="<%= field_id %>"><i class="fa fa-cloud-upload"></i> <%= text %> </div>'
    ),
    render: function () {
        if (!this.model)
            this.$el.html(this.template({
                name: 'attachment_'+Math.floor(Math.random()*1000),
                field_id: 'c37_attachment_' + Math.floor(Math.random() * 10000),
                text: 'Select file...'
            }));
        else
        {
            var multiple = this.model.get('multiple') ? 'multiple' : '';
            var name = this.model.get('multiple')? this.model.get('name'): this.model.get('name');
            var required = this.model.get('required') ? 'required' : '';
            var accept = this.model.get('file_type') ? 'accept="'+this.model.get('file_type')+'"' : '';
            var icon = this.model.get('icon');
            var text = this.model.get('text');

            //we need to insert a blank label to style file upload button (hide the actual input, show the label)
            var content =
                '<div class="c37-child">' +
                    '<label class="c37-file-label" for="'+this.model.get('field_id')+'"><i class="fa '+icon+'"></i>'+text+'</label>' +
                    '<input '+required+' type="file" id="'+this.model.get('field_id')+'" name="'+name+'" '+multiple+ ' '+accept+' />' +
                '</div>';

            this.$el.html(content);
        }
    }
});

//Acceptance
var Acceptance = C37FormElement.extend({

    initialize: function(){
        this.render();
    },
    template: _.template(
        '<input class="c37-acceptance" id="<%= id %>" data-error="Please accept this" name="<%= name %>" type="checkbox" /><label for="<%= id %>" class="c37-acceptance-label"></label> <span class="c37-child">I agree with terms of service</span>'
    ),
    render: function () {
        if (!this.model)
            this.$el.html(this.template({
                name: 'acceptance',
                id: 'acceptance_id_'+Math.floor(Math.random() * 10000)

            }));
        else
        {
            console.log(this.model);

            var content = '<input id="'+this.model.get('id')+'" data-error="'+this.model.get('error_message')+'" class="c37-acceptance" name="'+this.model.get('name')+'" type="checkbox" /><label for="'+this.model.get('id')+'" class="c37-acceptance-label"></label> <span class="c37-child">'+this.model.get('text')+'</span>';
            this.$el.html(content);
        }
    }
});

//ReCaptcha
var ReCaptcha = C37FormElement.extend({
    initialize: function()
    {
        this.render();
    },

    template: _.template(
        '<div class="g-recaptcha" data-sitekey="<%= site_key %>"></div>'
    ),

    render: function()
    {
        if (!serverSettings.recaptchaSiteKey)
        {
            swal("You haven't configured recaptcha settings. Please get reCaptcha keys first");
        }
        this.$el.html(this.template({site_key: serverSettings.recaptchaSiteKey}));
    }

});


var FieldSet = C37FormElement.extend({
    initialize: function()
    {
        this.render();
    },

    template: _.template(
        '<fieldset class="c37-box">' +
        '<legend>Fieldset legend:</legend>' +
        '</fieldset>'
    ),
    render: function() {
        this.setElement(this.template({}));
    }


});

//Image
var Image = C37FormElement.extend({
    initialize: function(){
        this.render();
    },

    template: _.template(
        '<img src="<%= imgSrc %>"/>'
    ),

    render: function() {
        if (this.model) {
            this.$el.html(
                this.template({
                    imgSrc: this.model.get('imgSrc')
                })
            );
        } else
        {
            this.$el.html(
                this.template({
                    imgSrc: defaultValues.imagePlaceholder
                })
            )

        }

    }





});


//Form container
var FormContainer = C37FormElement.extend({
    initialize: function() {
        this.render();
    },

    template: _.template('<form class="c37-child c37-lp-form c37-lp-style-1" method="post"><input placeholder="text input" type="text" /></form>'),

    render: function()
    {
        if (!this.model)
        {
            this.$el.html(this.template);
        } else
        {
            var formCode = this.model.get('formCode');

            //parse the code to get elements in form
            var formElement = jQuery.parseHTML(formCode);


            var elements = [];


            //extract all elements from form and push to the elements array
            _.each(jQuery(formElement).find('input,button,textarea,select'), function(child){
                child = jQuery(child);
                if (child.is('input') || child.is('button') || child.is('textarea') || child.is('select'))
                {
                    elements.push(child);
                }

            });

            console.log(elements.length + ' items');

            var formHTMLElement = this.$el.find('form');

            var formMethod = jQuery(formElement).attr('method');
            var formAction = jQuery(formElement).attr('action');


            //set the action url and method to current form
            formHTMLElement.attr('method', formMethod);
            formHTMLElement.attr('action', formAction);

            //append to form
            var appendCode = '';
            _.each(elements, function(e){

                //console.log(e.attr('name'));
                if (e.is('input') || e.is('button'))
                {

                    //convert other input submit types to input submit (button, image)

                    if (e.attr('type') == 'button' || e.attr('type') == 'image' || e.is('button'))
                    {
                        e.attr('type', 'input_submit');

                        if (typeof e.attr('value') == "undefined")
                            e.attr('value', 'submit');
                    }

                    /*
                    | in case of hidden input, we don't need to have a placeholder.
                    | Also, we need to hide the element
                    | in addition, value must be set
                     */

                    if (e.attr('type') == 'submit')
                    {
                        appendCode += '<div data-c37-type="input_submit" class="c37-lp-element c37-lp-form-child c37-item-element" id="c37_id_'+Math.floor(Math.random() * 10000)+'">' +
                            new InputSubmit({model: new C37ElementModel({
                                text : 'click here',
                                name: e.attr('name') == undefined ? 'name' + Math.floor(Math.random() * 1000) : e.attr('name'),
                                preset: {style: "c37-button-3d", shape: "c37-button-rounded", color: "c37-button-primary", size: "c37-button-normal"}
                            })}).$el.html()+
                            '</div>';

                    } else if (e.attr('type') == 'hidden')
                    {
                        appendCode += '<div data-c37-type="text" class="hidden c37-lp-element c37-lp-form-child c37-item-element" id="c37_id_'+Math.floor(Math.random() * 10000)+'">' +
                            new Text({model: new C37ElementModel({
                                name: e.attr('name') == undefined ? 'name' + Math.floor(Math.random() * 1000) : e.attr('name'),
                                type: e.attr('type'),
                                value: typeof  e.val() == "undefined" ? '' : e.val(),
                                placeholder: ""
                            })}).$el.html()+
                            '</div>';
                    } else
                    {
                        appendCode += '<div data-c37-type="text" class="c37-lp-element c37-lp-form-child c37-item-element" id="c37_id_'+Math.floor(Math.random() * 10000)+'">' +
                            new Text({model: new C37ElementModel({
                                name: e.attr('name') == undefined ? 'name' + Math.floor(Math.random() * 1000) : e.attr('name'),
                                type: e.attr('type'),
                                value: typeof e.val() == "undefined" ? '' : e.val(),
                                placeholder: typeof e.attr('placeholder') == "undefined"? e.attr('type') : e.attr('placeholder')
                            })}).$el.html()+
                            '</div>';
                    }


                } else if (e.is('textarea'))
                {
                    appendCode += '<div data-c37-type="text" class="c37-lp-element c37-lp-form-child c37-item-element" id="c37_id_'+Math.floor(Math.random() * 10000)+'">' +
                            new TextArea({model: new C37ElementModel({
                                name: e.attr('name'),
                                placeholder: e.attr('name')
                            })}).$el.html() +
                            '</div>';
                }

            });
            formHTMLElement.html('');
            formHTMLElement.append(appendCode);

            makeFormSortable(jQuery);
        }
    }
});

//Stars
var Stars = C37FormElement.extend({
    initialize: function(){
        this.render();
    },

    template: _.template(
        '<select name="<%= name %>" data-show-selected="false" data-show-values="false" data-initial-rating="1" data-theme="<%= theme %>" class="c37-star-rating" id="<%= id %>">' +
            '<option value="1">1</option>' +
            '<option value="2">2</option>' +
            '<option value="3">3</option>' +
            '<option value="4">4</option>' +
            '<option value="5">5</option>' +
        '</select>'),

    render: function()
    {
        var id = '';
        if (!this.model)
        {
            id = 'star-id-' + Math.floor(Math.random() * 10000);
            this.$el.html(this.template({
                id: id,
                theme: defaultValues.starsRatingOptions.theme,
                name: 'star-' + Math.round(Math.random() * 10000)
            }));

        } else
        {
            //singleStars are all the rating option in a scale
            var optionHTML = '';
            var model = this.model;

            _.each(this.model.get('options'), function(singleStar){
                optionHTML += '<option value="'+singleStar.value+'">'+singleStar.text+'</option>';
            });


            this.$el.html(
                '<select ' +
                'data-theme="'+ model.get('theme') +'" '
                + 'class="c37-star-rating" id="'+model.get('id') + '"'
                + 'data-initial-rating="'+model.get('initialRating')+'"'
                + 'data-show-selected="'+model.get('showSelectedRating')+'"'
                + 'data-show-values="'+model.get('showValues')+'"'
                + 'name="'+model.get('name')+'"'
                +'">'
                +optionHTML+'</select>');

            id = model.get('id');

            console.log('render with model');
        }



        this.renderRating(id);



    },

    //this function render the style of star (instead of the default select box)
    renderRating: function(id)
    {
        var self =this;
        jQuery(function(){
            id = '#' + id;

            if (self.model)
            {
                console.log('rendering with theme: ' + self.model.get('theme'));
                defaultValues.starsRatingOptions.theme = self.model.get('theme');
                defaultValues.starsRatingOptions.showValues = self.model.get('showValues');
                defaultValues.starsRatingOptions.initialRating = self.model.get('initialRating');
                defaultValues.starsRatingOptions.showSelectedRating = self.model.get('showSelectedRating');
            }

            setTimeout(function(){
                jQuery(id).barrating(defaultValues.starsRatingOptions);
            }, 0);
        });
    }


});

var Video = C37FormElement.extend({
    initialize: function()
    {
        this.render();
    },

    render: function(){
        if (!this.model)
        {
            this.$el.html(this.template({
                videoURL: 'https://www.youtube.com/embed/wKIM65VA15g'
            }));
        } else
        {
            var hideInfo = this.model.get('hideInfo') ? '&showinfo=0' : '';
            var hideControls = this.model.get('hideControls') ? '&controls=0' : '';
            var autoPlay = this.model.get('autoPlay') ? '&autoplay=1' : '';
            var videoURL = this.model.get('videoURL');
            var width = this.model.get('width') ? this.model.get('width') : '560';
            var height = this.model.get('height') ? this.model.get('height') : '315';

            this.$el.html(
                '<iframe class="c37-child" width="'+width+'" height="'+height+'" ' +
                'src="'+videoURL+'?rel=0'+hideControls+hideInfo+autoPlay+'" frameborder="0" allowfullscreen></iframe>'
            );

            console.log('<iframe width="'+width+'" height="'+height+'" ' +
                'src="'+videoURL+'?rel=0'+hideControls+hideInfo+autoPlay+'" frameborder="0" allowfullscreen></iframe>');
        }
    },

    template: _.template('<iframe class="c37-child" width="560" height="315" src="<%= videoURL %>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>')

});

var UnorderedList = C37FormElement.extend({
    initialize: function()
    {
        this.render();
    },

    template: _.template('' +
        '<ul class="c37-ul">' +
            '<li><i class="fa fa-check-circle-o c37-li-icon-round"></i> first line</li>' +
            '<li><i class="fa fa-check-circle-o c37-li-icon-round"></i> second line</li>' +
        '</ul>'),

    render: function()
    {
        if (!this.model)
        {
            this.$el.html(this.template());
        } else
        {
            var items = this.model.get('items');
            var icon = this.model.get('icon'); //font-awesome class
            var iconStyle = this.model.get('iconStyle');//round/square/none
            var iconColor = this.model.get('iconColor');
            var iconBgColor = this.model.get('iconBgColor');

            var content = '';

            _.each(items, function(item){
                if (typeof  item == 'undefined')
                    content +='';
                else
                {
                    content+= '<li>' +
                        '<i style="color:'+iconColor+'; background:'+iconBgColor+'; "  class="fa '+icon+' '+iconStyle+' "></i> ' +
                        item +
                        '</li>';
                }


            });

            this.$el.html('<ul class="c37-ul">'+content+'</ul>');
        }

    }


});

var Templates = {
    checkbox: CheckBox,
    radio: Radio,
    textarea: TextArea,
    text: Text,
    date: DateInput,
    select: Select,
    label: Label,
    file: File,
    button: Button,
    input_submit: InputSubmit,
    acceptance: Acceptance,
    row: Row,
    heading: Heading,
    paragraph: Paragraph,
    step: Step,
    fieldset: FieldSet,
    recaptcha: ReCaptcha,
    image: Image,
    stars: Stars,
    video: Video,
    ul: UnorderedList,
    form_container: FormContainer
};
/**
 * Created by luis on 9/18/16.
 */


//Edit form classes
var ElementEditView = Backbone.View.extend({
    el: '#element-settings',
    events: {
        'change .validation input' : 'renderValidation',
        'click #change-background-image': 'changeImageBg'
    },
    //this function get thess options that user selected (size and expand) and change the size object
    //of the model. The new size object will be used in the renderSize function of the element view
    renderSizeObject: function()
    {
        var size = {};
        size.size = this.$el.find('select[data-for=element-width]').val();
        size.expand = false;

        if (this.$el.find('input[data-for=expand]').is(':checked'))
            size.expand = true;
        this.model.set({size: size});
    },

    renderValidation: function()
    {
        console.log('render in parent, change event');
        var validationDiv = this.$el.find('.validation').first();
        var required = jQuery(validationDiv).find('input[data-for=required]').first().is(':checked') ? "required" : "";
        var elementID = this.model.get('editingElementID');
        var elementName = this.$el.find('[data-for=name]').val();

        if (required == "required")
            this.model.set({required: true});


        //update the global validation object
        validation[elementID] = {
            name: elementName,
            rules: {
                required: required
            }
        }
    },
    renderAction: function()
    {

    },
    renderStyle: function()
    {
        console.log('rendering styles');
        var elementID = this.model.get('editingElementID');

        console.log("my id is: " + elementID);
        var textColor = this.$el.find('[data-for=color]').length? this.$el.find('[data-for=color]').first().val() : '';
        var backgroundImage = this.$el.find('[data-for=background-image] input').first().val();
        var backgroundColor = this.$el.find('[data-for=background-color] input').first().val();
        var backgroundImageStyle = this.$el.find('[data-for=background-image-style] select').first().val();

        var borderWidth = this.$el.find('#c37-border-settings [data-for=border-width]').first().val();
        var borderColor = this.$el.find('#c37-border-settings [data-for=border-color]').first().val();
        var borderRadius = this.$el.find('#c37-border-settings [data-for=border-radius]').first().val();
        var borderStyle = this.$el.find('#c37-border-settings [data-for=border-style]').first().val();


        var marginTop = this.$el.find('#c37-margin-settings .top').first().val();
        var marginRight = this.$el.find('#c37-margin-settings .right').first().val();
        var marginBottom = this.$el.find('#c37-margin-settings .bottom').first().val();
        var marginLeft = this.$el.find('#c37-margin-settings .left').first().val();


        var paddingTop = this.$el.find('#c37-padding-settings .top').first().val();
        var paddingRight = this.$el.find('#c37-padding-settings .right').first().val();
        var paddingBottom = this.$el.find('#c37-padding-settings .bottom').first().val();
        var paddingLeft = this.$el.find('#c37-padding-settings .left').first().val();

        //if any color is set to the default color (fffffa), set it to '' since user hasn't change its color
        if (borderColor == '#fffffa')
            borderColor = '';

        if (textColor == '#fffffa')
            textColor = '';

        if (backgroundColor == '#fffffa')
            backgroundColor = '';






        var styles = {
            'color' : textColor,
            'background-image' : backgroundImage,
            'background-color' : backgroundColor,
            'background-image-style': backgroundImageStyle,
            'border-width' : borderWidth,
            'border-color': borderColor,
            'border-radius' : borderRadius,
            'border-style': borderStyle,
            'margin-top': marginTop,
            'margin-right': marginRight,
            'margin-bottom' : marginBottom,
            'margin-left' : marginLeft,
            'padding-top': paddingTop,
            'padding-right': paddingRight,
            'padding-bottom': paddingBottom,
            'padding-left': paddingLeft
        };

        if (typeof elementsStyles[elementID] == "undefined")
            elementsStyles[elementID] = {};
        elementsStyles[elementID] = styles;
        //elementsStyles[elementID]['color'] = textColor;



        //if the elmenent is an element other than row or box, the style should be applied to c37-child
        //element, we need to point this out in order to render correctly later on
        var editingElement = jQuery('#'+elementID);
        //console.log(editingElement.attr('class'));
        if ( !(editingElement.hasClass('c37-box') || editingElement.hasClass('c37-row') || editingElement.attr('data-c37-type') == 'form_container' || editingElement.attr('data-c37-type') == 'paragraph') )
        {
            console.log('rendering child element');
            elementsStyles[elementID]['child'] = true;
        }


        this.applyStyle();
    },

    changeImageBg: function() {
            if (!versionNangCap)
            {
                toastr.info(UPGRADE_TO_USE_IMAGE_BG);
                return;
            }

            console.log('image');
            if (this.frame)
            {
                this.frame.open();
                return;
            } else
            {
                var el = this.$el;
                var frame = this.frame;
                var that = this;
                frame = wp.media({
                    'title' : 'select an image',
                    'button' : {
                        text: 'Use this image'
                    },
                    multiple: false
                });

                frame.on('select', function(){
                    var attachment = frame.state().get('selection').first().toJSON();
                    console.log(attachment.url);
                    el.find('#c37-image-preview').first().attr('src', attachment.url);
                    el.find('[data-for=background-image] input').first().val(attachment.url);
                    //update the model

                    that.renderStyle();

                });

                frame.open();
            }
        },

    applyStyle: function()
    {
        var pageCSSID = jQuery('.c37-lp').attr('id');

        var style = '';
        for (var element in elementsStyles)
        {
            var styles = elementsStyles[element];
            console.log(styles);

            var rule = '';
            for (var s in styles)
            {
                if (styles[s] != '')
                {
                    //add px to margin and padding
                    if (s.indexOf('margin-') == 0 ||
                        s.indexOf('padding-') == 0 ||
                        s.indexOf('border-width') == 0 ||
                        s.indexOf('border-radius') == 0)
                        rule+= s + ":" + styles[s] + "px;";
                    else if(s=='background-image')
                    {
                        console.log('rendering bg image');
                        rule+= s + ':url("'+styles[s]+'");';
                    } else if (s == 'background-image-style')
                    {
                        if (styles[s] == 'cover')
                            rule+= 'background-size: cover;';
                        else
                            rule+= 'background-repeat : ' + styles[s] + ";";
                    }
                    else
                        rule+= s + ":" + styles[s] + ";";
                }

            }

            if (!styles.child)
                style += '#' +pageCSSID+ ' #'+element + " {" + rule + "}";
            else
                style += '#' +pageCSSID+ ' #'+element + " .c37-child{" + rule + "}";

        }

        //append style to the head
        if (jQuery('#element-styles').length == 0)
            jQuery('head').append('<style id="element-styles"></style>');

        jQuery('#element-styles').text("");
        jQuery('#element-styles').text(style);
    }

});


var TextEdit = ElementEditView.extend({

    el: '#element-settings',
    initialize: function () {
        this.render();
    },
    editingElement: function () {
        return jQuery('#'+this.model.get('editingElementID'));
    },
    template: _.template(
        getEditForm('textEdit')
    ),
    render: function () {
        this.$el.html(this.template());
    },
    events : {
        'input .for-text [data-for=placeholder]' : 'updateModel',
        'input .for-text [data-for=name]' : 'updateModel',
        'blur .for-text [data-for=icon]' : 'updateModel',
        'input .for-text [data-for=input-label]' : 'updateModel',
        'input .for-text [data-for=input-value]' : 'updateModel',
        'change .for-text select[data-for=input-type]' : 'updateModel',
        'change .for-text select[data-for=element-width]' : 'updateModel',
        'change .for-text input[data-for=expand]' : 'updateModel',
        'change .validation input': 'renderValidation',

        'change .for-text .element-action select': renderAction,
        'input .for-text .element-action input': renderAction,
        'input .css-styles input' : 'renderStyle',
        'change .css-styles select' : 'renderStyle',
    },

    updateModel: function () {
        //render basic validation
        ElementEditView.prototype.renderValidation.apply(this);
        var placeholder = this.$el.find('[data-for=placeholder]').first().val();
        var label = this.$el.find('[data-for=input-label]').first().val();
        var type = this.$el.find('select[data-for=input-type]').first().find(':selected').val();
        var name = this.$el.find('[data-for=name]').first().val();
        var required = this.$el.find('.validation input[type=checkbox]').first().is(':checked');
        var icon = this.$el.find('[data-for=icon]').first().val();
        var value = this.$el.find('[data-for=input-value]').first().val();
        console.log('icon is: ' + icon);

        //update the model so the view will be updated
        this.renderSizeObject();
        this.model.set({
            name: name,
            required: required,
            type: type,
            placeholder: placeholder,
            label: label,
            icon: icon,
            value: value
        });
    }


});

var CheckBoxEdit = ElementEditView.extend({
    el: '#element-settings',
    initialize: function () {
        this.render();
    },
    editingElement: function () {
        return jQuery('#'+this.model.get('editingElementID'));
    },
    template: _.template(
        getEditForm('checkboxEdit')
    ),
    render: function () {
        this.$el.html(this.template());
    },
    events : {
        'click .for-checkbox .add-option' : 'addOption',
        'input .for-checkbox .options input' : 'updateModel',
        'change .for-checkbox .options input[type=checkbox]' : 'updateModel',
        'input .for-checkbox [data-for=name]': 'updateModel',
        'change .for-checkbox select[data-for=alignment]': 'updateModel',
        'change .for-checkbox select[data-for=element-width]': 'updateModel',
        'change .for-checkbox input[data-for=expand]' : 'updateModel',
        'change .element-action select': renderAction,
        'input .element-action input': renderAction,
        'input .css-styles input' : 'renderStyle',
        'change .css-styles select' : 'renderStyle',
    },
    addOption: function(){
        this.$el.find('.options').append(
            '<div>' +
            '<span class="c37-col-xs-8"><input data-for="value" type="text" placeholder="value" />  </span>' +
            '<span class="c37-col-xs-4"><input data-for="checked" type="checkbox" /> </span>' +
            '<span class="hidden"><input type="text" data-for="id" value="checkbox_id_'+Math.floor(Math.random() * 10000)+'" /> </span>' +
            '</div>'
        )
    },

    updateModel: function () {
        var name = this.$el.find('[data-for=name]').first().val();
        var alignment = this.$el.find('[data-for=alignment]').first().val();

        var options = [];

        this.$el.find('.options > div').each(function(){

            var valueInput = jQuery(this).find('[data-for=value]').first();
            var checked = jQuery(this).find('[data-for=checked]').first().is(':checked')
            var id = jQuery(this).find('[data-for=id]').first();

            console.log(valueInput.val());

            if (valueInput.val() == "")
                return;

            var single = {
                value: encodeURIComponent(valueInput.val()),//URIEncode the value from here
                checked: checked,
                id: id.val()
            };

            options.push(single);
        });

        //update the model
        this.renderSizeObject();
        this.model.set({name: name, options: options, alignment: alignment});

    }

});

//edit form for radio
var RadioEdit = ElementEditView.extend({
    el: '#element-settings',
    initialize: function () {
        this.render();
    },
    editingElement: function () {
        return jQuery('#'+this.model.get('editingElementID'));
    },
    template: _.template(
        getEditForm('radioEdit')
    ),
    render: function () {
        this.$el.html(this.template());
    },
    events : {
        'click .for-radio .add-option' : 'addOption',
        'input .for-radio .options input' : 'updateModel',
        'change .for-radio .options input[type=radio]' : 'updateModel',
        'input .for-radio [data-for=name]': 'updateModel',
        'change .for-radio select[data-for=alignment]': 'updateModel',
        'change .for-radio select[data-for=element-width]': 'updateModel',
        'change .for-radio input[data-for=expand]' : 'updateModel',
        'change .element-action select': renderAction,
        'input .element-action input': renderAction,
        'input [data-for=text-color] input' : renderCSS,
        'input [data-for=background-color] input' : renderCSS,

    },
    removeElement: removeElement,

    addOption: function(){
        this.$el.find('.options').append(
            '<div>' +
            '<span class="c37-col-xs-8"><input data-for="value" type="text" placeholder="value" />  </span>' +
            '<span class="c37-col-xs-4"><input data-for="checked" type="radio" /> </span>' +
            '<span class="hidden"><input data-for="id" type="text" value="radio_id_'+Math.floor(Math.random() * 10000)+'" /> </span>' +
            '</div>'
        )
    },

    updateModel: function () {

        var name = this.$el.find('[data-for=name]').first().val();
        var alignment = this.$el.find('[data-for=alignment]').first().val();


        var options = [];

        this.$el.find('.options > div').each(function(){

            var valueInput = jQuery(this).find('[data-for=value]').first();
            var checked = jQuery(this).find('[data-for=checked]').first().is(':checked');
            var id = jQuery(this).find('[data-for=id]');

            if (valueInput.val() == "")
                return;

            var single = {
                value: encodeURIComponent(valueInput.val()),
                checked: checked,
                id: id.val()
            };

            options.push(single);
        });

        //update the model
        this.renderSizeObject();
        this.model.set({name: name, options: options, alignment: alignment});
    }

});

//edit form for label
var LabelEdit = ElementEditView.extend({
    el: '#element-settings',
    initialize: function () {
        this.render();
    },
    editingElement: function () {
        return jQuery('#'+this.model.get('editingElementID'));
    },
    template: _.template(getEditForm('labelEdit')),
    render: function () {
        this.$el.html(this.template());
    },
    events: {
        'input .for-label [data-for=label]' : 'updateModel',
        'change .for-label [data-for=required]' : 'updateModel',
        'change .for-label select[data-for=element-width]' : 'updateModel',
        'change .for-label input[data-for=expand]' : 'updateModel',
        'input [data-for=text-color] input' : renderCSS,
        'input [data-for=background-color] input' : renderCSS,
    },

    updateModel: function () {
        ////this function will update the model, the model, in turn, update the view
        var content = this.$el.find('input[data-for=label]').first().val();
        var required = this.$el.find('input[data-for=required]').first().is(':checked');

        console.log(required);
        console.log('label update');

        this.renderSizeObject();
        this.model.set({content: content, required: required});
    }
});

var HeadingEdit = ElementEditView.extend({
    el: '#element-settings',
    initialize: function () {
        this.render();
    },
    editingElement: function () {
        return jQuery('#'+this.model.get('editingElementID'));
    },
    template: _.template(getEditForm('headingEdit')),
    render: function () {
        this.$el.html(this.template());
    },
    events: {
        'input .for-heading [data-for=heading]' : 'updateModel',
        'change .for-heading [data-for=tagName]' : 'updateModel',
        'change .for-heading select[data-for=element-width]' : 'updateModel',
        'change .for-heading input[data-for=expand]' : 'updateModel',
        'input [data-for=text-color] input' : 'renderStyle',
        'input [data-for=background-color] input' : 'renderStyle',
    },

    updateModel: function () {
        var content = this.$el.find('input[data-for=heading]').first().val();
        var tagName = this.$el.find('[data-for=tagName]').val();
        console.log(tagName);
        this.model.set({
            content: content,
            tagName: tagName
        });

        this.renderSizeObject();
    }
});

var ParagraphEdit = ElementEditView.extend({
    el: '#element-settings',
    initialize: function () {
        this.render();
    },
    editingElement: function () {
        return jQuery('#'+this.model.get('editingElementID'));
    },
    template: _.template(getEditForm('paragraphEdit')),
    render: function () {
        this.$el.html(this.template());
    },
    events: {
        'input .for-paragraph textarea[data-for=paragraph]' : 'updateModel',
        'change .for-paragraph select[data-for=element-width]' : 'updateModel',
        'change .for-paragraph input[data-for=expand]' : 'updateModel',
        'input .css-styles input' : 'renderStyle',
        'change .css-styles select' : 'renderStyle',
        'click #change-background-image': 'changeImageBg'
    },

    updateModel: function () {
        var content = this.$el.find('textarea[data-for=paragraph]').first().val();

        this.model.set({content: content});
        this.renderSizeObject();
    }
});

var TextAreaEdit = ElementEditView.extend({
    el: '#element-settings',
    initialize: function () {
        this.render();
    },
    editingElement: function () {
        return jQuery('#'+this.model.get('editingElementID'));
    },
    template: _.template(getEditForm('textAreaEdit')),
    render: function () {
        this.$el.html(this.template());
        //refreshAccordion();
    },
    events: {
        'input .for-textarea input[type=text]' : 'updateModel',
        'change .for-textarea input[type=checkbox]' : 'updateModel',
        'change .for-textarea input[data-for=required]' : 'updateModel',
        'input .for-textarea [data-for=input-label]' : 'updateModel',
        'change .for-textarea select[data-for=element-width]' : 'updateModel',
        'change .for-textarea input[data-for=expand]' : 'updateModel',
        'change .element-action select': renderAction,
        'input .element-action input': renderAction,
        'input [data-for=text-color] input' : 'renderStyle',
        'input [data-for=background-color] input' : 'renderStyle',

    },

    updateModel: function () {
        var placeholder = this.$el.find('input[data-for=placeholder]').first().val();
        var name = this.$el.find('input[data-for=name]').first().val();
        var required = this.$el.find('input[data-for=required]').first().is(':checked');
        var label = this.$el.find('[data-for=input-label]').first().val();


        this.model.set({
            name: name,
            required: required,
            placeholder: placeholder,
            label: label
        });

        //update model
        this.renderSizeObject();

    }
});

//Date input
var DateEdit = ElementEditView.extend({

    el: '#element-settings',
    initialize: function () {
        this.render();
    },
    editingElement: function () {
        return jQuery('#'+this.model.get('editingElementID'));
    },
    template: _.template(
        getEditForm('dateEdit')
    ),
    render: function () {
        this.$el.html(this.template());
        //refreshAccordion();
    },
    events : {
        'input .for-date [data-for=default-value]' : 'renderDateElement',
        'input .for-date [data-for=name]' : 'renderDateElement',
        'change .for-date select[data-for=element-width]' : 'renderDateElement',
        'change .for-date input[data-for=expand]' : 'renderDateElement',
        'click .for-date .remove-element' : 'removeElement',
        'change .for-date [data-for=date-type]' : 'renderDateElement',
        'change .element-action select': renderAction,
        'input .element-action input': renderAction,
        'input [data-for=text-color] input' : renderCSS,
        'input [data-for=background-color] input' : renderCSS,
    },

    renderDateElement: function(){
        //element is the currently edited element
        var element = this.editingElement();
        var value = this.$el.find('[data-for=default-value]').first().val();
        var type = this.$el.find('select[data-for=date-type]').first().find(':selected').val();
        var name = this.$el.find('[data-for=name]').first().val();

        this.model.set({
            value: value,
            type: type,
            name: name
        });

        this.renderSizeObject();
        //update date input type on the setting panel
        this.$el.find('[data-for=default-value]').attr('type', type);

    }

});

// button edit form
var ButtonEdit = ElementEditView.extend({
    el: '#element-settings',
    initialize: function () {
        this.render();
    },
    editingElement: function () {
        return jQuery('#'+this.model.get('editingElementID'));
    },
    template: _.template(getEditForm('buttonEdit')),
    render: function () {
        this.$el.html(this.template());

    },
    events: {
        'input .for-button input[data-for=text]' : 'updateModel',
        'input .for-button input[data-for=url]' : 'updateModel',
        'input .for-button input[data-for=name]' : 'updateModel',
        'change .for-button select[data-for=element-width]' : 'updateModel',
        'change .for-button input[data-for=expand]' : 'updateModel',
        'change .element-action select': renderAction,
        'input .element-action input': renderAction,
        'input .css-styles input' : 'renderStyle',
        'change .css-styles select' : 'renderStyle',
        'change #button-presets select' : 'renderPresetStyles'

    },

    renderPresetStyles: function(){
        var style = this.$el.find('#button-presets [data-for=style]').first().val();
        var shape = this.$el.find('#button-presets [data-for=shape]').first().val();
        var color = this.$el.find('#button-presets [data-for=color]').first().val();
        var size = this.$el.find('#button-presets [data-for=size]').first().val();

        this.model.set({preset: {
            style: style,
            shape: shape,
            color: color,
            size: size
        }});


    },

    updateModel: function () {

        var text = this.$el.find('input[data-for=text]').first().val();
        var name = this.$el.find('input[data-for=name]').first().val();

        this.model.set({
            name: name,
            text: text
        });

        this.renderSizeObject();
    }
});


var InputSubmitEdit = ElementEditView.extend({
    el: '#element-settings',
    initialize: function () {
        this.render();
    },
    editingElement: function () {
        return jQuery('#'+this.model.get('editingElementID'));
    },
    template: _.template(getEditForm('buttonEdit')),
    render: function () {
        this.$el.html(this.template());

    },
    events: {
        'input .for-button input[data-for=text]' : 'updateModel',
        'input .for-button input[data-for=url]' : 'updateModel',
        'input .for-button input[data-for=name]' : 'updateModel',
        'change .for-button select[data-for=element-width]' : 'updateModel',
        'change .for-button input[data-for=expand]' : 'updateModel',
        'change .element-action select': renderAction,
        'input .element-action input': renderAction,
        'input .css-styles input' : 'renderStyle',
        'change .css-styles select' : 'renderStyle',
        'change #button-presets select' : 'renderPresetStyles'

    },

    renderPresetStyles: function(){
        var style = this.$el.find('#button-presets [data-for=style]').first().val();
        var shape = this.$el.find('#button-presets [data-for=shape]').first().val();
        var color = this.$el.find('#button-presets [data-for=color]').first().val();
        var size = this.$el.find('#button-presets [data-for=size]').first().val();

        this.model.set({preset: {
            style: style,
            shape: shape,
            color: color,
            size: size
        }});


    },

    updateModel: function () {

        var text = this.$el.find('input[data-for=text]').first().val();
        var name = this.$el.find('input[data-for=name]').first().val();

        this.model.set({
            name: name,
            text: text
        });

        this.renderSizeObject();
    }
});

var SelectEdit = ElementEditView.extend({
    el: '#element-settings',
    initialize: function () {
        this.render();
    },
    editingElement: function () {
        return jQuery('#'+this.model.get('editingElementID'));
    },
    template: _.template(
        getEditForm('selectEdit')
    ),
    render: function () {
        this.$el.html(this.template());
        //make the setting panel an accordion
        //refreshAccordion();
    },
    events : {
        'input .for-select .options input' : 'updateModel',
        'input .for-select [data-for=name]': 'updateModel',
        'input .for-select [data-for=value]': 'updateModel',
        'input .for-select [data-for=selected]': 'updateSelected',
        'change .for-select select[data-for=element-width]': 'updateModel',
        'change .for-select input[data-for=expand]' : 'updateModel',
        'change .element-action select': renderAction,
        'input .element-action input': renderAction,
        'input [data-for=text-color] input' : 'renderStyle',
        'input [data-for=background-color] input' : 'renderStyle',
    },

    updateSelected: function(){
        var selectedValue = this.$el.find('[data-for=selected]').val();
        this.model.set({selected_value: selectedValue});
    },

    updateModel: function () {
        var name = this.$el.find('[data-for=name]').first().val();
        //find all the filled options and append to
        var allValues = this.$el.find('[data-for=value]').first().val().split('\n');
        var selected_value =this.model.get('selected_value');

        //re-render the selected value select box
        var selectedOptions = '';
        _.each(allValues, function(value){
            var selected = value == selected_value ? 'selected' : '';
            selectedOptions += '<option '+selected+'  value="'+encodeURIComponent(value)+'">'+value+'</option>';
        });
        this.$el.find('[data-for=selected]').first().html(selectedOptions);


        //update the options
        var options = [];

        //get all the values from text area and build options from there
        _.each(allValues, function(value){
            var single = {
                value: encodeURIComponent(value)
            };
            options.push(single);
        });

        this.model.set({
            name: name,
            options: options
        });

        this.renderSizeObject();

    }

});



//acceptance edit
var AcceptanceEdit = ElementEditView.extend({
    el: '#element-settings',
    initialize: function () {
        this.render();
    },
    editingElement: function () {
        return jQuery('#'+this.model.get('editingElementID'));
    },
    template: _.template(getEditForm('acceptanceEdit')),
    render: function () {
        this.$el.html(this.template());
    },
    events: {
        'input .for-acceptance [data-for=text]' : 'updateModel',
        'input .for-acceptance [data-for=error]' : 'updateModel',
        'change .for-acceptance input[data-for=expand]' : 'updateModel',
        'change .for-acceptance select[data-for=element-width]' : 'updateModel',
        'change .element-action select': renderAction,
        'input .element-action input': renderAction,
        'input [data-for=text-color] input' : 'renderStyle',
        'input [data-for=background-color] input' : 'renderStyle'
    },

    updateModel: function () {
        var text = this.$el.find('input[data-for=text]').first().val();
        var name = this.$el.find('[data-for=name]').first().val();
        var error_message = this.$el.find('[data-for=error]').first().val();

        this.model.set({
            name: name,
            text: text,
            error_message: error_message
        });

        this.renderSizeObject();

    }
});

//file edit
var FileEdit = ElementEditView.extend({
    el: '#element-settings',
    initialize: function () {
        this.render();
    }
    ,
    template: _.template(getEditForm('fileEdit')),
    render: function () {
        this.$el.html(this.template());
    },
    events: {
        'input .for-file [data-for=name]' : 'updateModel',
        'change .for-file input[data-for=multiple]' : 'updateModel',
        'blur .for-file [data-for=icon]' : 'updateModel',
        'input .for-file [data-for=text]' : 'updateModel',
        'change .for-file .validation select[data-for=file-type]' : 'renderValidation',
        'change .element-action select': renderAction,
        'input .element-action input': renderAction,
        'input [data-for=text-color] input' : 'renderStyle',
        'input [data-for=background-color] input' : 'renderStyle'
    },

    renderValidation: function(){

        ElementEditView.prototype.renderValidation.apply(this);
        var fileType = this.$el.find('.validation select[data-for=file-type]').first().val();
        //var elementID = this.model.get('editingElementID');
        ////add filetype rule
        //validation[elementID]['rules']['file-type'] = fileType;


        //update the accept attribute of file input
        this.model.set({file_type: fileType});
    },

    updateModel: function () {
        var name = this.$el.find('[data-for=name]').first().val();
        var multiple = this.$el.find('[data-for=multiple]').is(':checked');
        var text = this.$el.find('[data-for=text]').first().val();
        var icon = this.$el.find('[data-for=icon]').first().val();
        //file type is an object storing two information: type and details
        //for pre-defined type (videos/audio..) the type and details
        var file_type =
        {
            type: this.$el.find('[data-for=file-type]').first().find(':selected').val(),
            details: ''
        }



        this.model.set({
            name: name,
            multiple: multiple,
            file_type: file_type,
            text: text,
            icon: icon
        });



        this.renderSizeObject();

    }
});

var ImageEdit = ElementEditView.extend({

    el: '#element-settings',
    frame: null,
    initialize: function()
    {
        this.render();
    },

    template: _.template(getEditForm('imageEdit')),

    render: function()
    {
        this.$el.html(this.template());
    },
    events: {
        'click .for-image #c37-image-picker' : 'openImageSelector'
    },

    openImageSelector : function() {
        //if (!versionNangCap)
        //{
        //    toastr.info(UPGRADE_TO_USE_IMAGE);
        //    return;
        //}

        console.log('image');
        if (this.frame)
        {
            this.frame.open();
            return;
        } else
        {
            var el = this.$el;
            var frame = this.frame;
            var model = this.model;
            frame = wp.media({
                'title' : 'select an image',
                'button' : {
                    text: 'Use this image'
                },
                multiple: false
            });

            frame.on('select', function(){
                var attachment = frame.state().get('selection').first().toJSON();
                console.log(attachment.url);
                el.find('.c37-image-preview').first().attr('src', attachment.url);
                //update the model
                model.set({imgSrc : attachment.url});


            });

            frame.open();
        }
    },
    updateModel: function()
    {

    }




});


var StarsEdit = ElementEditView.extend({
    el: '#element-settings',
    initialize: function(){
        this.render();
    },

    template: _.template(getEditForm('starsEdit')),

    render: function()
    {
        this.$el.html(this.template());
    },
    events: {
        'change .for-stars [data-for=theme]' : 'updateModel',
        'input .for-stars [data-for=options]' : 'updateModel',
        'change .for-stars [data-for=initial-rating]' : 'updateInitialValue',
        'change .for-stars [data-for=show-labels]' : 'updateModel',
        'change .for-stars [data-for=show-selected]' : 'updateModel',
        'change .for-stars [data-for=name]' : 'updateModel'
    },

    updateInitialValue: function(){
        if (!versionNangCap)
        {
            toastr.info(UPGRADE_TO_USE_RATING);
            return;
        }
        this.model.set({
           initialRating: this.$el.find('[data-for=initial-rating]').first().val()
        });
    },

    updateModel: function()
    {
        if (!versionNangCap)
        {
            toastr.info(UPGRADE_TO_USE_RATING);
            return;
        }
        var model =this.model;

        //this function is called on all value changes, except intial value
        var theme = this.$el.find('[data-for=theme]').first().val();
        var name = this.$el.find('[data-for=name]').first().val();

        var showValues = this.$el.find('[data-for=show-labels]').first().is(':checked');
        var showSelectedRating = this.$el.find('[data-for=show-selected]').first().is(':checked');
        var options = [];
        var optionsString = jQuery.trim(this.$el.find('[data-for=options]').first().val());

        //re-render initial value select box
        _.each(optionsString.split("\n"), function(option){
            options.push({
                value: option,
                text: option
            });

        });

        //re-render the initial value select
        var initialSelectHTML = '';

        _.each(options, function(option){
            var selected = option.value == model.get('initialRating') ? "selected" : "";
           initialSelectHTML += '<option '+ selected +' value="'+option.value+'"  >'+option.text+'</option>';
        });

        this.$el.find('select[data-for=initial-rating]').first().html(initialSelectHTML);


        //after re-rendering the list, the initial value may not be in the select anymore
        //thus, updating it is necessaryv
        var initialRating = this.$el.find('[data-for=initial-rating]').first().val();


        //update the model
        this.model.set({
            showValues: showValues,
            options: options,
            theme: theme,
            initialRating: initialRating,
            showSelectedRating: showSelectedRating,
            name: name
        });

    }

});

//Video edit
var VideoEdit = ElementEditView.extend({
    el: '#element-settings',
    initialize: function(){
        this.render();
    },

    events: {
        'input .for-video [data-for=video-code]' : 'updateModel',
        'change .for-video [data-for=hide-info]' : 'updateModel',
        'change .for-video [data-for=hide-controls]' : 'updateModel',
        'change .for-video [data-for=auto-play]' : 'updateModel',
        'input .for-video [data-for=width]' : 'updateModel',
        'input .for-video [data-for=height]' : 'updateModel',
        'input .css-styles input' : 'renderStyle',
        'change .css-styles select' : 'renderStyle',
        'click #change-background-image': 'changeImageBg'
    },
    template: _.template(getEditForm('videoEdit')),
    updateModel: function()
    {
        var videoURL = 'https://www.youtube.com/embed/' +getYouTubeID(this.$el.find('[data-for=video-code]').first().val());
        var hideInfo = this.$el.find('[data-for=hide-info]').first().is(':checked');
        var hideControls = this.$el.find('[data-for=hide-controls]').first().is(':checked');
        var autoPlay = this.$el.find('[data-for=auto-play]').first().is(':checked');
        var width = this.$el.find('[data-for=width]').first().val();
        var height = this.$el.find('[data-for=height]').first().val();

        this.model.set({
            videoURL: videoURL,
            hideInfo: hideInfo,
            hideControls: hideControls,
            autoPlay: autoPlay,
            width: width,
            height: height
        });
    },

    render: function()
    {
        this.$el.html(this.template());
    }

});

var ULEdit = ElementEditView.extend({
    el: '#element-settings',
    initialize: function(){
        this.render();
    },

    template: _.template(getEditForm('ulEdit')),

    render: function()
    {
        this.$el.html(this.template());
    },

    events: {
        'blur .for-ul [data-for=icon]' : 'updateModel',
        'input .for-ul [data-for=icon-color]' : 'updateModel',
        'change .for-ul [data-for=icon-bg-color]' : 'updateModel',
    },

    updateModel: function()
    {
        var icon = this.$el.find('[data-for=icon]').first().val();
        var iconColor = this.$el.find('[data-for=icon-color]').first().val();
        var iconBgColor = this.$el.find('[data-for=icon-bg-color]').first().val();
        var iconStyle = this.$el.find('[data-for=style]').first().val();

        this.model.set({
            icon: icon,
            iconColor: (iconColor),
            iconBgColor: (iconBgColor),
            iconStyle: iconStyle
        })


    }

});


//form container edit
var FormContainerEdit = ElementEditView.extend({
    el: '#element-settings',
    initialize: function()
    {
        this.render();
    },

    template: _.template(getEditForm('formContainerEdit')),

    render: function()
    {
        this.$el.html(this.template());
    },

    events: {
        'input .for-form-container [data-for=form-code]' : 'updateModel',
        'input .css-styles input' : 'renderStyle',
        'change .css-styles select' : 'renderStyle',
        'click #change-background-image': 'changeImageBg',
        'change .for-form-container [data-for=form-style]' : 'updateStyle'
    },

    updateStyle: function(){
        var form = jQuery('#' + this.model.get('editingElementID'));

        var presetCSSStyle = this.$el.find('[data-for=form-style]').first().val();

        //check if the current theme is in the pro version only, if it is and the user is not using the pro version, tell them to upgrade
        var nangCapOnly = false;

        for (var i = 0; i < core37Page.styles.length; i++)
        {
            if (core37Page.styles[i].class == presetCSSStyle)
            {
                nangCapOnly = core37Page.styles[i].is_pro;
                break;
            }
        }

        //if the template is for pro version and the user is not using the pro version, do no update the settings
        if (nangCapOnly && ! versionNangCap)
        {
            //let the user know that he should buy the pro version to get all the styles
            toastr.info(UPGRADE_TO_UNLOCK_TEMPLATE);
        } else
        {
            core37Page.pageSettings.presetCSSStyle = presetCSSStyle;
        }

        //update style
        _.each(core37Page.styles, function(style){

            form.removeClass(style.class);

        });

        form.addClass(presetCSSStyle);




    },

    updateModel: function()
    {
        var formCode = this.$el.find('[data-for=form-code]').first().val();

        var pattern = /<form[\s\S]*\/form>/i;
        var reg = new RegExp(pattern);

        var result = reg.exec(formCode);

        if (result!=null)
        {
            this.model.set({
                formCode: result[0]
            })
        } else
        {
            toastr.error('your code is not valid. Please check it again');
        }




    }

});


//Row edit
var RowEdit = ElementEditView.extend({
    el: '#row-settings',
    initialize: function () {
        this.render();
        console.log('pass: ' + this.model.get('editingElementID'));

    },
    editingRow: function () {
        return  jQuery('#'+this.model.get('editingElementID'));
    },
    template: _.template(getEditForm('rowEdit')),

    reset: function()
    {
        // this.remove();
        this.$el.html("");
        this.unbind();
        this.model.unbind();
    },

    render: function()
    {
        this.$el.html(this.template({
            layout: this.model.get('layout')
        }));
    },

    events: {
        'change .for-row select[data-for=layout]' : 'renderRow',
        'click .for-row .remove-element' : 'removeRow',
        //'input [data-for=text-color] input' : 'renderStyle',
        //'input [data-for=background-color] input' : 'renderStyle',
        'input .css-styles input' : 'renderStyle',
        'change .css-styles select' : 'renderStyle',
        'click #change-background-image': 'changeImageBg'
    },
    removeRow: function () {
        /*
         | Remove current row. If it is the last row in the step,
         | remove all content of current row
         */
        var currentStep = this.editingRow().parent('.c37-step');

        /*
         | In case there are more than one row in the step, remove the current row
         */
        if (currentStep.find('.c37-row').length > 1)
        {
            this.editingRow().remove();
        } else
        {
            /*
             | In case the selected row is the only row in the step, remove its content
             */
            this.editingRow().find('*').remove();

            //append c37-box so user can drop elements to the form again
            this.editingRow().append('<div class="c37-box c37-col-md-12"></div>');
            makeC37BoxDroppable(jQuery);
        }



    },

    renderRow: function () {
        console.log('calling render row');
        //get the row that currently edited
        var editingRow = this.editingRow();
        var currentLayout = editingRow.attr('data-c37-layout');
        var newLayout = this.$el.find('select[data-for=layout]').first().val();


        /*
         |   If layout doesn't change, don't do anything
         */
        if (currentLayout == newLayout)
            return;

        /*
         | Layout change logic:
         |   1. If column count doesn't change (e.g. 1.3-2.3 and 1.2-1.2), change the size of the colums
         |   2. If column count increases, (e.g 1.2-1.2 to 1.3-1.3-1.3), add new column, change to new layout
         |       then make c37box droppable
         |   3. If column count decreases, check if there is a blank box, if current box count of row -
         |       blank box count != new box count, show error, otherwise, delete the empty boxes, apply
         |       new layout
         */


        /*
         | Get the current layout class of the element
         | This function is usually used to get the layout class of c37-box. All layout class are
         | c37-col-md (xs-12 is added by default)
         */
        function getLayoutClass(element)
        {

            var classArray = element.attr('class').split(/\s+/);
            var layoutClass = "";
            _.each(classArray, function (c) {
                if (c.indexOf('c37-col-md-')!=-1)
                    layoutClass = c;
            });

            return layoutClass;
        }

        //get blank columns on row
        function getBlankColumns(row)
        {
            var blankColumns = [];
            var boxes = row.find('.c37-box');

            _.each(boxes, function (box) {
                if (jQuery(box).find('.c37-item-element').length == 0)
                {
                    blankColumns.push(box);
                }

            });

            return blankColumns;

        }

        //apply new row layout
        function applyRowLayout(row, layoutArray)
        {
            row.find('.c37-box').each(function(index){
                console.log(getLayoutClass(jQuery(this)));
                console.log('Index: ',layoutArray[index]);
                jQuery(this).removeClass(getLayoutClass(jQuery(this))).addClass('c37-col-md-' + layoutArray[index]);
            });

        }

        //get the array of row layout
        var currentLayoutArray = currentLayout.split('-');
        var newLayoutArray = newLayout.split('-');

        //    Case 1: equal column count
        if (currentLayoutArray.length == newLayoutArray.length)
        {
            applyRowLayout(editingRow, newLayoutArray);

            //Case 2: current layout has more column
        } else if (currentLayoutArray.length > newLayoutArray.length)
        {
            var columnToRemove = currentLayoutArray.length - newLayoutArray.length;
            var blankColumns = getBlankColumns(editingRow);

            /*
             | If number of column to remove less than current blank column, tell users that
             | it is not possible. They need to arrange enough
             */
            if (columnToRemove > blankColumns.length)
            {
                alert('You do not have enough blank box' + columnToRemove + '---' + blankColumns.length);
                return;
            }

            for (var i = columnToRemove; i >0 ; i--)
                jQuery(blankColumns[blankColumns.length-i]).remove();
            console.log(newLayoutArray);
            applyRowLayout(editingRow, newLayoutArray);

        } else if (currentLayoutArray.length < newLayoutArray.length)
        {
            var columnToAdd = newLayoutArray.length - currentLayoutArray.length;
            console.log('column to add: ' + columnToAdd);

            //add column to row
            for (var i = 0; i < columnToAdd; i++)
            {
                editingRow.append('<div id="c37-box-'+Math.floor(Math.random() * 10000)+'" class="c37-box"></div>');
            }

            applyRowLayout(editingRow, newLayoutArray);
            makeC37BoxDroppable(jQuery);
        }

        //update new layout to current row
        editingRow.attr('data-c37-layout', newLayout);

    }

});

//Form settings
var PageEdit = Backbone.View.extend({
    el: '#form-settings',

    initialize: function () {
        this.render();
    },

    template: _.template(getEditForm('formEdit')),

    render: function () {
        this.$el.html(this.template({
        }));
    },

    events: {
        'change .for-page input' : 'renderPageSettings',
        'input .for-page input' : 'renderPageSettings',
        'input .for-page [data-for=tracking-code]' : 'renderPageSettings',
        'click .for-page #c37-image-picker' : 'openImageSelector',
        'click .for-page .reset-color' : 'resetBgColor',
        'click .for-page .remove-image' : 'removeBgImage'
    },

    resetBgColor: function(){
        core37Page.pageSettings.backgroundColor = '';
        this.$el.find('[data-for=bg-color]').val('#fffffa');
    },

    removeBgImage: function() {
        core37Page.pageSettings.backgroundImage = '';
        this.$el.find('.c37-image-preview').first().attr('src', '');
    },
    openImageSelector: function() {
        if (!versionNangCap)
        {
            toastr.info(UPGRADE_TO_USE_IMAGE);
            return;
        }

        console.log('image');
        if (this.frame)
        {
            this.frame.open();
            return;
        } else
        {
            var el = this.$el;
            var frame = this.frame;
            frame = wp.media({
                'title' : 'select an image',
                'button' : {
                    text: 'Use this image'
                },
                multiple: false
            });

            frame.on('select', function(){
                var attachment = frame.state().get('selection').first().toJSON();
                console.log(attachment.url);
                el.find('.c37-image-preview').first().attr('src', attachment.url);
                //update the model
                core37Page.pageSettings.backgroundImage = attachment.url;
            });

            frame.open();
        }
    },
    renderPageSettings: function()
    {

        var width = this.$el.find('[data-for=width]').first().val();

        //the default blank color is fffffa
        var bgColor = this.$el.find('[data-for=bg-color]').first().val() == 'fffffa' ? '' : this.$el.find('[data-for=bg-color]').first().val();
        var bgColorOpacity = this.$el.find('[data-for=opacity]').first().val();
        var trackingCode = this.$el.find('[data-for=tracking-code]').first().val();

        //update page name on global object
        core37Page.pageTitle = this.$el.find('[data-for=name]').first().val();
        core37Page.pageSettings.width = width;
        core37Page.pageSettings.trackingCode = trackingCode;
        core37Page.pageSettings.backgroundColor = bgColor;
        core37Page.pageSettings.backgroundColorOpacity = bgColorOpacity;


        var page = jQuery('#construction-site .c37-lp');
        if (width!="")
        {
            page.css('width', width);
        } else
        {
            page.css('width', '');
            //add a tag to inform that the page is full width
            page.attr('data-c37-full-width', '');
        }

    }
});


//edit element for box, contains style mostly
var BoxEdit = ElementEditView.extend({
    el: '#element-settings',
    initialize: function(){
        this.render();
    },
    template: _.template(getEditForm('boxEdit')),
    render: function() {
        this.$el.html(this.template())
    },
    events: {
        'input .css-styles input' : 'renderStyle',
        'change .css-styles select' : 'renderStyle',
        'click #change-background-image': 'changeImageBg'
    },




});

var PageList = Backbone.View.extend({

    default: {
        forms: {}
    },
    el: '#forms-list',

    initialize: function()
    {
        console.log('loading forms');
        this.render();

    },
    template: _.template(
        '<h4> <i id="close-edit-panel" class="fa fa-close"></i> All pages</h4>' +
        '<ul>'+
        '<% _.each(forms, function(form) { %>'+
            '<li class="form-edit" form-id="<%= form.id %>"> <i class="fa fa-pencil"></i> <a target="_blank" href="<%= form.url %>"><i class="fa fa-external-link"></i></a> <i class="fa fa-code"></i> <i class="fa fa-trash"></i> <%= form.title %></li>'+
        '<% }) %>'+
        '</ul>'
    ),
    render: function()
    {
        this.$el.html(this.template({
            forms: this.model.get('forms')
        }));
    }

});



/**
 * Created by luis on 6/8/16.
 */
(function (jQuery) {
    jQuery(function(){
        //var formModel = formModel || new C37ElementModel();
        //var formEdit;
        //
        /*
        | Element edit is the single instance of edit form of every element. Use this to make sure that
        | there is only one instance of edit view.
         */

        if (versionNangCap)
        {
            jQuery('#c37-go-pro').hide();
        } else
        {
            //jQuery('.c37-premium').draggable('disable');
        }

        var elementsPanel = jQuery('#elements-panel');


        /**
         * On page load, make the current c37-box boxes droppable
         */
        makeFromDroppable(jQuery);
        makeC37BoxDroppable(jQuery);
        makeC37StepDroppable(jQuery);

        //assign id to form
        jQuery('#construction-site form').attr('id', core37Page.pageSettings.cssID);


        jQuery(document).on('click', '.c37-step .c37-item-element', function (e) {
            e.preventDefault();
        });


        elementsPanel.accordion({
            heightStyle: 'content'
        });

        //drag n drop of row
        jQuery('.c37-container-element').draggable({
            connectToSortable: '.c37-step',
            helper: 'clone',
            revert: 'invalid',
            addClasses: false
        });

        //drag and drop step
        jQuery('.c37-lp-multi-element').draggable({
            connectToSortable: '.c37-step-container',
            helper: 'clone',
            revert: 'invalid',
            addClasses: false
        });
        

        //drag n drop of elements
        jQuery('.c37-item-element').draggable({
            connectToSortable: '.c37-box',
            helper: "clone",
            revert: "invalid",
            iframeFix: true,
            addClasses: false,
            refreshPositions: true,
            stop: function()
            {
                localStorage.setItem('dragging-stop', true);
            },
            start: function()
            {
                localStorage.setItem('dragging-stop', false);
            }
        });


        //switch panel
        var panelToBottom = jQuery('#panel-to-bottom');
        var panelToLeft = jQuery('#panel-to-left');
        var closeEditPanel = jQuery('#close-edit-panel');


        panelToBottom.on('click', function() {
            elementsPanel.removeClass('left-panel');
            elementsPanel.addClass('bottom-panel');

        });

        panelToLeft.on('click', function() {
            elementsPanel.removeClass('bottom-panel');
            elementsPanel.addClass('left-panel');

        });


        jQuery(document).on('click','#close-edit-panel', function() {
            hideOptionsWindow();
        });


    });


})(jQuery);
/**
 * Created by luis on 8/22/16.
 */



(function (jQuery){
    var model, elementEdit, rowModel, rowEdit, formEdit, boxModel, boxEdit;
    var optionsWindow = jQuery('#options-window');
    var elementContextMenu =
        '<div class="c37-element-cm">' +
            '<span title="title" class="cm-title">element_title</span>' +
            '<span title="move" class="cm-move"><i class="fa fa-arrows"></i></span>' +
            '<span title="edit" class="cm-edit"><i class="fa fa-pencil"></i></span>' +
            '<span title="delete" class="cm-del"><i class="fa fa-trash"></i></span>' +
        '</div>';

    var rowContextMenu =
        '<div class="c37-row-cm">' +
            '<span title="move" class="cm-row-move"><i class="fa fa-arrows"></i></span>' +
            '<span title="edit" class="cm-row-edit"><i class="fa fa-pencil"></i></span>' +
            '<span title="box options" class="cm-box-edit"><i class="fa fa-square"></i></span>' +
            '<span title="delete" class="cm-row-del"><i class="fa fa-trash"></i></span>' +
        '</div>';


    /**
     * Load edit form of element when clicked on.
     * @param elementID
     */
    function loadEditForm(elementID)
    {
        //selected element is the outer element (c37-lp-element) the container of form element
        var selectedElement = jQuery('#'+elementID);
        var elementType = selectedElement.attr('data-c37-type');
        var size = getElementSize(selectedElement);
        var elementView;


        //
        //if (typeof model != "undefined")
        //    model.clear();
        /*
         | Need to reset element edit object since if we don't, multiple elements
         | will share the same model and updating in the setting panel will update
         | all elements of the same type
         */
        if (typeof elementEdit != "undefined")
        {
            elementEdit.remove();
        }
        /*
         | get the action object of the current selected element. If it is not empty,
         | pass that object to the setting panel
         */
        var action = {};
        if (typeof elementsActions[elementID] != "undefined")
            action = elementsActions[elementID];


        /*
         | get all current element in the form, this will be used when configuring action for elements
         */
        var allElements = [];



        _.each(jQuery('#construction-site .c37-item-element'), function(e){
            var id = jQuery(e).attr('id');
            if (id != elementID)
            {
                allElements.push({
                    id: jQuery(e).attr('id'),
                    name: jQuery(e).find('[name]').first().attr('name')
                });
            }
        });

        /*
         | Create an empty model to store the data of current element
         */
        model = new C37ElementModel({
            action: action,
            allElements: allElements
        });



        //send the validation object to the editor
        if (typeof validation[elementID] != "undefined")
            model.set({vali: validation[elementID].rules});
        else
            model.set({vali: {}});

        //show the edit form on the right
        if (elementType == 'text')
        {
            //get the suggestion icon
            //because the class will be like this (for the i element) "fa fa-envelope c37-suggest-icon"
            //so the font-awesome icon would be the second element

            var icon = selectedElement.find('.c37-suggest-icon').length > 0 ? selectedElement.find('.c37-suggest-icon').first().attr('class').split(' ')[1] : 'fa-envelope';
            var type = selectedElement.find('input').first().attr('type');
            var name = selectedElement.find('input').first().attr('name');
            var label = selectedElement.find('label').first().html();
            var cssID = selectedElement.find('input').first().attr('id');
            var value = typeof selectedElement.find('input').first().val() == 'undefined' ? '' : selectedElement.find('input').first().val();
            model.set({
                placeholder: selectedElement.find('input').first().attr('placeholder'),
                editingElementID : elementID,
                type : type,
                name : name,
                size: size,
                label: label,
                cssID: cssID,
                icon: icon,
                value: value
            });

            elementView = new Text({model: model, el: '#'+elementID});
            elementView.render();

            model.on('change', function(){
                elementView.render();
            });


            elementEdit = (new TextEdit({model: model}));

            //render the autocomplete fa icon select box
            renderFontAwesome('fa-icon-input');

        } else if(elementType == 'input_submit')
        {

            var submitButton = selectedElement.find('input').first();

            //preset is the style of the button, contain classes
            var presetJSON = decodeURIComponent(submitButton.attr('data-preset'));
            var preset = JSON.parse(presetJSON);

            if (typeof  preset == 'undefined')
                preset = {};

            console.log('value submit button: ' + submitButton.val());
            model.set({
                text : submitButton.attr('value'),
                name : submitButton.attr('name'),
                editingElementID : elementID,
                size: size,
                preset: preset
            });


            elementView = new InputSubmit({model: model, el: '#'+elementID});
            elementView.render();

            model.on('change', function(){
                elementView.render();

            });


            elementEdit = (new InputSubmitEdit({model: model}));

            //render the autocomplete fa icon select box
            //renderFontAwesome('fa-icon-input');
        }

        else if(elementType == 'checkbox')
        {
            //get the current options available on the form builder
            var options = [];
            selectedElement.find('.c37-single-checkbox').each(function () {
                var single = {
                    value: jQuery(this).find('input').first().attr('value'),
                    checked: jQuery(this).find('input').first().prop('checked'),
                    id: jQuery(this).find('input').first().attr('id')
                };

                options.push(single);
            });

            model.set({
                options: options,
                name: selectedElement.find('input').first().attr('name').replace('[','').replace(']',''),
                editingElementID: elementID,
                size: size,
                alignment: selectedElement.hasClass('c37-vertical') ? 'c37-vertical' : 'c37-horizontal'
            });
            elementView = new CheckBox({model: model, el: '#'+elementID});
            //model.set({content: 'what the hell'});
            elementView.render();

            model.on('change', function(){
                elementView.render();

            });


            elementEdit  = new CheckBoxEdit({model: model});
        } else if(elementType == 'radio')
        {
            //get the current options available on the form builder
            var options = [];
            selectedElement.find('.c37-single-radio').each(function () {
                var single = {
                    value: jQuery(this).find('input').first().attr('value'),
                    checked: jQuery(this).find('input').first().prop('checked'),
                    id: jQuery(this).find('input').first().attr('id')
                };

                options.push(single);
            });

            model.set({
                options : options,
                name : selectedElement.find('input').first().attr('name'),
                size: size,
                alignment : selectedElement.hasClass('c37-vertical') ? 'c37-vertical' : 'c37-horizontal'
            });

            elementView = new Radio({model: model, el: '#'+elementID});

            elementView.render();

            model.on('change', function(){
                elementView.render();
            });

            elementEdit = new RadioEdit({model: model});
        } else if(elementType == 'label')
        {
            model.set({content : selectedElement.find('label').first().html().replace('<sup class="required">*</sup>', '')});
            model.set({required : selectedElement.find('sup').length > 0});
            model.set({editingElementID : elementID});
            model.set({size : size});

            elementView = new Label({model: model, el: '#'+elementID});


            elementEdit = new LabelEdit({model: model});
        } else if(elementType == 'heading')
        {
            model.set({content : selectedElement.find(':header').first().html()});
            model.set({tagName : selectedElement.find(':header').first().prop('tagName').toLowerCase()});
            model.set({editingElementID : elementID});
            model.set({size : size});

            elementView = new Heading({model: model, el: '#'+elementID});

            elementEdit = new HeadingEdit({model: model});
        } else if(elementType == 'paragraph')
        {
            var currentContent = selectedElement.find('.c37-text-content').first().html();
            model.set({'content' : currentContent});
            model.set({'editingElementID' : elementID});
            model.set({'size' : size});

            elementView = new Paragraph({model: model, el: '#'+elementID});

            elementEdit = new ParagraphEdit({model: model});

            //initialize the text editor and set the listener
            var editor = CKEDITOR.replace('c37-text-edit');

            editor.setData(currentContent);
            editor.on('change', function(){
                model.set({content: editor.getData()});
            });

        } else if (elementType == 'ul') {
            var items = [];


            var classString = selectedElement.find('i').first().attr('class');
            var faIconPattern = /fa[\-\S]{2,30}/i;
            var faRegex = new RegExp(faIconPattern);

            var icon = faRegex.exec(classString)[0];


            var iconStylePattern = /c37-li-icon-\S*/i;
            var iconStyleRegex = new RegExp(iconStylePattern);

            var iconStyle = iconStyleRegex.exec(classString)[0];


            //single icon element in each list item
            var iconElement = selectedElement.find('i').first();

            var inlineStyle = jQuery(iconElement).attr('style');

            var iconColor = '#000000';
            var iconBgColor = '#ffffff';

            console.log(inlineStyle);
            if (inlineStyle != undefined)
            {
                iconColor = inlineStyle.indexOf('color') !=-1 ? rgb2hex((iconElement).css('color')) : '#000000';
                iconBgColor = inlineStyle.indexOf('background') ? rgb2hex((iconElement).css('background-color')) : '#ffffff';
            }

            //remove icon classes before getting inner li html
            selectedElement.find('i').remove();
            _.each(selectedElement.find('li'), function(li){
                items.push(jQuery(li).html());

            });




            var ulToEditor = '<ul>' + selectedElement.find('ul').first().html() + '</ul>';

            model.set({
                items: items,
                icon: icon,
                iconStyle: iconStyle,
                iconColor: iconColor,
                iconBgColor: iconBgColor,
                editingElementID : elementID
            });

            elementView = new UnorderedList({model: model, el: '#'+elementID});
            elementEdit = new ULEdit({model: model});

            var editor = CKEDITOR.replace('ul-editor');

            editor.setData(ulToEditor);

            editor.on('change', function(){



                var content = jQuery.parseHTML(editor.getData());

                var items = [];
                console.log(editor.getData());
                _.each(content, function(pi){
                    items.push(jQuery(pi).html());

                });

                model.set({items: items});
            });

            renderFontAwesome();

        } else if (elementType == 'form_container'){
            model.set({
                formCode: selectedElement.find('form').first().parent().html(),
                editingElementID : elementID,
            });

            elementView = new FormContainer({model: model, el: '#'+elementID});
            elementEdit = new FormContainerEdit({model: model});
        }
          else if (elementType == 'date')
        {
            model.set({'value' : selectedElement.find('input').first().attr('value')});
            model.set({'required' : selectedElement.find('input').first().prop('required') == false? '' : 'required'});
            model.set({'editingElementID' : elementID});
            model.set({'type' : selectedElement.find('input').first().attr('type')});
            model.set({'name' : selectedElement.find('input').first().attr('name')});
            model.set({'size' : size});

            elementView = new DateInput({model: model, el: '#'+elementID});

            elementEdit = new DateEdit({model: model});
        } else if (elementType == 'textarea')
        {
            model.set({
                //required : selectedElement.find('textarea').first().prop('required') == false? '' : 'required'
                editingElementID : elementID,
                name : selectedElement.find('textarea').first().attr('name'),
                placeholder : selectedElement.find('textarea').first().attr('placeholder'),
                label: selectedElement.find('label').first().html(),
                cssID: selectedElement.find('textarea').first().attr('id'),
                size: size

            });

            elementView = new TextArea({model: model, el: '#'+elementID});
            elementEdit = new TextAreaEdit({model: model});

        } else if (elementType == 'button')
        {
            var button = selectedElement.find('button').first();

            //preset is the style of the button, contain classes
            var preset = JSON.parse(decodeURIComponent(button.attr('data-preset')));
            console.log(preset);
            if (typeof  preset == 'undefined')
                preset = {};

            model.set({
                text : button.html(),
                name : button.attr('name'),
                editingElementID : elementID,
                size: size,
                preset: preset

            });
            elementView = new Button({model: model, el: '#'+elementID});

            elementEdit = new ButtonEdit({model: model});
        } else if (elementType == 'select')
        {
            //get the current options available on the form builder
            var options = [];
            selectedElement.find('option').each(function () {
                var single = {
                    value: jQuery(this).attr('value')
                };

                options.push(single);
            });

            model.set({
                options : options,
                name : selectedElement.find('select').first().attr('name'),
                editingElementID : elementID,
                size : size,
                selected_value : selectedElement.find('select').first().val()
            });

            elementView = new Select({model: model, el: '#'+elementID});

            elementEdit = new SelectEdit({model: model});
        } else if (elementType == 'acceptance')
        {
            model.set({
                error_message: selectedElement.find('input').first().attr('data-error'),
                name : selectedElement.find('input').first().attr('name'),
                text : selectedElement.find('span').first().html(),
                editingElementID : elementID,
                id: selectedElement.find('input').first().attr('id'),
                size : size
            });

            elementView = new Acceptance({model: model, el: '#'+elementID});

            elementEdit = new AcceptanceEdit({model: model});
        } else if (elementType == 'file')
        {
            model.set({
                name: selectedElement.find('input').first().attr('name').replace('[', '').replace(']', ''),
                multiple: selectedElement.find('input').first().prop('multiple'),
                required: selectedElement.find('input').first().prop('required'),
                field_id: selectedElement.find('input').first().attr('id'),
                editingElementID: elementID,
                text: selectedElement.find('.c37-file-label').first().text(),
                icon: selectedElement.find('i').attr('class'),
                file_type: selectedElement.find('input').first().attr('accept')
            });

            elementView = new File({model: model, el: '#'+elementID});

            elementEdit = new FileEdit({model: model});
            renderFontAwesome('fa-icon-input');
        } else if (elementType == 'image')
        {
            model.set({
                imgSrc: selectedElement.find('img').first().attr('src')
            });

            elementView = new Image({model: model, el: '#'+elementID});

            elementEdit = new ImageEdit({model: model});
        } else if (elementType == 'stars')
        {
            var selectDiv = selectedElement.find('select').first();
            var theme = selectDiv.attr('data-theme');
            var id = selectDiv.attr('id');
            var options = [];
            var initialRating = selectDiv.attr('data-initial-rating');
            var showValues = selectDiv.attr('data-show-values') == 'true';
            var showSelectedRating = selectDiv.attr('data-show-selected') == 'true';
            var name = selectDiv.attr('name');

            _.each(selectDiv.find('option'), function(option){
                options.push({
                    value: jQuery(option).val(),
                    text: jQuery(option).html()
                })

            });

            model.set({
                theme: theme,
                id: id,
                options: options,
                initialRating: initialRating,
                showValues: showValues,
                showSelectedRating: showSelectedRating,
                name: name
            });


            elementView = new Stars({model: model, el: '#'+elementID});

            elementEdit = new StarsEdit({model: model});
        } else if (elementType == 'video')
        {
            var videoURL = selectedElement.find('iframe').first().attr('src');
            var hideInfo = videoURL.indexOf('showinfo=0') != -1;
            var hideControls = videoURL.indexOf('controls=0') != -1;
            var autoPlay = videoURL.indexOf('autoplay=1') != -1;
            var width = selectedElement.find('iframe').first().attr('width');
            var height = selectedElement.find('iframe').first().attr('height');

            //remove extra elements of the video URL (without the extra settings such as showcontrols part)
            videoURL = videoURL.split('?')[0];

            console.log('my video id is: ' + elementID);
            model.set({
                videoURL: videoURL,
                hideInfo: hideInfo,
                hideControls: hideControls,
                autoPlay: autoPlay,
                width: width,
                height: height,
                editingElementID : elementID
            });

            elementView = new Video({model: model, el : '#' + elementID});
            elementEdit = new VideoEdit({model: model});
        }

        elementView.render();

        model.on('change', function(){
            elementView.render();

        });




        //setting tabs behavior
        jQuery('#setting-tabs').tabs({
            active: 0
        });

        enableAccordionStyleTab();

        jQuery(document).on('click', '#setting-tabs ul li a', function() {
            jQuery('#setting-tabs ul li a').removeClass('active-tab');
            jQuery(this).addClass('active-tab')
        });
    }

    /**
     * Delete a single element from the form
     * @param elementID
     */
    function deleteElement(elementID)
    {
        console.log('deleting');
        jQuery('#'+elementID).remove();
    }


    function loadFormSettings()
    {
        // console.log(rgb2hex(form.css('background-color')));
        formEdit = new PageEdit({model: new C37ElementModel(core37Page.pageSettings)});

        //setting tabs behavior
        jQuery('#setting-tabs').tabs({
            active: 0
        });

        jQuery(document).on('click', '#setting-tabs ul li a', function() {
            jQuery('#setting-tabs ul li a').removeClass('active-tab');
            jQuery(this).addClass('active-tab');
        });
    }

    /**
     * load setting for row
     * @param rowID
     */
    function loadRowSettings(rowID, rowLayout)
    {
        if (typeof rowModel != "undefined")
            rowModel.clear();


        rowModel = new C37ElementModel({
            editingElementID: rowID,
            layout: rowLayout
        });
        if (typeof rowEdit != "undefined")
        {
            rowEdit.remove();
        }

        rowEdit = new RowEdit({model: rowModel});

        //setting tabs behavior
        jQuery('#setting-tabs').tabs({
            active: 0
        });

        jQuery(document).on('click', '#setting-tabs ul li a', function() {
            jQuery('#setting-tabs ul li a').removeClass('active-tab');
            jQuery(this).addClass('active-tab')
        });

    }

    function loadBoxSettings(boxID)
    {
        if (typeof boxModel != "undefined")
            boxModel.clear();

        boxModel = new C37ElementModel({
            editingElementID: boxID
        });

        boxEdit = new BoxEdit({model: boxModel});


        //setting tabs behavior
        jQuery('#setting-tabs').tabs({
            active: 0
        });

        jQuery(document).on('click', '#setting-tabs ul li a', function() {
            jQuery('#setting-tabs ul li a').removeClass('active-tab');
            jQuery(this).addClass('active-tab')
        });


    }


    function getElementSize(element)
    {
        //check if the class is expanded on small screen
        var expand = element.hasClass('c37-col-xs-12');

        var classString = element.attr('class');
        var size = 12;//by default, the element expand full on its parent
        //in case the user has set the size for the element
        if (classString.indexOf('c37-col-md-') != -1)
        {
            var temArr = classString.split('c37-col-md-');
            size = temArr[1].split(' ')[0];
        }

        return {expand: expand, size: size};
    }


    //hide the edit menu on button click
    jQuery(document).on('click','#close-panel', function(){
        hideOptionsWindow();
    });

    /**
        Show/hide the context menu when cursor hover on form element
     */
    jQuery(document).on('mouseover', '.c37-step .c37-item-element', function(){
        var title = jQuery(this).attr('data-c37-type');

        if (typeof title != 'undefined')
            title = title.replace('_', ' ').toLowerCase();


        if (jQuery(this).find('.c37-element-cm').length ==0)
            jQuery(this).append(elementContextMenu.replace('element_title', title));
    });


    jQuery(document).on('mouseleave', '.c37-step .c37-item-element', function(){
        jQuery(this).find('.c37-element-cm').remove()
    });

    /**
     * Show/hide the context menu when cursor hover on column
     */

    jQuery(document).on('mouseover', '.c37-step .c37-box', function(){
        if (jQuery(this).find('.c37-row-cm').length ==0)
            jQuery(this).append(rowContextMenu);
    });


    jQuery(document).on('mouseleave', '.c37-step .c37-box', function(){
        jQuery(this).find('.c37-row-cm').remove()
    });


    //show the confirmation dialog when user click on del button
    jQuery(document).on('click', '.cm-del', function(){
        var parentElement = jQuery(this).closest('.c37-item-element');
        console.log('about to delete');

        swal({
            title: 'Delete this element?',
            text: 'This action cannot be undone. Be very careful',
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: true
        }, function() {
            parentElement.remove();
            console.log('deleted');
        });

    });


    /**
     * Show edit element form on pencil icon click
     *
     */
    jQuery(document).on('click', '.c37-element-cm .cm-edit', function(){
        //empty setting panel
        jQuery('#options-window').html('');
        jQuery('#options-window').append('<div id="element-settings"></div>');

        //var id = jQuery(this).attr('id');
        var id = jQuery(this).closest('.c37-item-element').attr('id');
        loadEditForm(id);

        optionsWindow.hide();
        jQuery('#options-window').show('slide', {direction: 'right'}, 500);
        jQuery('#options-window').draggable({
            handle: '#move-panel'
        });

    });

    //delete element
    //jQuery(document).on('click', '.c37-element-cm .cm-del', function(){
    //    var id = jQuery(this).closest('.c37-item-element').attr('id');
    //    deleteElement(id);
    //});

    /**
     * Load current settings on click. The two pieces of info needed when loading settings
     * for a row is:
     *  1. Row ID - this info will be used to update changes to row when user edit
     *  2. Current row layout
     */
    jQuery(document).on('click', '.c37-row-cm .cm-row-edit', function (e) {
        //empty setting panel
        var optionsWindow = jQuery('#options-window');
        optionsWindow.html('');
        optionsWindow.append('<div id="row-settings"></div>');
        var rowID = jQuery(this).closest('.c37-row').attr('id');
        var layout = jQuery(this).closest('.c37-row').attr('data-c37-layout');
        loadRowSettings(rowID, layout);
        enableAccordionStyleTab();
        optionsWindow.hide();
        optionsWindow.show('slide', {direction: 'right'}, 500);
        optionsWindow.draggable({
            handle: '#move-panel'
        });

    });

    //Edit box
    jQuery(document).on('click', '.c37-row-cm .cm-box-edit', function(e){
//empty setting panel
        jQuery('#options-window').html('');
        jQuery('#options-window').append('<div id="element-settings"></div>');
        var boxID = jQuery(this).closest('.c37-box').attr('id');
        loadBoxSettings(boxID);
        jQuery('#options-window').hide();
        jQuery('#options-window').show('slide', {direction: 'right'}, 500);
        jQuery('#options-window').draggable({
            handle: '#move-panel'

        });
    });


    //delete row
    jQuery(document).on('click', '.c37-row-cm .cm-row-del', function(){
        var rowToDelete = jQuery(this).closest('.c37-row');

        swal({
            title: 'Delete this row?',
            text: 'This action cannot be undone. Be very careful',
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: true
        }, function() {
            rowToDelete.remove();
        });
    });

    //show form menu
    jQuery(document).on('click', '#open-form-settings', function(){
        var optionsWindow = jQuery('#options-window');
        optionsWindow.html('');
        optionsWindow.append('<div id="form-settings"></div>');

        loadFormSettings();
        optionsWindow.hide();
        optionsWindow.show('slide', {direction: 'right'}, 500);
        optionsWindow.draggable();

    });




})(jQuery);
/**
 * Created by luis on 6/22/16.
 */
(function (jQuery) {

    /*
    | Get form HTML, collect extra form information and send to server
     */

    //learn to use post with backbone instead
    //http://wordpress.stackexchange.com/questions/119765/using-backbone-with-the-wordpress-ajax-api

    //var savePageOptions = jQuery('#save-page-options');
    jQuery(document).on('click', '#save-page-button', function() {

        jQuery('#save-page-options').toggle('slide', {direction: 'up'}, 500);
    });

    jQuery(document).on('click', '#save-page-options a', function(){

        //
        //console.log(jQuery(this).attr('id'));

        var isPage = false;

        if (jQuery(this).attr('id') == 'save-as-page')
            isPage = true;


        if (jQuery.trim(core37Page.pageTitle) == '')
        {
            toastr.error(ERROR_MISSING_FORM_NAME);
            return;
        }

        /**
         * Compile content from individual steps, this is needed when we have multiple step forms
         * @type {string}
         */
        var pageContent = encodeURIComponent(jQuery('#construction-site').html());

        jQuery.post(ajaxurl,
            {
                pageContent: pageContent,
                elementsActions: JSON.stringify(elementsActions),
                pageID: core37Page.pageID,
                pageSettings: JSON.stringify(core37Page.pageSettings),
                pageTitle: core37Page.pageTitle,
                action: 'core37_lp_save_page',
                isPage: isPage,
                //formValidation: JSON.stringify(validation),
                formCSSCode: encodeURIComponent(jQuery('#element-styles').text()),
                pageCSSObject: JSON.stringify(elementsStyles)
            },
        function(response){
            //update current form ID to the generated ID

            core37Page.pageID = JSON.parse(response).pageID;

            toastr.success(SUCCESS_FORM_SAVED);

            //hide the post save options panel
            jQuery('#save-page-options').hide();

        });


    });

    //load all available forms
    jQuery(document).on('click', '#get-pages', function(response){
        jQuery.post(
            ajaxurl,
            {action: 'core37_lp_list_pages'},
            function(response)
            {
                jQuery('#options-window').html('');
                jQuery('#options-window').append('<div id="forms-list"></div>');
                var model = new C37ElementModel({
                });
                model.set('forms', JSON.parse(response));
                new PageList({
                    model: model
                });

                jQuery('#options-window').show('slide', {direction: 'right'}, 500);
            }
        )

    });

    //load a single form based on form ID
    jQuery(document).on('click', '.form-edit i.fa-pencil', function(){

        var pageID = jQuery(this).closest('li').attr('form-id');

        jQuery.post(
            ajaxurl,
            {
                action: 'core37_lp_load_page',
                pageID: pageID
            },

            function(response)
            {
                var data = JSON.parse(response);
                //console.log(data);
                //update form code
                //data.formData.post_content contains only HTML of the steps
                //we need to construct the form also from the form settings
                //console.log(response);
                //update element actions
                elementsActions = JSON.parse(data.elementsActions);
                core37Page.pageSettings = JSON.parse(data.pageSettings);
                //validation = JSON.parse(data.formValidation);
                elementsStyles = JSON.parse(data.pageCSSObject);
                jQuery('#element-styles').remove();
                jQuery('head').append('<style id="element-styles"></style>');
                jQuery('#element-styles').text(decodeURIComponent(data.pageCSSCode));

                var pageHTML = decodeURIComponent(data.pageData.post_content);
                jQuery('#construction-site').html(pageHTML);

                //update form name
                core37Page.pageTitle = data.pageData.post_title;

                //update form ID
                core37Page.pageID = pageID;

                /**
                 * On page load, make the current c37-box boxes droppable
                 */


                makeFromDroppable(jQuery);
                makeC37BoxDroppable(jQuery);
                makeC37StepDroppable(jQuery);
                makeFormSortable(jQuery);
                //restoreStarsRating(jQuery);

                //hide the list pages panel
                hideOptionsWindow();
            }
        )

    });

    //delete a form based on form ID
    jQuery(document).on('click', '.form-edit i.fa-trash', function(){
        var pageID = jQuery(this).closest('li').attr('form-id');
        var that = jQuery(this);

        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this form!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: true,
            html: false
        }, function(){

            jQuery.post(
                ajaxurl,
                {
                    action: 'core37_lp_delete_page',
                    pageID: pageID
                },

                function()
                {
                    that.closest('.form-edit').hide('slide', {direction: 'up'}, 200);
                    //toastr.success('Your form was deleted');

                }

            );

        });


    });


    jQuery(document).on('click', '.form-edit i.fa-code', function(){
        if (!versionNangCap)
        {
            toastr.info(UPGRADE_TO_USE_SHORTCODE);
            return;
        }

        var formID = jQuery(this).closest('li').attr('form-id');

        swal("Here is your shortcode", "[core37_lp id=" + formID + "]", "success");
    });


})(jQuery);
/**
 * Created by luis on 6/26/16.
 */

/**
 * Created by luis on 10/12/16.
 */
/**
 Contains little tweaks for form elements such as list of upload files for file uploads
 */

(function(){



    jQuery(function(){

        jQuery('.c37-lp input[type=file]').on('change', function(){
            var selectedFiles = '';
            for (var i = 0; i < jQuery(this).get(0).files.length; ++i) {
                selectedFiles += '<span class="c37-selected-file">'+ jQuery(this).get(0).files[i].name +'</span>';
            }

            selectedFiles = "<div class='all-selected-files'>"+selectedFiles+"</div>";
            jQuery('.all-selected-files').remove();
            console.log("item: " + jQuery(this).closest('.c37-child').length);
            //only show the list of files if the select input is not visible
            if (!jQuery(this).is(':visible'))
            {
                console.log('appending-file');
                jQuery(this).closest('div.c37-child').append(selectedFiles);
            }

        });


        //apply star ratings to all stars elements
        _.each(jQuery('.c37-star-rating'), function(singleStar){
            var star = jQuery(singleStar);
            //empty current html
            star.siblings('.br-widget').remove();
            console.log(star.find('.br-wrapper').length);
            console.log('star rendered');

            var theme = star.attr('data-theme');
            var showSelectedRating = star.attr('data-show-selected') == 'true';
            var showValues = star.attr('data-show-values') == 'true';
            var initialRating = star.attr('data-initial-rating');
            var id = star.attr('id');

            var starSettings = {
                theme: theme,
                showSelectedRating: showSelectedRating,
                showValues: showValues,
                initialRating: initialRating,
                allowEmpty: true,
                onSelect: function(value, text)
                {
                    console.log('value is : ' + value);
                    _.each(star.find('option'), function(option){

                        var o = jQuery(option);
                        if (o.val() == value)
                            o.prop('selected', true);

                    });
                }
            };

            console.log(starSettings);

            //jQuery('#' + id).barrating('destroy');
            jQuery('#' + id).barrating(starSettings);

        });

    });




})(jQuery);
