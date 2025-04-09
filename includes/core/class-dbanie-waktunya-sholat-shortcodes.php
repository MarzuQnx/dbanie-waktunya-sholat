<?php

/**
 * Handles the shortcodes functionality of the plugin.
 *
 * @package Dbanie_Waktunya_Sholat
 */

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Dbanie_Waktunya_Sholat_Shortcodes
{

    /**
     * Constructor.
     */
    public function __construct()
    {
        add_shortcode('fajr_prayer', array($this, 'fajr_prayer_shortcode'));
        add_shortcode('sunrise', array($this, 'sunrise_shortcode'));
        add_shortcode('zuhr_prayer', array($this, 'zuhr_prayer_shortcode'));
        add_shortcode('asr_prayer', array($this, 'asr_prayer_shortcode'));
        add_shortcode('maghrib_prayer', array($this, 'maghrib_prayer_shortcode'));
        add_shortcode('isha_prayer', array($this, 'isha_prayer_shortcode'));
    }

    /**
     * Shortcode to display Fajr prayer time.
     *
     * @return string
     */
    public function fajr_prayer_shortcode()
    {
        return $this->get_prayer_time('fajr');
    }

    /**
     * Shortcode to display Sunrise time.
     *
     * @return string
     */
    public function sunrise_shortcode()
    {
        return $this->get_prayer_time('sunrise');
    }

    /**
     * Shortcode to display Zuhr prayer time.
     *
     * @return string
     */
    public function zuhr_prayer_shortcode()
    {
        return $this->get_prayer_time('zuhr');
    }

    /**
     * Shortcode to display Asr prayer time.
     *
     * @return string
     */
    public function asr_prayer_shortcode()
    {
        return $this->get_prayer_time('asr');
    }

    /**
     * Shortcode to display Maghrib prayer time.
     *
     * @return string
     */
    public function maghrib_prayer_shortcode()
    {
        return $this->get_prayer_time('maghrib');
    }

    /**
     * Shortcode to display Isha prayer time.
     *
     * @return string
     */
    public function isha_prayer_shortcode()
    {
        return $this->get_prayer_time('isha');
    }

    /**
     * Function to fetch prayer times from the API.
     *
     * @param string $prayer The name of the prayer time to fetch.
     * @return string The prayer time or an error message.
     */
    private function get_prayer_time($prayer)
    {
        $latitude  = get_option('dbanie_waktunya_sholat_latitude', '-6.2088');
        $longitude = get_option('dbanie_waktunya_sholat_longitude', '106.8456');
        $method    = get_option('dbanie_waktunya_sholat_method', '4');

        $api_url = sprintf(
            'https://api.aladhan.com/v1/timingsByCity?latitude=%s&longitude=%s&method=%s',
            esc_attr($latitude),
            esc_attr($longitude),
            esc_attr($method)
        );

        $response = wp_remote_get($api_url);

        if (is_wp_error($response)) {
            return __('Gagal memuat', 'dbanie-waktunya-sholat') . ': ' . $response->get_error_message();
        }

        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);

        if (isset($data['data']['timings'][$prayer])) {
            return sanitize_text_field($data['data']['timings'][$prayer]);
        } else {
            return __('Gagal memuat', 'dbanie-waktunya-sholat');
        }
    }
}
