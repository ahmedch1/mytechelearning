/*==================================
Edubin theme activation scripts  
====================================*/
(function($) {
    "use strict";
    //===== Prealoder
    $(window).on('load', function(event) {
        $('.preloader').delay(500).fadeOut(500);
        // Preloader two 
        $('#preloader_two').fadeOut()
        // Icon Preloader 
        $(".edubin_image_preloader").fadeOut("slow");;
    });
    // === Sticky header
    $(function() {
        var header = $(".is-header-sticky"),
            yOffset = 0,
            triggerPoint = 220;
        $(window).on('scroll', function() {
            yOffset = $(window).scrollTop();
            if (yOffset >= triggerPoint) {
                header.addClass("sticky-active animated slideInDown");
            } else {
                header.removeClass("sticky-active animated slideInDown");
            }
        });
    });
    //===== Search
    $('#search').on('click', function() {
        $(".edubin-search-box").fadeIn(600);
    });
    $('.edubin-closebtn').on('click', function() {
        $(".edubin-search-box").fadeOut(600);
    });

    //===== Add cart button text remove
    jQuery(function() {
        jQuery('.edubin-cart-button-list > a.button').each(function() {
            var text = this.innerHTML;
            var firstSpaceIndex = text.indexOf("");
            if (firstSpaceIndex > 0) {
                var substrBefore = text.substring(0, firstSpaceIndex);
                var substrAfter = text.substring(firstSpaceIndex, text.length)
                var newText = '<span class="edubin-hide-addtocart-text">' + substrBefore + '</span>' + substrAfter;
                this.innerHTML = newText;
            } else {
                this.innerHTML = '<span class="edubin-hide-addtocart-text hidden">' + text + '</span>';
            }
        });
    });
    //===== Global LMS course filter 
    $(document).on('change', '.edubin-course-filter-form', function(e) {
        e.preventDefault();
        $(this).closest('form').submit();
    });
    $('.edubin-pagination ul li a.prev, .edubin-pagination ul li a.next').closest('li').addClass('pagination-parent');
    // category menu
    $('.header-cat-menu ul.children').closest('li.cat-item').addClass('category-has-childern');
    $(".edubin-archive-single-cat .category-toggle").on('click', function() {
        $(this).next('.edubin-archive-childern').slideToggle();
        if ($(this).hasClass('fa-plus')) {
            $(this).removeClass('fa-plus').addClass('fa-minus');
        } else {
            $(this).removeClass('fa-minus').addClass('fa-plus');
        }
    });
    $('.edubin-archive-childern input').each(function() {
        if ($(this).is(':checked')) {
            var aChild = $(this).closest('.edubin-archive-childern');
            aChild.show();
            aChild.siblings('.fa').removeClass('fa-plus').addClass('fa-minus');
        }
    });
    $('.edubin-sidebar-filter input').on('change', function() {
        $('.edubin-sidebar-filter').submit();
    });
    //===== LMS video popup
    $(document).ready(function() {
        $(function() {
            $("a.bla-1").YouTubePopUp();
            $("a.bla-2").YouTubePopUp({
                autoplay: 0
            }); // Disable autoplay
        });
    });
    //===== Ajax search
    $("input#keyword").keyup(function() {
        if ($(this).val().length > 2) {
            $("#datafetch").show();
        } else {
            $("#datafetch").hide();
        }
    });
    //===== Grid view/List view
    $(function() {
        $('#edubin_showdiv1').click(function() {
            $('div[id^=edubindiv]').hide();
            $('#edubindiv1').show();
        });
        $('#edubin_showdiv2').click(function() {
            $('div[id^=edubindiv]').hide();
            $('#edubindiv2').show();
        });
    })
    // === Sidebar sticky 
    // window.onscroll = function () {
    //     const left = document.getElementById("secondary");

    //     if (left.scrollTop > 50 || self.pageYOffset > 50) {
    //         left.classList.remove("sticky");
    //     } 
    // } 
    // === Image hover parallaxed effect
    var b = document.getElementsByTagName("BODY")[0];
    b.addEventListener("mousemove", function(event) {
        parallaxed(event);
    });

    function parallaxed(e) {
        var amountMovedX = (e.clientX * -0.2 / 9);
        var amountMovedY = (e.clientY * -0.2 / 9);
        var x = document.getElementsByClassName("parallaxed");
        var i;
        for (i = 0; i < x.length; i++) {
            x[i].style.transform = 'translate(' + amountMovedX + 'px,' + amountMovedY + 'px)'
        }
    }
    // Number count for stats, using jQuery animate
    const counters = document.querySelectorAll('.eb_counting');
    const speed = 2000;
    counters.forEach(counter => {
        const animate = () => {
            const value = +counter.getAttribute('data-count');
            const data = +counter.innerText;
            const time = value / speed;
            if (data < value) {
                counter.innerText = Math.ceil(data + time);
                setTimeout(animate, 1);
            } else {
                counter.innerText = value;
            }
        }
        animate();
    });
})(jQuery);






