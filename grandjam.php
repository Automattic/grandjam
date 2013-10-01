<?php
/*
 * Plugin Name: grandjam
 * Description: jam jam jam
 * License: GPL2+
 */

class Grandjam {
	function embed_simplenote( $matches, $attr, $url, $rawattr ) {
		if ( !isset( $matches[2] ) ) {
			return $url;
		}

		$stub = esc_attr( $matches[2] );
		if ( empty( $matches[2] ) ) {
			return $url;
		}
		$embed = sprintf( '<div class="embed-simplenote" data-id="%s"></div>', $stub );
		return apply_filters( 'embed_simplenote', $embed, $matches, $attr, $url, $rawattr );
	}

	function grandjam_init() {
		$regex = '#^https?:\/\/(app.simplenote.com|simp.ly)\/publish\/(\S*)#i';
		wp_embed_register_handler( 'simplenote', $regex, array( 'Grandjam', 'embed_simplenote' ) );
		self::enqueue_js_css();
	}

	function enqueue_js_css() {
		wp_enqueue_script( 'grandjam-embed-simplenote', plugins_url( 'embed-simplenote.js', __FILE__ ), array( 'jquery' ), '20130927a', true );

	}
}
add_action( 'init', array( 'Grandjam', 'grandjam_init' ) );
