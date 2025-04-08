<?php

/**
 * Admin settings page template.
 *
 * @package Dbanie_Waktunya_Sholat
 */

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$latitude  = get_option('dbanie_waktunya_sholat_latitude', '-6.2088');
$longitude = get_option('dbanie_waktunya_sholat_longitude', '106.8456');
$method    = get_option('dbanie_waktunya_sholat_method', '4');
?>
<div class="wrap">
    <h1><?php esc_html_e('Pengaturan Waktu Sholat', 'dbanie-waktunya-sholat'); ?></h1>
    <form method="post" action="options.php">
        <?php
        settings_fields('dbanie_waktunya_sholat_settings_group');
        do_settings_sections('dbanie-waktunya-sholat-settings');
        submit_button();
        ?>
    </form>
</div>

<script type="text/javascript">
    jQuery(document).ready(function($) {
        // You can add JavaScript for the settings page here if needed.
    });
</script>