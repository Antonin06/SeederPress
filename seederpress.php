<?php

/**
 * Plugin Name:       SeederPress
 * Description:       SeederPress is a WordPress plugin that provides a set of Gutenberg blocks to help you create your website.
 * Requires PHP:      8.3
 * Version:           0.0.1
 * Author:            Antonin Avon
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       seederpress
 */

if ( defined( 'WP_ENV' ) && WP_ENV === 'wp-env' ) {
    // Nous sommes dans l'environnement wp-env
    require_once __DIR__ . '/vendor/autoload.php';
}

// Inclure manuellement le fichier de la classe principale si non chargé par Composer
if ( ! class_exists( 'SeederPress\Plugins\SeederPressPlugin' ) ) {
    require_once __DIR__ . '/src/Plugins/SeederPressPlugin.php';
}

use SeederPress\Plugins\SeederPressPlugin;

SeederPressPlugin::init();
