jQuery( document ).ready( function( $ ){

    var mobile_max_width =  767; // Media max width for mobile
    var main_navigation = jQuery('.main-navigation .nav-menu');
    var stite_header =  $( '.site-header' );

	/**
	* Initialise Menu Toggle
	*/
	jQuery('#nav-toggle').on('click', function(event){
		event.preventDefault();
		jQuery('#nav-toggle').toggleClass('nav-is-visible');
		jQuery('.main-navigation .nav-menu').toggleClass("nav-menu-mobile");
		jQuery('.header-widget').toggleClass("header-widget-mobile");

        if ( main_navigation.hasClass( 'nav-menu-mobile' ) && $( window).width() <= mobile_max_width ) {
            var h = $( window).height( ) - stite_header.height();
            main_navigation.css( {
                height: h,
                overflow: 'auto',
            });
        } else {
            main_navigation.removeAttr( 'style' );
        }

	});

    $( window).resize( function(){
        if ( main_navigation.hasClass( 'nav-menu-mobile' ) && $( window).width() <= mobile_max_width ) {
            var h = $( window).height( ) - stite_header.height();
            main_navigation.css( {
                height: h,
                overflow: 'auto',
            });
        } else {
            main_navigation.removeAttr( 'style' );
        }
    } );


	jQuery('.nav-menu li.menu-item-has-children, .nav-menu li.page_item_has_children').each( function() {
        jQuery(this).prepend('<div class="nav-toggle-subarrow"><i class="fa fa-angle-down"></i></div>');
	});

	jQuery('.nav-toggle-subarrow, .nav-toggle-subarrow .nav-toggle-subarrow').click(
		function () {
			jQuery(this).parent().toggleClass("nav-toggle-dropdown");
		}
	);

} );