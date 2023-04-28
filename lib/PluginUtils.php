<?php

namespace Lasntg\Admin\Translate;

/**
 * Plugin utilities
 */
class PluginUtils {

	public static function get_camel_case_name(): string {
		return 'lasntgadmin_translate';
	}

	public static function get_kebab_case_name(): string {
		return 'lasntgadmin-translate';
	}

	public static function get_absolute_plugin_path(): string {
		return sprintf( '/var/www/html/wp-content/plugins/%s', self::get_kebab_case_name() );
	}
}


