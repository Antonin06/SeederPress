<?php

/**
 * Plugin Name:       SeederPress
 * Description:       SeederPress is a WordPress plugin that allows you to seed your WordPress database with fake data.
 * Requires PHP:      8.3
 * Version:           0.0.1
 * Author:            Antonin Avon
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       seederpress
 */

require_once __DIR__ . '/vendor/autoload.php';

if ( ! defined( 'SEEDERPRESS_PLUGIN_PATH' ) ) {
    define( 'SEEDERPRESS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
}
if ( ! defined( 'SEEDERPRESS_PLUGIN_URL' ) ) {
    define( 'SEEDERPRESS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

use SeederPress\Plugins\SeederPressPlugin;

SeederPressPlugin::init();
