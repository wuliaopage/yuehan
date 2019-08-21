jQuery(document).ready(function($) {

  jQuery('.main-navigation .menu-toggle').click(function() {
    jQuery('.main-navigation ul.nav-menu, .main-navigation .menu ul').slideToggle();
  });

  //responsive sub menu toggle

  jQuery('.menu-item-has-children > a, page_item_has_children > a').after('<button class="dropdown-toggle" aria-expanded="false"> <i class="fa fa-chevron-down"></i> </button>');

  jQuery('.main-navigation button.dropdown-toggle').click(function() {
    jQuery(this).toggleClass('active');
    jQuery(this).parent().find('.sub-menu').first().slideToggle();
  });

  //mobile sub menu
  jQuery('.dropdown-toggle').on("click", function(e) {
    e.preventDefault();
    jQuery(this).attr('aria-expanded', function(index, attr) {
      return attr == 'true' ? 'false' : 'true';
    });
  });

  //Touch on focus
  jQuery("body").click(function(){
    jQuery("#primary-menu li").removeClass("focus");
  });
  
  //Address menu
  jQuery('.address-book-navigation .address-book-toggle').click(function() {
    jQuery('.address-book-navigation ul.address-book-content').slideToggle();
  });
  
  //sticky sidebar
  jQuery('.widget-area')
    .theiaStickySidebar({
      additionalMarginTop: 30
    });

  //Toggle header search
  $(document).ready(function () {
      $(document).click(function () {
          $('.search-container').slideUp();
          $('.search-toggle').removeClass('open');
      });
      $('.search-toggle').click(function (e) {
          e.stopPropagation();
          $('.search-container').slideToggle();
          $('.search-toggle').toggleClass('open');
      });
      $('.search-container, .search-toggle').click(function (e) {
          e.stopPropagation();
      });
  });

  /*Scroll to Down*/
  $(function() {
    $('.scroll-down').click (function() {
      $('html, body').animate({scrollTop: $('#nav-sticker').offset().top }, 'slow');
      return false;
    });
  });

  /*Scroll to Top*/
  jQuery(document).ready(function() {
    // Start Scroll To Top
    var btn = jQuery('.back-to-top');
    jQuery(window).scroll(function() {
      if ($(this).scrollTop() >= 300) {
        btn.show();
        btn.addClass('active');
      } else {
        btn.hide();
        btn.removeClass('active');
      }
    });

    btn.click(function() {
      jQuery('html, body').animate({
        scrollTop: 0
      }, 600);
      return false;
    });
    // End Scroll To Top
  });



});