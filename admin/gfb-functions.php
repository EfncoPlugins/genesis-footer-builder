<?php

/*
 *	Plugin core file that executes all the plugin functions.
 *
 *	@since 1.0
 *
 */

 
/** Prevent direct access to this file. **/
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 *	@define [gfb-date]
 *	@define [gfb-brand]
 *	@define [gfb-privacy-policy]
 *	@define [gfb-disclaimer]
 *	@define [gfb-affiliate-link]
 *		
 *  Defines the shortcode functions used in the plugin
 */

add_shortcode( 'gfb-date', 'gfb_set_date' );
add_shortcode( 'gfb-brand', 'gfb_set_brand' );
add_shortcode( 'gfb-privacy-policy', 'gfb_set_privacy' );
add_shortcode( 'gfb-disclaimer', 'gfb_set_disclaimer' );
add_shortcode( 'gfb-affiliate-link', 'gfb_affiliate' );

function gfb_set_date( $atts ) {
	
	$is_set_current = gfb_get_option( 'gfb_current_date' );
	$dt_format = gfb_get_option( 'gfb_date_format' );
	
	$date = gfb_get_option( 'gfb_date' );
	$date_start = gfb_get_option( 'gfb_date_start' );
	$date_end = gfb_get_option( 'gfb_date_end' );
	
	if( $is_set_current )
		$copy_year = date('Y');
	else {
		
		if( !$dt_format )
			$copy_year = $date;
		else
			$copy_year = $date_start .' &dash; '. $date_end;
	
	}
	
	return $copy_year;
	
}

function gfb_set_brand( $atts ) {
	
	$brand = gfb_get_option( 'gfb_brand' );
	
	if( !$brand )
		$brand = get_bloginfo( 'name' );
	
	return '<a title="'. $brand .'" href="'. get_site_url() .'">'. $brand .'</a>';
	
}

function gfb_set_privacy( $atts ) {
	
	$page_id = gfb_get_option( 'gfb_privacy' );
	if( $page_id ) {
		return '<a class="gfb-privacy-policy" title="'. __( 'Privacy Policy', GFB_PLUGIN_DOMAIN ) .'" href="'. get_permalink( $page_id ) .'">'. __( 'Privacy Policy', GFB_PLUGIN_DOMAIN ) .'</a>';
	}
		
}

function gfb_set_disclaimer( $atts ) {
	
	$page_id = gfb_get_option( 'gfb_disclaimer' );
	if( $page_id ) {
		return '<a class="gfb-disclaimer" title="'. __( 'Disclaimer', GFB_PLUGIN_DOMAIN ) .'" href="'. get_permalink( $page_id ) .'">'. __( 'Disclaimer', GFB_PLUGIN_DOMAIN ) .'</a>';
	}
		
}

function gfb_affiliate( $atts ) {
	
	$link = gfb_get_option( 'gfb_affiliate_link' );
	if( $link ) {
		return '<a class="gfb-affiliate-link" title="'. __( 'Powered By Genesis', GFB_PLUGIN_DOMAIN ) .'" href="'. $link .'">'. __( 'Genesis Framework', GFB_PLUGIN_DOMAIN ) .'</a>';
	}
	
}


/** 
 *  Registering a footer menu location for the plugin.
 *	The footer menu is enabled by default, hence the location will be available once the plugin is activated
 */
 
add_action( 'genesis_footer', 'gfb_menu', 5 );
 
function gfb_menu() {
	
	if ( has_nav_menu( 'gfb_footer_menu' ) ) {
		
		$class = 'menu genesis-nav-menu menu-footer gfb-menu-footer';
		if ( genesis_superfish_enabled() ) {
			$class .= ' js-superfish';
		}
		
		$args = array(
		
			'theme_location' => 'gfb_footer_menu',
			'container' => 'genesis-nav-menu',
			'menu_class' => $class,
			'depth' => 1,
			'echo' => 0
		
		);
		
		$nav  = wp_nav_menu( $args );
		if ( !$nav ) {
			return;
		}
		
		$nav_markup_open  = genesis_markup( array(
			'html5' => '<nav %s>',
			'xhtml' => '<div id="gfb-menu-footer menu">',
			'context' => 'footer-menu',
			'echo' => false 
		) );
		
		$nav_markup_close = genesis_html5() ? '</nav>' : '</div>';
		$nav_output       = $nav_markup_open . $nav . $nav_markup_close;
		
		echo apply_filters( 'genesis_do_nav', $nav_output, $nav, $args );
		
	}
	
}


/** 
 *  The main function that outputs the customized text through the 'genesis_footer_output' filter.
 */

function gfb_customized_footer( $genesis_output ) {
	
	$output = gfb_get_option( 'gfb_output' );
	
	$date 		= '[gfb-date]';
	$brand 		= '[gfb-brand]';
	$privacy 	= '[gfb-privacy-policy]';
	$disclaimer = '[gfb-disclaimer]';
	$affil_link = '[gfb-affiliate-link]';
	
	$privacy_set = gfb_get_option( 'gfb_privacy' );
	$disclaimer_set = gfb_get_option( 'gfb_disclaimer' );
	
	/** Retrieve the plugin's default credits text **/
	$default_output = gfb_defaults();
	$default_output = $default_output['gfb_output']; 
	
	/** The output has not been customized. Make sure there are no double separators between empty settings. **/
	if( strcmp( $default_output, $output ) === 0 )	{

		if( !$privacy_set && !$disclaimer_set ) {
			
			$genesis_output = sprintf( __( '<p>Copyright &copy; %s &mdash; %s &bull; All rights reserved.</p><p>[gfb-affiliate-link] &bull; [footer_wordpress_link] &bull; [footer_loginout]</p>', GFB_PLUGIN_DOMAIN ), $date, $brand );
		
		}
		else {
			
			if( !$disclaimer_set ) {
				
				$genesis_output = sprintf( __( '<p>Copyright &copy; %s &mdash; %s &bull; All rights reserved. &bull; %s</p><p>[gfb-affiliate-link] &bull; [footer_wordpress_link] &bull; [footer_loginout]</p>', GFB_PLUGIN_DOMAIN ), $date, $brand, $privacy );
				
			}
			else {
				
				if( !$privacy_set ) {
					
					$genesis_output = sprintf( __( '<p>Copyright &copy; %s &mdash; %s &bull; All rights reserved. &bull; %s</p><p>[gfb-affiliate-link] &bull; [footer_wordpress_link] &bull; [footer_loginout]</p>', GFB_PLUGIN_DOMAIN ), $date, $brand, $disclaimer );
				
				}
				else {
					
					$genesis_output = sprintf( __( '<p>Copyright &copy; %s &mdash; %s &bull; All rights reserved. &bull; %s &bull; %s</p><p>[gfb-affiliate-link] &bull; [footer_wordpress_link] &bull; [footer_loginout]<p>', GFB_PLUGIN_DOMAIN ), $date, $brand, $privacy, $disclaimer );
				
				}
			
			}
		
		}
		
	}
	else {

		/** The output has been customized. Output as is **/
		return $output;
		
	}
	
	return  $genesis_output;	

}