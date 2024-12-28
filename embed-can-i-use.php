<?php
/*
Plugin Name: Embed Can I Use
Description: Add Can I Use support tables to your WordPress web site thanks to this shortcode. Example: <code>[ciu_embed feature="audio" periods="-1,current,+1,+2"]</code>
Author: Geoffrey Crofte
Version: 1.0.2
Author URI: http://geoffrey.crofte.fr
License: GPLv2 or later
Text domain: embed-can-i-use
Domain Path: /languages

Copyright 2016  Geoffrey Crofte  (email : support@creativejuiz.com)
Embedded makes possible thanks to the work done at http://caniuse.bitsofco.de/

    
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

*/

define( 'ECIU_SCRIPT_VERSION', '1.0.1' );
	
/**
 * Makes this plugin translatable
 *
 * @since  1.0.0
 * @author Geoffrey
 */
add_action( 'init', 'ciue_multilang' );
function ciue_multilang() {
	load_plugin_textdomain( 'embed-can-i-use', false, basename( dirname( __FILE__ ) ) . '/languages' );
}

/**
 * New ciu_embed shortcode
 *
 * @since  1.0.2 Better security with wp_kses_post and other escaping functions
 * @since  1.0.0
 * @author Geoffrey
 */
add_shortcode( 'ciu_embed', 'add_ciue_shortcode' );
function add_ciue_shortcode( $attr ) {

	extract( shortcode_atts( array(
		'feature' 	=> '',
		'periods' 	=> 'past_1,current,future_1',
	), $attr ) );

	$return = current_user_can( 'remove_users' ) ? sprintf( esc_html__( 'You need to complete %sfeature%s shortcode attribute', 'embed-can-i-use' ), '<code>', '</code>' ) :  '';

	// if no feature filled in
	if ( $feature === '' ) {
		return $return;
	}

	$periods = preg_replace(
		array( '#\-([1-9]{1})#', '#\+([1-9]{1})#'),
		array( 'past_$1', 'future_$1' ),
		$periods
	);

	if ( ! preg_match( '#current#', $periods ) ) {
		$periods .= 'current';
	}

	$link_text = apply_filters( 'ciue_link_text', 'Can I Use ' . $feature . '?', $feature );
	$link_attr = apply_filters( 'ciue_link_target', ' target="_blank"' );

	$cui = '<div class="ciu_embed" data-feature="' . esc_attr( $feature ) . '" data-periods="' . esc_attr( $periods ) . '"><a href="https://caniuse.com/#feat=' . $feature . '"' . $link_attr . '>' . wp_kses_post( $link_text ) . '</a></div>';

	wp_enqueue_script( 'can_i_use_embedded', '//cdn.jsdelivr.net/caniuse-embed/' . ECIU_SCRIPT_VERSION . '/caniuse-embed.min.js', array(), ECIU_SCRIPT_VERSION, array( 'in_footer' => true ) );

	return $cui;

}
