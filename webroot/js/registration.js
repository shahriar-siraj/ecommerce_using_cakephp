/* global $ */
$(document).ready(function () {
    "use strict";

    var spinner = '<div class="loader-container ball-pulse-double"><div class="loader"><div class="ball-1"></div><div class="ball-2"></div></div></div>';

    function MainJS() {
        var counter = 1;
        $("a.addTradeService").bind("click", function () {
            alert('cliked');
        });
    }

    function showSpinner(href) {
        // $('#' + href).append(spinner);
        $('#reg_page').prepend(spinner);
    }

    function hideSpinner() {
        $('.loader-container').remove();
    }

    function switchTab() { 

        $(".registrationForm .processTK").bind("click", function () {

            if($(".accept_cgu").is(':checked')) { 
                return true;
            } else { 
                alert('Please accept the CGU!');
                return false;
            }

        });

        $(".registrationForm a.switchTab").bind("click", function () {

            var myForm = $('.registrationForm').find('form');
            var form = myForm.serialize();
            var error = 0;
            var url = $(this).attr('href');

            // If there is required items
            myForm.find('input[data-type="required"]').each(function(index, item) {
                if($.trim($(item).val()) == ''){
                    $(item).addClass('required_field');
                    error = error + 1;
                } else {
                    $(item).removeClass('required_field');
                }
            });

            if (url == '#account_details') { 
                var if_multi_required = $('.registrationForm').find('.active').find('input[data-type="multi_required"]').length;
                var checked_boxes = $('.registrationForm').find('.active').find('input[data-type="multi_required"]:checked').length;

                console.log(checked_boxes);

                if (if_multi_required != 0) { 
                    if(checked_boxes >= 1){
                        $('.reltrade').css({ 'color': "white" });
                    } else {
                        $(this).prop("checked",true);
                        error = error + 1;
                        alert('You need to select at least one relevant trade service!')
                        $('.reltrade').css({ 'color': "red" });
                    }
                }
            }

            if (error > 0) {
                return false;
            }

            var href = $(this).attr('href');
            var full_href = 'a[href="' + href + '"]:first';
            var currentTab = $('#my-tab-content').find('.active').attr('id');
            showSpinner(currentTab);

                $.ajax({
                    type : "POST",
                    url : $(this).attr("data-url"),
                    dataType: "HTML",
                    data: {form: form},
                    success : function (data) {
                        MainJS();
                        $('ul.nav-tabs li.active').removeClass('active');
                        $('#my-tab-content .active').removeClass('active');
                        $('ul.nav-tabs li').find(full_href).closest('li').addClass('active');
                        $('#my-tab-content').find(href).addClass('active');
                        $(href).html(data);
                        hideSpinner();
                        switchTab();
                    },
                    error: function (e) {
                      console.log('error');
                    }
               });
            return false;
        });

    }

    switchTab();
  
});

function PopupCenterDual(url, title, w, h) {
    // Fixes dual-screen position Most browsers Firefox
    var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
    var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;

    width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
    height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

    var left = ((width / 2) - (w / 2)) + dualScreenLeft;
    var top = ((height / 2) - (h / 2)) + dualScreenTop;
    var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

    // Puts focus on the newWindow
    if (window.focus) {
    newWindow.focus();
    }
}