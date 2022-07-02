jQuery(document).ready(function($) {
    //Prevent Page Reload on all # links
    $("body").on("click", "a[href='#']", function(e) {
        e.preventDefault();
    });

    //placeholder
    $("[placeholder]").each(function() {
        $(this).attr("data-placeholder", this.placeholder);
        $(this).bind("focus", function() {
            this.placeholder = '';
        });
        $(this).bind("blur", function() {
            this.placeholder = $(this).attr("data-placeholder");
        });
    });

    if ($(".page-nav-wrapper").length) {
        var navTopPos = $(".page-nav-wrapper").offset().top - $("header").innerHeight();
    }

    if ($(window).scrollTop() > 100) {
        $(".wrapper").addClass('page-scrolled');
    } else {
        $(".wrapper").removeClass('page-scrolled');
    }

    // On scroll Add Class
    $(window).scroll(function(e) {
        scrollspy();

        if ($(window).scrollTop() > 100) {
            $(".wrapper").addClass('page-scrolled');
        } else {
            $(".wrapper").removeClass('page-scrolled');
        }

        if ($(window).scrollTop() >= navTopPos) {
            $("body").addClass("sticky-page-nav");
        } else {
            $("body").removeClass("sticky-page-nav");
        }
    });

    // Footer margin set for stick to bottom
    function footerAdj() {
        var footerH = $(".footer").innerHeight();
        $(".footer").css({ "margin-top": -footerH });
        $(".main-content").css({ "padding-bottom": footerH });
    };
    footerAdj();

    function carrerLinkClasses() {
        if ($(window).width() <= 991 & $(window).width() >= 768) {
            $(".career-info-block .card-link").addClass("card-link-secondary");
        } else {
            $(".career-info-block .card-link").removeClass("card-link-secondary");
        }

        if ($(window).width() < 768) {
            $(".career-links-block .card-link").removeClass("card-link-secondary");
        } else {
            $(".career-links-block .card-link").addClass("card-link-secondary");
        }
    }
    carrerLinkClasses();

    $(window).on('orientationchange', function() {
        if ($(window).width() < 1025) {
            $(".profile-list li").css({ "margin-bottom": '' }).removeClass("active");
            $(".profile-list .profile-info").css({ "top": '' });
            $(".profile-list .profile-info").stop(true, true).slideUp(300);
        }
    });

    $(window).resize(function() {
        footerAdj();
        resetFontSize();

        if ($(window).width() > 1024) {
            $(".profile-list li").css({ "margin-bottom": '' }).removeClass("active");
            $(".profile-list .profile-info").css({ "top": '' });
            $(".profile-list .profile-info").stop(true, true).slideUp(300);
        }

        if ($(".page-nav-wrapper").length) {
            navTopPos = $(".page-nav-wrapper").offset().top - $("header").innerHeight();
        }

        setTimeout(function() {
            equalHeight();
        }, 500);

        setTimeout(function() {
            $(".profile-list li").each(function() {
                var updatedPos = $(this).position().top;
                var updatedProfileLiHeight = $(this).height();
                $(this).find(".profile-info").css({ "top": (updatedPos + updatedProfileLiHeight + 30) })
            })
        }, 1000);
    });

    // Add remove class when window resize finished
    var $resizeTimer;
    $(window).on("resize", function(e) {
        if (!$("body").hasClass("window-resizing")) {
            $("body").addClass("window-resizing");
        }
        clearTimeout($resizeTimer);
        $resizeTimer = setTimeout(function() {
            $("body").removeClass("window-resizing");
            carrerLinkClasses();
        }, 250);

        if ($(window).width() > 767) {
            $("html, body").removeClass("show-menu");
            $(".hamburger").removeClass("is-active");
            $(".has-sub").removeClass("active");
            $(".is-sub").css({ "display": '' });
        }
    });

    // Add new js functions here -----------------------------------------------------------------

    $("#mega-menu-wrap-header--mega-menu .mega-indicator").click(function() {
        if ($(window).width() < 768) {
            $(this).closest("li.mega-menu-item").siblings().find("> ul.mega-sub-menu").stop(true, true).slideUp();
            $(this).closest("li.mega-menu-item").siblings().stop(true, true).removeClass("mega-toggle-on");
            $(this).closest("li.mega-menu-item").find("> ul.mega-sub-menu").stop(true, true).slideToggle();
        }
    })

    $(document).on("click", ".mega-menu-header--mega-menu-mobile-open .mega-toggle-block, .mega-menu-header--mega-menu-mobile-open .mega-toggle-animated", function() {
        if ($(window).width() < 768) {
            $("#mega-menu-wrap-header--mega-menu #mega-menu-header--mega-menu > li.mega-menu-item").removeClass("mega-toggle-on");
            $("#mega-menu-wrap-header--mega-menu #mega-menu-header--mega-menu > li.mega-menu-item > ul.mega-sub-menu").stop(true, true).slideUp();
        }
    })

    $(document).on("click", ".mega-toggle-block, .mega-toggle-animated", function() {
        $("html").removeClass("mega-menu-header--mega-menu-mobile-open");
    })

    $(document).on("click", ".mega-menu-toggle.mega-menu-open", function() {
        $("html").addClass("mega-menu-header--mega-menu-mobile-open");
    })

    $(".main-navigation > ul > li").each(function() {
        if ($(this).hasClass("has-sub")) {
            $(this).find("> a").append("<em></em>")
        }
    })

    $(document).on("click", ".has-sub > a em", function(e) {
        e.preventDefault();
        if ($(window).width() < 768) {
            $(this).closest(".has-sub").siblings().find(".is-sub").stop(true, true).slideUp();
            $(this).closest(".has-sub").find(".is-sub").stop(true, true).slideToggle();

            $(this).closest(".has-sub").siblings().removeClass("active");
            $(this).closest(".has-sub").toggleClass("active");
        }
    })


    $(".main-navigation > ul > li.has-sub a").on("focus", function(e) {
        $(this).closest(".has-sub").find(".sub-menu").css({ "opacity": "1", "visibility": "visible", "transform": "translateY(0)" })
        $(this).closest(".has-sub").find(".megamenu-wrapper").css({ "opacity": "1", "visibility": "visible", "transform": "translateY(0)" })
    }).on("blur", function(e) {
        $(this).closest(".has-sub").find(".sub-menu").css({ "opacity": "", "visibility": "", "transform": "" })
        $(this).closest(".has-sub").find(".megamenu-wrapper").css({ "opacity": "", "visibility": "", "transform": "" })
    });


    /* Font increase/decrease starts */
    var mainContectElements = ".main-content section:not(.page-header, .home-hero-block) .h1, .main-content section:not(.page-header, .home-hero-block) h1, .main-content section:not(.page-header, .home-hero-block) .h2, .main-content section:not(.page-header, .home-hero-block) .h3, .main-content section:not(.page-header, .home-hero-block) .h4, .main-content section:not(.page-header, .home-hero-block) .h5, .main-content section:not(.page-header, .home-hero-block) .h6, .main-content section:not(.page-header, .home-hero-block) h2, .main-content section:not(.page-header, .home-hero-block) h3, .main-content section:not(.page-header, .home-hero-block) h4, .main-content section:not(.page-header, .home-hero-block) h5, .main-content section:not(.page-header, .home-hero-block) h6, .main-content section:not(.page-header, .home-hero-block) p,.main-content section:not(.page-header, .home-hero-block) span,.main-content section:not(.page-header, .home-hero-block) blockquote, .main-content section:not(.page-header, .home-hero-block) a,.main-content section:not(.page-header, .home-hero-block) em,.main-content section:not(.page-header, .home-hero-block) label,.main-content section:not(.page-header, .home-hero-block) .select2 *,.main-content section:not(.page-header, .home-hero-block) .select2-results__option,.main-content section:not(.page-header, .home-hero-block) .custom-dropdown ~ .select2-container,.main-content section:not(.page-header, .home-hero-block) li,.main-content section:not(.page-header, .home-hero-block) .form-control,.main-content section:not(.page-header, .home-hero-block) .table";

    var footerElements = ".footer .h1, .footer .h2, .footer .h3, .footer .h4, .footer .h5, .footer .h6, .footer h1, .footer h2, .footer h3, .footer h4, .footer h5, .footer h6,  .footer p, .footer span, .footer blockquote, .footer a, .footer em, .footer label, .footer .select2 *, .footer .select2-results__option, .footer .custom-dropdown ~ .select2-container, .footer li, .footer .form-control, .footer .table";

    var $affectedElements = $(mainContectElements + ", " + footerElements);
    var step = 0;

    $affectedElements.each(function() {
        var $this = $(this);
        $this.data("orig-size", $this.css("font-size"));
    });

    function changeFontSize(size) {
        $affectedElements.each(function() {
            var $this = $(this);
            $this.css("font-size", parseInt($this.css("font-size")) + size);
        });
    }

    function resetFontSize() {
        $affectedElements.each(function() {
            var $this = $(this);
            $this.css("font-size", '');
        });
    }

    $(".btn-increase").click(function() {
        if (step >= -1 && step < 1) {
            changeFontSize(2);
            step++;
        }
        if (step == 0) {
            resetFontSize();
        }
        setTimeout(function() {
            equalHeight();
            profilelistSetPos()
        }, 500);
    })

    $(".btn-decrease").click(function() {
        if (step > -1 && step <= 1) {
            changeFontSize(-2);
            step--;
        }
        if (step == 0) {
            resetFontSize();
        }
        setTimeout(function() {
            equalHeight();
            profilelistSetPos()
        }, 500);
    })

    $(".btn-orig").click(function() {
        resetFontSize();
        step = 0;
        setTimeout(function() {
            equalHeight();
            profilelistSetPos()
        }, 500);
    })


    /* Font increase/decrease ends */

    // niceScroll================================================================
    $(".nicecscroll").niceScroll({
        cursorborder: "",
        cursorcolor: "#ccd1d8",
        cursorwidth: "7px",
        cursorborderradius: "5px",
        autohidemode: false,
        smoothscroll: true,
        emulatetouch: true,
        cursordragontouch: true,
    });

    $(".nicecscroll-secondary").niceScroll({
        cursorborder: "",
        cursorcolor: "#919294",
        cursorwidth: "3px",
        cursorborderradius: "15px",
        autohidemode: true,
        smoothscroll: true,
        emulatetouch: true,
        cursordragontouch: true,
        railpadding: { top: 0, right: 3, left: 0, bottom: 0 }
    });

    $(".header-scroll > .mega-sub-menu, #mega-menu-wrap-mega-menu #mega-menu-mega-menu > li.mega-menu-megamenu > ul.mega-sub-menu").mCustomScrollbar({
        scrollInertia: 250
    });
    // ===========================================================================

    $('.custom-dropdown').select2({
        minimumResultsForSearch: -1
    });


    $('.modal .custom-dropdown').each(function() {
        var parentContainer = $(this).closest(".form-group");
        $('.modal .custom-dropdown').select2({
            minimumResultsForSearch: -1,
            dropdownParent: parentContainer,
            width: '100%'
        });
    });

    //equalHeight function
    function equalHeight() {
        $.fn.extend({
            equalHeights: function() {
                var top = 0;
                var row = [];
                var classname = ('equalHeights' + Math.random()).replace('.', '');
                $(this).each(function() {
                    var thistop = $(this).offset().top;
                    if (thistop > top) {
                        $('.' + classname).removeClass(classname);
                        top = thistop;
                    }
                    $(this).addClass(classname);
                    $(this).height('auto');
                    var h = (Math.max.apply(null, $('.' + classname).map(function() {
                        return $(this).outerHeight();
                    }).get()));
                    $('.' + classname).height(h);
                }).removeClass(classname);
            }
        });
        $('.profile-box-wrapper').equalHeights();
        $('.products .megamenu-body').equalHeights();
        $('.news-list-wrapper').equalHeights();
        $('.delivering-list .card .h6').equalHeights();
        $('.delivering-list .card p').equalHeights();
        $('.investors-page .investors-products-body-wrapper').equalHeights();
        $('.application-img-content-wrapper > .h4').equalHeights();
        // $('.investors-financial-report-block .card-info-wrapper').equalHeights();

        setTimeout(function() {
            $('.investors-page .investors-news-block .news-list-wrapper').equalHeights();
            $('.investors-page .investors-business-block .investors-products-title').equalHeights();
            $('#presentationsModal.modal .modal-body .card-info .h6').equalHeights();

            $('.products-box.secondary .title-block').equalHeights();
        }, 500);
    }
    equalHeight();

    $('#presentationsModal').on('show.bs.modal', function(e) {
        setTimeout(function() {
            $('#presentationsModal.modal .modal-body .card-info .h6').equalHeights();
        }, 500);
    });

    function scrollspy() {
        var sTop = $(window).scrollTop();
        if ($(".page-nav-wrapper").length) {

            var hero_block = $('.page-header').innerHeight() - $('header').innerHeight() - 1;
            var footer_block = $('footer').offset().top - $('.header').innerHeight();
            if (sTop > hero_block && sTop < footer_block) {
                $('.scrollspy-block').each(function() {
                    var id = $(this).attr('data-scrollspy');
                    offset = $(this).offset().top - $('header').innerHeight() - $('.page-nav-wrapper').innerHeight() - 1;
                    height = $(this).height();

                    if (sTop >= offset && sTop < offset + height) {
                        cur_link = $('.page-navigation li[data-title = "' + id + '"]');
                        $(this).addClass('active').siblings().removeClass("active");
                        cur_link.addClass('active').siblings().removeClass('active');
                    }
                });

                // active link center in mobile starts
                if ($(window).width() < 768) {
                    setTimeout(function() {
                        if ($(".page-header .page-navigation li").hasClass("active")) {
                            var outerScrollLeft = $(".page-navigation").scrollLeft();
                            var outerWidthHalf = $(".page-navigation").innerWidth() / 2;
                            var leftPos = $(".page-header .page-navigation li.active").position().left;
                            var finalScrollLeft = (leftPos + outerScrollLeft) - outerWidthHalf;
                            $(".page-navigation").scrollLeft(finalScrollLeft)
                        }
                    }, 1100)
                }
                // active link center in mobile ends
            } else {
                $('.page-navigation li a').removeClass('active');
                $('.scrollspy-block').removeClass('active');
            }
        }
    }
    scrollspy();

    var scrollWidth;
    setTimeout(function() {
        scrollWidth = $(document).innerWidth() - $(window).outerWidth();
    }, 500);

    // profile info visible slideup down toggle----
    $(".profile-box").on("click keydown", function(e) {
        if (e.type == "click" || e.keyCode == 13) {
            var _li = $(this).closest("li");
            var profileBottomHeight = _li.find(".profile-info").height();
            _li.siblings().css({ "margin-bottom": 0 });

            _li.siblings().find(".profile-info").stop(true, true).slideUp(300);
            _li.find(".profile-info").stop(true, true).slideToggle(300);

            _li.siblings().removeClass("active");
            _li.toggleClass("active");

            if (_li.hasClass("active")) {
                _li.css({ "margin-bottom": (profileBottomHeight + 60) });
            } else {
                _li.css({ "margin-bottom": 0 });
            }
        }
    });

    $(".profile-info .close").click(function() {
        $(".profile-list li .profile-info").stop(true, true).slideUp(300);
        $(".profile-list li").removeClass("active");
        $(".profile-list li").css({ "margin-bottom": 0 });
    });

    function profilelistSetPos() {
        $(".profile-list li").each(function() {
            var _this = $(this);
            var pos = _this.position().top;
            var profileLiHeight = _this.height();
            _this.find(".profile-info").css({ "top": (pos + profileLiHeight + 30) });
        });
    }
    profilelistSetPos();
    //End profile info----

    // Page load scroll to section starts
    if ($(".about-us-page").length) {
        var secId = window.location.hash.substr(1);
        if ($("[data-sec-id='" + secId + "']").length) {
            setTimeout(function() {
                $('html, body').animate({
                    scrollTop: $("[data-sec-id='" + secId + "']").offset().top - $("header").innerHeight() - $(".page-nav-wrapper").innerHeight() + 15
                }, 1000);
            }, 500)
        }
        if (!secId) {
            setTimeout(function() {
                $(window).scrollTop(0);
            }, 300)
        }
    }
    // Page load scroll to section ends

    //product header click open side menu
    $(".product-header-sm").click(function() {
        $(this).closest(".details").find(".product-side-menu").stop(true, true).slideToggle();
        $(this).toggleClass("active");
    });


    $('body').on('click', '.scrollspy-link', function() {
        $("html, body").removeClass("show-menu mega-menu-header--mega-menu-mobile-open");
        $(".mega-menu-toggle").removeClass("mega-menu-open");
        if ($(".about-us-page").length || $(".sustainability-page").length) {
            $(".hamburger").removeClass("is-active");
            $(".has-sub").removeClass("active");
            $(".is-sub").css({ "display": '' });

            var _this = $(this).attr("data-title");
            $('html, body').animate({
                scrollTop: $("[data-scrollspy='" + _this + "']").offset().top - $("header").innerHeight() - $(".page-nav-wrapper").innerHeight() + 15
            }, 1000);
        }
    })

    $(".scrolltop-btn").click(function() {
        $('html, body').animate({ scrollTop: 0 }, 1000);
    });



    // Home page slider
    var swiper = new Swiper('.home-hero-slider', {
        loop: false,
        spaceBetween: 0,
        touchRatio: 0
    });

    var swiper = new Swiper('.investors-news-slider', {
        slidesPerView: 1,
        spaceBetween: 20,
        navigation: {
            nextEl: '.investors-news-slider-next',
            prevEl: '.investors-news-slider-prev',
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            992: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
        }
    });

    // Scroll Animation
    AOS.init({
        offset: 10,
        delay: 100,
        duration: 1000,
        once: true
    });

    $(".hamburger").click(function() {
        $(this).toggleClass("is-active");
        $("html, body").toggleClass("show-menu");

        $(".is-sub").stop(true, true).slideUp();
        $(".has-sub").removeClass("active");
    });

    // Tabs ------------------------------------
    var activeTab = $('.file-download-block .alphabet a.active').attr('data-link');
    $('.file-download-block .tab-content .tab-panel').each(function() {
        if ($(this).attr('data-content') == activeTab) {
            $(this).show();
            return false;
        }
    });

    $('.file-download-block .alphabet a[href]').click(function() {
        $('.file-download-block .alphabet a[href]').removeClass('active');
        $(this).addClass('active');
        var tab_contant_id = $(this).attr('data-link');

        $('.file-download-block .tab-content > .tab-panel').hide();
        $('.file-download-block .tab-panel[data-content="' + tab_contant_id + '"]').stop(true, true).fadeIn();
    });

    // function list() {
    //     $('.file-download-block .alphabet .active').click();
    // }
    // setTimeout(list, 1);
    //  ------------------------------------

    // Search box toggle-----------
    $(".top-header .search-btn").click(function() {
        $(".search-block").fadeToggle();
        $("html, body").addClass("show-search-block");
        $("body, header").css({ "padding-right": -scrollWidth + 'px' });
    });
    $(".close-search-block").click(function() {
        $(".search-block").fadeOut();
        $("html, body").removeClass("show-search-block");
        $(this).closest(".input-group").find(".form-control").val('');
        $("body, header").css({ "padding-right": '' });
    });

    $(".accordion-wrapper .accordion-block .title").on("click keydown focus", function(e) {
        if (!$(this).closest(".accordion-wrapper").hasClass("all-open")) {
            $(this).closest(".accordion-block").siblings().removeClass("focus");
        }
        $(this).closest(".accordion-block").toggleClass("focus");

        if (e.type == "click" || e.keyCode == 13) {
            if (!$(this).closest(".accordion-wrapper").hasClass("all-open")) {
                $(this).closest(".accordion-block").siblings().find(".accordion-body").stop(true, true).slideUp();
                $(this).closest(".accordion-block").siblings().removeClass("show");
            }

            $(this).closest(".accordion-block").toggleClass("show");
            $(this).closest(".accordion-block").find(".accordion-body").stop(true, true).slideToggle();
        }
    });


    //tabing for location page------
    $(".locationpage-tab-wrapper .nav-link").click(function() {
        if ($(window).width() < 1200) {
            var outerScrollLeft = $(this).closest(".locationpage-tab").scrollLeft();
            var outerWidthHalf = $(this).closest(".locationpage-tab").innerWidth() / 2;

            if ($(window).width() < 768) {
                var leftPos = $(this).position().left;
            } else {
                var leftPos = $(this).position().left - $(".locationpage-details-block .location-map-block").innerWidth();
            }
            // if locationpage-tab-wrapper label not there in that movement put if ($(this).position().left) else (left - ".locationpage-details-block .location-map-block")
            //var leftPos = $(this).position().left - $(".locationpage-details-block .location-map-block").innerWidth();

            var finalScrollLeft = (leftPos + outerScrollLeft) - outerWidthHalf;

            $(this).closest(".locationpage-tab").stop(true, true).animate({
                scrollLeft: finalScrollLeft
            }, 500);

            // $('html, body').animate({
            //   scrollTop: $(".locationpage-details-block .location-details").offset().top - $(".header .bottom-header").innerHeight()
            // }, 1000);
        }
    });
    //----------------

    //tabing for cantact page------
    $(".contact-tab-wrapper .nav-link").click(function() {
        var outerScrollLeft = $(this).closest(".contact-tab").scrollLeft();
        var outerWidthHalf = $(this).closest(".contact-tab").innerWidth() / 2;
        var leftPos = $(this).position().left;
        var finalScrollLeft = (leftPos + outerScrollLeft) - outerWidthHalf;
        $(this).closest(".contact-tab").stop(true, true).animate({
            scrollLeft: finalScrollLeft
        }, 500);
    });
    //----------------



    //set wrap class table-responsive ------
    if ($(".cms-wrapper").length) {
        $(this).find("table").wrap('<div class="table-responsive"/>');
    }

    //sustainability page------
    $(".sustainability-accordion .read-more").on("click", function() {
        $(this).closest(".esg-block").find(".accordion-wrapper").stop(true, true).slideToggle();
        $(this).closest(".esg-block").find(".accordion-block .accordion-body").stop(true, true).slideUp();
        $(this).closest(".esg-block").find(".accordion-block").removeClass("show");

        var _this = $(this);
        setTimeout(function() {
            if (_this.closest(".esg-block").find(".accordion-wrapper").css("display") == "block") {
                _this.text("Read Less");
                _this.attr("title", "Read Less");
            } else {
                _this.text("Read More");
                _this.attr("title", "Read More");
            }
        }, 500);
    });
    $(".sustainability-page .collapse-link").on("click", function() {
        $(this).closest(".collapse-links-block").find(".square-bullets").stop(true, true).slideToggle();
    });



    // Don't add anything below this --------------------------------------------------------------
    // Add Class on Window Load
    $("body").addClass("page-loaded");

    // scroll event to load more news posts

    var count = 2;
    var count_filter = 2;
    var total_pages = $('#loop_count').val();
    var news_page = $('#news_page').val();
    var news_page_id = $('#news_page_id').val();
    var stop_ajax_call = 1;
    var stop_ajax_call_filter = 1;

    function loadArticle(pageNumber, total_page) {
        var data = {
            action: "infinite_scroll",
            page_no: pageNumber,
            news_page_id: news_page_id,
        };
        $("#iframeloading").show();
        if (pageNumber > total_page) {
            stop_ajax_call = 2;
        } else {
            $.ajax({
                type: 'POST',
                url: myajax.ajaxurl,
                data: data,
                success: function(html) {

                    if (html.status == true) {
                        $("#new_data").append(html.message);
                    }
                    $("#iframeloading").hide();
                }
            }).fail(function() {
                alert('fail to load');
                $("#iframeloading").hide();
            });
        }
    }

    // filter for news post
    function loadArticle_byMonthYear(pageNumber, month, year) {
        var data = {
            action: "filter_month",
            month: month,
            year: year,
            news_page_id: news_page_id,
            pagenumber: pageNumber,
        };
        $("#iframeloading").show();

        $.ajax({
            type: 'POST',
            url: myajax.ajaxurl,
            data: data,
            success: function(html) {
                total_page_filter = html.max_page_number;
                if (html.status == true) {
                    $("#new_data").html(html.message);
                }
                $("#iframeloading").hide();
            }
        }).fail(function() {
            alert('fail to load');
            $("#iframeloading").hide();
        });
    }

    function loadArticle_byMonthYear_ajax(pageNumber, month, year) {
        var data = {
            action: "filter_month",
            month: month,
            year: year,
            news_page_id: news_page_id,
            pagenumber: pageNumber,
        };
        $("#iframeloading").show();
        if (pageNumber > total_page_filter) {
            stop_ajax_call_filter = 2;
        } else {
            $.ajax({
                type: 'POST',
                url: myajax.ajaxurl,
                data: data,
                success: function(html) {
                    if (html.status == true) {
                        $("#new_data").append(html.message);
                    }
                    $("#iframeloading").hide();
                }
            }).fail(function() {
                alert('fail to load');
                $("#iframeloading").hide();
            });
        }
    }

    $('#selectYear').on('select2:select', function() {
        selectYear = $('#selectYear').val();
        selectMonth = $('#selectMonth').val();
        stop_ajax_call = 2;
        loadArticle_byMonthYear(1, selectMonth, selectYear);
    });

    $('#selectMonth').on('select2:select', function() {
        selectYear = $('#selectYear').val();
        selectMonth = $('#selectMonth').val();
        stop_ajax_call = 2;
        loadArticle_byMonthYear(1, selectMonth, selectYear);
    });

    $(window).scroll(function() {
        if (window.location.href.indexOf(news_page) != -1) {
            if ($(window).scrollTop() + $(window).height() > $(document).height() - 600) {
                if (count > total_pages) {
                    stop_ajax_call = 2;
                    return false;
                } else {
                    if (stop_ajax_call == 1) {
                        loadArticle(count, total_pages);
                    } else {
                        stop_ajax_call = 2;
                        return false;
                    }
                }
            }
            if ($(window).scrollTop() + $(window).height() > $(document).height() - 900) {
                if (count_filter > total_page_filter) {
                    stop_ajax_call_filter = 2;
                    return false;
                } else {
                    if (stop_ajax_call_filter == 1) {
                        selectYear = $('#selectYear').val();
                        selectMonth = $('#selectMonth').val();
                        loadArticle_byMonthYear_ajax(count_filter, selectMonth, selectYear);
                    } else {
                        stop_ajax_call_filter = 2;
                        return false;
                    }
                }
            }
            count++;
            count_filter++;
        }
    });

    var investor_page_id = $('#investor_page_id').val();

    // filter for finance report
    function loadfinancialReport(financialReportSelectYear) {
        var data = {
            action: "financialReportSelectYear",
            year: financialReportSelectYear,
            investor_page_id: investor_page_id,
        };
        $("#iframeloading").show();
        $.ajax({
            type: 'POST',
            url: myajax.ajaxurl,
            data: data,
            success: function(html) {
                if (html.status == true) {
                    $("#financialReport").html(html.message);
                }
                $("#iframeloading").hide();
            }
        }).fail(function() {
            alert('fail to load');
            $("#iframeloading").hide();
        });
    }

    $('#financialReportSelectYear').on('select2:select', function() {
        financialReportSelectYear = $('#financialReportSelectYear').val();
        loadfinancialReport(financialReportSelectYear);
    });

    // filter for web cast
    function loadwebcast(webcastsSelectYear) {
        var data = {
            action: "webcastsSelectYear",
            year: webcastsSelectYear,
        };
        $("#iframeloading").show();
        $.ajax({
            type: 'POST',
            url: myajax.ajaxurl,
            data: data,
            success: function(html) {
                if (html.status == true) {
                    $("#webcast").html(html.message);
                }
                $("#iframeloading").hide();
            }
        }).fail(function() {
            alert('fail to load');
            $("#iframeloading").hide();
        });
    }

    $('#webcastsSelectYear').on('select2:select', function() {
        webcastsSelectYear = $('#webcastsSelectYear').val();
        loadwebcast(webcastsSelectYear);
    });

    // filter for presentation report
    function loadpresentationreport(presentationsModalYear) {
        var data = {
            action: "presentationsModalYear",
            year: presentationsModalYear,
            investor_page_id: investor_page_id,
        };
        $("#iframeloading").show();
        $.ajax({
            type: 'POST',
            url: myajax.ajaxurl,
            data: data,
            success: function(html) {
                if (html.status == true) {
                    $("#presentation").html(html.message);
                }
                $("#iframeloading").hide();
            }
        }).fail(function() {
            alert('fail to load');
            $("#iframeloading").hide();
        });
    }

    $('#presentationsModalYear').on('select2:select', function() {
        presentationsModalYear = $('#presentationsModalYear').val();
        loadpresentationreport(presentationsModalYear);
    });

    // filter for distribution payment
    function loaddistributionpayment_download(tableHeaderSelectYear) {
        var data = {
            action: "tableHeaderSelectYear",
            year: tableHeaderSelectYear,
            investor_page_id: investor_page_id,
        };
        $("#iframeloading").show();
        $.ajax({
            type: 'POST',
            url: myajax.ajaxurl,
            data: data,
            success: function(html) {
                if (html.status == true) {
                    $("#distibution_payment").html(html.table_data);
                    $("#distibution_payment_totle").html(html.total);
                    $("#download_distribution_payment").attr("href", html.download);
                }
                console.log(html);
                $("#iframeloading").hide();
            }
        }).fail(function() {
            alert('fail to load');
            $("#iframeloading").hide();
        });

    }

    $('#tableHeaderSelectYear').on('select2:select', function() {
        tableHeaderSelectYear = $('#tableHeaderSelectYear').val();
        loaddistributionpayment_download(tableHeaderSelectYear);
    });

    // filter for history tax
    function loadhistorytax(distributionsSelectYear) {
        var data = {
            action: "distributionsSelectYear",
            year: distributionsSelectYear,
            investor_page_id: investor_page_id,
        };
        $("#iframeloading").show();
        $.ajax({
            type: 'POST',
            url: myajax.ajaxurl,
            data: data,
            success: function(html) {
                if (html.status == true) {
                    $("#download_history").attr("href", html.message);
                }
                $("#iframeloading").hide();
            }
        }).fail(function() {
            alert('fail to load');
            $("#iframeloading").hide();
        });
    }

    $('#distributionsSelectYear').on('select2:select', function() {
        distributionsSelectYear = $('#distributionsSelectYear').val();
        loadhistorytax(distributionsSelectYear);
    });

    $("#mailsubmit").submit(function(e) {
        e.preventDefault();
        emailid = $('#emailid').val();
        mailurl = $('#mailurl').val();
        adminemail = $('#adminemail').val();
        url = $('#url').val();
        username = $('#username').val();
        password = $('#password').val();
        mailsuccess = $('#mailsuccess').val();
        mailfail = $('#mailfail').val();
        mail_subject = $('#mail_subject').val();
        mail_body = $('#mail_body').val();

        var EmailAddress = emailid;
        var validEmailAddress = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if (EmailAddress.length == 0) {
            $('.Email-error').addClass('red-text').text('Email is required');

        } else if (EmailAddress.trim().length == 0) {
            $('.Email-error').addClass('red-text').text('Email is required without space');

        } else if (!validEmailAddress.test(EmailAddress)) {
            $('.Email-error').addClass('red-text').text('Invalid Email');

        } else {
            $('.Email-error').removeClass('red-text').empty();

            var data = {
                action: "investor_send_mail",
                EmailAddress: emailid,
                adminemail: adminemail,
                username: username,
                password: password,
                mail_subject: mail_subject,
                mail_body: mail_body,
            };
            $("#iframeloading").show();
            $.ajax({
                type: 'POST',
                url: myajax.ajaxurl,
                data: data,
                success: function(html) {
                    if (html.status == true) {
                        if (html.message == 1) {
                            $('.Email-error').addClass('success-text').text(mailsuccess);
                            $('#emailid').val('');
                            $("#iframeloading").hide();
                        } else if (html.message == 0) {
                            $('.Email-error').addClass('red-text').text(mailfail);
                            $('#emailid').val('');
                            $("#iframeloading").hide();
                        } else {
                            $('.Email-error').addClass('red-text').text(mailfail);
                            $('#emailid').val('');
                            $("#iframeloading").hide();
                        }
                    }
                }
            }).fail(function() {
                $('.Email-error').addClass('red-text').text(mailfail);
                $('#emailid').val('');
                $("#iframeloading").hide();
            });
        }
    });

    // product click
    function loadproductdate(product_id, product_url, blog, dash) {
        var data = {
            action: "product_data",
            product_id: product_id,
        };
        $("#iframeloading").show();
        $.ajax({
            type: 'POST',
            url: myajax.ajaxurl,
            data: data,
            success: function(html) {
                if (html.status == true) {
                    $("#product_data").html(html.message);
                    $('.product-side-menu .menu-outer li a#' + product_id + '').addClass('active');
                    window.history.pushState('', '', product_url);
                    document.title = html.title + " " + dash + " " + blog;
                }
                $("#iframeloading").hide();
            }
        }).fail(function() {
            alert('fail to load');
            $("#iframeloading").hide();
        });
    }

    if ($('.product-side-menu .menu-outer li').length) {
        $('.product-side-menu .menu-outer li').click(function(e) {
            e.preventDefault();
            var product_id = $(this).find('a').attr('id');
            var product_url = $(this).find('a').attr('href');
            var blog = $('#blog').val();
            var dash = $('#dash').val();
            $('.product-side-menu .menu-outer li a').removeClass('active');
            loadproductdate(product_id, product_url, blog, dash);
        });
    }

    function loadproductdata_back(product_url_back, ) {
        var data = {
            action: "product_data_back",
            product_url_back: product_url_back,
        };
        $("#iframeloading").show();
        $.ajax({
            type: 'POST',
            url: myajax.ajaxurl,
            data: data,
            success: function(html) {
                if (html.status == true) {
                    $("#product_data").html(html.message);
                    $('.product-side-menu .menu-outer li a#' + html.product_id + '').addClass('active');
                }
                $("#iframeloading").hide();
            }
        }).fail(function() {
            alert('fail to load');
            $("#iframeloading").hide();
        });
    }

    $(window).on('popstate', function(e) {
        var product_url_back = window.location.href;
        $('.product-side-menu .menu-outer li a').removeClass('active');
        loadproductdata_back(product_url_back);
    });

    // find contact number of product
    function find_product_contact(productDropdown) {
        var data = {
            action: "productDropdown",
            product_id: productDropdown,
        };
        $("#iframeloading").show();
        $.ajax({
            type: 'POST',
            url: myajax.ajaxurl,
            data: data,
            success: function(html) {
                if (html.status == true) {
                    $("#contact_number").html(html.message);
                }
                $("#iframeloading").hide();
            }
        }).fail(function() {
            alert('fail to load');
            $("#iframeloading").hide();
        });
    }

    if ($('#productDropdown').length) {
        $('#productDropdown').on('select2:select', function() {
            productDropdown = $('#productDropdown').val();
            find_product_contact(productDropdown);
        });
    }

    if ($('.contact-tab .nav-item').length) {
        $('.contact-tab .nav-item').on('click', function() {
            $("select.country_auto").val('0').change();
            $("select.state_auto").html('<option value="0">Select State</option>');
            $("select.state_auto").val('0').change();
        });
    }

    if ($('#request-form-modal-sulphur').length) {
        $("#request-form-modal-sulphur").on('hide.bs.modal', function() {
            $("select.country_auto").val('0').change();
            $("select.state_auto").html('<option value="0">Select State</option>');
            $("select.state_auto").val('0').change();
        });
    }

    if ($('#request-form-modal-ec').length) {
        $("#request-form-modal-ec").on('hide.bs.modal', function() {
            $("select.country_auto").val('0').change();
            $("select.state_auto").html('<option value="0">Select State</option>');
            $("select.state_auto").val('0').change();
        });
    }

    if ($('#request-form-modal-water').length) {
        $("#request-form-modal-water").on('hide.bs.modal', function() {
            $("select.country_auto").val('0').change();
            $("select.state_auto").html('<option value="0">Select State</option>');
            $("select.state_auto").val('0').change();
        });
    }

    if ($('.search-block #search-button').length) {
        $("#search-button").on("click", function(e) {
            $('#searchform').submit();
        });
    }

    $(window).resize(function() {
        menu_height = $('.mega-chem-product > ul').height();
        water_solutins_height = $('.water-solutions').height();
        $(".specialty-chemicals").css("margin-top", water_solutins_height - menu_height + 30);
        $(".specialty-chemicals").css("margin-left", "15px");
    });
});

jQuery(window).on("load", function($) {
    setTimeout(function() {
        jQuery("body").addClass("scroll-visible");
    }, 1000)

    jQuery("#mega-menu-wrap-header--mega-menu #mega-menu-header--mega-menu > li.mega-menu-item.header-scroll").on("hover mouseenter", function() {
        var _this = jQuery(this);
        setTimeout(function() {
            _this.find(".mega-sub-menu").getNiceScroll().resize();
        }, 250)
    });

    if (jQuery("#mega-menu-wrap-mega-menu").length) {
        jQuery("#mega-menu-wrap-mega-menu").detach().appendTo("#mega-menu-wrap-header--mega-menu .chemical-products-menu");
    }

    jQuery("#mega-menu-wrap-mega-menu #mega-menu-mega-menu > li.mega-menu-item.scrollspy-link").on("hover mouseenter", function() {
        jQuery(this).closest(".chemical-products-menu").addClass("submenu-hover");
    })
    jQuery("#mega-menu-wrap-mega-menu #mega-menu-mega-menu > li.mega-menu-item.scrollspy-link").on("mouseleave", function() {
        jQuery(this).closest(".chemical-products-menu").removeClass("submenu-hover");
    })

    jQuery('ul.mega-menu > li.chem-product').one('mouseenter', function(e) {
        jQuery('li.menu-sulphur > a').prepend('<div class="thumb"><img class="menu-sulphur-image" src="/Project/chemical/wp-content/uploads/2022/06/ic01-megamenu.png" /></div>')
        jQuery('li.menu-water > a').prepend('<div class="thumb"><img class="menu-water-image" src="/Project/chemical/wp-content/uploads/2022/06/ic02-megamenu.png" /></div>')
        jQuery('li.menu-electro > a').prepend('<div class="thumb"><img class="menu-electro-image" src="/Project/chemical/wp-content/uploads/2022/06/ic03-megamenu.png" /></div>')
    });

    jQuery('ul.mega-menu > li.chem-product').one('mouseenter', function(e) {
        var menu_height = jQuery('.mega-chem-product > ul').height();
        var water_solutins_height = jQuery('.water-solutions').height();
        jQuery(".specialty-chemicals").css("margin-top", water_solutins_height - menu_height + 30);
        jQuery(".specialty-chemicals").css("margin-left", "15px");
    });
})

jQuery(function($) {
    if ($("#selectoptioncountry").length > 0) {
        $("#selectoptioncountry").change(function() {
            if ($("#selectState").length > 0) {
                var cnt = $("#ProductInformationTab select.country_auto").children("option:selected").attr('data-id');
                $("#ProductInformationTab select.state_auto").html('<option value="0">Select State</option>');
                jQuery.ajax({
                    url: tc_csca_auto_ajax.ajax_url,
                    type: 'post',
                    dataType: "json",
                    data: { action: "tc_csca_get_states", nonce_ajax: tc_csca_auto_ajax.nonce, cnt: cnt },
                    success: function(response) {
                        // console.log(response);
                        for (i = 0; i < response.length; i++) {
                            var st_id = response[i]['id'];
                            var st_name = response[i]['name'];
                            var opt = "<option data-id='" + st_id + "' value='" + st_name + "'>" + st_name + "</option>";
                            $("#ProductInformationTab select.state_auto").append(opt);
                        }
                    }
                });
            }
        });
    }

    // if ($("#countrySulphur").length > 0) {
    //     $("#countrySulphur").change(function() {
    //         if ($("#stateEC").length > 0) {
    //             var cnt = $("#request-form-modal-sulphur select.country_auto").children("option:selected").attr('data-id');
    //             $("#request-form-modal-sulphur select.state_auto").html('<option value="0">Select State</option>');
    //             jQuery.ajax({
    //                 url: tc_csca_auto_ajax.ajax_url,
    //                 type: 'post',
    //                 dataType: "json",
    //                 data: { action: "tc_csca_get_states", nonce_ajax: tc_csca_auto_ajax.nonce, cnt: cnt },
    //                 success: function(response) {
    //                     // console.log(response);
    //                     for (i = 0; i < response.length; i++) {
    //                         var st_id = response[i]['id'];
    //                         var st_name = response[i]['name'];
    //                         var opt = "<option data-id='" + st_id + "' value='" + st_name + "'>" + st_name + "</option>";
    //                         $("#request-form-modal-sulphur select.state_auto").append(opt);
    //                     }
    //                 }
    //             });
    //         }
    //     });
    // }

    // if ($("#countryWater").length > 0) {
    //     $("#countryWater").change(function() {
    //         if ($("#stateEC").length > 0) {
    //             var cnt = $("#request-form-modal-water select.country_auto").children("option:selected").attr('data-id');
    //             $("#request-form-modal-water select.state_auto").html('<option value="0">Select State</option>');
    //             jQuery.ajax({
    //                 url: tc_csca_auto_ajax.ajax_url,
    //                 type: 'post',
    //                 dataType: "json",
    //                 data: { action: "tc_csca_get_states", nonce_ajax: tc_csca_auto_ajax.nonce, cnt: cnt },
    //                 success: function(response) {
    //                     // console.log(response);
    //                     for (i = 0; i < response.length; i++) {
    //                         var st_id = response[i]['id'];
    //                         var st_name = response[i]['name'];
    //                         var opt = "<option data-id='" + st_id + "' value='" + st_name + "'>" + st_name + "</option>";
    //                         $("#request-form-modal-water select.state_auto").append(opt);
    //                     }
    //                 }
    //             });
    //         }
    //     });
    // }
});