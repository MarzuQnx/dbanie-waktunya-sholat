<?php

/**
 * Plugin Name: Dbanie Waktunya Sholat
 * Plugin URI: https://github.com/MarzuQnx/dbanie-waktunya-sholat
 * Description: Menampilkan waktu sholat berdasarkan lokasi yang ditentukan di halaman pengaturan admin menggunakan shortcode.
 * Version: 1.1.0
 * Author: dbanie
 * Author URI: https://marzqunx.com
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package Dbanie_Waktunya_Sholat
 */

// If this file is called directly, abort.
if (! defined('WPINC')) {
    die;
}

// Define plugin path and URL constants.
define('DBANIE_WAKTUNYA_SHOLAT_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('DBANIE_WAKTUNYA_SHOLAT_PLUGIN_URL', plugin_dir_url(__FILE__));

/**
 * Autoload classes.
 */
spl_autoload_register('dbanie_waktunya_sholat_autoload');

function dbanie_waktunya_sholat_autoload($class_name)
{
    if (false === strpos($class_name, 'Dbanie_Waktunya_Sholat')) {
        return;
    }

    $file_path = DBANIE_WAKTUNYA_SHOLAT_PLUGIN_PATH . 'includes/';

    if (strpos($class_name, 'Dbanie_Waktunya_Sholat_Admin') !== false) {
        $file_path .= 'admin/class-dbanie-waktunya-sholat-admin.php';
    } elseif (strpos($class_name, 'Dbanie_Waktunya_Sholat_API') !== false) {
        $file_path .= 'core/class-dbanie-waktunya-sholat-api.php';
    } elseif (strpos($class_name, 'Dbanie_Waktunya_Sholat_Shortcodes') !== false) {
        $file_path .= 'core/class-dbanie-waktunya-sholat-shortcodes.php';
    }

    if (file_exists($file_path)) {
        require_once $file_path;
    }
}

/**
 * Plugin activation hook.
 */
function dbanie_waktunya_sholat_activate()
{
    // Set default options saat plugin diaktifkan.
    update_option('dbanie_waktunya_sholat_latitude', '-6.2088'); // Contoh: Lintang Jakarta
    update_option('dbanie_waktunya_sholat_longitude', '106.8456'); // Contoh: Bujur Jakarta
    update_option('dbanie_waktunya_sholat_method', '4'); // Contoh: Metode Muslim World League
}
register_activation_hook(__FILE__, 'dbanie_waktunya_sholat_activate');

/**
 * Initialize plugin components.
 */
add_action('plugins_loaded', 'dbanie_waktunya_sholat_init');

function dbanie_waktunya_sholat_init()
{
    if (is_admin()) {
        new Dbanie_Waktunya_Sholat_Admin();
    }
    new Dbanie_Waktunya_Sholat_Shortcodes();
}
