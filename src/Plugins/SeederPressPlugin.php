<?php

namespace SeederPress\Plugins;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Sortie si accès direct
}

if ( ! defined( 'SEEDERPRESS_PLUGIN_PATH' ) ) {
    define( 'SEEDERPRESS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
}
if ( ! defined( 'SEEDERPRESS_PLUGIN_URL' ) ) {
    define( 'SEEDERPRESS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

class SeederPressPlugin {

    public static function init(): void {
        add_action( 'init', [ self::class, 'register_blocks' ] );
        add_action( 'init', [ self::class, 'register_blocks_categories' ] );
        add_action( 'enqueue_block_editor_assets', [ self::class, 'enqueue_block_editor_assets' ] );
        add_action( 'enqueue_block_assets', [ self::class, 'enqueue_front_assets' ] );
    }

    public static function register_blocks() {
        // Logic pour enregistrer les blocs Gutenberg
    }

    public static function register_blocks_categories() {
        // Logic pour enregistrer les catégories de blocs
    }

    public static function enqueue_block_editor_assets() {
        // Logic pour enqueuer les assets du côté de l'éditeur de blocs
    }

    public static function enqueue_front_assets() {
        // Logic pour enqueuer les assets côté front-end
    }
}
