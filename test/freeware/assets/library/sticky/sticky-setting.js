/*
 * Settings of the sticky menu
 */

jQuery(document).ready(function($){
    if ($(window).width() > 768) {
        var wpAdminBar = $('#wpadminbar');
        if ( wpAdminBar.length ) {
          $("#nav-sticker").sticky({topSpacing:wpAdminBar.height()});
        } else {
          $("#nav-sticker").sticky({topSpacing:0});
        }
    }
});