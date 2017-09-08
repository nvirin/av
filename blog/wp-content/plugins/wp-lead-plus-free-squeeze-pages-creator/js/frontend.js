/*! Backstretch - v2.0.4 - 2013-06-19
* http://srobbin.com/jquery-plugins/backstretch/
* Copyright (c) 2013 Scott Robbin; Licensed MIT */
(function(a,d,p){a.fn.backstretch=function(c,b){(c===p||0===c.length)&&a.error("No images were supplied for Backstretch");0===a(d).scrollTop()&&d.scrollTo(0,0);return this.each(function(){var d=a(this),g=d.data("backstretch");if(g){if("string"==typeof c&&"function"==typeof g[c]){g[c](b);return}b=a.extend(g.options,b);g.destroy(!0)}g=new q(this,c,b);d.data("backstretch",g)})};a.backstretch=function(c,b){return a("body").backstretch(c,b).data("backstretch")};a.expr[":"].backstretch=function(c){return a(c).data("backstretch")!==p};a.fn.backstretch.defaults={centeredX:!0,centeredY:!0,duration:5E3,fade:0};var r={left:0,top:0,overflow:"hidden",margin:0,padding:0,height:"100%",width:"100%",zIndex:-999999},s={position:"absolute",display:"none",margin:0,padding:0,border:"none",width:"auto",height:"auto",maxHeight:"none",maxWidth:"none",zIndex:-999999},q=function(c,b,e){this.options=a.extend({},a.fn.backstretch.defaults,e||{});this.images=a.isArray(b)?b:[b];a.each(this.images,function(){a("<img />")[0].src=this});this.isBody=c===document.body;this.$container=a(c);this.$root=this.isBody?l?a(d):a(document):this.$container;c=this.$container.children(".backstretch").first();this.$wrap=c.length?c:a('<div class="backstretch"></div>').css(r).appendTo(this.$container);this.isBody||(c=this.$container.css("position"),b=this.$container.css("zIndex"),this.$container.css({position:"static"===c?"relative":c,zIndex:"auto"===b?0:b,background:"none"}),this.$wrap.css({zIndex:-999998}));this.$wrap.css({position:this.isBody&&l?"fixed":"absolute"});this.index=0;this.show(this.index);a(d).on("resize.backstretch",a.proxy(this.resize,this)).on("orientationchange.backstretch",a.proxy(function(){this.isBody&&0===d.pageYOffset&&(d.scrollTo(0,1),this.resize())},this))};q.prototype={resize:function(){try{var a={left:0,top:0},b=this.isBody?this.$root.width():this.$root.innerWidth(),e=b,g=this.isBody?d.innerHeight?d.innerHeight:this.$root.height():this.$root.innerHeight(),j=e/this.$img.data("ratio"),f;j>=g?(f=(j-g)/2,this.options.centeredY&&(a.top="-"+f+"px")):(j=g,e=j*this.$img.data("ratio"),f=(e-b)/2,this.options.centeredX&&(a.left="-"+f+"px"));this.$wrap.css({width:b,height:g}).find("img:not(.deleteable)").css({width:e,height:j}).css(a)}catch(h){}return this},show:function(c){if(!(Math.abs(c)>this.images.length-1)){var b=this,e=b.$wrap.find("img").addClass("deleteable"),d={relatedTarget:b.$container[0]};b.$container.trigger(a.Event("backstretch.before",d),[b,c]);this.index=c;clearInterval(b.interval);b.$img=a("<img />").css(s).bind("load",function(f){var h=this.width||a(f.target).width();f=this.height||a(f.target).height();a(this).data("ratio",h/f);a(this).fadeIn(b.options.speed||b.options.fade,function(){e.remove();b.paused||b.cycle();a(["after","show"]).each(function(){b.$container.trigger(a.Event("backstretch."+this,d),[b,c])})});b.resize()}).appendTo(b.$wrap);b.$img.attr("src",b.images[c]);return b}},next:function(){return this.show(this.index<this.images.length-1?this.index+1:0)},prev:function(){return this.show(0===this.index?this.images.length-1:this.index-1)},pause:function(){this.paused=!0;return this},resume:function(){this.paused=!1;this.next();return this},cycle:function(){1<this.images.length&&(clearInterval(this.interval),this.interval=setInterval(a.proxy(function(){this.paused||this.next()},this),this.options.duration));return this},destroy:function(c){a(d).off("resize.backstretch orientationchange.backstretch");clearInterval(this.interval);c||this.$wrap.remove();this.$container.removeData("backstretch")}};var l,f=navigator.userAgent,m=navigator.platform,e=f.match(/AppleWebKit\/([0-9]+)/),e=!!e&&e[1],h=f.match(/Fennec\/([0-9]+)/),h=!!h&&h[1],n=f.match(/Opera Mobi\/([0-9]+)/),t=!!n&&n[1],k=f.match(/MSIE ([0-9]+)/),k=!!k&&k[1];l=!((-1<m.indexOf("iPhone")||-1<m.indexOf("iPad")||-1<m.indexOf("iPod"))&&e&&534>e||d.operamini&&"[object OperaMini]"==={}.toString.call(d.operamini)||n&&7458>t||-1<f.indexOf("Android")&&e&&533>e||h&&6>h||"palmGetResource"in d&&e&&534>e||-1<f.indexOf("MeeGo")&&-1<f.indexOf("NokiaBrowser/8.5.0")||k&&6>=k)})(jQuery,window);
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
 * Created by luis on 9/12/16.
 */

jQuery(function(){

    if (!Modernizr.inputtypes.date) {
        jQuery('input[type=date]').pikaday({firstDay: 1});
    }
});

//settings for toastr
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


/*!
 * Parsley.js
 * Version 2.4.4 - built Thu, Aug 4th 2016, 9:54 pm
 * http://parsleyjs.org
 * Guillaume Potier - <guillaume@wisembly.com>
 * Marc-Andre Lafortune - <petroselinum@marc-andre.ca>
 * MIT Licensed
 */

// The source code below is generated by babel as
// Parsley is written in ECMAScript 6
//
var _slice = Array.prototype.slice;

function _toConsumableArray(arr) { if (Array.isArray(arr)) { for (var i = 0, arr2 = Array(arr.length); i < arr.length; i++) arr2[i] = arr[i]; return arr2; } else { return Array.from(arr); } }

(function (global, factory) {
    typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory(require('jquery')) : typeof define === 'function' && define.amd ? define(['jquery'], factory) : global.parsley = factory(global.jQuery);
})(this, function ($) {
    'use strict';

    var globalID = 1;
    var pastWarnings = {};

    var ParsleyUtils__ParsleyUtils = {
        // Parsley DOM-API
        // returns object from dom attributes and values
        attr: function attr($element, namespace, obj) {
            var i;
            var attribute;
            var attributes;
            var regex = new RegExp('^' + namespace, 'i');

            if ('undefined' === typeof obj) obj = {};else {
                // Clear all own properties. This won't affect prototype's values
                for (i in obj) {
                    if (obj.hasOwnProperty(i)) delete obj[i];
                }
            }

            if ('undefined' === typeof $element || 'undefined' === typeof $element[0]) return obj;

            attributes = $element[0].attributes;
            for (i = attributes.length; i--;) {
                attribute = attributes[i];

                if (attribute && attribute.specified && regex.test(attribute.name)) {
                    obj[this.camelize(attribute.name.slice(namespace.length))] = this.deserializeValue(attribute.value);
                }
            }

            return obj;
        },

        checkAttr: function checkAttr($element, namespace, _checkAttr) {
            return $element.is('[' + namespace + _checkAttr + ']');
        },

        setAttr: function setAttr($element, namespace, attr, value) {
            $element[0].setAttribute(this.dasherize(namespace + attr), String(value));
        },

        generateID: function generateID() {
            return '' + globalID++;
        },

        /** Third party functions **/
        // Zepto deserialize function
        deserializeValue: function deserializeValue(value) {
            var num;

            try {
                return value ? value == "true" || (value == "false" ? false : value == "null" ? null : !isNaN(num = Number(value)) ? num : /^[\[\{]/.test(value) ? $.parseJSON(value) : value) : value;
            } catch (e) {
                return value;
            }
        },

        // Zepto camelize function
        camelize: function camelize(str) {
            return str.replace(/-+(.)?/g, function (match, chr) {
                return chr ? chr.toUpperCase() : '';
            });
        },

        // Zepto dasherize function
        dasherize: function dasherize(str) {
            return str.replace(/::/g, '/').replace(/([A-Z]+)([A-Z][a-z])/g, '$1_$2').replace(/([a-z\d])([A-Z])/g, '$1_$2').replace(/_/g, '-').toLowerCase();
        },

        warn: function warn() {
            var _window$console;

            if (window.console && 'function' === typeof window.console.warn) (_window$console = window.console).warn.apply(_window$console, arguments);
        },

        warnOnce: function warnOnce(msg) {
            if (!pastWarnings[msg]) {
                pastWarnings[msg] = true;
                this.warn.apply(this, arguments);
            }
        },

        _resetWarnings: function _resetWarnings() {
            pastWarnings = {};
        },

        trimString: function trimString(string) {
            return string.replace(/^\s+|\s+$/g, '');
        },

        namespaceEvents: function namespaceEvents(events, namespace) {
            events = this.trimString(events || '').split(/\s+/);
            if (!events[0]) return '';
            return $.map(events, function (evt) {
                return evt + '.' + namespace;
            }).join(' ');
        },

        difference: function difference(array, remove) {
            // This is O(N^2), should be optimized
            var result = [];
            $.each(array, function (_, elem) {
                if (remove.indexOf(elem) == -1) result.push(elem);
            });
            return result;
        },

        // Alter-ego to native Promise.all, but for jQuery
        all: function all(promises) {
            // jQuery treats $.when() and $.when(singlePromise) differently; let's avoid that and add spurious elements
            return $.when.apply($, _toConsumableArray(promises).concat([42, 42]));
        },

        // Object.create polyfill, see https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object/create#Polyfill
        objectCreate: Object.create || (function () {
            var Object = function Object() {};
            return function (prototype) {
                if (arguments.length > 1) {
                    throw Error('Second argument not supported');
                }
                if (typeof prototype != 'object') {
                    throw TypeError('Argument must be an object');
                }
                Object.prototype = prototype;
                var result = new Object();
                Object.prototype = null;
                return result;
            };
        })(),

        _SubmitSelector: 'input[type="submit"], button:submit'
    };

    var ParsleyUtils__default = ParsleyUtils__ParsleyUtils;

    // All these options could be overriden and specified directly in DOM using
    // `data-parsley-` default DOM-API
    // eg: `inputs` can be set in DOM using `data-parsley-inputs="input, textarea"`
    // eg: `data-parsley-stop-on-first-failing-constraint="false"`

    var ParsleyDefaults = {
        // ### General

        // Default data-namespace for DOM API
        namespace: 'data-parsley-',

        // Supported inputs by default
        inputs: 'input, textarea, select',

        // Excluded inputs by default
        excluded: 'input[type=button], input[type=submit], input[type=reset], input[type=hidden]',

        // Stop validating field on highest priority failing constraint
        priorityEnabled: true,

        // ### Field only

        // identifier used to group together inputs (e.g. radio buttons...)
        multiple: null,

        // identifier (or array of identifiers) used to validate only a select group of inputs
        group: null,

        // ### UI
        // Enable\Disable error messages
        uiEnabled: false,

        // Key events threshold before validation
        validationThreshold: 0,

        // Focused field on form validation error. 'first'|'last'|'none'
        focus: 'first',

        // event(s) that will trigger validation before first failure. eg: `input`...
        trigger: 'input',

        // event(s) that will trigger validation after first failure.
        triggerAfterFailure: "input",

        // Class that would be added on every failing validation Parsley field
        errorClass: 'c37-field-error',

        // Same for success validation
        successClass: 'c37-field-success',

        // Return the `$element` that will receive these above success or error classes
        // Could also be (and given directly from DOM) a valid selector like `'#div'`
        classHandler: function classHandler(ParsleyField) {},

        // Return the `$element` where errors will be appended
        // Could also be (and given directly from DOM) a valid selector like `'#div'`
        errorsContainer: function errorsContainer(ParsleyField) {},

        // ul elem that would receive errors' list
        errorsWrapper: '<ul class="parsley-errors-list"></ul>',

        // li elem that would receive error message
        errorTemplate: '<li></li>'
    };

    var ParsleyAbstract = function ParsleyAbstract() {
        this.__id__ = ParsleyUtils__default.generateID();
    };

    ParsleyAbstract.prototype = {
        asyncSupport: true, // Deprecated

        _pipeAccordingToValidationResult: function _pipeAccordingToValidationResult() {
            var _this = this;

            var pipe = function pipe() {
                var r = $.Deferred();
                if (true !== _this.validationResult) r.reject();
                return r.resolve().promise();
            };
            return [pipe, pipe];
        },

        actualizeOptions: function actualizeOptions() {
            ParsleyUtils__default.attr(this.$element, this.options.namespace, this.domOptions);
            if (this.parent && this.parent.actualizeOptions) this.parent.actualizeOptions();
            return this;
        },

        _resetOptions: function _resetOptions(initOptions) {
            this.domOptions = ParsleyUtils__default.objectCreate(this.parent.options);
            this.options = ParsleyUtils__default.objectCreate(this.domOptions);
            // Shallow copy of ownProperties of initOptions:
            for (var i in initOptions) {
                if (initOptions.hasOwnProperty(i)) this.options[i] = initOptions[i];
            }
            this.actualizeOptions();
        },

        _listeners: null,

        // Register a callback for the given event name
        // Callback is called with context as the first argument and the `this`
        // The context is the current parsley instance, or window.Parsley if global
        // A return value of `false` will interrupt the calls
        on: function on(name, fn) {
            this._listeners = this._listeners || {};
            var queue = this._listeners[name] = this._listeners[name] || [];
            queue.push(fn);

            return this;
        },

        // Deprecated. Use `on` instead
        subscribe: function subscribe(name, fn) {
            $.listenTo(this, name.toLowerCase(), fn);
        },

        // Unregister a callback (or all if none is given) for the given event name
        off: function off(name, fn) {
            var queue = this._listeners && this._listeners[name];
            if (queue) {
                if (!fn) {
                    delete this._listeners[name];
                } else {
                    for (var i = queue.length; i--;) if (queue[i] === fn) queue.splice(i, 1);
                }
            }
            return this;
        },

        // Deprecated. Use `off`
        unsubscribe: function unsubscribe(name, fn) {
            $.unsubscribeTo(this, name.toLowerCase());
        },

        // Trigger an event of the given name
        // A return value of `false` interrupts the callback chain
        // Returns false if execution was interrupted
        trigger: function trigger(name, target, extraArg) {
            target = target || this;
            var queue = this._listeners && this._listeners[name];
            var result;
            var parentResult;
            if (queue) {
                for (var i = queue.length; i--;) {
                    result = queue[i].call(target, target, extraArg);
                    if (result === false) return result;
                }
            }
            if (this.parent) {
                return this.parent.trigger(name, target, extraArg);
            }
            return true;
        },

        // Reset UI
        reset: function reset() {
            // Field case: just emit a reset event for UI
            if ('ParsleyForm' !== this.__class__) {
                this._resetUI();
                return this._trigger('reset');
            }

            // Form case: emit a reset event for each field
            for (var i = 0; i < this.fields.length; i++) this.fields[i].reset();

            this._trigger('reset');
        },

        // Destroy Parsley instance (+ UI)
        destroy: function destroy() {
            // Field case: emit destroy event to clean UI and then destroy stored instance
            this._destroyUI();
            if ('ParsleyForm' !== this.__class__) {
                this.$element.removeData('Parsley');
                this.$element.removeData('ParsleyFieldMultiple');
                this._trigger('destroy');

                return;
            }

            // Form case: destroy all its fields and then destroy stored instance
            for (var i = 0; i < this.fields.length; i++) this.fields[i].destroy();

            this.$element.removeData('Parsley');
            this._trigger('destroy');
        },

        asyncIsValid: function asyncIsValid(group, force) {
            ParsleyUtils__default.warnOnce("asyncIsValid is deprecated; please use whenValid instead");
            return this.whenValid({ group: group, force: force });
        },

        _findRelated: function _findRelated() {
            return this.options.multiple ? this.parent.$element.find('[' + this.options.namespace + 'multiple="' + this.options.multiple + '"]') : this.$element;
        }
    };

    var requirementConverters = {
        string: function string(_string) {
            return _string;
        },
        integer: function integer(string) {
            if (isNaN(string)) throw 'Requirement is not an integer: "' + string + '"';
            return parseInt(string, 10);
        },
        number: function number(string) {
            if (isNaN(string)) throw 'Requirement is not a number: "' + string + '"';
            return parseFloat(string);
        },
        reference: function reference(string) {
            // Unused for now
            var result = $(string);
            if (result.length === 0) throw 'No such reference: "' + string + '"';
            return result;
        },
        boolean: function boolean(string) {
            return string !== 'false';
        },
        object: function object(string) {
            return ParsleyUtils__default.deserializeValue(string);
        },
        regexp: function regexp(_regexp) {
            var flags = '';

            // Test if RegExp is literal, if not, nothing to be done, otherwise, we need to isolate flags and pattern
            if (/^\/.*\/(?:[gimy]*)$/.test(_regexp)) {
                // Replace the regexp literal string with the first match group: ([gimy]*)
                // If no flag is present, this will be a blank string
                flags = _regexp.replace(/.*\/([gimy]*)$/, '$1');
                // Again, replace the regexp literal string with the first match group:
                // everything excluding the opening and closing slashes and the flags
                _regexp = _regexp.replace(new RegExp('^/(.*?)/' + flags + '$'), '$1');
            } else {
                // Anchor regexp:
                _regexp = '^' + _regexp + '$';
            }
            return new RegExp(_regexp, flags);
        }
    };

    var convertArrayRequirement = function convertArrayRequirement(string, length) {
        var m = string.match(/^\s*\[(.*)\]\s*$/);
        if (!m) throw 'Requirement is not an array: "' + string + '"';
        var values = m[1].split(',').map(ParsleyUtils__default.trimString);
        if (values.length !== length) throw 'Requirement has ' + values.length + ' values when ' + length + ' are needed';
        return values;
    };

    var convertRequirement = function convertRequirement(requirementType, string) {
        var converter = requirementConverters[requirementType || 'string'];
        if (!converter) throw 'Unknown requirement specification: "' + requirementType + '"';
        return converter(string);
    };

    var convertExtraOptionRequirement = function convertExtraOptionRequirement(requirementSpec, string, extraOptionReader) {
        var main = null;
        var extra = {};
        for (var key in requirementSpec) {
            if (key) {
                var value = extraOptionReader(key);
                if ('string' === typeof value) value = convertRequirement(requirementSpec[key], value);
                extra[key] = value;
            } else {
                main = convertRequirement(requirementSpec[key], string);
            }
        }
        return [main, extra];
    };

    // A Validator needs to implement the methods `validate` and `parseRequirements`

    var ParsleyValidator = function ParsleyValidator(spec) {
        $.extend(true, this, spec);
    };

    ParsleyValidator.prototype = {
        // Returns `true` iff the given `value` is valid according the given requirements.
        validate: function validate(value, requirementFirstArg) {
            if (this.fn) {
                // Legacy style validator

                if (arguments.length > 3) // If more args then value, requirement, instance...
                    requirementFirstArg = [].slice.call(arguments, 1, -1); // Skip first arg (value) and last (instance), combining the rest
                return this.fn.call(this, value, requirementFirstArg);
            }

            if ($.isArray(value)) {
                if (!this.validateMultiple) throw 'Validator `' + this.name + '` does not handle multiple values';
                return this.validateMultiple.apply(this, arguments);
            } else {
                if (this.validateNumber) {
                    if (isNaN(value)) return false;
                    arguments[0] = parseFloat(arguments[0]);
                    return this.validateNumber.apply(this, arguments);
                }
                if (this.validateString) {
                    return this.validateString.apply(this, arguments);
                }
                throw 'Validator `' + this.name + '` only handles multiple values';
            }
        },

        // Parses `requirements` into an array of arguments,
        // according to `this.requirementType`
        parseRequirements: function parseRequirements(requirements, extraOptionReader) {
            if ('string' !== typeof requirements) {
                // Assume requirement already parsed
                // but make sure we return an array
                return $.isArray(requirements) ? requirements : [requirements];
            }
            var type = this.requirementType;
            if ($.isArray(type)) {
                var values = convertArrayRequirement(requirements, type.length);
                for (var i = 0; i < values.length; i++) values[i] = convertRequirement(type[i], values[i]);
                return values;
            } else if ($.isPlainObject(type)) {
                return convertExtraOptionRequirement(type, requirements, extraOptionReader);
            } else {
                return [convertRequirement(type, requirements)];
            }
        },
        // Defaults:
        requirementType: 'string',

        priority: 2

    };

    var ParsleyValidatorRegistry = function ParsleyValidatorRegistry(validators, catalog) {
        this.__class__ = 'ParsleyValidatorRegistry';

        // Default Parsley locale is en
        this.locale = 'en';

        this.init(validators || {}, catalog || {});
    };

    var typeRegexes = {
        email: /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i,

        // Follow https://www.w3.org/TR/html5/infrastructure.html#floating-point-numbers
        number: /^-?(\d*\.)?\d+(e[-+]?\d+)?$/i,

        integer: /^-?\d+$/,

        digits: /^\d+$/,

        alphanum: /^\w+$/i,

        url: new RegExp("^" +
                // protocol identifier
            "(?:(?:https?|ftp)://)?" + // ** mod: make scheme optional
                // user:pass authentication
            "(?:\\S+(?::\\S*)?@)?" + "(?:" +
                // IP address exclusion
                // private & local networks
                // "(?!(?:10|127)(?:\\.\\d{1,3}){3})" +   // ** mod: allow local networks
                // "(?!(?:169\\.254|192\\.168)(?:\\.\\d{1,3}){2})" +  // ** mod: allow local networks
                // "(?!172\\.(?:1[6-9]|2\\d|3[0-1])(?:\\.\\d{1,3}){2})" +  // ** mod: allow local networks
                // IP address dotted notation octets
                // excludes loopback network 0.0.0.0
                // excludes reserved space >= 224.0.0.0
                // excludes network & broacast addresses
                // (first & last IP address of each class)
            "(?:[1-9]\\d?|1\\d\\d|2[01]\\d|22[0-3])" + "(?:\\.(?:1?\\d{1,2}|2[0-4]\\d|25[0-5])){2}" + "(?:\\.(?:[1-9]\\d?|1\\d\\d|2[0-4]\\d|25[0-4]))" + "|" +
                // host name
            '(?:(?:[a-z\\u00a1-\\uffff0-9]-*)*[a-z\\u00a1-\\uffff0-9]+)' +
                // domain name
            '(?:\\.(?:[a-z\\u00a1-\\uffff0-9]-*)*[a-z\\u00a1-\\uffff0-9]+)*' +
                // TLD identifier
            '(?:\\.(?:[a-z\\u00a1-\\uffff]{2,}))' + ")" +
                // port number
            "(?::\\d{2,5})?" +
                // resource path
            "(?:/\\S*)?" + "$", 'i')
    };
    typeRegexes.range = typeRegexes.number;

    // See http://stackoverflow.com/a/10454560/8279
    var decimalPlaces = function decimalPlaces(num) {
        var match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
        if (!match) {
            return 0;
        }
        return Math.max(0,
            // Number of digits right of decimal point.
            (match[1] ? match[1].length : 0) - (
                // Adjust for scientific notation.
                match[2] ? +match[2] : 0));
    };

    ParsleyValidatorRegistry.prototype = {
        init: function init(validators, catalog) {
            this.catalog = catalog;
            // Copy prototype's validators:
            this.validators = $.extend({}, this.validators);

            for (var name in validators) this.addValidator(name, validators[name].fn, validators[name].priority);

            window.Parsley.trigger('parsley:validator:init');
        },

        // Set new messages locale if we have dictionary loaded in ParsleyConfig.i18n
        setLocale: function setLocale(locale) {
            if ('undefined' === typeof this.catalog[locale]) throw new Error(locale + ' is not available in the catalog');

            this.locale = locale;

            return this;
        },

        // Add a new messages catalog for a given locale. Set locale for this catalog if set === `true`
        addCatalog: function addCatalog(locale, messages, set) {
            if ('object' === typeof messages) this.catalog[locale] = messages;

            if (true === set) return this.setLocale(locale);

            return this;
        },

        // Add a specific message for a given constraint in a given locale
        addMessage: function addMessage(locale, name, message) {
            if ('undefined' === typeof this.catalog[locale]) this.catalog[locale] = {};

            this.catalog[locale][name] = message;

            return this;
        },

        // Add messages for a given locale
        addMessages: function addMessages(locale, nameMessageObject) {
            for (var name in nameMessageObject) this.addMessage(locale, name, nameMessageObject[name]);

            return this;
        },

        // Add a new validator
        //
        //    addValidator('custom', {
        //        requirementType: ['integer', 'integer'],
        //        validateString: function(value, from, to) {},
        //        priority: 22,
        //        messages: {
        //          en: "Hey, that's no good",
        //          fr: "Aye aye, pas bon du tout",
        //        }
        //    })
        //
        // Old API was addValidator(name, function, priority)
        //
        addValidator: function addValidator(name, arg1, arg2) {
            if (this.validators[name]) ParsleyUtils__default.warn('Validator "' + name + '" is already defined.');else if (ParsleyDefaults.hasOwnProperty(name)) {
                ParsleyUtils__default.warn('"' + name + '" is a restricted keyword and is not a valid validator name.');
                return;
            }
            return this._setValidator.apply(this, arguments);
        },

        updateValidator: function updateValidator(name, arg1, arg2) {
            if (!this.validators[name]) {
                ParsleyUtils__default.warn('Validator "' + name + '" is not already defined.');
                return this.addValidator.apply(this, arguments);
            }
            return this._setValidator.apply(this, arguments);
        },

        removeValidator: function removeValidator(name) {
            if (!this.validators[name]) ParsleyUtils__default.warn('Validator "' + name + '" is not defined.');

            delete this.validators[name];

            return this;
        },

        _setValidator: function _setValidator(name, validator, priority) {
            if ('object' !== typeof validator) {
                // Old style validator, with `fn` and `priority`
                validator = {
                    fn: validator,
                    priority: priority
                };
            }
            if (!validator.validate) {
                validator = new ParsleyValidator(validator);
            }
            this.validators[name] = validator;

            for (var locale in validator.messages || {}) this.addMessage(locale, name, validator.messages[locale]);

            return this;
        },

        getErrorMessage: function getErrorMessage(constraint) {
            var message;

            // Type constraints are a bit different, we have to match their requirements too to find right error message
            if ('type' === constraint.name) {
                var typeMessages = this.catalog[this.locale][constraint.name] || {};
                message = typeMessages[constraint.requirements];
            } else message = this.formatMessage(this.catalog[this.locale][constraint.name], constraint.requirements);

            return message || this.catalog[this.locale].defaultMessage || this.catalog.en.defaultMessage;
        },

        // Kind of light `sprintf()` implementation
        formatMessage: function formatMessage(string, parameters) {
            if ('object' === typeof parameters) {
                for (var i in parameters) string = this.formatMessage(string, parameters[i]);

                return string;
            }

            return 'string' === typeof string ? string.replace(/%s/i, parameters) : '';
        },

        // Here is the Parsley default validators list.
        // A validator is an object with the following key values:
        //  - priority: an integer
        //  - requirement: 'string' (default), 'integer', 'number', 'regexp' or an Array of these
        //  - validateString, validateMultiple, validateNumber: functions returning `true`, `false` or a promise
        // Alternatively, a validator can be a function that returns such an object
        //
        validators: {
            notblank: {
                validateString: function validateString(value) {
                    return (/\S/.test(value)
                    );
                },
                priority: 2
            },
            required: {
                validateMultiple: function validateMultiple(values) {
                    return values.length > 0;
                },
                validateString: function validateString(value) {
                    return (/\S/.test(value)
                    );
                },
                priority: 512
            },
            type: {
                validateString: function validateString(value, type) {
                    var _ref = arguments.length <= 2 || arguments[2] === undefined ? {} : arguments[2];

                    var _ref$step = _ref.step;
                    var step = _ref$step === undefined ? '1' : _ref$step;
                    var _ref$base = _ref.base;
                    var base = _ref$base === undefined ? 0 : _ref$base;

                    var regex = typeRegexes[type];
                    if (!regex) {
                        throw new Error('validator type `' + type + '` is not supported');
                    }
                    if (!regex.test(value)) return false;
                    if ('number' === type) {
                        if (!/^any$/i.test(step || '')) {
                            var nb = Number(value);
                            var decimals = Math.max(decimalPlaces(step), decimalPlaces(base));
                            if (decimalPlaces(nb) > decimals) // Value can't have too many decimals
                                return false;
                            // Be careful of rounding errors by using integers.
                            var toInt = function toInt(f) {
                                return Math.round(f * Math.pow(10, decimals));
                            };
                            if ((toInt(nb) - toInt(base)) % toInt(step) != 0) return false;
                        }
                    }
                    return true;
                },
                requirementType: {
                    '': 'string',
                    step: 'string',
                    base: 'number'
                },
                priority: 256
            },
            pattern: {
                validateString: function validateString(value, regexp) {
                    return regexp.test(value);
                },
                requirementType: 'regexp',
                priority: 64
            },
            minlength: {
                validateString: function validateString(value, requirement) {
                    return value.length >= requirement;
                },
                requirementType: 'integer',
                priority: 30
            },
            maxlength: {
                validateString: function validateString(value, requirement) {
                    return value.length <= requirement;
                },
                requirementType: 'integer',
                priority: 30
            },
            length: {
                validateString: function validateString(value, min, max) {
                    return value.length >= min && value.length <= max;
                },
                requirementType: ['integer', 'integer'],
                priority: 30
            },
            mincheck: {
                validateMultiple: function validateMultiple(values, requirement) {
                    return values.length >= requirement;
                },
                requirementType: 'integer',
                priority: 30
            },
            maxcheck: {
                validateMultiple: function validateMultiple(values, requirement) {
                    return values.length <= requirement;
                },
                requirementType: 'integer',
                priority: 30
            },
            check: {
                validateMultiple: function validateMultiple(values, min, max) {
                    return values.length >= min && values.length <= max;
                },
                requirementType: ['integer', 'integer'],
                priority: 30
            },
            min: {
                validateNumber: function validateNumber(value, requirement) {
                    return value >= requirement;
                },
                requirementType: 'number',
                priority: 30
            },
            max: {
                validateNumber: function validateNumber(value, requirement) {
                    return value <= requirement;
                },
                requirementType: 'number',
                priority: 30
            },
            range: {
                validateNumber: function validateNumber(value, min, max) {
                    return value >= min && value <= max;
                },
                requirementType: ['number', 'number'],
                priority: 30
            },
            equalto: {
                validateString: function validateString(value, refOrValue) {
                    var $reference = $(refOrValue);
                    if ($reference.length) return value === $reference.val();else return value === refOrValue;
                },
                priority: 256
            }
        }
    };

    var ParsleyUI = {};

    var diffResults = function diffResults(newResult, oldResult, deep) {
        var added = [];
        var kept = [];

        for (var i = 0; i < newResult.length; i++) {
            var found = false;

            for (var j = 0; j < oldResult.length; j++) if (newResult[i].assert.name === oldResult[j].assert.name) {
                found = true;
                break;
            }

            if (found) kept.push(newResult[i]);else added.push(newResult[i]);
        }

        return {
            kept: kept,
            added: added,
            removed: !deep ? diffResults(oldResult, newResult, true).added : []
        };
    };

    ParsleyUI.Form = {

        _actualizeTriggers: function _actualizeTriggers() {
            var _this2 = this;

            this.$element.on('submit.Parsley', function (evt) {
                _this2.onSubmitValidate(evt);
            });
            this.$element.on('click.Parsley', ParsleyUtils__default._SubmitSelector, function (evt) {
                _this2.onSubmitButton(evt);
            });

            // UI could be disabled
            if (false === this.options.uiEnabled) return;

            this.$element.attr('novalidate', '');
        },

        focus: function focus() {
            this._focusedField = null;

            if (true === this.validationResult || 'none' === this.options.focus) return null;

            for (var i = 0; i < this.fields.length; i++) {
                var field = this.fields[i];
                if (true !== field.validationResult && field.validationResult.length > 0 && 'undefined' === typeof field.options.noFocus) {
                    this._focusedField = field.$element;
                    if ('first' === this.options.focus) break;
                }
            }

            if (null === this._focusedField) return null;

            return this._focusedField.focus();
        },

        _destroyUI: function _destroyUI() {
            // Reset all event listeners
            this.$element.off('.Parsley');
        }

    };

    ParsleyUI.Field = {

        _reflowUI: function _reflowUI() {
            this._buildUI();

            // If this field doesn't have an active UI don't bother doing something
            if (!this._ui) return;

            // Diff between two validation results
            var diff = diffResults(this.validationResult, this._ui.lastValidationResult);

            // Then store current validation result for next reflow
            this._ui.lastValidationResult = this.validationResult;

            // Handle valid / invalid / none field class
            this._manageStatusClass();

            // Add, remove, updated errors messages
            this._manageErrorsMessages(diff);

            // Triggers impl
            this._actualizeTriggers();

            // If field is not valid for the first time, bind keyup trigger to ease UX and quickly inform user
            if ((diff.kept.length || diff.added.length) && !this._failedOnce) {
                this._failedOnce = true;
                this._actualizeTriggers();
            }
        },

        // Returns an array of field's error message(s)
        getErrorsMessages: function getErrorsMessages() {
            // No error message, field is valid
            if (true === this.validationResult) return [];

            var messages = [];

            for (var i = 0; i < this.validationResult.length; i++) messages.push(this.validationResult[i].errorMessage || this._getErrorMessage(this.validationResult[i].assert));

            return messages;
        },

        // It's a goal of Parsley that this method is no longer required [#1073]
        addError: function addError(name) {
            var _ref2 = arguments.length <= 1 || arguments[1] === undefined ? {} : arguments[1];

            var message = _ref2.message;
            var assert = _ref2.assert;
            var _ref2$updateClass = _ref2.updateClass;
            var updateClass = _ref2$updateClass === undefined ? true : _ref2$updateClass;

            this._buildUI();
            this._addError(name, { message: message, assert: assert });

            if (updateClass) this._errorClass();
        },

        // It's a goal of Parsley that this method is no longer required [#1073]
        updateError: function updateError(name) {
            var _ref3 = arguments.length <= 1 || arguments[1] === undefined ? {} : arguments[1];

            var message = _ref3.message;
            var assert = _ref3.assert;
            var _ref3$updateClass = _ref3.updateClass;
            var updateClass = _ref3$updateClass === undefined ? true : _ref3$updateClass;

            this._buildUI();
            this._updateError(name, { message: message, assert: assert });

            if (updateClass) this._errorClass();
        },

        // It's a goal of Parsley that this method is no longer required [#1073]
        removeError: function removeError(name) {
            var _ref4 = arguments.length <= 1 || arguments[1] === undefined ? {} : arguments[1];

            var _ref4$updateClass = _ref4.updateClass;
            var updateClass = _ref4$updateClass === undefined ? true : _ref4$updateClass;

            this._buildUI();
            this._removeError(name);

            // edge case possible here: remove a standard Parsley error that is still failing in this.validationResult
            // but highly improbable cuz' manually removing a well Parsley handled error makes no sense.
            if (updateClass) this._manageStatusClass();
        },

        _manageStatusClass: function _manageStatusClass() {
            if (this.hasConstraints() && this.needsValidation() && true === this.validationResult) this._successClass();else if (this.validationResult.length > 0) this._errorClass();else this._resetClass();
        },

        _manageErrorsMessages: function _manageErrorsMessages(diff) {
            if ('undefined' !== typeof this.options.errorsMessagesDisabled) return;

            // Case where we have errorMessage option that configure an unique field error message, regardless failing validators
            if ('undefined' !== typeof this.options.errorMessage) {
                if (diff.added.length || diff.kept.length) {
                    this._insertErrorWrapper();

                    if (0 === this._ui.$errorsWrapper.find('.parsley-custom-error-message').length) this._ui.$errorsWrapper.append($(this.options.errorTemplate).addClass('parsley-custom-error-message'));

                    return this._ui.$errorsWrapper.addClass('filled').find('.parsley-custom-error-message').html(this.options.errorMessage);
                }

                return this._ui.$errorsWrapper.removeClass('filled').find('.parsley-custom-error-message').remove();
            }

            // Show, hide, update failing constraints messages
            for (var i = 0; i < diff.removed.length; i++) this._removeError(diff.removed[i].assert.name);

            for (i = 0; i < diff.added.length; i++) this._addError(diff.added[i].assert.name, { message: diff.added[i].errorMessage, assert: diff.added[i].assert });

            for (i = 0; i < diff.kept.length; i++) this._updateError(diff.kept[i].assert.name, { message: diff.kept[i].errorMessage, assert: diff.kept[i].assert });
        },

        _addError: function _addError(name, _ref5) {
            var message = _ref5.message;
            var assert = _ref5.assert;

            this._insertErrorWrapper();
            this._ui.$errorsWrapper.addClass('filled').append($(this.options.errorTemplate).addClass('parsley-' + name).html(message || this._getErrorMessage(assert)));
        },

        _updateError: function _updateError(name, _ref6) {
            var message = _ref6.message;
            var assert = _ref6.assert;

            this._ui.$errorsWrapper.addClass('filled').find('.parsley-' + name).html(message || this._getErrorMessage(assert));
        },

        _removeError: function _removeError(name) {
            this._ui.$errorsWrapper.removeClass('filled').find('.parsley-' + name).remove();
        },

        _getErrorMessage: function _getErrorMessage(constraint) {
            var customConstraintErrorMessage = constraint.name + 'Message';

            if ('undefined' !== typeof this.options[customConstraintErrorMessage]) return window.Parsley.formatMessage(this.options[customConstraintErrorMessage], constraint.requirements);

            return window.Parsley.getErrorMessage(constraint);
        },

        _buildUI: function _buildUI() {
            // UI could be already built or disabled
            if (this._ui || false === this.options.uiEnabled) return;

            var _ui = {};

            // Give field its Parsley id in DOM
            this.$element.attr(this.options.namespace + 'id', this.__id__);

            /** Generate important UI elements and store them in this **/
                // $errorClassHandler is the $element that woul have parsley-error and parsley-success classes
            _ui.$errorClassHandler = this._manageClassHandler();

            // $errorsWrapper is a div that would contain the various field errors, it will be appended into $errorsContainer
            _ui.errorsWrapperId = 'parsley-id-' + (this.options.multiple ? 'multiple-' + this.options.multiple : this.__id__);
            _ui.$errorsWrapper = $(this.options.errorsWrapper).attr('id', _ui.errorsWrapperId);

            // ValidationResult UI storage to detect what have changed bwt two validations, and update DOM accordingly
            _ui.lastValidationResult = [];
            _ui.validationInformationVisible = false;

            // Store it in this for later
            this._ui = _ui;
        },

        // Determine which element will have `parsley-error` and `parsley-success` classes
        _manageClassHandler: function _manageClassHandler() {
            // An element selector could be passed through DOM with `data-parsley-class-handler=#foo`
            if ('string' === typeof this.options.classHandler && $(this.options.classHandler).length) return $(this.options.classHandler);

            // Class handled could also be determined by function given in Parsley options
            var $handler = this.options.classHandler.call(this, this);

            // If this function returned a valid existing DOM element, go for it
            if ('undefined' !== typeof $handler && $handler.length) return $handler;

            return this._inputHolder();
        },

        _inputHolder: function _inputHolder() {
            // if simple element (input, texatrea, select...) it will perfectly host the classes and precede the error container
            if (!this.options.multiple || this.$element.is('select')) return this.$element;

            // But if multiple element (radio, checkbox), that would be their parent
            return this.$element.parent();
        },

        _insertErrorWrapper: function _insertErrorWrapper() {
            var $errorsContainer;

            // Nothing to do if already inserted
            if (0 !== this._ui.$errorsWrapper.parent().length) return this._ui.$errorsWrapper.parent();

            if ('string' === typeof this.options.errorsContainer) {
                if ($(this.options.errorsContainer).length) return $(this.options.errorsContainer).append(this._ui.$errorsWrapper);else ParsleyUtils__default.warn('The errors container `' + this.options.errorsContainer + '` does not exist in DOM');
            } else if ('function' === typeof this.options.errorsContainer) $errorsContainer = this.options.errorsContainer.call(this, this);

            if ('undefined' !== typeof $errorsContainer && $errorsContainer.length) return $errorsContainer.append(this._ui.$errorsWrapper);

            return this._inputHolder().after(this._ui.$errorsWrapper);
        },

        _actualizeTriggers: function _actualizeTriggers() {
            var _this3 = this;

            var $toBind = this._findRelated();
            var trigger;

            // Remove Parsley events already bound on this field
            $toBind.off('.Parsley');
            if (this._failedOnce) $toBind.on(ParsleyUtils__default.namespaceEvents(this.options.triggerAfterFailure, 'Parsley'), function () {
                _this3.validate();
            });else if (trigger = ParsleyUtils__default.namespaceEvents(this.options.trigger, 'Parsley')) {
                $toBind.on(trigger, function (event) {
                    _this3._eventValidate(event);
                });
            }
        },

        _eventValidate: function _eventValidate(event) {
            // For keyup, keypress, keydown, input... events that could be a little bit obstrusive
            // do not validate if val length < min threshold on first validation. Once field have been validated once and info
            // about success or failure have been displayed, always validate with this trigger to reflect every yalidation change.
            if (/key|input/.test(event.type)) if (!(this._ui && this._ui.validationInformationVisible) && this.getValue().length <= this.options.validationThreshold) return;

            this.validate();
        },

        _resetUI: function _resetUI() {
            // Reset all event listeners
            this._failedOnce = false;
            this._actualizeTriggers();

            // Nothing to do if UI never initialized for this field
            if ('undefined' === typeof this._ui) return;

            // Reset all errors' li
            this._ui.$errorsWrapper.removeClass('filled').children().remove();

            // Reset validation class
            this._resetClass();

            // Reset validation flags and last validation result
            this._ui.lastValidationResult = [];
            this._ui.validationInformationVisible = false;
        },

        _destroyUI: function _destroyUI() {
            this._resetUI();

            if ('undefined' !== typeof this._ui) this._ui.$errorsWrapper.remove();

            delete this._ui;
        },

        _successClass: function _successClass() {
            this._ui.validationInformationVisible = true;
            this._ui.$errorClassHandler.removeClass(this.options.errorClass).addClass(this.options.successClass);
        },
        _errorClass: function _errorClass() {
            this._ui.validationInformationVisible = true;
            this._ui.$errorClassHandler.removeClass(this.options.successClass).addClass(this.options.errorClass);
        },
        _resetClass: function _resetClass() {
            this._ui.$errorClassHandler.removeClass(this.options.successClass).removeClass(this.options.errorClass);
        }
    };

    var ParsleyForm = function ParsleyForm(element, domOptions, options) {
        this.__class__ = 'ParsleyForm';

        this.$element = $(element);
        this.domOptions = domOptions;
        this.options = options;
        this.parent = window.Parsley;

        this.fields = [];
        this.validationResult = null;
    };

    var ParsleyForm__statusMapping = { pending: null, resolved: true, rejected: false };

    ParsleyForm.prototype = {
        onSubmitValidate: function onSubmitValidate(event) {
            var _this4 = this;

            // This is a Parsley generated submit event, do not validate, do not prevent, simply exit and keep normal behavior
            if (true === event.parsley) return;

            // If we didn't come here through a submit button, use the first one in the form
            var $submitSource = this._$submitSource || this.$element.find(ParsleyUtils__default._SubmitSelector).first();
            this._$submitSource = null;
            this.$element.find('.parsley-synthetic-submit-button').prop('disabled', true);
            if ($submitSource.is('[formnovalidate]')) return;

            var promise = this.whenValidate({ event: event });

            if ('resolved' === promise.state() && false !== this._trigger('submit')) {
                // All good, let event go through. We make this distinction because browsers
                // differ in their handling of `submit` being called from inside a submit event [#1047]
            } else {
                // Rejected or pending: cancel this submit
                event.stopImmediatePropagation();
                event.preventDefault();
                if ('pending' === promise.state()) promise.done(function () {
                    _this4._submit($submitSource);
                });
            }
        },

        onSubmitButton: function onSubmitButton(event) {
            this._$submitSource = $(event.currentTarget);
        },
        // internal
        // _submit submits the form, this time without going through the validations.
        // Care must be taken to "fake" the actual submit button being clicked.
        _submit: function _submit($submitSource) {
            if (false === this._trigger('submit')) return;
            // Add submit button's data
            if ($submitSource) {
                var $synthetic = this.$element.find('.parsley-synthetic-submit-button').prop('disabled', false);
                if (0 === $synthetic.length) $synthetic = $('<input class="parsley-synthetic-submit-button" type="hidden">').appendTo(this.$element);
                $synthetic.attr({
                    name: $submitSource.attr('name'),
                    value: $submitSource.attr('value')
                });
            }

            this.$element.trigger($.extend($.Event('submit'), { parsley: true }));
        },

        // Performs validation on fields while triggering events.
        // @returns `true` if all validations succeeds, `false`
        // if a failure is immediately detected, or `null`
        // if dependant on a promise.
        // Consider using `whenValidate` instead.
        validate: function validate(options) {
            if (arguments.length >= 1 && !$.isPlainObject(options)) {
                ParsleyUtils__default.warnOnce('Calling validate on a parsley form without passing arguments as an object is deprecated.');

                var _arguments = _slice.call(arguments);

                var group = _arguments[0];
                var force = _arguments[1];
                var event = _arguments[2];

                options = { group: group, force: force, event: event };
            }
            return ParsleyForm__statusMapping[this.whenValidate(options).state()];
        },

        whenValidate: function whenValidate() {
            var _ParsleyUtils__default$all$done$fail$always,
                _this5 = this;

            var _ref7 = arguments.length <= 0 || arguments[0] === undefined ? {} : arguments[0];

            var group = _ref7.group;
            var force = _ref7.force;
            var event = _ref7.event;

            this.submitEvent = event;
            if (event) {
                this.submitEvent = $.extend({}, event, { preventDefault: function preventDefault() {
                    ParsleyUtils__default.warnOnce("Using `this.submitEvent.preventDefault()` is deprecated; instead, call `this.validationResult = false`");
                    _this5.validationResult = false;
                } });
            }
            this.validationResult = true;

            // fire validate event to eventually modify things before every validation
            this._trigger('validate');

            // Refresh form DOM options and form's fields that could have changed
            this._refreshFields();

            var promises = this._withoutReactualizingFormOptions(function () {
                return $.map(_this5.fields, function (field) {
                    return field.whenValidate({ force: force, group: group });
                });
            });

            return (_ParsleyUtils__default$all$done$fail$always = ParsleyUtils__default.all(promises).done(function () {
                _this5._trigger('success');
            }).fail(function () {
                _this5.validationResult = false;
                _this5.focus();
                _this5._trigger('error');
            }).always(function () {
                _this5._trigger('validated');
            })).pipe.apply(_ParsleyUtils__default$all$done$fail$always, _toConsumableArray(this._pipeAccordingToValidationResult()));
        },

        // Iterate over refreshed fields, and stop on first failure.
        // Returns `true` if all fields are valid, `false` if a failure is detected
        // or `null` if the result depends on an unresolved promise.
        // Prefer using `whenValid` instead.
        isValid: function isValid(options) {
            if (arguments.length >= 1 && !$.isPlainObject(options)) {
                ParsleyUtils__default.warnOnce('Calling isValid on a parsley form without passing arguments as an object is deprecated.');

                var _arguments2 = _slice.call(arguments);

                var group = _arguments2[0];
                var force = _arguments2[1];

                options = { group: group, force: force };
            }
            return ParsleyForm__statusMapping[this.whenValid(options).state()];
        },

        // Iterate over refreshed fields and validate them.
        // Returns a promise.
        // A validation that immediately fails will interrupt the validations.
        whenValid: function whenValid() {
            var _this6 = this;

            var _ref8 = arguments.length <= 0 || arguments[0] === undefined ? {} : arguments[0];

            var group = _ref8.group;
            var force = _ref8.force;

            this._refreshFields();

            var promises = this._withoutReactualizingFormOptions(function () {
                return $.map(_this6.fields, function (field) {
                    return field.whenValid({ group: group, force: force });
                });
            });
            return ParsleyUtils__default.all(promises);
        },

        _refreshFields: function _refreshFields() {
            return this.actualizeOptions()._bindFields();
        },

        _bindFields: function _bindFields() {
            var _this7 = this;

            var oldFields = this.fields;

            this.fields = [];
            this.fieldsMappedById = {};

            this._withoutReactualizingFormOptions(function () {
                _this7.$element.find(_this7.options.inputs).not(_this7.options.excluded).each(function (_, element) {
                    var fieldInstance = new window.Parsley.Factory(element, {}, _this7);

                    // Only add valid and not excluded `ParsleyField` and `ParsleyFieldMultiple` children
                    if (('ParsleyField' === fieldInstance.__class__ || 'ParsleyFieldMultiple' === fieldInstance.__class__) && true !== fieldInstance.options.excluded) if ('undefined' === typeof _this7.fieldsMappedById[fieldInstance.__class__ + '-' + fieldInstance.__id__]) {
                        _this7.fieldsMappedById[fieldInstance.__class__ + '-' + fieldInstance.__id__] = fieldInstance;
                        _this7.fields.push(fieldInstance);
                    }
                });

                $.each(ParsleyUtils__default.difference(oldFields, _this7.fields), function (_, field) {
                    field._trigger('reset');
                });
            });
            return this;
        },

        // Internal only.
        // Looping on a form's fields to do validation or similar
        // will trigger reactualizing options on all of them, which
        // in turn will reactualize the form's options.
        // To avoid calling actualizeOptions so many times on the form
        // for nothing, _withoutReactualizingFormOptions temporarily disables
        // the method actualizeOptions on this form while `fn` is called.
        _withoutReactualizingFormOptions: function _withoutReactualizingFormOptions(fn) {
            var oldActualizeOptions = this.actualizeOptions;
            this.actualizeOptions = function () {
                return this;
            };
            var result = fn();
            this.actualizeOptions = oldActualizeOptions;
            return result;
        },

        // Internal only.
        // Shortcut to trigger an event
        // Returns true iff event is not interrupted and default not prevented.
        _trigger: function _trigger(eventName) {
            return this.trigger('form:' + eventName);
        }

    };

    var ConstraintFactory = function ConstraintFactory(parsleyField, name, requirements, priority, isDomConstraint) {
        if (!/ParsleyField/.test(parsleyField.__class__)) throw new Error('ParsleyField or ParsleyFieldMultiple instance expected');

        var validatorSpec = window.Parsley._validatorRegistry.validators[name];
        var validator = new ParsleyValidator(validatorSpec);

        $.extend(this, {
            validator: validator,
            name: name,
            requirements: requirements,
            priority: priority || parsleyField.options[name + 'Priority'] || validator.priority,
            isDomConstraint: true === isDomConstraint
        });
        this._parseRequirements(parsleyField.options);
    };

    var capitalize = function capitalize(str) {
        var cap = str[0].toUpperCase();
        return cap + str.slice(1);
    };

    ConstraintFactory.prototype = {
        validate: function validate(value, instance) {
            var _validator;

            return (_validator = this.validator).validate.apply(_validator, [value].concat(_toConsumableArray(this.requirementList), [instance]));
        },

        _parseRequirements: function _parseRequirements(options) {
            var _this8 = this;

            this.requirementList = this.validator.parseRequirements(this.requirements, function (key) {
                return options[_this8.name + capitalize(key)];
            });
        }
    };

    var ParsleyField = function ParsleyField(field, domOptions, options, parsleyFormInstance) {
        this.__class__ = 'ParsleyField';

        this.$element = $(field);

        // Set parent if we have one
        if ('undefined' !== typeof parsleyFormInstance) {
            this.parent = parsleyFormInstance;
        }

        this.options = options;
        this.domOptions = domOptions;

        // Initialize some properties
        this.constraints = [];
        this.constraintsByName = {};
        this.validationResult = true;

        // Bind constraints
        this._bindConstraints();
    };

    var parsley_field__statusMapping = { pending: null, resolved: true, rejected: false };

    ParsleyField.prototype = {
        // # Public API
        // Validate field and trigger some events for mainly `ParsleyUI`
        // @returns `true`, an array of the validators that failed, or
        // `null` if validation is not finished. Prefer using whenValidate
        validate: function validate(options) {
            if (arguments.length >= 1 && !$.isPlainObject(options)) {
                ParsleyUtils__default.warnOnce('Calling validate on a parsley field without passing arguments as an object is deprecated.');
                options = { options: options };
            }
            var promise = this.whenValidate(options);
            if (!promise) // If excluded with `group` option
                return true;
            switch (promise.state()) {
                case 'pending':
                    return null;
                case 'resolved':
                    return true;
                case 'rejected':
                    return this.validationResult;
            }
        },

        // Validate field and trigger some events for mainly `ParsleyUI`
        // @returns a promise that succeeds only when all validations do
        // or `undefined` if field is not in the given `group`.
        whenValidate: function whenValidate() {
            var _whenValid$always$done$fail$always,
                _this9 = this;

            var _ref9 = arguments.length <= 0 || arguments[0] === undefined ? {} : arguments[0];

            var force = _ref9.force;
            var group = _ref9.group;

            // do not validate a field if not the same as given validation group
            this.refreshConstraints();
            if (group && !this._isInGroup(group)) return;

            this.value = this.getValue();

            // Field Validate event. `this.value` could be altered for custom needs
            this._trigger('validate');

            return (_whenValid$always$done$fail$always = this.whenValid({ force: force, value: this.value, _refreshed: true }).always(function () {
                _this9._reflowUI();
            }).done(function () {
                _this9._trigger('success');
            }).fail(function () {
                _this9._trigger('error');
            }).always(function () {
                _this9._trigger('validated');
            })).pipe.apply(_whenValid$always$done$fail$always, _toConsumableArray(this._pipeAccordingToValidationResult()));
        },

        hasConstraints: function hasConstraints() {
            return 0 !== this.constraints.length;
        },

        // An empty optional field does not need validation
        needsValidation: function needsValidation(value) {
            if ('undefined' === typeof value) value = this.getValue();

            // If a field is empty and not required, it is valid
            // Except if `data-parsley-validate-if-empty` explicitely added, useful for some custom validators
            if (!value.length && !this._isRequired() && 'undefined' === typeof this.options.validateIfEmpty) return false;

            return true;
        },

        _isInGroup: function _isInGroup(group) {
            if ($.isArray(this.options.group)) return -1 !== $.inArray(group, this.options.group);
            return this.options.group === group;
        },

        // Just validate field. Do not trigger any event.
        // Returns `true` iff all constraints pass, `false` if there are failures,
        // or `null` if the result can not be determined yet (depends on a promise)
        // See also `whenValid`.
        isValid: function isValid(options) {
            if (arguments.length >= 1 && !$.isPlainObject(options)) {
                ParsleyUtils__default.warnOnce('Calling isValid on a parsley field without passing arguments as an object is deprecated.');

                var _arguments3 = _slice.call(arguments);

                var force = _arguments3[0];
                var value = _arguments3[1];

                options = { force: force, value: value };
            }
            var promise = this.whenValid(options);
            if (!promise) // Excluded via `group`
                return true;
            return parsley_field__statusMapping[promise.state()];
        },

        // Just validate field. Do not trigger any event.
        // @returns a promise that succeeds only when all validations do
        // or `undefined` if the field is not in the given `group`.
        // The argument `force` will force validation of empty fields.
        // If a `value` is given, it will be validated instead of the value of the input.
        whenValid: function whenValid() {
            var _this10 = this;

            var _ref10 = arguments.length <= 0 || arguments[0] === undefined ? {} : arguments[0];

            var _ref10$force = _ref10.force;
            var force = _ref10$force === undefined ? false : _ref10$force;
            var value = _ref10.value;
            var group = _ref10.group;
            var _refreshed = _ref10._refreshed;

            // Recompute options and rebind constraints to have latest changes
            if (!_refreshed) this.refreshConstraints();
            // do not validate a field if not the same as given validation group
            if (group && !this._isInGroup(group)) return;

            this.validationResult = true;

            // A field without constraint is valid
            if (!this.hasConstraints()) return $.when();

            // Value could be passed as argument, needed to add more power to 'field:validate'
            if ('undefined' === typeof value || null === value) value = this.getValue();

            if (!this.needsValidation(value) && true !== force) return $.when();

            var groupedConstraints = this._getGroupedConstraints();
            var promises = [];
            $.each(groupedConstraints, function (_, constraints) {
                // Process one group of constraints at a time, we validate the constraints
                // and combine the promises together.
                var promise = ParsleyUtils__default.all($.map(constraints, function (constraint) {
                    return _this10._validateConstraint(value, constraint);
                }));
                promises.push(promise);
                if (promise.state() === 'rejected') return false; // Interrupt processing if a group has already failed
            });
            return ParsleyUtils__default.all(promises);
        },

        // @returns a promise
        _validateConstraint: function _validateConstraint(value, constraint) {
            var _this11 = this;

            var result = constraint.validate(value, this);
            // Map false to a failed promise
            if (false === result) result = $.Deferred().reject();
            // Make sure we return a promise and that we record failures
            return ParsleyUtils__default.all([result]).fail(function (errorMessage) {
                if (!(_this11.validationResult instanceof Array)) _this11.validationResult = [];
                _this11.validationResult.push({
                    assert: constraint,
                    errorMessage: 'string' === typeof errorMessage && errorMessage
                });
            });
        },

        // @returns Parsley field computed value that could be overrided or configured in DOM
        getValue: function getValue() {
            var value;

            // Value could be overriden in DOM or with explicit options
            if ('function' === typeof this.options.value) value = this.options.value(this);else if ('undefined' !== typeof this.options.value) value = this.options.value;else value = this.$element.val();

            // Handle wrong DOM or configurations
            if ('undefined' === typeof value || null === value) return '';

            return this._handleWhitespace(value);
        },

        // Actualize options that could have change since previous validation
        // Re-bind accordingly constraints (could be some new, removed or updated)
        refreshConstraints: function refreshConstraints() {
            return this.actualizeOptions()._bindConstraints();
        },

        /**
         * Add a new constraint to a field
         *
         * @param {String}   name
         * @param {Mixed}    requirements      optional
         * @param {Number}   priority          optional
         * @param {Boolean}  isDomConstraint   optional
         */
        addConstraint: function addConstraint(name, requirements, priority, isDomConstraint) {

            if (window.Parsley._validatorRegistry.validators[name]) {
                var constraint = new ConstraintFactory(this, name, requirements, priority, isDomConstraint);

                // if constraint already exist, delete it and push new version
                if ('undefined' !== this.constraintsByName[constraint.name]) this.removeConstraint(constraint.name);

                this.constraints.push(constraint);
                this.constraintsByName[constraint.name] = constraint;
            }

            return this;
        },

        // Remove a constraint
        removeConstraint: function removeConstraint(name) {
            for (var i = 0; i < this.constraints.length; i++) if (name === this.constraints[i].name) {
                this.constraints.splice(i, 1);
                break;
            }
            delete this.constraintsByName[name];
            return this;
        },

        // Update a constraint (Remove + re-add)
        updateConstraint: function updateConstraint(name, parameters, priority) {
            return this.removeConstraint(name).addConstraint(name, parameters, priority);
        },

        // # Internals

        // Internal only.
        // Bind constraints from config + options + DOM
        _bindConstraints: function _bindConstraints() {
            var constraints = [];
            var constraintsByName = {};

            // clean all existing DOM constraints to only keep javascript user constraints
            for (var i = 0; i < this.constraints.length; i++) if (false === this.constraints[i].isDomConstraint) {
                constraints.push(this.constraints[i]);
                constraintsByName[this.constraints[i].name] = this.constraints[i];
            }

            this.constraints = constraints;
            this.constraintsByName = constraintsByName;

            // then re-add Parsley DOM-API constraints
            for (var name in this.options) this.addConstraint(name, this.options[name], undefined, true);

            // finally, bind special HTML5 constraints
            return this._bindHtml5Constraints();
        },

        // Internal only.
        // Bind specific HTML5 constraints to be HTML5 compliant
        _bindHtml5Constraints: function _bindHtml5Constraints() {
            // html5 required
            if (this.$element.hasClass('required') || this.$element.attr('required')) this.addConstraint('required', true, undefined, true);

            // html5 pattern
            if ('string' === typeof this.$element.attr('pattern')) this.addConstraint('pattern', this.$element.attr('pattern'), undefined, true);

            // range
            if ('undefined' !== typeof this.$element.attr('min') && 'undefined' !== typeof this.$element.attr('max')) this.addConstraint('range', [this.$element.attr('min'), this.$element.attr('max')], undefined, true);

            // HTML5 min
            else if ('undefined' !== typeof this.$element.attr('min')) this.addConstraint('min', this.$element.attr('min'), undefined, true);

            // HTML5 max
            else if ('undefined' !== typeof this.$element.attr('max')) this.addConstraint('max', this.$element.attr('max'), undefined, true);

            // length
            if ('undefined' !== typeof this.$element.attr('minlength') && 'undefined' !== typeof this.$element.attr('maxlength')) this.addConstraint('length', [this.$element.attr('minlength'), this.$element.attr('maxlength')], undefined, true);

            // HTML5 minlength
            else if ('undefined' !== typeof this.$element.attr('minlength')) this.addConstraint('minlength', this.$element.attr('minlength'), undefined, true);

            // HTML5 maxlength
            else if ('undefined' !== typeof this.$element.attr('maxlength')) this.addConstraint('maxlength', this.$element.attr('maxlength'), undefined, true);

            // html5 types
            var type = this.$element.attr('type');

            if ('undefined' === typeof type) return this;

            // Small special case here for HTML5 number: integer validator if step attribute is undefined or an integer value, number otherwise
            if ('number' === type) {
                return this.addConstraint('type', ['number', {
                    step: this.$element.attr('step'),
                    base: this.$element.attr('min') || this.$element.attr('value')
                }], undefined, true);
                // Regular other HTML5 supported types
            } else if (/^(email|url|range)$/i.test(type)) {
                return this.addConstraint('type', type, undefined, true);
            }
            return this;
        },

        // Internal only.
        // Field is required if have required constraint without `false` value
        _isRequired: function _isRequired() {
            if ('undefined' === typeof this.constraintsByName.required) return false;

            return false !== this.constraintsByName.required.requirements;
        },

        // Internal only.
        // Shortcut to trigger an event
        _trigger: function _trigger(eventName) {
            return this.trigger('field:' + eventName);
        },

        // Internal only
        // Handles whitespace in a value
        // Use `data-parsley-whitespace="squish"` to auto squish input value
        // Use `data-parsley-whitespace="trim"` to auto trim input value
        _handleWhitespace: function _handleWhitespace(value) {
            if (true === this.options.trimValue) ParsleyUtils__default.warnOnce('data-parsley-trim-value="true" is deprecated, please use data-parsley-whitespace="trim"');

            if ('squish' === this.options.whitespace) value = value.replace(/\s{2,}/g, ' ');

            if ('trim' === this.options.whitespace || 'squish' === this.options.whitespace || true === this.options.trimValue) value = ParsleyUtils__default.trimString(value);

            return value;
        },

        // Internal only.
        // Returns the constraints, grouped by descending priority.
        // The result is thus an array of arrays of constraints.
        _getGroupedConstraints: function _getGroupedConstraints() {
            if (false === this.options.priorityEnabled) return [this.constraints];

            var groupedConstraints = [];
            var index = {};

            // Create array unique of priorities
            for (var i = 0; i < this.constraints.length; i++) {
                var p = this.constraints[i].priority;
                if (!index[p]) groupedConstraints.push(index[p] = []);
                index[p].push(this.constraints[i]);
            }
            // Sort them by priority DESC
            groupedConstraints.sort(function (a, b) {
                return b[0].priority - a[0].priority;
            });

            return groupedConstraints;
        }

    };

    var parsley_field = ParsleyField;

    var ParsleyMultiple = function ParsleyMultiple() {
        this.__class__ = 'ParsleyFieldMultiple';
    };

    ParsleyMultiple.prototype = {
        // Add new `$element` sibling for multiple field
        addElement: function addElement($element) {
            this.$elements.push($element);

            return this;
        },

        // See `ParsleyField.refreshConstraints()`
        refreshConstraints: function refreshConstraints() {
            var fieldConstraints;

            this.constraints = [];

            // Select multiple special treatment
            if (this.$element.is('select')) {
                this.actualizeOptions()._bindConstraints();

                return this;
            }

            // Gather all constraints for each input in the multiple group
            for (var i = 0; i < this.$elements.length; i++) {

                // Check if element have not been dynamically removed since last binding
                if (!$('html').has(this.$elements[i]).length) {
                    this.$elements.splice(i, 1);
                    continue;
                }

                fieldConstraints = this.$elements[i].data('ParsleyFieldMultiple').refreshConstraints().constraints;

                for (var j = 0; j < fieldConstraints.length; j++) this.addConstraint(fieldConstraints[j].name, fieldConstraints[j].requirements, fieldConstraints[j].priority, fieldConstraints[j].isDomConstraint);
            }

            return this;
        },

        // See `ParsleyField.getValue()`
        getValue: function getValue() {
            // Value could be overriden in DOM
            if ('function' === typeof this.options.value) return this.options.value(this);else if ('undefined' !== typeof this.options.value) return this.options.value;

            // Radio input case
            if (this.$element.is('input[type=radio]')) return this._findRelated().filter(':checked').val() || '';

            // checkbox input case
            if (this.$element.is('input[type=checkbox]')) {
                var values = [];

                this._findRelated().filter(':checked').each(function () {
                    values.push($(this).val());
                });

                return values;
            }

            // Select multiple case
            if (this.$element.is('select') && null === this.$element.val()) return [];

            // Default case that should never happen
            return this.$element.val();
        },

        _init: function _init() {
            this.$elements = [this.$element];

            return this;
        }
    };

    var ParsleyFactory = function ParsleyFactory(element, options, parsleyFormInstance) {
        this.$element = $(element);

        // If the element has already been bound, returns its saved Parsley instance
        var savedparsleyFormInstance = this.$element.data('Parsley');
        if (savedparsleyFormInstance) {

            // If the saved instance has been bound without a ParsleyForm parent and there is one given in this call, add it
            if ('undefined' !== typeof parsleyFormInstance && savedparsleyFormInstance.parent === window.Parsley) {
                savedparsleyFormInstance.parent = parsleyFormInstance;
                savedparsleyFormInstance._resetOptions(savedparsleyFormInstance.options);
            }

            if ('object' === typeof options) {
                $.extend(savedparsleyFormInstance.options, options);
            }

            return savedparsleyFormInstance;
        }

        // Parsley must be instantiated with a DOM element or jQuery $element
        if (!this.$element.length) throw new Error('You must bind Parsley on an existing element.');

        if ('undefined' !== typeof parsleyFormInstance && 'ParsleyForm' !== parsleyFormInstance.__class__) throw new Error('Parent instance must be a ParsleyForm instance');

        this.parent = parsleyFormInstance || window.Parsley;
        return this.init(options);
    };

    ParsleyFactory.prototype = {
        init: function init(options) {
            this.__class__ = 'Parsley';
            this.__version__ = '2.4.4';
            this.__id__ = ParsleyUtils__default.generateID();

            // Pre-compute options
            this._resetOptions(options);

            // A ParsleyForm instance is obviously a `<form>` element but also every node that is not an input and has the `data-parsley-validate` attribute
            if (this.$element.is('form') || ParsleyUtils__default.checkAttr(this.$element, this.options.namespace, 'validate') && !this.$element.is(this.options.inputs)) return this.bind('parsleyForm');

            // Every other element is bound as a `ParsleyField` or `ParsleyFieldMultiple`
            return this.isMultiple() ? this.handleMultiple() : this.bind('parsleyField');
        },

        isMultiple: function isMultiple() {
            return this.$element.is('input[type=radio], input[type=checkbox]') || this.$element.is('select') && 'undefined' !== typeof this.$element.attr('multiple');
        },

        // Multiples fields are a real nightmare :(
        // Maybe some refactoring would be appreciated here...
        handleMultiple: function handleMultiple() {
            var _this12 = this;

            var name;
            var multiple;
            var parsleyMultipleInstance;

            // Handle multiple name
            if (this.options.multiple) ; // We already have our 'multiple' identifier
            else if ('undefined' !== typeof this.$element.attr('name') && this.$element.attr('name').length) this.options.multiple = name = this.$element.attr('name');else if ('undefined' !== typeof this.$element.attr('id') && this.$element.attr('id').length) this.options.multiple = this.$element.attr('id');

            // Special select multiple input
            if (this.$element.is('select') && 'undefined' !== typeof this.$element.attr('multiple')) {
                this.options.multiple = this.options.multiple || this.__id__;
                return this.bind('parsleyFieldMultiple');

                // Else for radio / checkboxes, we need a `name` or `data-parsley-multiple` to properly bind it
            } else if (!this.options.multiple) {
                ParsleyUtils__default.warn('To be bound by Parsley, a radio, a checkbox and a multiple select input must have either a name or a multiple option.', this.$element);
                return this;
            }

            // Remove special chars
            this.options.multiple = this.options.multiple.replace(/(:|\.|\[|\]|\{|\}|\$)/g, '');

            // Add proper `data-parsley-multiple` to siblings if we have a valid multiple name
            if ('undefined' !== typeof name) {
                $('input[name="' + name + '"]').each(function (i, input) {
                    if ($(input).is('input[type=radio], input[type=checkbox]')) $(input).attr(_this12.options.namespace + 'multiple', _this12.options.multiple);
                });
            }

            // Check here if we don't already have a related multiple instance saved
            var $previouslyRelated = this._findRelated();
            for (var i = 0; i < $previouslyRelated.length; i++) {
                parsleyMultipleInstance = $($previouslyRelated.get(i)).data('Parsley');
                if ('undefined' !== typeof parsleyMultipleInstance) {

                    if (!this.$element.data('ParsleyFieldMultiple')) {
                        parsleyMultipleInstance.addElement(this.$element);
                    }

                    break;
                }
            }

            // Create a secret ParsleyField instance for every multiple field. It will be stored in `data('ParsleyFieldMultiple')`
            // And will be useful later to access classic `ParsleyField` stuff while being in a `ParsleyFieldMultiple` instance
            this.bind('parsleyField', true);

            return parsleyMultipleInstance || this.bind('parsleyFieldMultiple');
        },

        // Return proper `ParsleyForm`, `ParsleyField` or `ParsleyFieldMultiple`
        bind: function bind(type, doNotStore) {
            var parsleyInstance;

            switch (type) {
                case 'parsleyForm':
                    parsleyInstance = $.extend(new ParsleyForm(this.$element, this.domOptions, this.options), new ParsleyAbstract(), window.ParsleyExtend)._bindFields();
                    break;
                case 'parsleyField':
                    parsleyInstance = $.extend(new parsley_field(this.$element, this.domOptions, this.options, this.parent), new ParsleyAbstract(), window.ParsleyExtend);
                    break;
                case 'parsleyFieldMultiple':
                    parsleyInstance = $.extend(new parsley_field(this.$element, this.domOptions, this.options, this.parent), new ParsleyMultiple(), new ParsleyAbstract(), window.ParsleyExtend)._init();
                    break;
                default:
                    throw new Error(type + 'is not a supported Parsley type');
            }

            if (this.options.multiple) ParsleyUtils__default.setAttr(this.$element, this.options.namespace, 'multiple', this.options.multiple);

            if ('undefined' !== typeof doNotStore) {
                this.$element.data('ParsleyFieldMultiple', parsleyInstance);

                return parsleyInstance;
            }

            // Store the freshly bound instance in a DOM element for later access using jQuery `data()`
            this.$element.data('Parsley', parsleyInstance);

            // Tell the world we have a new ParsleyForm or ParsleyField instance!
            parsleyInstance._actualizeTriggers();
            parsleyInstance._trigger('init');

            return parsleyInstance;
        }
    };

    var vernums = $.fn.jquery.split('.');
    if (parseInt(vernums[0]) <= 1 && parseInt(vernums[1]) < 8) {
        throw "The loaded version of jQuery is too old. Please upgrade to 1.8.x or better.";
    }
    if (!vernums.forEach) {
        ParsleyUtils__default.warn('Parsley requires ES5 to run properly. Please include https://github.com/es-shims/es5-shim');
    }
    // Inherit `on`, `off` & `trigger` to Parsley:
    var Parsley = $.extend(new ParsleyAbstract(), {
        $element: $(document),
        actualizeOptions: null,
        _resetOptions: null,
        Factory: ParsleyFactory,
        version: '2.4.4'
    });

    // Supplement ParsleyField and Form with ParsleyAbstract
    // This way, the constructors will have access to those methods
    $.extend(parsley_field.prototype, ParsleyUI.Field, ParsleyAbstract.prototype);
    $.extend(ParsleyForm.prototype, ParsleyUI.Form, ParsleyAbstract.prototype);
    // Inherit actualizeOptions and _resetOptions:
    $.extend(ParsleyFactory.prototype, ParsleyAbstract.prototype);

    // ### jQuery API
    // `$('.elem').parsley(options)` or `$('.elem').psly(options)`
    $.fn.parsley = $.fn.psly = function (options) {
        if (this.length > 1) {
            var instances = [];

            this.each(function () {
                instances.push($(this).parsley(options));
            });

            return instances;
        }

        // Return undefined if applied to non existing DOM element
        if (!$(this).length) {
            ParsleyUtils__default.warn('You must bind Parsley on an existing element.');

            return;
        }

        return new ParsleyFactory(this, options);
    };

    // ### ParsleyField and ParsleyForm extension
    // Ensure the extension is now defined if it wasn't previously
    if ('undefined' === typeof window.ParsleyExtend) window.ParsleyExtend = {};

    // ### Parsley config
    // Inherit from ParsleyDefault, and copy over any existing values
    Parsley.options = $.extend(ParsleyUtils__default.objectCreate(ParsleyDefaults), window.ParsleyConfig);
    window.ParsleyConfig = Parsley.options; // Old way of accessing global options

    // ### Globals
    window.Parsley = window.psly = Parsley;
    window.ParsleyUtils = ParsleyUtils__default;

    // ### Define methods that forward to the registry, and deprecate all access except through window.Parsley
    var registry = window.Parsley._validatorRegistry = new ParsleyValidatorRegistry(window.ParsleyConfig.validators, window.ParsleyConfig.i18n);
    window.ParsleyValidator = {};
    $.each('setLocale addCatalog addMessage addMessages getErrorMessage formatMessage addValidator updateValidator removeValidator'.split(' '), function (i, method) {
        window.Parsley[method] = $.proxy(registry, method);
        window.ParsleyValidator[method] = function () {
            var _window$Parsley;

            ParsleyUtils__default.warnOnce('Accessing the method \'' + method + '\' through ParsleyValidator is deprecated. Simply call \'window.Parsley.' + method + '(...)\'');
            return (_window$Parsley = window.Parsley)[method].apply(_window$Parsley, arguments);
        };
    });

    // ### ParsleyUI
    // Deprecated global object
    window.Parsley.UI = ParsleyUI;
    window.ParsleyUI = {
        removeError: function removeError(instance, name, doNotUpdateClass) {
            var updateClass = true !== doNotUpdateClass;
            ParsleyUtils__default.warnOnce('Accessing ParsleyUI is deprecated. Call \'removeError\' on the instance directly. Please comment in issue 1073 as to your need to call this method.');
            return instance.removeError(name, { updateClass: updateClass });
        },
        getErrorsMessages: function getErrorsMessages(instance) {
            ParsleyUtils__default.warnOnce('Accessing ParsleyUI is deprecated. Call \'getErrorsMessages\' on the instance directly.');
            return instance.getErrorsMessages();
        }
    };
    $.each('addError updateError'.split(' '), function (i, method) {
        window.ParsleyUI[method] = function (instance, name, message, assert, doNotUpdateClass) {
            var updateClass = true !== doNotUpdateClass;
            ParsleyUtils__default.warnOnce('Accessing ParsleyUI is deprecated. Call \'' + method + '\' on the instance directly. Please comment in issue 1073 as to your need to call this method.');
            return instance[method](name, { message: message, assert: assert, updateClass: updateClass });
        };
    });

    // ### PARSLEY auto-binding
    // Prevent it by setting `ParsleyConfig.autoBind` to `false`
    if (false !== window.ParsleyConfig.autoBind) {
        $(function () {
            // Works only on `data-parsley-validate`.
            if ($('[data-parsley-validate]').length) $('[data-parsley-validate]').parsley();
        });
    }

    var o = $({});
    var deprecated = function deprecated() {
        ParsleyUtils__default.warnOnce("Parsley's pubsub module is deprecated; use the 'on' and 'off' methods on parsley instances or window.Parsley");
    };

    // Returns an event handler that calls `fn` with the arguments it expects
    function adapt(fn, context) {
        // Store to allow unbinding
        if (!fn.parsleyAdaptedCallback) {
            fn.parsleyAdaptedCallback = function () {
                var args = Array.prototype.slice.call(arguments, 0);
                args.unshift(this);
                fn.apply(context || o, args);
            };
        }
        return fn.parsleyAdaptedCallback;
    }

    var eventPrefix = 'parsley:';
    // Converts 'parsley:form:validate' into 'form:validate'
    function eventName(name) {
        if (name.lastIndexOf(eventPrefix, 0) === 0) return name.substr(eventPrefix.length);
        return name;
    }

    // $.listen is deprecated. Use Parsley.on instead.
    $.listen = function (name, callback) {
        var context;
        deprecated();
        if ('object' === typeof arguments[1] && 'function' === typeof arguments[2]) {
            context = arguments[1];
            callback = arguments[2];
        }

        if ('function' !== typeof callback) throw new Error('Wrong parameters');

        window.Parsley.on(eventName(name), adapt(callback, context));
    };

    $.listenTo = function (instance, name, fn) {
        deprecated();
        if (!(instance instanceof parsley_field) && !(instance instanceof ParsleyForm)) throw new Error('Must give Parsley instance');

        if ('string' !== typeof name || 'function' !== typeof fn) throw new Error('Wrong parameters');

        instance.on(eventName(name), adapt(fn));
    };

    $.unsubscribe = function (name, fn) {
        deprecated();
        if ('string' !== typeof name || 'function' !== typeof fn) throw new Error('Wrong arguments');
        window.Parsley.off(eventName(name), fn.parsleyAdaptedCallback);
    };

    $.unsubscribeTo = function (instance, name) {
        deprecated();
        if (!(instance instanceof parsley_field) && !(instance instanceof ParsleyForm)) throw new Error('Must give Parsley instance');
        instance.off(eventName(name));
    };

    $.unsubscribeAll = function (name) {
        deprecated();
        window.Parsley.off(eventName(name));
        $('form,input,textarea,select').each(function () {
            var instance = $(this).data('Parsley');
            if (instance) {
                instance.off(eventName(name));
            }
        });
    };

    // $.emit is deprecated. Use jQuery events instead.
    $.emit = function (name, instance) {
        var _instance;

        deprecated();
        var instanceGiven = instance instanceof parsley_field || instance instanceof ParsleyForm;
        var args = Array.prototype.slice.call(arguments, instanceGiven ? 2 : 1);
        args.unshift(eventName(name));
        if (!instanceGiven) {
            instance = window.Parsley;
        }
        (_instance = instance).trigger.apply(_instance, _toConsumableArray(args));
    };

    var pubsub = {};

    $.extend(true, Parsley, {
        asyncValidators: {
            'default': {
                fn: function fn(xhr) {
                    // By default, only status 2xx are deemed successful.
                    // Note: we use status instead of state() because responses with status 200
                    // but invalid messages (e.g. an empty body for content type set to JSON) will
                    // result in state() === 'rejected'.
                    return xhr.status >= 200 && xhr.status < 300;
                },
                url: false
            },
            reverse: {
                fn: function fn(xhr) {
                    // If reverse option is set, a failing ajax request is considered successful
                    return xhr.status < 200 || xhr.status >= 300;
                },
                url: false
            }
        },

        addAsyncValidator: function addAsyncValidator(name, fn, url, options) {
            Parsley.asyncValidators[name] = {
                fn: fn,
                url: url || false,
                options: options || {}
            };

            return this;
        }

    });

    Parsley.addValidator('remote', {
        requirementType: {
            '': 'string',
            'validator': 'string',
            'reverse': 'boolean',
            'options': 'object'
        },

        validateString: function validateString(value, url, options, instance) {
            var data = {};
            var ajaxOptions;
            var csr;
            var validator = options.validator || (true === options.reverse ? 'reverse' : 'default');

            if ('undefined' === typeof Parsley.asyncValidators[validator]) throw new Error('Calling an undefined async validator: `' + validator + '`');

            url = Parsley.asyncValidators[validator].url || url;

            // Fill current value
            if (url.indexOf('{value}') > -1) {
                url = url.replace('{value}', encodeURIComponent(value));
            } else {
                data[instance.$element.attr('name') || instance.$element.attr('id')] = value;
            }

            // Merge options passed in from the function with the ones in the attribute
            var remoteOptions = $.extend(true, options.options || {}, Parsley.asyncValidators[validator].options);

            // All `$.ajax(options)` could be overridden or extended directly from DOM in `data-parsley-remote-options`
            ajaxOptions = $.extend(true, {}, {
                url: url,
                data: data,
                type: 'GET'
            }, remoteOptions);

            // Generate store key based on ajax options
            instance.trigger('field:ajaxoptions', instance, ajaxOptions);

            csr = $.param(ajaxOptions);

            // Initialise querry cache
            if ('undefined' === typeof Parsley._remoteCache) Parsley._remoteCache = {};

            // Try to retrieve stored xhr
            var xhr = Parsley._remoteCache[csr] = Parsley._remoteCache[csr] || $.ajax(ajaxOptions);

            var handleXhr = function handleXhr() {
                var result = Parsley.asyncValidators[validator].fn.call(instance, xhr, url, options);
                if (!result) // Map falsy results to rejected promise
                    result = $.Deferred().reject();
                return $.when(result);
            };

            return xhr.then(handleXhr, handleXhr);
        },

        priority: -1
    });

    Parsley.on('form:submit', function () {
        Parsley._remoteCache = {};
    });

    window.ParsleyExtend.addAsyncValidator = function () {
        ParsleyUtils.warnOnce('Accessing the method `addAsyncValidator` through an instance is deprecated. Simply call `Parsley.addAsyncValidator(...)`');
        return Parsley.addAsyncValidator.apply(Parsley, arguments);
    };

    // This is included with the Parsley library itself,
    // thus there is no use in adding it to your project.
    Parsley.addMessages('en', {
        defaultMessage: "This value seems to be invalid.",
        type: {
            email: "This value should be a valid email.",
            url: "This value should be a valid url.",
            number: "This value should be a valid number.",
            integer: "This value should be a valid integer.",
            digits: "This value should be digits.",
            alphanum: "This value should be alphanumeric."
        },
        notblank: "This value should not be blank.",
        required: "This value is required.",
        pattern: "This value seems to be invalid.",
        min: "This value should be greater than or equal to %s.",
        max: "This value should be lower than or equal to %s.",
        range: "This value should be between %s and %s.",
        minlength: "This value is too short. It should have %s characters or more.",
        maxlength: "This value is too long. It should have %s characters or fewer.",
        length: "This value length is invalid. It should be between %s and %s characters long.",
        mincheck: "You must select at least %s choices.",
        maxcheck: "You must select %s choices or fewer.",
        check: "You must select between %s and %s choices.",
        equalto: "This value should be the same."
    });

    Parsley.setLocale('en');

    /**
     * inputevent - Alleviate browser bugs for input events
     * https://github.com/marcandre/inputevent
     * @version v0.0.3 - (built Thu, Apr 14th 2016, 5:58 pm)
     * @author Marc-Andre Lafortune <github@marc-andre.ca>
     * @license MIT
     */

    function InputEvent() {
        var _this13 = this;

        var globals = window || global;

        // Slightly odd way construct our object. This way methods are force bound.
        // Used to test for duplicate library.
        $.extend(this, {

            // For browsers that do not support isTrusted, assumes event is native.
            isNativeEvent: function isNativeEvent(evt) {
                return evt.originalEvent && evt.originalEvent.isTrusted !== false;
            },

            fakeInputEvent: function fakeInputEvent(evt) {
                if (_this13.isNativeEvent(evt)) {
                    $(evt.target).trigger('input');
                }
            },

            misbehaves: function misbehaves(evt) {
                if (_this13.isNativeEvent(evt)) {
                    _this13.behavesOk(evt);
                    $(document).on('change.inputevent', evt.data.selector, _this13.fakeInputEvent);
                    _this13.fakeInputEvent(evt);
                }
            },

            behavesOk: function behavesOk(evt) {
                if (_this13.isNativeEvent(evt)) {
                    $(document) // Simply unbinds the testing handler
                        .off('input.inputevent', evt.data.selector, _this13.behavesOk).off('change.inputevent', evt.data.selector, _this13.misbehaves);
                }
            },

            // Bind the testing handlers
            install: function install() {
                if (globals.inputEventPatched) {
                    return;
                }
                globals.inputEventPatched = '0.0.3';
                var _arr = ['select', 'input[type="checkbox"]', 'input[type="radio"]', 'input[type="file"]'];
                for (var _i = 0; _i < _arr.length; _i++) {
                    var selector = _arr[_i];
                    $(document).on('input.inputevent', selector, { selector: selector }, _this13.behavesOk).on('change.inputevent', selector, { selector: selector }, _this13.misbehaves);
                }
            },

            uninstall: function uninstall() {
                delete globals.inputEventPatched;
                $(document).off('.inputevent');
            }

        });
    };

    var inputevent = new InputEvent();

    inputevent.install();

    var parsley = Parsley;

    return parsley;
});
//# sourceMappingURL=parsley.js.map
/*! modernizr 3.3.1 (Custom Build) | MIT *
 * https://modernizr.com/download/?-inputtypes-setclasses !*/
!function(e,t,n){function a(e,t){return typeof e===t}function s(){var e,t,n,s,i,o,c;for(var u in r)if(r.hasOwnProperty(u)){if(e=[],t=r[u],t.name&&(e.push(t.name.toLowerCase()),t.options&&t.options.aliases&&t.options.aliases.length))for(n=0;n<t.options.aliases.length;n++)e.push(t.options.aliases[n].toLowerCase());for(s=a(t.fn,"function")?t.fn():t.fn,i=0;i<e.length;i++)o=e[i],c=o.split("."),1===c.length?Modernizr[c[0]]=s:(!Modernizr[c[0]]||Modernizr[c[0]]instanceof Boolean||(Modernizr[c[0]]=new Boolean(Modernizr[c[0]])),Modernizr[c[0]][c[1]]=s),l.push((s?"":"no-")+c.join("-"))}}function i(e){var t=u.className,n=Modernizr._config.classPrefix||"";if(f&&(t=t.baseVal),Modernizr._config.enableJSClass){var a=new RegExp("(^|\\s)"+n+"no-js(\\s|$)");t=t.replace(a,"$1"+n+"js$2")}Modernizr._config.enableClasses&&(t+=" "+n+e.join(" "+n),f?u.className.baseVal=t:u.className=t)}function o(){return"function"!=typeof t.createElement?t.createElement(arguments[0]):f?t.createElementNS.call(t,"http://www.w3.org/2000/svg",arguments[0]):t.createElement.apply(t,arguments)}var l=[],r=[],c={_version:"3.3.1",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,t){var n=this;setTimeout(function(){t(n[e])},0)},addTest:function(e,t,n){r.push({name:e,fn:t,options:n})},addAsyncTest:function(e){r.push({name:null,fn:e})}},Modernizr=function(){};Modernizr.prototype=c,Modernizr=new Modernizr;var u=t.documentElement,f="svg"===u.nodeName.toLowerCase(),p=o("input"),d="search tel url email datetime date month week time datetime-local number range color".split(" "),m={};Modernizr.inputtypes=function(e){for(var a,s,i,o=e.length,l="1)",r=0;o>r;r++)p.setAttribute("type",a=e[r]),i="text"!==p.type&&"style"in p,i&&(p.value=l,p.style.cssText="position:absolute;visibility:hidden;",/^range$/.test(a)&&p.style.WebkitAppearance!==n?(u.appendChild(p),s=t.defaultView,i=s.getComputedStyle&&"textfield"!==s.getComputedStyle(p,null).WebkitAppearance&&0!==p.offsetHeight,u.removeChild(p)):/^(search|tel)$/.test(a)||(i=/^(url|email)$/.test(a)?p.checkValidity&&p.checkValidity()===!1:p.value!=l)),m[e[r]]=!!i;return m}(d),s(),i(l),delete c.addTest,delete c.addAsyncTest;for(var h=0;h<Modernizr._q.length;h++)Modernizr._q[h]();e.Modernizr=Modernizr}(window,document);
/*!
 * Pikaday
 *
 * Copyright © 2014 David Bushell | BSD & MIT license | https://github.com/dbushell/Pikaday
 */

(function (root, factory)
{
    'use strict';

    var moment;
    if (typeof exports === 'object') {
        // CommonJS module
        // Load moment.js as an optional dependency
        try { moment = require('moment'); } catch (e) {}
        module.exports = factory(moment);
    } else if (typeof define === 'function' && define.amd) {
        // AMD. Register as an anonymous module.
        define(function (req)
        {
            // Load moment.js as an optional dependency
            var id = 'moment';
            try { moment = req(id); } catch (e) {}
            return factory(moment);
        });
    } else {
        root.Pikaday = factory(root.moment);
    }
}(this, function (moment)
{
    'use strict';

    /**
     * feature detection and helper functions
     */
    var hasMoment = typeof moment === 'function',

    hasEventListeners = !!window.addEventListener,

    document = window.document,

    sto = window.setTimeout,

    addEvent = function(el, e, callback, capture)
    {
        if (hasEventListeners) {
            el.addEventListener(e, callback, !!capture);
        } else {
            el.attachEvent('on' + e, callback);
        }
    },

    removeEvent = function(el, e, callback, capture)
    {
        if (hasEventListeners) {
            el.removeEventListener(e, callback, !!capture);
        } else {
            el.detachEvent('on' + e, callback);
        }
    },

    fireEvent = function(el, eventName, data)
    {
        var ev;

        if (document.createEvent) {
            ev = document.createEvent('HTMLEvents');
            ev.initEvent(eventName, true, false);
            ev = extend(ev, data);
            el.dispatchEvent(ev);
        } else if (document.createEventObject) {
            ev = document.createEventObject();
            ev = extend(ev, data);
            el.fireEvent('on' + eventName, ev);
        }
    },

    trim = function(str)
    {
        return str.trim ? str.trim() : str.replace(/^\s+|\s+$/g,'');
    },

    hasClass = function(el, cn)
    {
        return (' ' + el.className + ' ').indexOf(' ' + cn + ' ') !== -1;
    },

    addClass = function(el, cn)
    {
        if (!hasClass(el, cn)) {
            el.className = (el.className === '') ? cn : el.className + ' ' + cn;
        }
    },

    removeClass = function(el, cn)
    {
        el.className = trim((' ' + el.className + ' ').replace(' ' + cn + ' ', ' '));
    },

    isArray = function(obj)
    {
        return (/Array/).test(Object.prototype.toString.call(obj));
    },

    isDate = function(obj)
    {
        return (/Date/).test(Object.prototype.toString.call(obj)) && !isNaN(obj.getTime());
    },

    isWeekend = function(date)
    {
        var day = date.getDay();
        return day === 0 || day === 6;
    },

    isLeapYear = function(year)
    {
        // solution by Matti Virkkunen: http://stackoverflow.com/a/4881951
        return year % 4 === 0 && year % 100 !== 0 || year % 400 === 0;
    },

    getDaysInMonth = function(year, month)
    {
        return [31, isLeapYear(year) ? 29 : 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31][month];
    },

    setToStartOfDay = function(date)
    {
        if (isDate(date)) date.setHours(0,0,0,0);
    },

    compareDates = function(a,b)
    {
        // weak date comparison (use setToStartOfDay(date) to ensure correct result)
        return a.getTime() === b.getTime();
    },

    extend = function(to, from, overwrite)
    {
        var prop, hasProp;
        for (prop in from) {
            hasProp = to[prop] !== undefined;
            if (hasProp && typeof from[prop] === 'object' && from[prop] !== null && from[prop].nodeName === undefined) {
                if (isDate(from[prop])) {
                    if (overwrite) {
                        to[prop] = new Date(from[prop].getTime());
                    }
                }
                else if (isArray(from[prop])) {
                    if (overwrite) {
                        to[prop] = from[prop].slice(0);
                    }
                } else {
                    to[prop] = extend({}, from[prop], overwrite);
                }
            } else if (overwrite || !hasProp) {
                to[prop] = from[prop];
            }
        }
        return to;
    },

    adjustCalendar = function(calendar) {
        if (calendar.month < 0) {
            calendar.year -= Math.ceil(Math.abs(calendar.month)/12);
            calendar.month += 12;
        }
        if (calendar.month > 11) {
            calendar.year += Math.floor(Math.abs(calendar.month)/12);
            calendar.month -= 12;
        }
        return calendar;
    },

    /**
     * defaults and localisation
     */
    defaults = {

        // bind the picker to a form field
        field: null,

        // automatically show/hide the picker on `field` focus (default `true` if `field` is set)
        bound: undefined,

        // position of the datepicker, relative to the field (default to bottom & left)
        // ('bottom' & 'left' keywords are not used, 'top' & 'right' are modifier on the bottom/left position)
        position: 'bottom left',

        // automatically fit in the viewport even if it means repositioning from the position option
        reposition: true,

        // the default output format for `.toString()` and `field` value
        format: 'YYYY-MM-DD',

        // the initial date to view when first opened
        defaultDate: null,

        // make the `defaultDate` the initial selected value
        setDefaultDate: false,

        // first day of week (0: Sunday, 1: Monday etc)
        firstDay: 0,

        // the default flag for moment's strict date parsing
        formatStrict: false,

        // the minimum/earliest date that can be selected
        minDate: null,
        // the maximum/latest date that can be selected
        maxDate: null,

        // number of years either side, or array of upper/lower range
        yearRange: 10,

        // show week numbers at head of row
        showWeekNumber: false,

        // used internally (don't config outside)
        minYear: 0,
        maxYear: 9999,
        minMonth: undefined,
        maxMonth: undefined,

        startRange: null,
        endRange: null,

        isRTL: false,

        // Additional text to append to the year in the calendar title
        yearSuffix: '',

        // Render the month after year in the calendar title
        showMonthAfterYear: false,

        // Render days of the calendar grid that fall in the next or previous month
        showDaysInNextAndPreviousMonths: false,

        // how many months are visible
        numberOfMonths: 1,

        // when numberOfMonths is used, this will help you to choose where the main calendar will be (default `left`, can be set to `right`)
        // only used for the first display or when a selected date is not visible
        mainCalendar: 'left',

        // Specify a DOM element to render the calendar in
        container: undefined,

        // internationalization
        i18n: {
            previousMonth : 'Previous Month',
            nextMonth     : 'Next Month',
            months        : ['January','February','March','April','May','June','July','August','September','October','November','December'],
            weekdays      : ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'],
            weekdaysShort : ['Sun','Mon','Tue','Wed','Thu','Fri','Sat']
        },

        // Theme Classname
        theme: null,

        // callback function
        onSelect: null,
        onOpen: null,
        onClose: null,
        onDraw: null
    },


    /**
     * templating functions to abstract HTML rendering
     */
    renderDayName = function(opts, day, abbr)
    {
        day += opts.firstDay;
        while (day >= 7) {
            day -= 7;
        }
        return abbr ? opts.i18n.weekdaysShort[day] : opts.i18n.weekdays[day];
    },

    renderDay = function(opts)
    {
        var arr = [];
        var ariaSelected = 'false';
        if (opts.isEmpty) {
            if (opts.showDaysInNextAndPreviousMonths) {
                arr.push('is-outside-current-month');
            } else {
                return '<td class="is-empty"></td>';
            }
        }
        if (opts.isDisabled) {
            arr.push('is-disabled');
        }
        if (opts.isToday) {
            arr.push('is-today');
        }
        if (opts.isSelected) {
            arr.push('is-selected');
            ariaSelected = 'true';
        }
        if (opts.isInRange) {
            arr.push('is-inrange');
        }
        if (opts.isStartRange) {
            arr.push('is-startrange');
        }
        if (opts.isEndRange) {
            arr.push('is-endrange');
        }
        return '<td data-day="' + opts.day + '" class="' + arr.join(' ') + '" aria-selected="' + ariaSelected + '">' +
                 '<button class="pika-button pika-day" type="button" ' +
                    'data-pika-year="' + opts.year + '" data-pika-month="' + opts.month + '" data-pika-day="' + opts.day + '">' +
                        opts.day +
                 '</button>' +
               '</td>';
    },

    renderWeek = function (d, m, y) {
        // Lifted from http://javascript.about.com/library/blweekyear.htm, lightly modified.
        var onejan = new Date(y, 0, 1),
            weekNum = Math.ceil((((new Date(y, m, d) - onejan) / 86400000) + onejan.getDay()+1)/7);
        return '<td class="pika-week">' + weekNum + '</td>';
    },

    renderRow = function(days, isRTL)
    {
        return '<tr>' + (isRTL ? days.reverse() : days).join('') + '</tr>';
    },

    renderBody = function(rows)
    {
        return '<tbody>' + rows.join('') + '</tbody>';
    },

    renderHead = function(opts)
    {
        var i, arr = [];
        if (opts.showWeekNumber) {
            arr.push('<th></th>');
        }
        for (i = 0; i < 7; i++) {
            arr.push('<th scope="col"><abbr title="' + renderDayName(opts, i) + '">' + renderDayName(opts, i, true) + '</abbr></th>');
        }
        return '<thead><tr>' + (opts.isRTL ? arr.reverse() : arr).join('') + '</tr></thead>';
    },

    renderTitle = function(instance, c, year, month, refYear, randId)
    {
        var i, j, arr,
            opts = instance._o,
            isMinYear = year === opts.minYear,
            isMaxYear = year === opts.maxYear,
            html = '<div id="' + randId + '" class="pika-title" role="heading" aria-live="assertive">',
            monthHtml,
            yearHtml,
            prev = true,
            next = true;

        for (arr = [], i = 0; i < 12; i++) {
            arr.push('<option value="' + (year === refYear ? i - c : 12 + i - c) + '"' +
                (i === month ? ' selected="selected"': '') +
                ((isMinYear && i < opts.minMonth) || (isMaxYear && i > opts.maxMonth) ? 'disabled="disabled"' : '') + '>' +
                opts.i18n.months[i] + '</option>');
        }

        monthHtml = '<div class="pika-label">' + opts.i18n.months[month] + '<select class="pika-select pika-select-month" tabindex="-1">' + arr.join('') + '</select></div>';

        if (isArray(opts.yearRange)) {
            i = opts.yearRange[0];
            j = opts.yearRange[1] + 1;
        } else {
            i = year - opts.yearRange;
            j = 1 + year + opts.yearRange;
        }

        for (arr = []; i < j && i <= opts.maxYear; i++) {
            if (i >= opts.minYear) {
                arr.push('<option value="' + i + '"' + (i === year ? ' selected="selected"': '') + '>' + (i) + '</option>');
            }
        }
        yearHtml = '<div class="pika-label">' + year + opts.yearSuffix + '<select class="pika-select pika-select-year" tabindex="-1">' + arr.join('') + '</select></div>';

        if (opts.showMonthAfterYear) {
            html += yearHtml + monthHtml;
        } else {
            html += monthHtml + yearHtml;
        }

        if (isMinYear && (month === 0 || opts.minMonth >= month)) {
            prev = false;
        }

        if (isMaxYear && (month === 11 || opts.maxMonth <= month)) {
            next = false;
        }

        if (c === 0) {
            html += '<button class="pika-prev' + (prev ? '' : ' is-disabled') + '" type="button">' + opts.i18n.previousMonth + '</button>';
        }
        if (c === (instance._o.numberOfMonths - 1) ) {
            html += '<button class="pika-next' + (next ? '' : ' is-disabled') + '" type="button">' + opts.i18n.nextMonth + '</button>';
        }

        return html += '</div>';
    },

    renderTable = function(opts, data, randId)
    {
        return '<table cellpadding="0" cellspacing="0" class="pika-table" role="grid" aria-labelledby="' + randId + '">' + renderHead(opts) + renderBody(data) + '</table>';
    },


    /**
     * Pikaday constructor
     */
    Pikaday = function(options)
    {
        var self = this,
            opts = self.config(options);

        self._onMouseDown = function(e)
        {
            if (!self._v) {
                return;
            }
            e = e || window.event;
            var target = e.target || e.srcElement;
            if (!target) {
                return;
            }

            if (!hasClass(target, 'is-disabled')) {
                if (hasClass(target, 'pika-button') && !hasClass(target, 'is-empty') && !hasClass(target.parentNode, 'is-disabled')) {
                    self.setDate(new Date(target.getAttribute('data-pika-year'), target.getAttribute('data-pika-month'), target.getAttribute('data-pika-day')));
                    if (opts.bound) {
                        sto(function() {
                            self.hide();
                            if (opts.field) {
                                opts.field.blur();
                            }
                        }, 100);
                    }
                }
                else if (hasClass(target, 'pika-prev')) {
                    self.prevMonth();
                }
                else if (hasClass(target, 'pika-next')) {
                    self.nextMonth();
                }
            }
            if (!hasClass(target, 'pika-select')) {
                // if this is touch event prevent mouse events emulation
                if (e.preventDefault) {
                    e.preventDefault();
                } else {
                    e.returnValue = false;
                    return false;
                }
            } else {
                self._c = true;
            }
        };

        self._onChange = function(e)
        {
            e = e || window.event;
            var target = e.target || e.srcElement;
            if (!target) {
                return;
            }
            if (hasClass(target, 'pika-select-month')) {
                self.gotoMonth(target.value);
            }
            else if (hasClass(target, 'pika-select-year')) {
                self.gotoYear(target.value);
            }
        };

        self._onKeyChange = function(e)
        {
            e = e || window.event;

            if (self.isVisible()) {

                switch(e.keyCode){
                    case 13:
                    case 27:
                        opts.field.blur();
                        break;
                    case 37:
                        e.preventDefault();
                        self.adjustDate('subtract', 1);
                        break;
                    case 38:
                        self.adjustDate('subtract', 7);
                        break;
                    case 39:
                        self.adjustDate('add', 1);
                        break;
                    case 40:
                        self.adjustDate('add', 7);
                        break;
                }
            }
        };

        self._onInputChange = function(e)
        {
            var date;

            if (e.firedBy === self) {
                return;
            }
            if (hasMoment) {
                date = moment(opts.field.value, opts.format, opts.formatStrict);
                date = (date && date.isValid()) ? date.toDate() : null;
            }
            else {
                date = new Date(Date.parse(opts.field.value));
            }
            if (isDate(date)) {
              self.setDate(date);
            }
            if (!self._v) {
                self.show();
            }
        };

        self._onInputFocus = function()
        {
            self.show();
        };

        self._onInputClick = function()
        {
            self.show();
        };

        self._onInputBlur = function()
        {
            // IE allows pika div to gain focus; catch blur the input field
            var pEl = document.activeElement;
            do {
                if (hasClass(pEl, 'pika-single')) {
                    return;
                }
            }
            while ((pEl = pEl.parentNode));

            if (!self._c) {
                self._b = sto(function() {
                    self.hide();
                }, 50);
            }
            self._c = false;
        };

        self._onClick = function(e)
        {
            e = e || window.event;
            var target = e.target || e.srcElement,
                pEl = target;
            if (!target) {
                return;
            }
            if (!hasEventListeners && hasClass(target, 'pika-select')) {
                if (!target.onchange) {
                    target.setAttribute('onchange', 'return;');
                    addEvent(target, 'change', self._onChange);
                }
            }
            do {
                if (hasClass(pEl, 'pika-single') || pEl === opts.trigger) {
                    return;
                }
            }
            while ((pEl = pEl.parentNode));
            if (self._v && target !== opts.trigger && pEl !== opts.trigger) {
                self.hide();
            }
        };

        self.el = document.createElement('div');
        self.el.className = 'pika-single' + (opts.isRTL ? ' is-rtl' : '') + (opts.theme ? ' ' + opts.theme : '');

        addEvent(self.el, 'mousedown', self._onMouseDown, true);
        addEvent(self.el, 'touchend', self._onMouseDown, true);
        addEvent(self.el, 'change', self._onChange);
        addEvent(document, 'keydown', self._onKeyChange);

        if (opts.field) {
            if (opts.container) {
                opts.container.appendChild(self.el);
            } else if (opts.bound) {
                document.body.appendChild(self.el);
            } else {
                opts.field.parentNode.insertBefore(self.el, opts.field.nextSibling);
            }
            addEvent(opts.field, 'change', self._onInputChange);

            if (!opts.defaultDate) {
                if (hasMoment && opts.field.value) {
                    opts.defaultDate = moment(opts.field.value, opts.format).toDate();
                } else {
                    opts.defaultDate = new Date(Date.parse(opts.field.value));
                }
                opts.setDefaultDate = true;
            }
        }

        var defDate = opts.defaultDate;

        if (isDate(defDate)) {
            if (opts.setDefaultDate) {
                self.setDate(defDate, true);
            } else {
                self.gotoDate(defDate);
            }
        } else {
            self.gotoDate(new Date());
        }

        if (opts.bound) {
            this.hide();
            self.el.className += ' is-bound';
            addEvent(opts.trigger, 'click', self._onInputClick);
            addEvent(opts.trigger, 'focus', self._onInputFocus);
            addEvent(opts.trigger, 'blur', self._onInputBlur);
        } else {
            this.show();
        }
    };


    /**
     * public Pikaday API
     */
    Pikaday.prototype = {


        /**
         * configure functionality
         */
        config: function(options)
        {
            if (!this._o) {
                this._o = extend({}, defaults, true);
            }

            var opts = extend(this._o, options, true);

            opts.isRTL = !!opts.isRTL;

            opts.field = (opts.field && opts.field.nodeName) ? opts.field : null;

            opts.theme = (typeof opts.theme) === 'string' && opts.theme ? opts.theme : null;

            opts.bound = !!(opts.bound !== undefined ? opts.field && opts.bound : opts.field);

            opts.trigger = (opts.trigger && opts.trigger.nodeName) ? opts.trigger : opts.field;

            opts.disableWeekends = !!opts.disableWeekends;

            opts.disableDayFn = (typeof opts.disableDayFn) === 'function' ? opts.disableDayFn : null;

            var nom = parseInt(opts.numberOfMonths, 10) || 1;
            opts.numberOfMonths = nom > 4 ? 4 : nom;

            if (!isDate(opts.minDate)) {
                opts.minDate = false;
            }
            if (!isDate(opts.maxDate)) {
                opts.maxDate = false;
            }
            if ((opts.minDate && opts.maxDate) && opts.maxDate < opts.minDate) {
                opts.maxDate = opts.minDate = false;
            }
            if (opts.minDate) {
                this.setMinDate(opts.minDate);
            }
            if (opts.maxDate) {
                this.setMaxDate(opts.maxDate);
            }

            if (isArray(opts.yearRange)) {
                var fallback = new Date().getFullYear() - 10;
                opts.yearRange[0] = parseInt(opts.yearRange[0], 10) || fallback;
                opts.yearRange[1] = parseInt(opts.yearRange[1], 10) || fallback;
            } else {
                opts.yearRange = Math.abs(parseInt(opts.yearRange, 10)) || defaults.yearRange;
                if (opts.yearRange > 100) {
                    opts.yearRange = 100;
                }
            }

            return opts;
        },

        /**
         * return a formatted string of the current selection (using Moment.js if available)
         */
        toString: function(format)
        {
            return !isDate(this._d) ? '' : hasMoment ? moment(this._d).format(format || this._o.format) : this._d.toDateString();
        },

        /**
         * return a Moment.js object of the current selection (if available)
         */
        getMoment: function()
        {
            return hasMoment ? moment(this._d) : null;
        },

        /**
         * set the current selection from a Moment.js object (if available)
         */
        setMoment: function(date, preventOnSelect)
        {
            if (hasMoment && moment.isMoment(date)) {
                this.setDate(date.toDate(), preventOnSelect);
            }
        },

        /**
         * return a Date object of the current selection with fallback for the current date
         */
        getDate: function()
        {
            return isDate(this._d) ? new Date(this._d.getTime()) : new Date();
        },

        /**
         * set the current selection
         */
        setDate: function(date, preventOnSelect)
        {
            if (!date) {
                this._d = null;

                if (this._o.field) {
                    this._o.field.value = '';
                    fireEvent(this._o.field, 'change', { firedBy: this });
                }

                return this.draw();
            }
            if (typeof date === 'string') {
                date = new Date(Date.parse(date));
            }
            if (!isDate(date)) {
                return;
            }

            var min = this._o.minDate,
                max = this._o.maxDate;

            if (isDate(min) && date < min) {
                date = min;
            } else if (isDate(max) && date > max) {
                date = max;
            }

            this._d = new Date(date.getTime());
            setToStartOfDay(this._d);
            this.gotoDate(this._d);

            if (this._o.field) {
                this._o.field.value = this.toString();
                fireEvent(this._o.field, 'change', { firedBy: this });
            }
            if (!preventOnSelect && typeof this._o.onSelect === 'function') {
                this._o.onSelect.call(this, this.getDate());
            }
        },

        /**
         * change view to a specific date
         */
        gotoDate: function(date)
        {
            var newCalendar = true;

            if (!isDate(date)) {
                return;
            }

            if (this.calendars) {
                var firstVisibleDate = new Date(this.calendars[0].year, this.calendars[0].month, 1),
                    lastVisibleDate = new Date(this.calendars[this.calendars.length-1].year, this.calendars[this.calendars.length-1].month, 1),
                    visibleDate = date.getTime();
                // get the end of the month
                lastVisibleDate.setMonth(lastVisibleDate.getMonth()+1);
                lastVisibleDate.setDate(lastVisibleDate.getDate()-1);
                newCalendar = (visibleDate < firstVisibleDate.getTime() || lastVisibleDate.getTime() < visibleDate);
            }

            if (newCalendar) {
                this.calendars = [{
                    month: date.getMonth(),
                    year: date.getFullYear()
                }];
                if (this._o.mainCalendar === 'right') {
                    this.calendars[0].month += 1 - this._o.numberOfMonths;
                }
            }

            this.adjustCalendars();
        },

        adjustDate: function(sign, days) {

            var day = this.getDate();
            var difference = parseInt(days)*24*60*60*1000;

            var newDay;

            if (sign === 'add') {
                newDay = new Date(day.valueOf() + difference);
            } else if (sign === 'subtract') {
                newDay = new Date(day.valueOf() - difference);
            }

            if (hasMoment) {
                if (sign === 'add') {
                    newDay = moment(day).add(days, "days").toDate();
                } else if (sign === 'subtract') {
                    newDay = moment(day).subtract(days, "days").toDate();
                }
            }

            this.setDate(newDay);
        },

        adjustCalendars: function() {
            this.calendars[0] = adjustCalendar(this.calendars[0]);
            for (var c = 1; c < this._o.numberOfMonths; c++) {
                this.calendars[c] = adjustCalendar({
                    month: this.calendars[0].month + c,
                    year: this.calendars[0].year
                });
            }
            this.draw();
        },

        gotoToday: function()
        {
            this.gotoDate(new Date());
        },

        /**
         * change view to a specific month (zero-index, e.g. 0: January)
         */
        gotoMonth: function(month)
        {
            if (!isNaN(month)) {
                this.calendars[0].month = parseInt(month, 10);
                this.adjustCalendars();
            }
        },

        nextMonth: function()
        {
            this.calendars[0].month++;
            this.adjustCalendars();
        },

        prevMonth: function()
        {
            this.calendars[0].month--;
            this.adjustCalendars();
        },

        /**
         * change view to a specific full year (e.g. "2012")
         */
        gotoYear: function(year)
        {
            if (!isNaN(year)) {
                this.calendars[0].year = parseInt(year, 10);
                this.adjustCalendars();
            }
        },

        /**
         * change the minDate
         */
        setMinDate: function(value)
        {
            if(value instanceof Date) {
                setToStartOfDay(value);
                this._o.minDate = value;
                this._o.minYear  = value.getFullYear();
                this._o.minMonth = value.getMonth();
            } else {
                this._o.minDate = defaults.minDate;
                this._o.minYear  = defaults.minYear;
                this._o.minMonth = defaults.minMonth;
                this._o.startRange = defaults.startRange;
            }

            this.draw();
        },

        /**
         * change the maxDate
         */
        setMaxDate: function(value)
        {
            if(value instanceof Date) {
                setToStartOfDay(value);
                this._o.maxDate = value;
                this._o.maxYear = value.getFullYear();
                this._o.maxMonth = value.getMonth();
            } else {
                this._o.maxDate = defaults.maxDate;
                this._o.maxYear = defaults.maxYear;
                this._o.maxMonth = defaults.maxMonth;
                this._o.endRange = defaults.endRange;
            }

            this.draw();
        },

        setStartRange: function(value)
        {
            this._o.startRange = value;
        },

        setEndRange: function(value)
        {
            this._o.endRange = value;
        },

        /**
         * refresh the HTML
         */
        draw: function(force)
        {
            if (!this._v && !force) {
                return;
            }
            var opts = this._o,
                minYear = opts.minYear,
                maxYear = opts.maxYear,
                minMonth = opts.minMonth,
                maxMonth = opts.maxMonth,
                html = '',
                randId;

            if (this._y <= minYear) {
                this._y = minYear;
                if (!isNaN(minMonth) && this._m < minMonth) {
                    this._m = minMonth;
                }
            }
            if (this._y >= maxYear) {
                this._y = maxYear;
                if (!isNaN(maxMonth) && this._m > maxMonth) {
                    this._m = maxMonth;
                }
            }

            randId = 'pika-title-' + Math.random().toString(36).replace(/[^a-z]+/g, '').substr(0, 2);

            for (var c = 0; c < opts.numberOfMonths; c++) {
                html += '<div class="pika-lendar">' + renderTitle(this, c, this.calendars[c].year, this.calendars[c].month, this.calendars[0].year, randId) + this.render(this.calendars[c].year, this.calendars[c].month, randId) + '</div>';
            }

            this.el.innerHTML = html;

            if (opts.bound) {
                if(opts.field.type !== 'hidden') {
                    sto(function() {
                        opts.trigger.focus();
                    }, 1);
                }
            }

            if (typeof this._o.onDraw === 'function') {
                this._o.onDraw(this);
            }
          // let the screen reader user know to use arrow keys
          this._o.field.setAttribute('aria-label', 'Use the arrow keys to pick a date');
        },

        adjustPosition: function()
        {
            var field, pEl, width, height, viewportWidth, viewportHeight, scrollTop, left, top, clientRect;

            if (this._o.container) return;

            this.el.style.position = 'absolute';

            field = this._o.trigger;
            pEl = field;
            width = this.el.offsetWidth;
            height = this.el.offsetHeight;
            viewportWidth = window.innerWidth || document.documentElement.clientWidth;
            viewportHeight = window.innerHeight || document.documentElement.clientHeight;
            scrollTop = window.pageYOffset || document.body.scrollTop || document.documentElement.scrollTop;

            if (typeof field.getBoundingClientRect === 'function') {
                clientRect = field.getBoundingClientRect();
                left = clientRect.left + window.pageXOffset;
                top = clientRect.bottom + window.pageYOffset;
            } else {
                left = pEl.offsetLeft;
                top  = pEl.offsetTop + pEl.offsetHeight;
                while((pEl = pEl.offsetParent)) {
                    left += pEl.offsetLeft;
                    top  += pEl.offsetTop;
                }
            }

            // default position is bottom & left
            if ((this._o.reposition && left + width > viewportWidth) ||
                (
                    this._o.position.indexOf('right') > -1 &&
                    left - width + field.offsetWidth > 0
                )
            ) {
                left = left - width + field.offsetWidth;
            }
            if ((this._o.reposition && top + height > viewportHeight + scrollTop) ||
                (
                    this._o.position.indexOf('top') > -1 &&
                    top - height - field.offsetHeight > 0
                )
            ) {
                top = top - height - field.offsetHeight;
            }

            this.el.style.left = left + 'px';
            this.el.style.top = top + 'px';
        },

        /**
         * render HTML for a particular month
         */
        render: function(year, month, randId)
        {
            var opts   = this._o,
                now    = new Date(),
                days   = getDaysInMonth(year, month),
                before = new Date(year, month, 1).getDay(),
                data   = [],
                row    = [];
            setToStartOfDay(now);
            if (opts.firstDay > 0) {
                before -= opts.firstDay;
                if (before < 0) {
                    before += 7;
                }
            }
            var previousMonth = month === 0 ? 11 : month - 1,
                nextMonth = month === 11 ? 0 : month + 1,
                yearOfPreviousMonth = month === 0 ? year - 1 : year,
                yearOfNextMonth = month === 11 ? year + 1 : year,
                daysInPreviousMonth = getDaysInMonth(yearOfPreviousMonth, previousMonth);
            var cells = days + before,
                after = cells;
            while(after > 7) {
                after -= 7;
            }
            cells += 7 - after;
            for (var i = 0, r = 0; i < cells; i++)
            {
                var day = new Date(year, month, 1 + (i - before)),
                    isSelected = isDate(this._d) ? compareDates(day, this._d) : false,
                    isToday = compareDates(day, now),
                    isEmpty = i < before || i >= (days + before),
                    dayNumber = 1 + (i - before),
                    monthNumber = month,
                    yearNumber = year,
                    isStartRange = opts.startRange && compareDates(opts.startRange, day),
                    isEndRange = opts.endRange && compareDates(opts.endRange, day),
                    isInRange = opts.startRange && opts.endRange && opts.startRange < day && day < opts.endRange,
                    isDisabled = (opts.minDate && day < opts.minDate) ||
                                 (opts.maxDate && day > opts.maxDate) ||
                                 (opts.disableWeekends && isWeekend(day)) ||
                                 (opts.disableDayFn && opts.disableDayFn(day));

                if (isEmpty) {
                    if (i < before) {
                        dayNumber = daysInPreviousMonth + dayNumber;
                        monthNumber = previousMonth;
                        yearNumber = yearOfPreviousMonth;
                    } else {
                        dayNumber = dayNumber - days;
                        monthNumber = nextMonth;
                        yearNumber = yearOfNextMonth;
                    }
                }

                var dayConfig = {
                        day: dayNumber,
                        month: monthNumber,
                        year: yearNumber,
                        isSelected: isSelected,
                        isToday: isToday,
                        isDisabled: isDisabled,
                        isEmpty: isEmpty,
                        isStartRange: isStartRange,
                        isEndRange: isEndRange,
                        isInRange: isInRange,
                        showDaysInNextAndPreviousMonths: opts.showDaysInNextAndPreviousMonths
                    };

                row.push(renderDay(dayConfig));

                if (++r === 7) {
                    if (opts.showWeekNumber) {
                        row.unshift(renderWeek(i - before, month, year));
                    }
                    data.push(renderRow(row, opts.isRTL));
                    row = [];
                    r = 0;
                }
            }
            return renderTable(opts, data, randId);
        },

        isVisible: function()
        {
            return this._v;
        },

        show: function()
        {
            if (!this.isVisible()) {
                removeClass(this.el, 'is-hidden');
                this._v = true;
                this.draw();
                if (this._o.bound) {
                    addEvent(document, 'click', this._onClick);
                    this.adjustPosition();
                }
                if (typeof this._o.onOpen === 'function') {
                    this._o.onOpen.call(this);
                }
            }
        },

        hide: function()
        {
            var v = this._v;
            if (v !== false) {
                if (this._o.bound) {
                    removeEvent(document, 'click', this._onClick);
                }
                this.el.style.position = 'static'; // reset
                this.el.style.left = 'auto';
                this.el.style.top = 'auto';
                addClass(this.el, 'is-hidden');
                this._v = false;
                if (v !== undefined && typeof this._o.onClose === 'function') {
                    this._o.onClose.call(this);
                }
            }
        },

        /**
         * GAME OVER
         */
        destroy: function()
        {
            this.hide();
            removeEvent(this.el, 'mousedown', this._onMouseDown, true);
            removeEvent(this.el, 'touchend', this._onMouseDown, true);
            removeEvent(this.el, 'change', this._onChange);
            if (this._o.field) {
                removeEvent(this._o.field, 'change', this._onInputChange);
                if (this._o.bound) {
                    removeEvent(this._o.trigger, 'click', this._onInputClick);
                    removeEvent(this._o.trigger, 'focus', this._onInputFocus);
                    removeEvent(this._o.trigger, 'blur', this._onInputBlur);
                }
            }
            if (this.el.parentNode) {
                this.el.parentNode.removeChild(this.el);
            }
        }

    };

    return Pikaday;

}));

/**
 * Created by luis on 9/7/16.
 */
/*!
 * Pikaday jQuery plugin.
 *
 * Copyright © 2013 David Bushell | BSD & MIT license | https://github.com/dbushell/Pikaday
 */

(function (root, factory)
{
    'use strict';

    if (typeof exports === 'object') {
        // CommonJS module
        factory(require('jquery'), require('../pikaday'));
    } else if (typeof define === 'function' && define.amd) {
        // AMD. Register as an anonymous module.
        define(['jquery', 'pikaday'], factory);
    } else {
        // Browser globals
        factory(root.jQuery, root.Pikaday);
    }
}(this, function ($, Pikaday)
{
    'use strict';

    $.fn.pikaday = function()
    {
        var args = arguments;

        if (!args || !args.length) {
            args = [{ }];
        }

        return this.each(function()
        {
            var self   = $(this),
                plugin = self.data('pikaday');

            if (!(plugin instanceof Pikaday)) {
                if (typeof args[0] === 'object') {
                    var options = $.extend({}, args[0]);
                    options.field = self[0];
                    self.data('pikaday', new Pikaday(options));
                }
            } else {
                if (typeof args[0] === 'string' && typeof plugin[args[0]] === 'function') {
                    plugin[args[0]].apply(plugin, Array.prototype.slice.call(args,1));

                    if (args[0] === 'destroy') {
                        self.removeData('pikaday');
                    }
                }
            }
        });
    };

}));
/**
 * This file handle all the validation for all core37 forms on the page (one page can have multiple form)
 * things would be easier if we do the validation via php but we want to do it in JS (?)
 *
 * The JS validation is handled with parsley
 *
 * @params formsValidations is the object that contains all the validation objects of all forms (?)
 *
 * @type {{}}
 */

var formsValidations = {};
jQuery(function(){

});

/**
 * This function validate the passed-in form, return true if form is OK, false if there is(are) field(s)
 * that doesn't meet the validation requirements
 * @param form
 * @returns {*}
 */
function c37FormValidate(form)
{

    //first check if honeypot field is filled
    var honeyField = jQuery(form).find('.pott').first();

    var currentFormValidation = formsValidations[jQuery(form).attr('id')];

    if (honeyField.val() != "")
        return false;

    //check if the acceptance field
    var acceptanceFields = form.find('input.c37-acceptance');


    for (var i = 0; i < acceptanceFields.length; i++)
    {
        if (!jQuery(acceptanceFields.get(i)).is(':checked'))
        {
            return false;
        }
    }

    //start form validation
    //get the validation object of current form
    //console.log(currentFormValidation.getErrorsMessages());
    //return currentFormValidation.isValid();
}
/**
 * Created by luis on 9/4/16.
 */
//define actions responses for users' interactions
//to handle click

jQuery(document).on('click', '.c37-lp .c37-child', function(){
    var page = jQuery(this).closest('.c37-lp');

    var pageID = page.attr('id');

    var parentID = jQuery(this).closest('.c37-item-element').attr('id');

    var formActionObject = elementsActions[pageID];

    if (_.isEmpty(formActionObject))
    {
        console.log('no action');
        return;
    }

    var elementAction = formActionObject[parentID];

    /*this is a typical elementAction object
    |
    | https://drive.google.com/file/d/0B1dTAFXQBPD2TTNXUU5wYWZnOGs/view?usp=sharing
    |
    */


    if (typeof elementAction != "object")
    {
        console.log('no action');
        return;
    }

    if (elementAction.action == 'open-link')
    {
        window.location.href = elementAction.target;
    } else if (elementAction.action == 'submit-form')
    {
        /*
        | Submit current form
         */
        jQuery(this).closest('form').submit();

    }


});


/**
 * Created by luis on 9/4/16.
 */

(function(jQuery){

    jQuery(function(){

        //on submit button click, process the form
        jQuery(document).on('click', '[data-role=submit]', function(e){
            e.preventDefault();

            var form = jQuery(this).closest('.c37-lp');
            var formID = form.find('input[name=form_id]').val();

            var formInstance = form.parsley();

            //check if the honeypot field is filled (bot will fill this)
            var honeyField = form.find('.pott').first();


            if (honeyField.val() != "")
            {
                console.log('honey spammer');
                return false;
            }

            console.log('honey checked');

            //check if user has checked the captcha
            if (form.find('.g-recaptcha').length > 0)
            {
                if (form.find('#g-recaptcha-response').val() =="")
                {
                    form.find('.g-recaptcha div').first().css('border', '1px dashed #ff0000');
                    toastr.error(ERROR_PLEASE_SOLVE_CAPTCHA);
                    return false;
                }
            }


            //check if acceptance box is checked
            if ((form.find('.c37-acceptance').length > 0))
            {
                console.log('foudn accept');
                var acceptance = jQuery(form.find('.c37-acceptance').first());
                if (!acceptance.is(':checked'))
                {
                    acceptance.closest('.c37-item-element').addClass('c37-field-error');
                    toastr.error(acceptance.attr('data-error'));
                    return false;
                }

            }


            console.log('acceptance checked!');

            //now start with parsley form validation

            //check if there is a form validation object that store all the rules of elements on form
            //if (typeof  formsValidation[pageID] == 'object')
            //{
            //    //now adding rules to the form
            //    _.each(formsValidation[pageID], function(singleRule){
            //        var jqElement = jQuery('[name='+singleRule.name+']');
            //        var validationInstance = jqElement.parsley();
            //
            //
            //        //add the required rule to the element
            //        if (singleRule.rules.required == "required")
            //        {
            //            validationInstance.options.required = true;
            //        }
            //
            //        //add callback when the field are validated
            //        validationInstance.on('field:error', function(){
            //
            //            var errorArray = this.getErrorsMessages();
            //            console.log('validation');
            //
            //            if (typeof errorArray != 'undefined' && errorArray.length > 0)
            //            {
            //                jqElement.addClass('c37-field-error');
            //                jqElement.closest('.c37-lp-element').addClass('hint--right');
            //                jqElement.closest('.c37-lp-element').addClass('hint--error');
            //                jqElement.closest('.c37-lp-element').attr('aria-label', errorArray[0]);
            //                validationInstance.options.trigger = 'keyup';
            //
            //            } else
            //            {
            //                jqElement.removeClass('c37-field-error');
            //                jqElement.closest('.c37-lp-element').removeClass('hint--right');
            //                jqElement.closest('.c37-lp-element').removeClass('hint--error');
            //                jqElement.closest('.c37-lp-element').removeAttr('aria-label');
            //            }
            //
            //        });
            //
            //
            //
            //    });
            //
            //
            //}

            _.each(formInstance.fields, function(field){

                field.on('field:validated', function(){

                    var errorArray = this.getErrorsMessages();
                    var jqElement = jQuery('[name='+field.$element.attr('name')+']');

                    if (typeof errorArray != 'undefined' && errorArray.length > 0)
                    {
                        jqElement.addClass('c37-field-error');
                        jqElement.closest('.c37-lp-element').addClass('hint--right');
                        jqElement.closest('.c37-lp-element').addClass('hint--error');
                        jqElement.closest('.c37-lp-element').attr('aria-label', errorArray[0]);

                    } else
                    {
                        jqElement.removeClass('c37-field-error');
                        jqElement.closest('.c37-lp-element').removeClass('hint--right');
                        jqElement.closest('.c37-lp-element').removeClass('hint--error');
                        jqElement.closest('.c37-lp-element').removeAttr('aria-label');
                    }

                });

                field.on('field:success', function(){


                });

            });

            formInstance.validate();


            //if form is valid, submit form
            if (!formInstance.isValid())
            {
                toastr.error(ERROR_INPUT_NOT_VALID);
                return false;
            }

            //code reaches here, all field are ok, remove the error classes
            jQuery('.c37-field-error').removeClass('c37-field-error');

            submitForm(form);


        });



    });



    /**
     * Given a form, get all data field and submit it
     * @param form
     */
    function submitForm(form)
    {
        console.log('submit form');
        //if there is a file input in the form, submit the normal way to get the file
        if (form.find('input[type=file]').length > 0)
        {
            form.submit();
            return;
        }

        var data = {};
        var inputs = form.find('input');
        var selects = form.find('select');
        var textareas = form.find('textarea');
        var postURL = form.attr('action');

        _.each(inputs, function(input){
            var currentInput = jQuery(input);
            if (currentInput.attr('type')=='checkbox')
            {
                if (typeof data[currentInput.attr('name')] == 'undefined')
                {
                    console.log('init default array');
                    data[currentInput.attr('name')] = [];
                }

                if (currentInput.is(':checked'))
                {
                    data[currentInput.attr('name')].push(currentInput.val());
                    console.log(data[currentInput.attr('name')]);
                }

            } else if (currentInput.attr('type') == 'radio')
            {
                console.log('i have radio');

                //check if the radio name was added, if not, init with a blank value
                if (typeof data[currentInput.attr('name')] == "undefined")
                    data[currentInput.attr('name')] = '';

                if (currentInput.is(':checked'))
                {
                    data[currentInput.attr('name')] = currentInput.val();
                }
            } else
            {
                data[currentInput.attr('name')] = currentInput.val();
            }

        });

        //get data from select box
        _.each(selects, function(select){
            var currentSelect = jQuery(select);

            data[currentSelect.attr('name')] = currentSelect.val();
        });

        _.each(textareas, function(textarea){
            var currentTextarea = jQuery(textarea);

            data[currentTextarea.attr('name')] = currentTextarea.val();
        });

        //get data from textarea


        data['by_ajax'] = 1;
        //send the data to server

        jQuery.post(
            postURL,
            data,
            function(response)
            {

                var responseData = JSON.parse(response);

                if (responseData.error == 1)
                {
                    //in case the error message is a single string, print it out
                    if (typeof responseData.message == 'string')
                    {
                        toastr.error(responseData.message);
                        return false;
                    }

                    //send the error message
                    for (var i = 0; i < responseData.message.length; i++)
                    {
                        var elementName = responseData.message[i].name;
                        var message = responseData.message[i].message;
                        var jqElement = jQuery('[name='+elementName+']');
                        jqElement.closest('.c37-lp-element').addClass('hint--right');
                        jqElement.closest('.c37-lp-element').addClass('hint--error');
                        jqElement.closest('.c37-lp-element').attr('aria-label', message);
                        jqElement.addClass('c37-field-error');

                    }
                } else {
                    //send the toast message and redirect the user to new URL if set
                    toastr.success(responseData.message);
                    if (responseData.url != "")
                        window.location.href = responseData.url;
                }


            }
        )

    }

    /**
     * Due to the nature of button (and input submit), we need to handle them separately
     */
    //jQuery(document).on('click', '.c37-lp button', function(e){
    //
    //    e.preventDefault();
    //    var form = jQuery(this).closest('form.c37-lp');
    //    //submitForm(form);
    //
    //});
    //jQuery(document).on('click', 'c37-item-element', function(e){
    //    e.preventDefault();
    //});

})(jQuery);

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

/**
 * Created by luis on 11/7/16.
 */
(function(){
    jQuery(function(){
        //on page load, set some variables
        var currentSessionPopupShowed = false;
        var lifetimePopupShowed = localStorage.getItem('c37_popup_popup_showed');




        if (typeof howToShowUp != 'undefined')
        {
            var display = howToShowUp;
            function showPopup(popup)
            {
                if (display.afterClose.action == 'never_show' && lifetimePopupShowed)
                    return;

                if (currentSessionPopupShowed)
                    return;

                if (!currentSessionPopupShowed && (display.afterClose.action == 'keep_showing') )
                    popup.show();
                currentSessionPopupShowed = true;
                localStorage.setItem('c37_popup_popup_showed', true);
            }



            jQuery(document).on('click', '.c37-lp-close-popup', function(){

                jQuery(this).closest('.c37-lp-popup-outer').hide();

            });

            //show the popup only if it hasn't been shown in this session

            var popup = jQuery('#'+display.popupID);

            if (display.trigger == 'mouse_exits')
            {
                jQuery(document).on('mouseleave', function(e){

                    if (e.pageY < 100)
                    {
                        showPopup(popup);
                    }

                });
            } else if (display.trigger == 'after_page_load')
            {
                setTimeout(function(){
                    showPopup(popup);

                }, display.delay * 1000);
            }
        }





    });

})();