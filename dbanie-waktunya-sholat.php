<?php

/**
 * Plugin Name: Dbanie Waktunya Sholat
 * Plugin URI: https://marzuqnx.com
 * Description: Menampilkan waktu sholat berdasarkan lokasi koordinat dan metode perhitungan powered-by Al-Adhan API.
 * Version: 1.2.0
 * Author: Dbanie
 * Author URI: https://marzuqnx.com
 * License: GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Define plugin constants
define('DBANIE_WAKTUNYA_SHOLAT_PLUGIN_URL', plugin_dir_url(__FILE__));
define('DBANIE_WAKTUNYA_SHOLAT_PLUGIN_PATH', plugin_dir_path(__FILE__));

// Include the main admin class
require_once DBANIE_WAKTUNYA_SHOLAT_PLUGIN_PATH . 'includes/admin/class-dbanie-waktunya-sholat-admin.php';

// Include the shortcodes class
require_once DBANIE_WAKTUNYA_SHOLAT_PLUGIN_PATH . 'includes/core/class-dbanie-waktunya-sholat-shortcodes.php';

/**
 * Initialize the admin functionality.
 */
function dbanie_waktunya_sholat_init_admin()
{
    new Dbanie_Waktunya_Sholat_Admin();
}
add_action('plugins_loaded', 'dbanie_waktunya_sholat_init_admin');

/**
 * Initialize the shortcodes functionality.
 */
function dbanie_waktunya_sholat_init_shortcodes()
{
    new Dbanie_Waktunya_Sholat_Shortcodes();
}
add_action('init', 'dbanie_waktunya_sholat_init_shortcodes');
