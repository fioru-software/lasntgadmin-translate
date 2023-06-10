<?php
/**
 * Plugin Name:       LASNTG Admin Translate
 * Plugin URI:        https://github.com/fioru-software/lasntgadmin-plugin_template
 * Description:       Translations.
 * Version:           1.1.9
 * Requires PHP:      7.2
 * Text Domain:       lasntgadmin
 * Domain Path:       /languages
 */

defined( 'ABSPATH' ) || exit;

use Lasntg\Admin\Translate\Translations;

// composer autoloading.
require_once getenv( 'COMPOSER_AUTOLOAD_FILEPATH' );

Translations::init();

//  add_filter(  'gettext',  'wps_translate_words_array', 10, 3  );
 add_filter(  'ngettext',  'wps_translate_words_array', 10, 5  );
   function wps_translate_words_array( $translated,  $untranslated_text, $plural, $number, $domain ) {
    
    if($translated == 'Trash' || str_contains($translated, 'Trash')){
      echo "Translated: $translated; $untranslated_text, $domain; Plural: $plural; Number: $number \n<br/>";
      return $translated;
    }
    if(is_array($translated)){
      var_dump($translated);
      die();
    }
    $words = array(
                    // 'word to translate' = > 'translation'
                    'Posts' => 'Article',
                    'Post' => 'Articles',
                    'Pages' => 'Stuffing',
                    'Media' => 'Upload Images',
                    'Links' => 'Blog Roll',
                    'Trash' => 'Bin',
                    'Product' => 'Course',
                );

    $translated = str_ireplace(  array_keys($words),  $words,  $translated );
    return $translated;
   };