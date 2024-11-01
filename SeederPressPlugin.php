<?php

namespace SeederPress\Plugins;

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! defined( 'SEEDERPRESS_PLUGIN_PATH' ) ) {
    define( 'SEEDERPRESS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
}
if ( ! defined( 'SEEDERPRESS_PLUGIN_URL' ) ) {
    define( 'SEEDERPRESS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

class SeederPressPlugin
{

    static function init(): void
    {
        add_action( 'init', function () {

            // Register blocks
            self::register_blocks_categories();
            self::register_blocks();

            // Enqueue block editor assets
            self::enqueue_block_editor_assets();

            // Enqueue front assets
            self::enqueue_front_assets();
        });
    }

}

