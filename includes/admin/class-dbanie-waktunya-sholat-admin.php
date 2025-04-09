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

    /**
     * Renders the settings page.
     */
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

        // Add settings sections
        add_settings_section(
            'location_settings', // ID
            __('Pengaturan Lokasi', 'dbanie-waktunya-sholat'), // Title
            '', // Callback
            'dbanie-waktunya-sholat' // Page slug (important: use the main menu slug)
        );

        // Add settings fields
        add_settings_field(
            'latitude', // ID
            __('Lintang', 'dbanie-waktunya-sholat'), // Title
            array($this, 'latitude_field_callback'), // Callback function to render the field
            'dbanie-waktunya-sholat', // Page slug
            'location_settings' // Section ID
        );
        add_settings_field(
            'longitude', // ID
            __('Bujur', 'dbanie-waktunya-sholat'), // Title
            array($this, 'longitude_field_callback'), // Callback function to render the field
            'dbanie-waktunya-sholat', // Page slug
            'location_settings' // Section ID
        );
        add_settings_field(
            'method', // ID
            __('Metode Perhitungan', 'dbanie-waktunya-sholat'), // Title
            array($this, 'method_field_callback'), // Callback function to render the field
            'dbanie-waktunya-sholat', // Page slug
            'location_settings' // Section ID
        );

        require_once DBANIE_WAKTUNYA_SHOLAT_PLUGIN_PATH . 'includes/admin/views/settings-page.php';
    }

    /**
     * Callback function to render the latitude field.
     */
    public function latitude_field_callback()
    {
        $latitude = get_option('dbanie_waktunya_sholat_latitude', '-6.2088');
        echo '<input type="text" name="dbanie_waktunya_sholat_latitude" value="' . esc_attr($latitude) . '" class="regular-text" />';
        echo '<p class="description">' . esc_html__('Masukkan lintang lokasi (contoh: -6.2088).', 'dbanie-waktunya-sholat') . '</p>';
    }

    /**
     * Callback function to render the longitude field.
     */
    public function longitude_field_callback()
    {
        $longitude = get_option('dbanie_waktunya_sholat_longitude', '106.8456');
        echo '<input type="text" name="dbanie_waktunya_sholat_longitude" value="' . esc_attr($longitude) . '" class="regular-text" />';
        echo '<p class="description">' . esc_html__('Masukkan bujur lokasi (contoh: 106.8456).', 'dbanie-waktunya-sholat') . '</p>';
    }

    /**
     * Callback function to render the method field (combo box).
     */
    public function method_field_callback()
    {
        $method = get_option('dbanie_waktunya_sholat_method', '4');
        $calculation_methods = array(
            '0' => __('Muslim World League', 'dbanie-waktunya-sholat'),
            '1' => __('Islamic Society of North America (ISNA)', 'dbanie-waktunya-sholat'),
            '2' => __('Egyptian General Authority of Survey', 'dbanie-waktunya-sholat'),
            '3' => __('Umm Al-Qura University, Makkah', 'dbanie-waktunya-sholat'),
            '4' => __('University of Islamic Sciences, Karachi', 'dbanie-waktunya-sholat'),
            '5' => __('Institute of Geophysics, University of Tehran', 'dbanie-waktunya-sholat'),
            '7' => __('Shia Ithna-Ashari, Leva Institute, Qum', 'dbanie-waktunya-sholat'),
            '8' => __('Gulf Region', 'dbanie-waktunya-sholat'),
            '9' => __('Kuwait', 'dbanie-waktunya-sholat'),
            '10' => __('Qatar', 'dbanie-waktunya-sholat'),
            '11' => __('Majlis Ugama Islam Singapura, Singapore', 'dbanie-waktunya-sholat'),
            '12' => __('Union Organization islamic de France', 'dbanie-waktunya-sholat'),
            '13' => __('Diyanet İşleri Başkanlığı, Turkey', 'dbanie-waktunya-sholat'),
            '14' => __('Spiritual Administration of Muslims of Russia', 'dbanie-waktunya-sholat'),
            '15' => __('Moonsighting Committee', 'dbanie-waktunya-sholat'),
            '16' => __('Dubai, UAE', 'dbanie-waktunya-sholat'),
            '17' => __('Jabatan Kemajuan Islam Malaysia (JAKIM)', 'dbanie-waktunya-sholat'),
            '18' => __('Tunisia', 'dbanie-waktunya-sholat'),
            '19' => __('Algeria', 'dbanie-waktunya-sholat'),
            '20' => __('Kementerian Agama Republik Indonesia', 'dbanie-waktunya-sholat'),
            '21' => __('Morocco', 'dbanie-waktunya-sholat'),
            '22' => __('Comunidate Islamica de Lisboa (Portugal)', 'dbanie-waktunya-sholat'),
        );

        echo '<select name="dbanie_waktunya_sholat_method">';
        foreach ($calculation_methods as $value => $label) {
            echo '<option value="' . esc_attr($value) . '"' . selected($method, $value) . '>' . esc_html($label) . '</option>';
        }
        echo '</select>';
        echo '<p class="description">' . esc_html__('Pilih metode perhitungan waktu sholat yang sesuai dengan lokasi Anda.', 'dbanie-waktunya-sholat') . ' <a href="https://aladhan.com/calculation-methods" target="_blank">' . esc_html__('Lihat daftar metode perhitungan', 'dbanie-waktunya-sholat') . '</a></p>';
    }

    /**
     * Enqueues admin scripts and styles.
     *
     * @param string $hook The current admin page hook.
     */
    public function enqueue_admin_scripts($hook)
    {
        if ('toplevel_page_dbanie-waktunya-sholat' === $hook) {
            wp_enqueue_style('dbanie-waktunya-sholat-admin', DBANIE_WAKTUNYA_SHOLAT_PLUGIN_URL . 'assets/css/dbanie-waktunya-sholat-admin.css', array(), '1.0.0');
        }
    }
}
