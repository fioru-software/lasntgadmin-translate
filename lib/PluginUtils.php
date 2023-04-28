<?php

namespace Lasntg\Admin;

use Lasntg\Admin\Order\{ Capabilities };

/**
 * Plugin utilities
 */
class PluginUtils {

	public static function activate() {
		Capabilities::add();
	}

	public static function deactivate() {
		Capabilities::remove();
	}

	public static function get_camel_case_name(): string {
		return 'lasntgadmin_orders';
	}

	public static function get_kebab_case_name(): string {
		return 'lasntgadmin-orders';
	}

	public static function get_absolute_plugin_path():string {
		return sprintf( '/var/www/html/wp-content/plugins/%s', self::get_kebab_case_name() );
	}
}


