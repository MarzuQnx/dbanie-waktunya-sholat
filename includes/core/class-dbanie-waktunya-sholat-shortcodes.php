<?php

/**
 * Handles the registration and output of prayer time shortcodes.
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
        add_action('init', array($this, 'register_shortcodes'));
    }

    /**
     * Registers the prayer time shortcodes.
     */
    public function register_shortcodes()
    {
        add_shortcode('fajr_prayer', array($this, 'fajr_shortcode'));
        add_shortcode('sunrise', array($this, 'sunrise_shortcode'));
        add_shortcode('zuhr_prayer', array($this, 'zuhr_shortcode'));
        add_shortcode('asr_prayer', array($this, 'asr_shortcode'));
        add_shortcode('maghrib_prayer', array($this, 'maghrib_shortcode'));
        add_shortcode('isha_prayer', array($this, 'isha_shortcode'));
    }

    /**
     * Output for the fajr_prayer shortcode.
     *
     * @return string
     */
    public function fajr_shortcode()
    {
        $prayer_times = Dbanie_Waktunya_Sholat_API::get_prayer_times();
        return $prayer_times && isset($prayer_times['Fajr']) ? esc_html($prayer_times['Fajr']) : __('Gagal memuat', 'dbanie-waktunya-sholat');
    }

    /**
     * Output for the sunrise shortcode.
     *
     * @return string
     */
    public function sunrise_shortcode()
    {
        $prayer_times = Dbanie_Waktunya_Sholat_API::get_prayer_times();
        return $prayer_times && isset($prayer_times['Sunrise']) ? esc_html($prayer_times['Sunrise']) : __('Gagal memuat', 'dbanie-waktunya-sholat');
    }

    /**
     * Output for the zuhr_prayer shortcode.
     *
     * @return string
     */
    public function zuhr_shortcode()
    {
        $prayer_times = Dbanie_Waktunya_Sholat_API::get_prayer_times();
        return $prayer_times && isset($prayer_times['Dhuhr']) ? esc_html($prayer_times['Dhuhr']) : __('Gagal memuat', 'dbanie-waktunya-sholat');
    }

    /**
     * Output for the asr_prayer shortcode.
     *
     * @return string
     */
    public function asr_shortcode()
    {
        $prayer_times = Dbanie_Waktunya_Sholat_API::get_prayer_times();
        return $prayer_times && isset($prayer_times['Asr']) ? esc_html($prayer_times['Asr']) : __('Gagal memuat', 'dbanie-waktunya-sholat');
    }

    /**
     * Output for the maghrib_prayer shortcode.
     *
     * @return string
     */
    public function maghrib_shortcode()
    {
        $prayer_times = Dbanie_Waktunya_Sholat_API::get_prayer_times();
        return $prayer_times && isset($prayer_times['Maghrib']) ? esc_html($prayer_times['Maghrib']) : __('Gagal memuat', 'dbanie-waktunya-sholat');
    }

    /**
     * Output for the isha_prayer shortcode.
     *
     * @return string
     */
    public function isha_shortcode()
    {
        $prayer_times = Dbanie_Waktunya_Sholat_API::get_prayer_times();
        return $prayer_times && isset($prayer_times['Isha']) ? esc_html($prayer_times['Isha']) : __('Gagal memuat', 'dbanie-waktunya-sholat');
    }
}
