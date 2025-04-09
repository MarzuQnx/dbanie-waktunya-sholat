<?php

/**
 * Handles the admin functionality of the plugin.
 *
 * @package Dbanie_Waktunya_Sholat
 */

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Dbanie_Waktunya_Sholat_Admin
{

    /**
     * Constructor.
     */
    public function __construct()
    {
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_scripts'));
    }

    /**
     * Adds the admin menu.
     */
    public function add_admin_menu()
    {
        add_menu_page(
            __('Waktu Sholat', 'dbanie-waktunya-sholat'),
            __('Waktu Sholat', 'dbanie-waktunya-sholat'),
            'manage_options',
            'dbanie-waktunya-sholat',
            array($this, 'settings_page'),
            'dashicons-clock',
            25
        );
    }

    public function settings_page()
    {
        // Register settings
        register_setting(
            'dbanie_waktunya_sholat_settings_group', // Option group
            'dbanie_waktunya_sholat_latitude', // Option name (latitude)
            'sanitize_text_field' // Sanitize callback
        );
        register_setting(
            'dbanie_waktunya_sholat_settings_group', // Option group
            'dbanie_waktunya_sholat_longitude', // Option name (longitude)
            'sanitize_text_field' // Sanitize callback
        );
        register_setting(
            'dbanie_waktunya_sholat_settings_group', // Option group
            'dbanie_waktunya_sholat_method', // Option name (method)
            'sanitize_text_field' // Sanitize callback
        );

        // Add settings sections (we are using a manual form, so this might not be strictly necessary
        // but it's good practice if you were using do_settings_sections())
        add_settings_section(
            'location_settings', // ID
            __('Pengaturan Lokasi', 'dbanie-waktunya-sholat'), // Title
            '', // Callback
            'dbanie-waktunya-sholat-settings' // Page
        );

        // Note: We are directly outputting the form fields in the template,
        // so add_settings_field might not be strictly needed here if you prefer
        // the manual HTML structure. However, for consistency with WordPress settings API:
        add_settings_field(
            'latitude', // ID
            __('Lintang', 'dbanie-waktunya-sholat'), // Title
            '', // Callback (we handle output in the template)
            'dbanie-waktunya-sholat-settings', // Page
            'location_settings' // Section
        );
        add_settings_field(
            'longitude', // ID
            __('Bujur', 'dbanie-waktunya-sholat'), // Title
            '', // Callback (we handle output in the template)
            'dbanie-waktunya-sholat-settings', // Page
            'location_settings' // Section
        );
        add_settings_field(
            'method', // ID
            __('Metode Perhitungan', 'dbanie-waktunya-sholat'), // Title
            '', // Callback (we handle output in the template)
            'dbanie-waktunya-sholat-settings', // Page
            'location_settings' // Section
        );

        require_once DBANIE_WAKTUNYA_SHOLAT_PLUGIN_PATH . 'includes/admin/views/settings-page.php';
    }

    /**
     * Enqueues admin scripts and styles.
     *
     * @param string $hook The current admin page hook.
     */
    public function enqueue_admin_scripts($hook)
    {
        if ('toplevel_page_dbanie-waktunya-sholat' === $hook || 'dbanie-waktunya-sholat_page_dbanie-waktunya-sholat-settings' === $hook) {
            wp_enqueue_style('dbanie-waktunya-sholat-admin', DBANIE_WAKTUNYA_SHOLAT_PLUGIN_URL . 'assets/css/dbanie-waktunya-sholat-admin.css', array(), '1.0.0');
        }
    }
}
