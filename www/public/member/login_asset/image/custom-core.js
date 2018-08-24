/// <reference path="jquery-2.1.0.js" />

var icon_prefix = "icon";

var lang = new Object();
 (function ($, undefined) {
     $.fn.reverse = [].reverse;     $.fn.numberBox = function () {
        return this.each(function () {
            $(this).keypress(function (e) {
                var key = e.charCode || e.keyCode || 0;                 return (key == 8 || key == 46 || (key >= 48 && key <= 57));
            });
        });
    }     $.fn.moneyBox = function (digit) {
        return this.each(function () {
            $(this).keypress(function (e) {
                var key = e.charCode || e.keyCode || 0;
                return (key == 8 || key == 46 || (key >= 48 && key <= 57));
                //|| key == 44 ,
            });

            $(this).focusout(function (e) {
                if ($(this).val().length > 0) {
                    var result = $.parseMoney($(this).val(), digit);
                    $(this).val(result);
                }
            });
        });
    }      $.extend({
        cThread: function () {
            return $.cookies.get("thid") == null ? "" : $.cookies.get("thid");
        },         dateNowAsp: function () {
            return (new Date()).toAspNetDateTime();
        },         ifNull: function (value, defaultvalue) {
            return ((value == null) || (value == undefined)) ? defaultvalue : value;
        },         post2: function (obj) {
            return $.ajax({
                contentType: obj.contentType == undefined ? "application/json; charset=utf-8" : obj.contentType,                 dataType: obj.dataType == undefined ? "json" : obj.dataType,                 type: obj.type == undefined ? "POST" : obj.type,                 url: obj.url,                 data: (typeof (obj.data) == "string") ? obj.data : JSON.stringify(obj.data),                 timeout: obj.timeout == undefined ? 0 : obj.timeout,                 crossDomain: obj.crossDomain == undefined ? false : obj.crossDomain,                 //headers: {},                 beforeSend: function (jqXHR, settings) {
                    if ($.isFunction(obj.beforeSend)) {
                        obj.beforeSend(jqXHR, settings);
                    }
                },                 complete: function (jqXHR, textStatus) {
                    if ($.isFunction(obj.complete)) {
                        obj.complete(jqXHR, textStatus);
                    }
                },                 success: function (ret) {
                    if ($.isFunction(obj.success)) {
                        obj.success(ret);
                    }
                },                 error: function (er) {
                    if ($.isFunction(obj.error)) {
                        if (er.readyState != 0 && er.statusText != "abort") {
                            obj.error(er.statusText + ", " + er.responseText);
                        }
                    }
                }
            });
        },         log: function (obj) {
            var settings = {
                power: true,                 timer: false
            }              if (settings.power) {
                if (typeof (obj) === "object") {
                    if (window.console) console.log(obj);                     return;
                }                 if (settings.timer) {
                    var d = new Date(), hours = d.getHours(), minutes = d.getMinutes(), seconds = d.getSeconds(), miliseconds = d.getMilliseconds();                     if (minutes < 10) { minutes = "0" + minutes }                     if (seconds < 10) { seconds = "0" + seconds }                     if (miliseconds < 10) { miliseconds = "00" + miliseconds }                     else if (miliseconds < 100) { miliseconds = "0" + miliseconds }                     obj = '[' + hours + ':' + minutes + ':' + seconds + '.' + miliseconds + ']  ' + obj;
                }                 if (window.console) console.log(obj);
            }
        },         parameter: function (name) {
            name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");             var regexS = "[\\?&]" + name + "=([^&#]*)";             var regex = new RegExp(regexS);             var results = regex.exec(window.location.href);             if (results == null) return "";             else return decodeURIComponent(results[1].replace(/\+/g, " "));
        },         escapeRegExp: function (str) {
            return str.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");
        },         parseInt: function (a) {
            a = $.removeCurrencyFormat(a);             a = parseInt(a, 0);             return a;
        },         parseDecimal: function (a, d) {
            var digit = 2;             if (d != undefined) { digit = d; }              a = $.removeCurrencyFormat(a);             a = parseFloat(a);             a = a.toFixed(digit); 
            return a;
        },         parseMoney: function (a, d) {
            a = $.removeCurrencyFormat(a);             var values = parseFloat(a);             var digit = 2;             if (d != undefined) { digit = d; }             values = values.toFixed(digit);             var Nagative = false;             if (values.toString().indexOf("-") != -1) {
                Nagative = true;                 values = Math.abs(values);
            }             if (!isNaN(values)) {
                values = values.toString().split('.');                 if (values[0] == "") { values = "0"; }                 if (values.length == 1) {
                    values += ".00";                     values = values.split('.');
                }                 var Result = "", a = values[0].length % 3;                 if (a != 0) {
                    Result = values[0].substring(0, a) + ",";                     values[0] = values[0].substring(a, values[0].length);
                }                 for (var i = 0; i < values[0].length - 1; i += 3) {
                    Result += values[0].substring(i, i + 3) + ",";
                }                 if (Nagative) {
                    if (digit == 0) { return "-" + Result.substring(0, Result.length - 1); }                     else { return "-" + Result.substring(0, Result.length - 1) + "." + values[1].substring(0, digit); }
                }                 else {
                    if (digit == 0) { return Result.substring(0, Result.length - 1); }                     else { return Result.substring(0, Result.length - 1) + "." + values[1].substring(0, digit); }
                }
            } else { return "0.00"; }
        },         parsePage: function (len, row) {
            var max = parseFloat(len / row);
            var num_array = max.toString().split(".");
            if (num_array.length > 1) {
                max = parseFloat(num_array[0]) + 1;
            }             return max;
        },         removeCurrencyFormat: function (a) {
            var myarray = a.toString().split(',');             return myarray.join('');
        },         formatFileSize: function (bytes, fixType) {

            try {
                bytes = parseFloat(bytes);
            } catch (e) {
                return "value is not a number.";
            }

            var prefix = "";

            if (bytes < 0) {
                prefix = "-";
                bytes = bytes * -1;
            }

            var result = "";

            if (fixType == "MB") {
                bytes = bytes / (1024.00 * 1024.00); // MB
                result = bytes.toFixed(2) + ' MB';
            }
            else if (fixType == "GB") {
                bytes = (bytes / (1024.00 * 1024.00)) / 1024.00;
                result = bytes.toFixed(2) + ' GB';
            }
            else {
                if (bytes > 1024) {
                    bytes = bytes / 1024.00; // KB
                    if (bytes > 1024) {
                        bytes = bytes / 1024.00; // MB
                        if (bytes > 1024) {
                            bytes = bytes / 1024.00; // GB
                            if (bytes > 1024) {
                                bytes = bytes / 1024.00; // TB
                                result = bytes.toFixed(2) + ' TB';
                            }
                            else {
                                result = bytes.toFixed(2) + ' GB';
                            }
                        }
                        else {
                            result = bytes.toFixed(2) + ' MB';
                        }
                    }
                    else {
                        result = bytes.toFixed(2) + ' KB';
                    }
                }
                else {
                    result = bytes.toFixed(2) + ' bytes';
                }
            }
             return prefix + result;
        },         formatBitrate: function (bits) {
            if (typeof bits !== 'number') {
                return '';
            }             if (bits >= 1000000000) {
                return (bits / 1000000000).toFixed(2) + ' Gbit/s';
            }             if (bits >= 1000000) {
                return (bits / 1000000).toFixed(2) + ' Mbit/s';
            }             if (bits >= 1000) {
                return (bits / 1000).toFixed(2) + ' kbit/s';
            }             return bits.toFixed(2) + ' bit/s';
        },         dateNow: function (lang) {
            var curdate = new Date();             return lang == "th" ? curdate.getThaiDateShort() : curdate.getEngDateShort();
        },         GUID: function () {
            var S4 = function () { return (((1 + Math.random()) * 0x10000) | 0).toString(16).substring(1); };             return (S4() + S4() + "-" + S4() + "-" + S4() + "-" + S4() + "-" + S4() + S4() + S4());
        },         randomNumber: function (d) {
            if (d == undefined) { d = 4; }             return Math.random().toFixed(d) * Math.pow(10, d);
        },         cloneObject: function (data) {
            var obj = {};             $.each(data, function (name, value) {
                obj[name] = value;
            });             return obj;
        },
        locationPath: function (number) {
            var loc_array = window.location.pathname.split("http://www.register.in.th/");
            return loc_array.slice(0, loc_array.length - number).join("http://www.register.in.th/");
        },
        loadingModal: function (bool, msg, callback) {

            if ($.isFunction(msg)) {
                callback = msg;
                msg = null;
            }

            var $constance = $("#tnt-site-loading");

            if ($constance.length == 0) {
                var html = '<div id="tnt-site-loading" style="display: none; border: 0 !important;">';
                html += '       <div style="text-align: center;">';
                html += '           <i class="fa fa-fw fa-4x fa-circle-o-notch fa-spin text-success"></i>';
                html += '           <h4 id="tnt-site-loading-txt"></h4>';
                html += '       </div>';
                html += '   </div>';
                $constance = $(html).appendTo('body');

                $constance.dialog({
                    autoOpen: false,
                    width: 400,
                    modal: true,
                    resizable: false,
                    dialogClass: "transparent-dialog"
                });
            }

            var showText = "";
            if (msg == null) {
                showText = $.ifNull($.getLanguage("loading", $lang), "Loading...");
            }
            else {
                showText = msg;
            }

            $constance.find("#tnt-site-loading-txt").text(showText);

            if (bool) {
                if (!$constance.dialog("isOpen")) {
                    $constance.dialog("open");
                }
                if ($.isFunction(callback)) {
                    callback();
                }
            }
            else {
                setTimeout(function () {
                    $constance.dialog("close");
                    if ($.isFunction(callback)) {
                        callback();
                    }
                }, 800);
            }
        },
        confirmModal: function (title, msg, buttons, onshow) {
            if (buttons == null) {
                buttons = [];
            }

            if ($.isArray(msg)) {
                buttons = msg;
                msg = title;
                title = "ยืนยันการดำเนินการ";
            }

            //{
            //    title: "",
            //    css: "",
            //    callback: $.noop
            //}

            var $constance = $("#tnt-confirmbox");

            if ($constance.length == 0) {
                var html = '<div id="tnt-confirmbox" class="modal" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">';
                html += '       <div class="modal-dialog">';
                html += '           <div class="modal-content">';
                html += '               <div class="modal-header">';
                html += '                   <h4 class="modal-title"></h4 >';
                html += '               </div>';
                html += '               <div class="modal-body">';
                html += '                   <p class="confirm-msg"></p>';
                html += '               </div>';
                html += '               <div class="modal-footer text-right">';
                html += '               </div>';
                html += '           </div>';
                html += '       </div>';
                html += '   </div>';

                $constance = $(html).appendTo('body');
            }

            var footer = $constance.find(".modal-footer").html("");
            $.each(buttons, function (index, value) {
                var btn = $("<button>", {
                    "class": "btn " + value.css
                }).text(value.title).click(function () {
                    if ($.isFunction(value.callback)) {
                        value.callback($constance);
                    }
                });
                footer.append(btn);
            });

            $constance.find(".modal-title").html(title);
            $constance.find(".confirm-msg").html(msg);
            $constance.modal("show");

            if ($.isFunction(onshow)) {
                onshow();
            }
        },
        textWidth: function (txt, req_width, req_tag) {

            var result = txt;

            if (req_tag == null) {
                req_tag == "span";
            }

            var span = $("<" + req_tag + ">", { "style": "position: absolute; top: -999px; left: -999px" }).appendTo($('body')).html(txt);
            var current_width = span.width();
            if (current_width > req_width) {

                // แยกให้เป็น chararray
                var txt_splited = txt.split(''), splited_length = txt_splited.length;

                // เอาตัวหลัง 5 ตัว มาหาความกว้างก่อน
                var lasted = "...", lasted_width = 0;
                for (var i = splited_length - 6; i < splited_length; i++) {
                    lasted += txt_splited[i];
                }
                span.html(lasted);
                lasted_width = span.width();

                // ความกว้างที่เหลือ
                var max_width = req_width - lasted_width;

                // ใส่ทีละตัวแล้วคำนวน
                var mytext = "";

                $.each(txt_splited, function (a, chr) {
                    mytext += chr;
                    span.html(mytext);
                    if (span.width() >= max_width) {
                        return false;
                    }
                });

                result = mytext + lasted;
            }

            // ลบทิ้ง
            span.remove();

            return result;
        },
        removeScript: function (txt) {
            return txt.replace(/(<([^>]+)>)/ig, "");
        },
        checkScript: function (txt) {
            var SCRIPT_REGEX = /<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi;
            return SCRIPT_REGEX.test(txt);
        },
        getLanguage: function (key, language) {
            var key_array = key.split("."),
                key_value = lang[language];

            for (var i = 0; i < key_array.length; i++) {
                if (key_value == null) {
                    return "";
                }
                key_value = key_value[key_array[i]];
            }

            return key_value == null ? "" : key_value;
        },
        changeLanguage: function (language) {
            var all_element, ele, lang_key, lang_text;

            all_element = $("[data-lang]");

            $.each(all_element, function (index, value) {
                ele = $(value);
                lang_key = ele.attr("data-lang");
                lang_text = $.getLanguage(lang_key, language);
                if (lang_text.length > 0) {
                    ele.text(lang_text);
                }
            });
        },
        getLanguageMonth: function (index, language) {
            return system_month[language][index];
        }
    });      // ==================================================================================================     // ============================================== PROTOTYPE      Boolean.parse = function (value) {
        if (value == null) {
            return false;
        }         if (typeof value === "number") {
            value = parseInt(value, 0);             return value == 1 ? true : value == 0 ? false : parseError();;
        }         switch (value.toLowerCase()) {
            case "true":                 return true;             case "false":                 return false;             default:                 return false;
        }
    }      String.prototype.toDateFromAspNet = function () {
        var split_dot = this.split('.');         var a = split_dot.length == 1 ? split_dot[0].replace("Z", "") : split_dot[0];         var b = a.split("T");         var dd = b[0].split("-");         var tt = b[1].split(":");          var result = new Date(parseFloat(dd[0]), (parseFloat(dd[1]) - 1), parseFloat(dd[2]), parseFloat(tt[0]), parseFloat(tt[1]), parseFloat(tt[2]), 000);          return result;
    }     String.prototype.toDateFromAspNetUTC = function () {
        //var result = this.toDateFromAspNet();         //result.setMinutes(result.getMinutes() + result.getTimezoneOffset());         //return result;

        var result = this.toDateFromAspNet();
        return result;
    }        Date.prototype.toAspNetDateTime = function () {
        var d, m, y,             hh, mm, ss, ms;          //this.setMinutes(this.getMinutes() + this.getTimezoneOffset());          d = this.getDate();         m = this.getMonth() + 1;         y = this.getFullYear();         hh = this.getHours();         mm = this.getMinutes();         ss = this.getSeconds();         ms = this.getMilliseconds();          return y + "-" + (m < 10 ? "0" + m : m) + "-" + (d < 10 ? "0" + d : d) + "T" + (hh < 10 ? "0" + hh : hh) + ":" + (mm < 10 ? "0" + mm : mm) + ":" + (ss < 10 ? "0" + ss : ss) + "." + (ms < 10 ? "0" + ms : ms) + "Z";
    }     Date.prototype.toThaiDateShort = function (withtime) {
        var d = this.getDate(),             m = this.getMonth(),             y = this.getFullYear();          if (y == 1901 || y == 2444) {
            return "-";
        }          var months_1 = ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],             months_2 = ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];          if (y < 2500) {
            y += 543;
        }          if (withtime == null || withtime == false) {
            return d + " " + months_2[m] + " " + y;
        }         else {
            var hh = this.getHours(),                 mm = this.getMinutes(),                 ss = this.getSeconds();              return d + " " + months_2[m] + " " + y + " " + (hh < 10 ? "0" + hh : hh) + ":" + (mm < 10 ? "0" + mm : mm) + "";
        }
    }     Date.prototype.getThaiTime = function () {
        var hh = this.getHours(),             mm = this.getMinutes(),             ss = this.getSeconds();          return (hh < 10 ? "0" + hh : hh) + ":" + (mm < 10 ? "0" + mm : mm) + "";
    }     Date.prototype.toEngDate = function (withtime) {
        var d = this.getDate(),             m = this.getMonth(),             y = this.getFullYear();          if (y == 1901 || y == 2444) {
            return "-";
        }          //return d + "/" + (m + 1) + "/" + y;          //var months_1 = ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],         //    months_2 = ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];          if (y > 2500) {
            y -= 543;
        }          if (withtime == null || withtime == false) {
            return d + "/" + (m + 1) + "/" + y;
        }         else {
            var hh = this.getHours(),                 mm = this.getMinutes(),                 ss = this.getSeconds();              return d + "/" + (m + 1) + "/" + y + " " + (hh < 10 ? "0" + hh : hh) + ":" + (mm < 10 ? "0" + mm : mm) + "";
        }
    }     Date.prototype.toThaiNumberDate = function (withtime) {
        var d = this.getDate(),             m = this.getMonth() + 1,             y = this.getFullYear();          if (y == 1901 || y == 2444) {
            return "-";
        }          if (y < 2500) {
            y += 543;
        }          if (withtime == null || withtime == false) {
            return d + "/" + m + "/" + y;
        }         else {
            var hh = this.getHours(),                 mm = this.getMinutes(),                 ss = this.getSeconds();              return d + "/" + m + "/" + y + " " + (hh < 10 ? "0" + hh : hh) + ":" + (mm < 10 ? "0" + mm : mm) + "";
        }
    }      Date.prototype.getThaiDate = function () {
        var mydate = new Date(),             d = mydate.getDate(),             m = mydate.getMonth() + 1,             y = mydate.getFullYear();          if (y < 2500) {
            y += 543;
        }          return d + "/" + m + "/" + y;
    }     Date.prototype.getThaiDateFull = function () {
        var mydate = new Date(),             d = mydate.getDate(),             m = mydate.getMonth(),             y = mydate.getFullYear();          var months_1 = ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],             months_2 = ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];          if (y < 2500) {
            y += 543;
        }          return d + " " + months_1[m] + " " + y;
    }     Date.prototype.getThaiDateShort = function () {
        var mydate = new Date(),             d = mydate.getDate(),             m = mydate.getMonth(),             y = mydate.getFullYear();          var months_1 = ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],             months_2 = ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];          if (y < 2500) {
            y += 543;
        }          return d + " " + months_2[m] + " " + y;
    }     Date.prototype.getEngDate = function () {
        var mydate = new Date(),             d = mydate.getDate(),             m = mydate.getMonth() + 1,             y = mydate.getFullYear();          if (y > 2500) {
            y -= 543;
        }          return d + "/" + m + "/" + y;
    }     Date.prototype.getEngDateFull = function () {
        var mydate = new Date(),             d = mydate.getDate(),             m = mydate.getMonth(),             y = mydate.getFullYear();          var months_1 = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],             months_2 = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];          if (y > 2500) {
            y -= 543;
        }          return months_1[m] + " " + d + ", " + y;
    }     Date.prototype.getEngDateShort = function () {
        var mydate = new Date(),             d = mydate.getDate(),             m = mydate.getMonth(),             y = mydate.getFullYear();          var months_1 = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],             months_2 = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];          if (y > 2500) {
            y -= 543;
        }          return months_2[m] + " " + d + ", " + y;
    }      // DD-MM-YYYY hh:mm:ss     Date.prototype.customFormat = function (formatString, lang) {
        var YYYY, YY, MMMM, MMM, MM, M, DDDD, DDD, DD, D, hhh, hh, h, mm, m, ss, s, ampm, AMPM, dMod, th;         var dateObject = this;          YY = ((YYYY = dateObject.getFullYear()) + "").slice(-2);         MM = (M = dateObject.getMonth() + 1) < 10 ? ('0' + M) : M;         MMM = (MMMM = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"][M - 1]).substring(0, 3);         DD = (D = dateObject.getDate()) < 10 ? ('0' + D) : D;         DDD = (DDDD = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"][dateObject.getDay()]).substring(0, 3);         th = (D >= 10 && D <= 20) ? 'th' : ((dMod = D % 10) == 1) ? 'st' : (dMod == 2) ? 'nd' : (dMod == 3) ? 'rd' : 'th';          formatString = formatString.replace("#YYYY#", YYYY).replace("#YY#", YY).replace("#MMMM#", MMMM).replace("#MMM#", MMM).replace("#MM#", MM).replace("#M#", M).replace("#DDDD#", DDDD).replace("#DDD#", DDD).replace("#DD#", DD).replace("#D#", D).replace("#th#", th);          h = (hhh = dateObject.getHours());         if (h == 0) h = 24;         if (h > 12) h -= 12;          hh = h < 10 ? ('0' + h) : h;         AMPM = (ampm = hhh < 12 ? 'am' : 'pm').toUpperCase();         mm = (m = dateObject.getMinutes()) < 10 ? ('0' + m) : m;         ss = (s = dateObject.getSeconds()) < 10 ? ('0' + s) : s;          return formatString.replace("#hhh#", hhh).replace("#hh#", hh).replace("#h#", h).replace("#mm#", mm).replace("#m#", m).replace("#ss#", ss).replace("#s#", s).replace("#ampm#", ampm).replace("#AMPM#", AMPM);
    }       // ==================================================================================================     // ============================================== JSON      var m = {
        '\b': '\\b',         '\t': '\\t',         '\n': '\\n',         '\f': '\\f',         '\r': '\\r',         '"': '\\"',         '\\': '\\\\'
    },         s = {
            'array': function (x) {
                var a = ['['], b, f, i, l = x.length, v;                 for (i = 0; i < l; i += 1) {
                    v = x[i];                     f = s[typeof v];                     if (f) {
                        v = f(v);                         if (typeof v == 'string') {
                            if (b) {
                                a[a.length] = ',';
                            }                             a[a.length] = v;                             b = true;
                        }
                    }
                }                 a[a.length] = ']';                 return a.join('');
            },             'boolean': function (x) {
                return String(x);
            },             'null': function (x) {
                return "null";
            },             'number': function (x) {
                return isFinite(x) ? String(x) : 'null';
            },             'object': function (x) {
                if (x) {
                    if (x instanceof Array) {
                        return s.array(x);
                    }                     var a = ['{'], b, f, i, v;                     for (i in x) {
                        v = x[i];                         f = s[typeof v];                         if (f) {
                            v = f(v);                             if (typeof v == 'string') {
                                if (b) {
                                    a[a.length] = ',';
                                }                                 a.push(s.string(i), ':', v);                                 b = true;
                            }
                        }
                    }                     a[a.length] = '}';                     return a.join('');
                }                 return 'null';
            },             'string': function (x) {
                if (/["\\\x00-\x1f]/.test(x)) {
                    x = x.replace(/([\x00-\x1f\\"])/g, function (a, b) {
                        var c = m[b];                         if (c) {
                            return c;
                        }                         c = b.charCodeAt();                         return '\\u00' +                             Math.floor(c / 16).toString(16) +                             (c % 16).toString(16);
                    });
                }                 return '"' + x + '"';
            }
        };     $.toJSON = function (v) {
        var f = isNaN(v) ? s[typeof v] : s['number'];         if (f) return f(v);
    };     $.parseJSON = function (v, safe) {
        if (safe === undefined) safe = $.parseJSON.safe;         if (safe && !/^("(\\.|[^"\\\n\r])*?"|[,:{}\[\]0-9.\-+Eaeflnr-u \n\r\t])+?$/.test(v))             return undefined;         return eval('(' + v + ')');
    };     $.parseJSON.safe = false;
 })(jQuery);  
// Set Language
//var $lang = $.ifNull($.cookies.get("icon-lang"), "th");
var $lang = "th";

var system_month = {
    "en": ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
    "th": ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
    "th2": ['ม.ค', 'ก.พ', 'มี.ค', 'ม.ย', 'พ.ค', 'มิ.ย', 'ก.ค', 'ส.ค', 'ก.ย', 'ต.ค', 'พ.ย', 'ธ.ค']
};
  // API  var API_GET = function (path, callback, error) {
    return $.ajax(path, {
        type: "GET",
        dataType: 'json'
    }).success(function (data, textStatus, jqXHR) {
        if ($.isFunction(callback)) {
            callback(data);
        }
    }).error(function (jqXHR, textStatus, errorThrown) {
        if ($.isFunction(error)) {
            error(jqXHR, textStatus, errorThrown);
        }
    });
};

var API_POST = function (path, data, callback, error) {
    if (data == null) { data = {}; }
    return $.ajax(path, {
        type: "POST",
        data: {
            '': typeof data == "string" ? data : JSON.stringify(data)
        }
    }).success(function (data, textStatus, jqXHR) {
        if ($.isFunction(callback)) {
            callback(data);
        }
    }).error(function (jqXHR, textStatus, errorThrown) {
        if ($.isFunction(error)) {
            error(jqXHR, textStatus, errorThrown);
        }
    });
};   var LoadingBox = function (par, opt) {
    var self = this;

    self.options = {
        hideElement: false,
        hideOpacity: 0,
        htmlBody: false
    }

    opt = $.ifNull(opt, {});
    self.options.hideElement = $.ifNull(opt.hideElement, self.options.hideElement);
    self.options.hideOpacity = $.ifNull(opt.hideOpacity, self.options.hideOpacity);

    self.parent = $(par);
    self.instant = null;
    self.container = null;
    self.button = null;
    self.callback = $.noop;
    self.height = 0;
    self.width = 0;
    self.margin = 0;

    self.getElement = function () {
        if (self.instant == null) {// display: none;

            self.width = self.parent.outerWidth();
            self.height = self.parent.outerHeight();

            //var styles = "position: absolute; top: 50%; left: 50%; width: 320px; min-height: 240px; margin-left: -160px; margin-top: -120px; display: none;";
            //var styles = "position: absolute; top: 50%; width: " + parent_width + "px; min-height: 240px; margin-top: -120px; margin-bottom: 20px; display: none;";
            var styles = "position: absolute; top: 0; width: " + self.width + "px; min-height: 180px; height: " + self.height + "px; display: none;";
            if (self.options.hideElement) {
                styles = "position: absolute; width: " + self.width + "px; min-height: 240px; margin-bottom: 20px; display: none;";
            }

            var html = '<div class="loading_box text-center" style="' + styles + '">';
            html += '       <div class="loading_box_container">';
            html += '       <i id="loading_icon" class="icon-spinner icon-spin icon-4x text-success" style="margin-bottom: 10px;"></i>';
            if (self.options.htmlBody) {
                html += '       <div class="loading_txt">';
                html += '           Loading...';
                html += '       </div>';
            }
            else {
                html += '       <h4 class="loading_txt">';
                html += '           Loading...';
                html += '       </h4>';
            }
            html += '       <button class="btn btn-primary" type="button" style="margin-top: 20px;">ตกลง</button><br/><br/>';
            //html += '       <i id="btn_close_loading_box" class="icon-remove icon-2x" title="Close" style="position: absolute; right: 0; bottom: 0; cursor: pointer;"></i>';
            html += '       </div>';
            html += '   </div>';
            self.parent.wrap('<div class="loading_child" style="position: relative;"></div>');
            self.container = self.parent.parent();
            self.instant = $(html);
            self.container.append(self.instant);

            self.button = self.instant.find("button");
            self.button.click(function () {
                self.hide(self.callback);
            });

            return self.instant;
        }
        else {
            return self.instant;
        }
    }
    self.setPosition = function () {

        var container = self.instant.find(".loading_box_container");

        if (self.options.hideElement) {
            container.css({
                "margin-top": "20px"
            });
        }
        else {
            var innerHeight = container.outerHeight();
            var margin = self.height - innerHeight;

            if (self.margin != margin) {
                if (margin > 0) {
                    self.margin = margin;
                    container.css({
                        "margin-top": (margin / 2) + "px"
                    });
                }
            }
        }

    }
    self.show = function (txt, callback) {

        self.getElement();
        self.callback = $.ifNull(callback, $.noop);

        var $icon = self.instant.find("i"),
            $txt = self.instant.find(".loading_txt");

        var removeClass = "icon-spinner,icon-spin,icon-remove-circle,icon-ok-circle,text-success,text-danger".split(",");
        for (var i = 0; i < removeClass.length; i++) {
            $icon.removeClass(removeClass[i]);
        }

        $icon.addClass("icon-spinner icon-spin text-success");
        txt = txt == null ? "Loading..." : txt;
        self.button.hide();
        $txt.html(txt);

        self.parent.animate({ opacity: self.options.hideOpacity }, 200, function () {
            if (self.options.hideElement) {
                $(this).hide();
            }
            self.instant.show();
            self.setPosition();
        });
    }
    self.success = function (txt, callback) {

        self.getElement();
        self.callback = $.ifNull(callback, $.noop);

        var $icon = self.instant.find("i"),
            $txt = self.instant.find(".loading_txt");

        var removeClass = "icon-spinner,icon-spin,icon-remove-circle,icon-ok-circle,text-success,text-danger".split(",");
        for (var i = 0; i < removeClass.length; i++) {
            $icon.removeClass(removeClass[i]);
        }

        $icon.addClass("icon-ok-circle text-success");
        txt = txt == null ? "Success" : txt;
        self.button.show();
        $txt.html(txt);

        self.parent.animate({ opacity: self.options.hideOpacity }, 200, function () {
            if (self.options.hideElement) {
                $(this).hide();
            }
            self.instant.show();
            self.setPosition();
        });
    }
    self.error = function (txt, callback) {

        self.getElement();
        self.callback = $.ifNull(callback, $.noop);

        var $icon = self.instant.find("i"),
            $txt = self.instant.find(".loading_txt");

        var removeClass = "icon-spinner,icon-spin,icon-remove-circle,icon-ok-circle,text-success,text-danger".split(",");
        for (var i = 0; i < removeClass.length; i++) {
            $icon.removeClass(removeClass[i]);
        }

        $icon.addClass("icon-remove-circle text-danger");
        txt = txt == null ? "Error" : txt;
        self.button.show();
        $txt.html(txt);

        self.parent.animate({ opacity: self.options.hideOpacity }, 200, function () {
            if (self.options.hideElement) {
                $(this).hide();
            }
            self.instant.show();
            self.setPosition();
        });
    }
    self.hide = function (callback) {
        self.parent.stop().css({ opacity: 0 });

        self.instant.hide();

        if (self.options.hideElement) {
            self.parent.show();
        }

        self.parent.animate({ opacity: 1 }, 200, function () {
            if ($.isFunction(callback)) {
                callback();
            }
        });
    }
}   /** * *  Base64 encode / decode *  http://www.webtoolkit.info/ * **/  var Base64 = {      // private property     _keyStr: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",      // public method for encoding     encode: function (input) {
        var output = "";         var chr1, chr2, chr3, enc1, enc2, enc3, enc4;         var i = 0;          input = Base64._utf8_encode(input);          while (i < input.length) {
             chr1 = input.charCodeAt(i++);             chr2 = input.charCodeAt(i++);             chr3 = input.charCodeAt(i++);              enc1 = chr1 >> 2;             enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);             enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);             enc4 = chr3 & 63;              if (isNaN(chr2)) {
                enc3 = enc4 = 64;
            } else if (isNaN(chr3)) {
                enc4 = 64;
            }              output = output + 			this._keyStr.charAt(enc1) + this._keyStr.charAt(enc2) + 			this._keyStr.charAt(enc3) + this._keyStr.charAt(enc4);
         }          return output;
    },      // public method for decoding     decode: function (input) {
        if (input == null) {
            return "";
        }
        var output = "";         var chr1, chr2, chr3;         var enc1, enc2, enc3, enc4;         var i = 0;          input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");          while (i < input.length) {
             enc1 = this._keyStr.indexOf(input.charAt(i++));             enc2 = this._keyStr.indexOf(input.charAt(i++));             enc3 = this._keyStr.indexOf(input.charAt(i++));             enc4 = this._keyStr.indexOf(input.charAt(i++));              chr1 = (enc1 << 2) | (enc2 >> 4);             chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);             chr3 = ((enc3 & 3) << 6) | enc4;              output = output + String.fromCharCode(chr1);              if (enc3 != 64) {
                output = output + String.fromCharCode(chr2);
            }             if (enc4 != 64) {
                output = output + String.fromCharCode(chr3);
            }
         }          output = Base64._utf8_decode(output);          return output;
     },      // private method for UTF-8 encoding     _utf8_encode: function (string) {
        string = string.replace(/\r\n/g, "\n");         var utftext = "";          for (var n = 0; n < string.length; n++) {
             var c = string.charCodeAt(n);              if (c < 128) {
                utftext += String.fromCharCode(c);
            }             else if ((c > 127) && (c < 2048)) {
                utftext += String.fromCharCode((c >> 6) | 192);                 utftext += String.fromCharCode((c & 63) | 128);
            }             else {
                utftext += String.fromCharCode((c >> 12) | 224);                 utftext += String.fromCharCode(((c >> 6) & 63) | 128);                 utftext += String.fromCharCode((c & 63) | 128);
            }
         }          return utftext;
    },      // private method for UTF-8 decoding     _utf8_decode: function (utftext) {
        var string = "";         var i = 0;         var c = c1 = c2 = 0;          while (i < utftext.length) {
             c = utftext.charCodeAt(i);              if (c < 128) {
                string += String.fromCharCode(c);                 i++;
            }             else if ((c > 191) && (c < 224)) {
                c2 = utftext.charCodeAt(i + 1);                 string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));                 i += 2;
            }             else {
                c2 = utftext.charCodeAt(i + 1);                 c3 = utftext.charCodeAt(i + 2);                 string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));                 i += 3;
            }
         }          return string;
    }
 }   function SignalrHub(url, hubName, api) {
    var self = this;      self.url = url == undefined ? "" : url;     self.hubName = hubName == undefined ? "" : hubName;     self.api = api == undefined ? false : api;     self.logging = false;      self.connection = $.hubConnection(self.url, { logging: self.logging });     self.proxy = self.connection.createHubProxy(self.hubName);      self.start = function (callback) {
        self.connection.start({ jsonp: self.api })             .done(function () {
                if ($.isFunction(callback)) {
                    callback(true);
                }
            }).fail(function (e) {
                if ($.isFunction(callback)) {
                    callback(false, e);
                }
            });
    }

    self.invoke = function (name, param) {
        self.proxy.invoke(name, param).done(function (ret) {
            //console.log(ret);
        }).fail(function (error) {
            console.log('invoke failed. Error: ' + error);
        });
    }

    self.on = function (name, callback) {
        self.proxy.on(name, function (ret) {
            if ($.isFunction(callback)) {
                callback(ret);
            }
        });
    }
}


