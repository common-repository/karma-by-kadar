<?php
/*
Plugin Name: Karma Music Player by Kadar
Description: This is a responsive music player plugin for implementing audio players in your WordPress website with a shortcode and widget, but it has VisualComposer support too.
Version: 1.1.2
Author: Kadar Claudiu
Author URI: https://karma.kadarclaudiu.ro/
License: GPLv2 or later
Text Domain: karma-by-kadar
Domain Path: /languages
*/

define( 'KARMA_BY_KADAR__PLUGIN_URL', trailingslashit(plugin_dir_url( __FILE__ )) );
define( 'KARMA_BY_KADAR__PLUGIN_DIR', trailingslashit(plugin_dir_path( __FILE__ )) );
define( 'KARMA_BY_KADAR__PLUGIN_DIR_NAME', dirname(plugin_basename( __FILE__ )) );

// Translation Support.
require_once( KARMA_BY_KADAR__PLUGIN_DIR . 'lib/karma_by_kadar__translation.php' );

// Admin notices.
require_once( KARMA_BY_KADAR__PLUGIN_DIR . 'lib/karma_by_kadar__admin-notices.php' );

// Include simple player shortcode.
require_once( KARMA_BY_KADAR__PLUGIN_DIR . 'lib/karma_by_kadar__shortcodes.php' );

// Load the script and styles for the player.
require_once( KARMA_BY_KADAR__PLUGIN_DIR . 'lib/includes/karma_by_kadar__scripts-styles.php' );

// Widgets Support.
require_once( KARMA_BY_KADAR__PLUGIN_DIR . 'lib/integrations/widgets/karma_by_kadar__widgets.php' );
require_once( KARMA_BY_KADAR__PLUGIN_DIR . 'lib/includes/karma_by_kadar__scripts-styles__widgets.php' );

// Visual Composer Support.
require_once( KARMA_BY_KADAR__PLUGIN_DIR . 'lib/integrations/visual-composer/karma_by_kadar__visual-composer__functions.php' );
require_once( KARMA_BY_KADAR__PLUGIN_DIR . 'lib/integrations/visual-composer/karma_by_kadar__visual-composer.php' );

// Elementor Support
require_once( KARMA_BY_KADAR__PLUGIN_DIR . 'lib/integrations/elementor/karma_by_kadar__elementor.php' );
