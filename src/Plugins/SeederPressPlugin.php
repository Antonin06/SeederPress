<?php

namespace SeederPress\Plugins;

use SeederPress\Admin\SettingsPage;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Sortie si accès direct
}
class SeederPressPlugin {

    public static function init(): void {
        add_action('admin_enqueue_scripts', [self::class, 'enqueue_admin_assets']);

        // Initialiser la page d'options
        $settings_page = new SettingsPage();
        $settings_page->init();
    }

    public static function enqueue_admin_assets(): void
    {
        $screen = get_current_screen();
        if ($screen && $screen->id !== 'toplevel_page_seederpress-settings') {
            return;
        }

        // Charger les assets JS/CSS nécessaires
        $editorAssets = include(SEEDERPRESS_PLUGIN_PATH . 'build/settings-page.asset.php');

        wp_enqueue_script(
            'seederpress-settings-js',
            SEEDERPRESS_PLUGIN_URL . 'build/settings-page.js',
            $editorAssets['dependencies'],
            $editorAssets['version'],
            true
        );
    }
}
