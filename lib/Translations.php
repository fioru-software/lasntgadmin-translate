<?php

namespace Lasntg\Admin\Translate;

use Lasntg\Admin\Translate\PluginUtils;
use Lasntg\Admin\Orders\PageUtils as OrderPageUtils;
use Lasntg\Admin\PaymentGateway\GrantFunded\GrantExplorerWidget;

class Translations {

	public static function init(): void {
		self::add_actions();
		self::add_filters();
	}

	public static function add_actions(): void {
		add_action( 'init', [ self::class, 'load_textdomain' ] );
		add_action( 'admin_enqueue_scripts', [ self::class, 'load_script_translations' ], 100 );
	}

	public static function add_filters(): void {
		add_filter( 'load_textdomain_mofile', [ self::class, 'load_textdomain_mofile' ], 1, 2 );
	}

	/**
	 * Loads translation for Gutenberg apps. The handle should match.
	 */
	public static function load_script_translations() {
		// Admin Order App.
		wp_set_script_translations(
			OrderPageUtils::get_admin_order_script_handle(),
			'lasntgadmin',
			WP_PLUGIN_DIR . '/' . PluginUtils::get_kebab_case_name() . '/languages'
		);
		// Grant Explorer Widget.
		wp_set_script_translations(
			GrantExplorerWidget::get_grant_explorer_widget_script_handle(),
			'lasntgadmin',
			WP_PLUGIN_DIR . '/' . PluginUtils::get_kebab_case_name() . '/languages'
		);
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
