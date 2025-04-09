<?php

/**
 * Admin settings page template.
 *
 * @package Dbanie_Waktunya_Sholat
 */

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

?>
<div class="wrap">
    <h1><?php esc_html_e('Pengaturan Waktu Sholat', 'dbanie-waktunya-sholat'); ?></h1>
    <form method="post" action="options.php">
        <?php
        settings_fields('dbanie_waktunya_sholat_settings_group');
        do_settings_sections('dbanie-waktunya-sholat'); // Use the main menu slug here
        submit_button();
        ?>
    </form>

    <h2><?php esc_html_e('Penggunaan Shortcode', 'dbanie-waktunya-sholat'); ?></h2>
    <p><?php esc_html_e('Gunakan shortcode berikut untuk menampilkan waktu sholat di posting, halaman, atau widget teks Anda:', 'dbanie-waktunya-sholat'); ?></p>
    <ul>
        <li><code>[fajr_prayer]</code> - <?php esc_html_e('Waktu sholat Subuh.', 'dbanie-waktunya-sholat'); ?></li>
        <li><code>[sunrise]</code> - <?php esc_html_e('Waktu Matahari Terbit.', 'dbanie-waktunya-sholat'); ?></li>
        <li><code>[zuhr_prayer]</code> - <?php esc_html_e('Waktu sholat Dzuhur.', 'dbanie-waktunya-sholat'); ?></li>
        <li><code>[asr_prayer]</code> - <?php esc_html_e('Waktu sholat Ashar.', 'dbanie-waktunya-sholat'); ?></li>
        <li><code>[maghrib_prayer]</code> - <?php esc_html_e('Waktu sholat Maghrib.', 'dbanie-waktunya-sholat'); ?></li>
        <li><code>[isha_prayer]</code> - <?php esc_html_e('Waktu sholat Isya.', 'dbanie-waktunya-sholat'); ?></li>
    </ul>
</div>

<script type="text/javascript">
    jQuery(document).ready(function($) {
        // You can add JavaScript for the settings page here if needed.
    });
</script>