jQuery('.banner-home').owlCarousel({
    loop: true,
    margin: 30,
    nav: false,
    loop: true,
    navigation: true,
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    items: 1,
    dots: false,
});

jQuery('.product_by_cat').owlCarousel({
    loop: true,
    margin: 30,
    nav: true,
    navigation: true,
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    items: 4,
    dots: false,
    responsiveClass: true,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 3,
        },
        1000: {
            items: 4,
        }
    }
});


jQuery(document).ready(function() {

    jQuery('.product_by_cat').find('.owl-nav').removeClass('disabled');
    jQuery('.product_by_cat').on('changed.owl.carousel', function(event) {
        jQuery(this).find('.owl-nav').removeClass('disabled');
    });

    jQuery('body').on('click', '.userlogin>p>span', function() {
        jQuery(this).parents('.userlogin').find('ul.list_info').slideToggle(400);
    });


    jQuery('.bar_mobile .bar_menu button').click(function() {
        jQuery('.header-main').show("slide", { direction: "left" }, 500);
        jQuery('.close-menu').show();
        jQuery('body').css('overflow','hidden');
    });

    jQuery('.close-menu').on('click',function(){
        jQuery('.header-main').hide("slide", { direction: "left" }, 500);
        jQuery(this).hide();
        jQuery('body').css('overflow','auto');
    });

    jQuery('input').attr('autocomplete', 'off');

});


jQuery(document).ready(function() {
    jQuery('body').on('click', '.showmore', function() {
        var btn = jQuery(this);
        jQuery(this).attr('disabled', 'disabled');
        var offset = jQuery(this).data('num');
        var arr = jQuery(this).data('id');
        jQuery.ajax({
            url: ajax + 'get_more',
            type: 'post',
            dataType: 'html',
            data: {
                arr: arr,
                offset: offset,
            },
            beforeSend: function() {
                btn.find('img').removeClass('hide');
            },
            success: function(res) {
                jQuery('.item_cate').last().after(res);
                btn.parent().remove();
            },
            error: function() {}
        });
    });

    /*Phân trang Ajax*/

    var i = 0;

    jQuery(function($) {
        jQuery('.pagation .page').each(function() {
            if (!(jQuery(this).hasClass('prev') || jQuery(this).hasClass('next'))) i++;
        });
        if (i < 5) {
            jQuery('.pagation .page.next, .pagation .page.prev').remove();
        } else {
            jQuery('.pagation .page').each(function() {
                if (!(jQuery(this).hasClass('prev') || jQuery(this).hasClass('next'))) {
                    if (parseInt(jQuery(this).text()) > 5) jQuery(this).addClass('hide');
                }
            });
        }
    });

    jQuery('body').on('click', '.pagation a.page', function(e) {
        e.preventDefault();
        if (jQuery(this).hasClass('current')) return false;
        if (jQuery(this).hasClass('prev') || jQuery(this).hasClass('next')) return false;
        if (jQuery(this).text() <= 3) {
            jQuery('.pagation a.page.current').removeClass('current');
            jQuery('.pagation .page').removeClass('hide');
            jQuery('.pagation .page').each(function() {
                if (!(jQuery(this).hasClass('prev') || jQuery(this).hasClass('next'))) {
                    if (parseInt(jQuery(this).text()) > 5) jQuery(this).addClass('hide');
                }
            });
            jQuery(this).addClass('current');
        } else {
            if (jQuery(this).text() > i - 3) {
                jQuery('.pagation a.page.current').removeClass('current');
                jQuery('.pagation .page').removeClass('hide');
                jQuery('.pagation .page').each(function() {
                    if (!(jQuery(this).hasClass('prev') || jQuery(this).hasClass('next'))) {
                        if (parseInt(jQuery(this).text()) <= i - 5) jQuery(this).addClass('hide');
                    }
                });
                jQuery(this).addClass('current');
            } else {
                jQuery('.pagation a.page.current').removeClass('current');
                jQuery('.pagation .page').removeClass('hide');
                var cub = jQuery(this).text();
                jQuery('.pagation .page').each(function() {
                    if (!(jQuery(this).hasClass('prev') || jQuery(this).hasClass('next'))) {
                        if (parseInt(jQuery(this).text()) > (parseInt(cub) + 2) || parseInt(jQuery(this).text()) < (parseInt(cub) - 2)) jQuery(this).addClass('hide');
                    }
                });
                jQuery(this).addClass('current');
            }
        }

        var page = jQuery('.pagation a.page.current').text();
        jQuery.ajax({
            url: ajax + 'get_post',
            type: 'post',
            dataType: 'html',
            data: {
                page: page
            },
            beforeSend: function() {

            },
            success: function(res) {
                jQuery('.categorypost').remove();
                jQuery('h2.title').after(res);
                jQuery('body,html').animate({
                    scrollTop: jQuery('h2.title').offset().top - 50,
                }, 500);
            },
            error: function() {}
        });

    });

    jQuery('body').on('click', '.pagation a.page.prev', function() {
        var num = jQuery('.pagation a.page.current').text();
        var cur = jQuery('.pagation a.page.current').addClass('del');
        if (parseInt(num) == 1) return false;

        jQuery('.pagation a.page.current').prev().trigger('click');
        jQuery('.pagation a.page.current.del').removeClass('current');
        jQuery('.pagation a.page.del').removeClass('del');
    });

    jQuery('body').on('click', '.pagation a.page.next', function() {
        var num = jQuery('.pagation a.page.current').text();
        var cur = jQuery('.pagation a.page.current').addClass('del');
        if (parseInt(num) == i) return false;

        jQuery('.pagation a.page.current').next().trigger('click');
        jQuery('.pagation a.page.current.del').removeClass('current');
        jQuery('.pagation a.page.del').removeClass('del');
    });


    jQuery('.numcus,input[name=phone],input[name=quantity]').on('keypress', function(e) {
        if (e.keyCode < 48 || e.keyCode > 57) return false;
    });
    jQuery('.numcus').on('change', function() {
        var num = jQuery(this).val();
        if (num < 1) jQuery(this).val('1');
    });

    AOS.init();
});


function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

// function validateemail

function check_price() {
    var total = 0;
    jQuery('.list_pro .item').each(function() {
        var num = jQuery(this).find('input').val();
        var s_price = jQuery(this).find('.price').find('span').data('price');
        total += parseInt(num) * parseInt(s_price);
    });
    return total;
}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}


// ===== Scroll to Top ==== 
$(window).scroll(function() {
    if ($(this).scrollTop() >= 50) { // If page is scrolled more than 50px
        $('#return-to-top').fadeIn(200); // Fade in the arrow
    } else {
        $('#return-to-top').fadeOut(200); // Else fade out the arrow
    }
});
$('#return-to-top').click(function() { // When arrow is clicked
    $('body,html').animate({
        scrollTop: 0 // Scroll to top of body
    }, 500);
});