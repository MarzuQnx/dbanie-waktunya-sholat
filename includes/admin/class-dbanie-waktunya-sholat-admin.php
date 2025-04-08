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
        add_options_page(
            __('Pengaturan Waktu Sholat', 'dbanie-waktunya-sholat'),
            __('Waktu Sholat', 'dbanie-waktunya-sholat'),
            'manage_options',
            'dbanie-waktunya-sholat-settings',
            array($this, 'settings_page')
        );
    }

    /**
     * Enqueues admin scripts and styles.
     *
     * @param string $hook The current admin page hook.
     */
    public function enqueue_admin_scripts($hook)
    {
        if ('settings_page_dbanie-waktunya-sholat-settings' === $hook) {
            wp_enqueue_style('dbanie-waktunya-sholat-admin', DBANIE_WAKTUNYA_SHOLAT_PLUGIN_URL . 'assets/css/dbanie-waktunya-sholat-admin.css', array(), '1.0.0');
        }
    }

    /**
     * Renders the settings page.
     */
    public function settings_page()
    {
        require_once DBANIE_WAKTUNYA_SHOLAT_PLUGIN_PATH . 'includes/admin/views/settings-page.php';
    }
}
