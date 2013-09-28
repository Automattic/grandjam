<?php
/*
 * Plugin Name: grandjam
 * Description: jam jam jam
 * License: GPL2+
 */

class Grandjam {
	function embed_simplenote( $matches, $attr, $url, $rawattr ) {
		$embed = sprintf( '<div class="embed-simplenote" data-id="%s"></div>', esc_attr( $matches[1] ) );
		return apply_filters( 'embed_simplenote', $embed, $matches, $attr, $url, $rawattr );
	}

	function grandjam_init() {
		wp_embed_register_handler( 'simplenote', '#http://simp\.ly/publish/(.*)#i', array( 'Grandjam', 'embed_simplenote' ) );
		self::enqueue_js_css();
	}

	function enqueue_js_css() {
		wp_enqueue_script( 'grandjam-embed-simplenote', plugins_url( 'embed-simplenote.js', __FILE__ ), array( 'jquery' ), '20130927a', true );

	}
}
add_action( 'init', array( 'Grandjam', 'grandjam_init' ) );
