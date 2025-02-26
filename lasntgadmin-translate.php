<?php
/**
 * Plugin Name:       LASNTG Admin Translate
 * Plugin URI:        https://github.com/fioru-software/lasntgadmin-plugin_template
 * Description:       Translations.
 * Version:           1.2.13
 * Requires PHP:      7.2
 * Text Domain:       lasntgadmin
 * Domain Path:       /languages
 */

defined( 'ABSPATH' ) || exit;

use Lasntg\Admin\Translate\Translations;

// composer autoloading.
require_once getenv( 'COMPOSER_AUTOLOAD_FILEPATH' );

Translations::init();
