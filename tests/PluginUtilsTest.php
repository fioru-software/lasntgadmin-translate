<?php

use Lasntg\Admin\Example;
use Lasntg\Admin\Translate\PluginUtils;

/**
 * Class SampleTest
 *
 * @package Wordpress_Classic_Theme_template
 */

/**
 * Example test case.
 */
class PluginUtilsTest extends WP_UnitTestCase {

    public function set_up() {
        parent::set_up();
    }

	/**
	 * A single example test.
	 */
	public function testGetCamelCaseName() {
		// Replace this with some actual testing code.
        $this->assertSame(
            'lasntgadmin_translate',
            PluginUtils::get_camel_case_name()
        );
	}
}
