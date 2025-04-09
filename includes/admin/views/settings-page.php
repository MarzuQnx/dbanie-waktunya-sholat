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

// Daftar metode perhitungan yang umum (sesuaikan dengan API yang Anda gunakan)
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

?>
<div class="wrap">
    <h1><?php esc_html_e('Pengaturan Waktu Sholat', 'dbanie-waktunya-sholat'); ?></h1>
    <form method="post" action="options.php">
        <?php
        settings_fields('dbanie_waktunya_sholat_settings_group');
        ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row"><?php esc_html_e('Lintang', 'dbanie-waktunya-sholat'); ?></th>
                <td>
                    <input type="text" name="dbanie_waktunya_sholat_latitude" value="<?php echo esc_attr($latitude); ?>" class="regular-text" />
                    <p class="description"><?php esc_html_e('Masukkan lintang lokasi (contoh: -6.2088).', 'dbanie-waktunya-sholat'); ?></p>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><?php esc_html_e('Bujur', 'dbanie-waktunya-sholat'); ?></th>
                <td>
                    <input type="text" name="dbanie_waktunya_sholat_longitude" value="<?php echo esc_attr($longitude); ?>" class="regular-text" />
                    <p class="description"><?php esc_html_e('Masukkan bujur lokasi (contoh: 106.8456).', 'dbanie-waktunya-sholat'); ?></p>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><?php esc_html_e('Metode Perhitungan', 'dbanie-waktunya-sholat'); ?></th>
                <td>
                    <select name="dbanie_waktunya_sholat_method">
                        <?php
                        foreach ($calculation_methods as $value => $label) {
                            echo '<option value="' . esc_attr($value) . '"' . selected($method, $value) . '>' . esc_html($label) . '</option>';
                        }
                        ?>
                    </select>
                    <p class="description"><?php esc_html_e('Pilih metode perhitungan waktu sholat yang sesuai dengan lokasi Anda.', 'dbanie-waktunya-sholat'); ?> <a href="https://aladhan.com/calculation-methods" target="_blank"><?php esc_html_e('Lihat daftar metode perhitungan', 'dbanie-waktunya-sholat'); ?></a></p>
                </td>
            </tr>
        </table>
        <?php
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