( function( $ ) {
    // $('#tabs-content .panel-heading a').addClass('closed');
    // $('#tabs-content #heading1 a').addClass('clicked').removeClass('closed');
    // $('.title').addClass('closed');
    if ($('li').hasClass("animated")) {
        $(this).attr('data-aos','fade-left');
        $(this).addClass('fade-left');
    }

// $('#mobile-menu li').attr('data-aos','fade-left');
// $('#mobile-menu li').attr('data-aos-duration','1300');
// $('#mobile-menu li').attr('data-aos-delay','900');


$(function() {
var dark = $("#heyfx-demo").closest(".column-section");
dark.addClass("dark-column");
});
    
    $('.error404 .banner_abso').fadeIn(2500);
    $('<ion-icon name="checkmark-outline"></ion-icon>').appendTo('.heyfx-block ul li');

    
    $(function() {
        var header = $(".float-header.fixed");
        $(window).scroll(function() {    
            var scroll = $(window).scrollTop();
        
            if (scroll >= 1100) {
                header.addClass("active-float");
            } else {
                header.removeClass("active-float");
            }
        });
    });

    // $('.float-header.fixed ul li:nth-of-type(1)').attr('data-type','forexmajors2');
    // $('.float-header.fixed .np-pr-tabs-container > div:nth-of-type(1)').attr('id','np-pr-table-forexmajors2');
    // $('.float-header.fixed ul li:nth-of-type(2)').attr('data-type','forexcrosses2');
    // $('.float-header.fixed .np-pr-tabs-container > div:nth-of-type(2)').attr('id','np-pr-table-forexcrosses2');
    // $('.float-header.fixed ul li:nth-of-type(3)').attr('data-type','cryptos2');
    // $('.float-header.fixed .np-pr-tabs-container > div:nth-of-type(3)').attr('id','np-pr-table-cryptos2');
    // $('.float-header.fixed ul li:nth-of-type(4)').attr('data-type','indices2');
    // $('.float-header.fixed .np-pr-tabs-container > div:nth-of-type(4)').attr('id','np-pr-table-indices2');
    // $('.float-header.fixed ul li:nth-of-type(5)').attr('data-type','comm2');
    // $('.float-header.fixed .np-pr-tabs-container > div:nth-of-type(5)').attr('id','np-pr-table-comm2');  

    
    

//     var distance = $('.form-live-reg-container').offset().top,
//     var header = $(".float-header.fixed");
//     $window = $(window);

// $window.scroll(function() {
//     if ( $window.scrollTop() >= distance ) {
//         header.addClass("active-float");
//     } 
// });

    
    var $column_parent = $('.column-section p img').parent();
    $($column_parent).addClass('no-margin');
    
    

       //SAME HEIGHT STAFF PICK ELEMENT

       $(document).ready(function(){
        equalheight = function (container) {
            var currentRow = {
                cols: [],
                h: 0
            };
            var topPostion = -1;
            $(container).each(function () {
                var $el = $(this);
                $($el).height('auto')
                if (topPostion != $el.position().top) {
                    for (var j = 0; j < currentRow.cols.length; j++) {
                        currentRow.cols[j].height(currentRow.h);
                    }
                    topPostion = $el.position().top;
                    currentRow = {
                        cols: [],
                        h: 0
                    };
                }
                currentRow.cols.push($el);
                if ($el.height() > currentRow.h) {
                    currentRow.h = $el.height();
                }


            });
            for (var j = 0; j < currentRow.cols.length; j++) {
                currentRow.cols[j].height(currentRow.h);
            }

        }
        equalheight('.title');
        $(window).load(function () {
            equalheight('.title');
        });

        $(window).resize(function () {
            equalheight('.title');
        });
});


$(document).ready(function(){
    equalheight = function (container) {
        var currentRow = {
            cols: [],
            h: 0
        };
        var topPostion = -1;
        $(container).each(function () {
            var $el = $(this);
            $($el).height('auto')
            if (topPostion != $el.position().top) {
                for (var j = 0; j < currentRow.cols.length; j++) {
                    currentRow.cols[j].height(currentRow.h);
                }
                topPostion = $el.position().top;
                currentRow = {
                    cols: [],
                    h: 0
                };
            }
            currentRow.cols.push($el);
            if ($el.height() > currentRow.h) {
                currentRow.h = $el.height();
            }


        });
        for (var j = 0; j < currentRow.cols.length; j++) {
            currentRow.cols[j].height(currentRow.h);
        }

    }
    equalheight('.column-section h4');
    $(window).load(function () {
        equalheight('.column-section h4');
    });

    $(window).resize(function () {
        equalheight('.column-section h4');
    });
});


}(jQuery))