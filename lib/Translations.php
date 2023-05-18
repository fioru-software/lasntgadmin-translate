<?php

namespace Lasntg\Admin\Translate;

use Lasntg\Admin\Translate\PluginUtils;

class Translations {

	public static function init(): void {
		self::add_actions();
		self::add_filters();
	}

	public static function add_actions(): void {
		add_action( 'init', [ self::class, 'load_textdomain' ] );
	}

	public static function add_filters(): void {
		add_filter( 'load_textdomain_mofile', [ self::class, 'load_textdomain_mofile' ], 1, 2 );
	}

	public static function load_textdomain() {
		load_plugin_textdomain( 'lasntgadmin', false, PluginUtils::get_kebab_case_name() . '/languages' );
		load_plugin_textdomain( 'groups', false, PluginUtils::get_kebab_case_name() . '/languages' );
	}

	public static function load_textdomain_mofile( $mofile, $domain ) {
		if ( 'default' === $domain || ( in_array( $domain, [ 'lasntgadmin', 'woocommerce', 'groups' ] ) && false !== strpos( $mofile, WP_LANG_DIR . '/plugins/' ) ) ) {
			$locale = apply_filters( 'plugin_locale', determine_locale(), $domain ); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound
			$mofile = WP_PLUGIN_DIR . '/' . PluginUtils::get_kebab_case_name() . '/languages/' . $domain . '-' . $locale . '.mo';
		}

		return $mofile;
	}

}

