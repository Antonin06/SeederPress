<?php

namespace SeederPress\Admin;

if (!defined('ABSPATH')) {
    exit; // Sortie si accès direct
}

class SettingsPage {

    public function init(): void {
        add_action('admin_menu', [$this, 'add_plugin_page']);
        add_action('rest_api_init', [$this, 'register_rest_routes']);
    }

    public function add_plugin_page(): void {
        add_menu_page(
            'SeederPress Settings',
            'SeederPress',
            'manage_options',
            'seederpress-settings',
            [$this, 'render_admin_page'],
            'dashicons-admin-generic',
            110
        );
    }

    public function render_admin_page(): void {
        echo '<div id="content-generator-settings"></div>';
    }

    public function register_rest_routes(): void {
        register_rest_route('seederpress/v1', '/options', [
            'methods'  => 'GET',
            'callback' => [$this, 'get_options'],
            'permission_callback' => function() {
                return current_user_can('manage_options');
            }
        ]);

        register_rest_route('seederpress/v1', '/options', [
            'methods'  => 'POST',
            'callback' => [$this, 'update_options'],
            'permission_callback' => function() {
                return current_user_can('manage_options');
            }
        ]);
    }

    public function get_options() {
        $options = get_option('seederpress_options', [
            'count' => 10,
            'imageSource' => 'https://placehold.co/600x400'
        ]);
        return new \WP_REST_Response($options, 200);
    }

    public function update_options(\WP_REST_Request $request) {
        $params = $request->get_params();
        $options = [
            'count' => absint($params['count'] ?? 10),
            'imageSource' => sanitize_text_field($params['imageSource'] ?? 'https://placehold.co/600x400')
        ];

        update_option('seederpress_options', $options);

        return new \WP_REST_Response(['message' => 'Options sauvegardées avec succès.'], 200);
    }
}