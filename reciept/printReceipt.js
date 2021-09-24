function printReceipt(){
        var printContents = document.getElementById("printReceiptHtml").innerHTML;
        var params = [
            'height=' + screen.height,
            'width=' + screen.width,
            'fullscreen=yes'].join(','),
        popup = window.open("", 'popUpWindow', params);
        /*jshint multistr: true */
        popup.document.write(
            '<html>\
                <head>\
                <title>receipt</title>\
                <link rel="stylesheet" type="text/css" href="./printReceipt.css" />\
                </head>\
                <body class="print">'+ printContents+ '\
                <script>\
                window.onload = function() { window.print(); };\
                \
                (function() {\
            var beforePrint = function() {\
                /*console.log("Functionality to run before printing.");alert("before print dialog open");*/\
            };\
            var afterPrint = function() {\
                /*console.log("Functionality to run after printing");alert("after print dialog closed");*/\
                window.close();\
            };\
        \
            if (window.matchMedia) {\
                var mediaQueryList = window.matchMedia("print");\
                mediaQueryList.addListener(function(mql) {\
                    if (mql.matches) {\
                        beforePrint();\
                    } else {\
                        afterPrint();\
                    }\
                });\
            }\
        \
            window.onbeforeprint = beforePrint;\
            window.onafterprint = afterPrint;\
        }());\
                </script>\
                </body>\
            </html>'
        );
        popup.onfocus = function () {
          setTimeout(function () {
            popup.focus();
            popup.document.close();
          }, 1);
        };
}
