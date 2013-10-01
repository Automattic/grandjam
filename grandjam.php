<?php
/*
 * Plugin Name: grandjam
 * Description: jam jam jam
 * License: GPL2+
 */

class Grandjam {
	const CACHE_BUSTER = '20131001';

	function embed_simplenote( $matches, $attr, $url, $rawattr ) {
		if ( !isset( $matches[2] ) ) {
			return $url;
		}

		$stub = esc_attr( $matches[2] );
		if ( empty( $matches[2] ) ) {
			return $url;
		}
		$embed = sprintf( '<div class="embed-simplenote" data-id="%s"></div>', $stub );
		$embed .='<div class="embed-simplenote-footer"><a href='dkajldf'>Original Document</a></div>';		
		return apply_filters( 'embed_simplenote', $embed, $matches, $attr, $url, $rawattr );
	}

	function grandjam_init() {
		$regex = '#^https?:\/\/(app.simplenote.com|simp.ly)\/publish\/(\S*)#i';
		wp_embed_register_handler( 'simplenote', $regex, array( 'Grandjam', 'embed_simplenote' ) );
		self::enqueue_js_css();
	}

	function enqueue_js_css() {
		wp_register_script( 'showdown', plugins_url( 'lib/showdown.js', __FILE__ ), array(), self::CACHE_BUSTER, true );
		wp_enqueue_script( 'grandjam-embed-simplenote', plugins_url( 'embed-simplenote.js', __FILE__ ), array( 'jquery', 'showdown' ), self::CACHE_BUSTER, true );
		wp_enqueue_style( 'grandjam-embed-simplenote', plugins_url( 'embed-simplenote.css', __FILE__ ), array(), '20130927a' );
	}
}
add_action( 'init', array( 'Grandjam', 'grandjam_init' ) );
