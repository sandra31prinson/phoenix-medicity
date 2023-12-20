(function ($) {
  "use strict";

  function thmSwiperInit() {
    // swiper slider
    if ($(".thm-swiper__slider").length) {
      $(".thm-swiper__slider").each(function () {
        let elm = $(this);
        let options = elm.data("swiper-options");
        let thmSwiperSlider = new Swiper(elm, options);
      });
    }
  }

    function thmOwlInit() {
    // owl slider

    if ($(".thm-owl__carousel").length) {
      $(".thm-owl__carousel").each(function () {
        let elm = $(this);
        let options = elm.data("owl-options");
        let thmOwlCarousel = elm.owlCarousel(options);
      });
    }

    if ($(".thm-owl__carousel--custom-nav").length) {
      $(".thm-owl__carousel--custom-nav").each(function () {
        let elm = $(this);
        let owlNavPrev = elm.data("owl-nav-prev");
        let owlNavNext = elm.data("owl-nav-next");
        $(owlNavPrev).on("click", function (e) {
          elm.trigger("prev.owl.carousel");
          e.preventDefault();
        });

        $(owlNavNext).on("click", function (e) {
          elm.trigger("next.owl.carousel");
          e.preventDefault();
        });
      });
    }
  }



  if ($(".banner-bg-slide").length) {
    $(".banner-bg-slide").each(function () {
      var Self = $(this);
      var bgSlideOptions = Self.data("options");
      var bannerTwoSlides = Self.vegas(bgSlideOptions);
    });
  }



  if ($(".scroll-to-target").length) {
    $(".scroll-to-target").on("click", function () {
      var target = $(this).attr("data-target");
      // animate
      $("html, body").animate(
        {
          scrollTop: $(target).offset().top
        },
        100
      );

      return false;
    });
  }

 

  if ($(".img-popup").length) {
    var groups = {};
    $(".img-popup").each(function () {
      var id = parseInt($(this).attr("data-group"), 10);

      if (!groups[id]) {
        groups[id] = [];
      }

      groups[id].push(this);
    });

    $.each(groups, function () {
      $(this).magnificPopup({
        type: "image",
        closeOnContentClick: true,
        closeBtnInside: false,
        gallery: {
          enabled: true
        }
      });
    });
  }


 

  if ($(".main-menu__list").length && $(".mobile-nav__container").length) {
    let navContent = document.querySelector(".main-menu__list").outerHTML;
    let mobileNavContainer = document.querySelector(".mobile-nav__container");
    mobileNavContainer.innerHTML = navContent;
  }
  if ($(".sticky-header__content").length) {
    let navContent = document.querySelector(".main-menu").innerHTML;
    let mobileNavContainer = document.querySelector(".sticky-header__content");
    mobileNavContainer.innerHTML = navContent;
  }

  if ($(".mobile-nav__container .main-menu__list").length) {
    let dropdownAnchor = $(
      ".mobile-nav__container .main-menu__list .dropdown > a"
    );
    dropdownAnchor.each(function () {
      let self = $(this);
      let toggleBtn = document.createElement("BUTTON");
      toggleBtn.setAttribute("aria-label", "dropdown toggler");
      toggleBtn.innerHTML = "<i class='fa fa-angle-down'></i>";
      self.append(function () {
        return toggleBtn;
      });
      self.find("button").on("click", function (e) {
        e.preventDefault();
        let self = $(this);
        self.toggleClass("expanded");
        self.parent().toggleClass("expanded");
        self.parent().parent().children("ul").slideToggle();
      });
    });
  }

  if ($(".mobile-nav__toggler").length) {
    $(".mobile-nav__toggler").on("click", function (e) {
      e.preventDefault();
      $(".mobile-nav__wrapper").toggleClass("expanded");
      $("body").toggleClass("locked");
    });
  }

  

 

  if ($(".wow").length) {
    var wow = new WOW({
      boxClass: "wow", // animated element css class (default is wow)
      animateClass: "animated", // animation css class (default is animated)
      mobile: true, // trigger animations on mobile devices (default is true)
      live: true // act on asynchronously loaded content (default is true)
    });
    wow.init();
  }

  


  


  // window load event

  $(window).on("load", function () {
    if ($(".preloader").length) {
      $(".preloader").fadeOut();
    }
   
    thmOwlInit();

    let thmOwlRangeCarousels = $(".thm-owl__carousel--range");
    if (thmOwlRangeCarousels.length) {
      thmOwlRangeCarousels.each(function () {
        let elm = $(this);
        let options = elm.data("owl-options");
        let range = elm.parent().find(".thm-owl__carousel--range__input");

        elm.on("initialized.owl.carousel", function (event) {
          let itemCount = event.item.count;
          let size = event.page.size;
          let dragLength = 100 / (itemCount / size);
          range.find("input").ionRangeSlider({
            type: "single",
            min: size,
            max: itemCount - (size - 1),
            keyboard: true,
            step: 1,
            onChange: function (data) {
              let owlTo = data.from - 1;
              elm.trigger("to.owl.carousel", [owlTo, 500, true]);
            }
          });

          range.find(".irs-bar").css("width", dragLength + "%");
          range.find(".irs-handle.single").css("left", dragLength + "%");
          range.find(".irs-single").css("left", dragLength + "%");
          // range.find('.irs-handle.single').css('width', dragLength + "%")
        });

        elm.owlCarousel(
          "object" === typeof options ? options : JSON.parse(options)
        );

        elm.on("changed.owl.carousel", function (event) {
          var itemCount = event.item.count;
          var size = event.page.size;
          var curItem = event.item.index + 1;
          var dragLength = 100 / (itemCount / curItem);
          range.find("input").data("ionRangeSlider").update({
            from: curItem
          });
          range.find(".irs-bar").css("width", dragLength + "%");
          range.find(".irs-handle.single").css("left", dragLength + "%");
          range.find(".irs-single").css("left", dragLength + "%");
          // range.find('.irs-handle.single').css('width', dragLength + "%");
        });

        elm.on("resized.owl.carousel", function (event) {
          var itemCount = event.item.count;
          var size = event.page.size;
          var curItem = event.item.index + 1;
          var dragLength = 100 / (itemCount / curItem);
          range
            .find("input")
            .data("ionRangeSlider")
            .update({
              max: itemCount - (size - 1),
              from: curItem
            });
          range.find(".irs-bar").css("width", dragLength + "%");
          range.find(".irs-handle.single").css("left", dragLength + "%");
          range.find(".irs-single").css("left", dragLength + "%");
          // range.find('.irs-handle.single').css('width', dragLength + "%");
        });
      });
    }
  });

  // window scroll event

  $(window).on("scroll", function () {
    if ($(".stricked-menu").length) {
      var headerScrollPos = 130;
      var stricky = $(".stricked-menu");
      if ($(window).scrollTop() > headerScrollPos) {
        stricky.addClass("stricky-fixed");
      } else if ($(this).scrollTop() <= headerScrollPos) {
        stricky.removeClass("stricky-fixed");
      }
    }
    if ($(".scroll-to-top").length) {
      var strickyScrollPos = 100;
      if ($(window).scrollTop() > strickyScrollPos) {
        $(".scroll-to-top").fadeIn(500);
      } else if ($(this).scrollTop() <= strickyScrollPos) {
        $(".scroll-to-top").fadeOut(500);
      }
    }
  });

 
})(jQuery);
