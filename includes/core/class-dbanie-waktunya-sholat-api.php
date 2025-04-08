<?php

/**
 * Handles the API interactions for fetching prayer times.
 *
 * @package Dbanie_Waktunya_Sholat
 */

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Dbanie_Waktunya_Sholat_API
{

    /**
     * Fetches prayer times from the AlAdhan API.
     *
     * @return array|false Array of prayer times on success, false on failure.
     */
    public static function get_prayer_times()
    {
        $latitude  = get_option('dbanie_waktunya_sholat_latitude');
        $longitude = get_option('dbanie_waktunya_sholat_longitude');
        $method    = get_option('dbanie_waktunya_sholat_method');
        $today     = new DateTime();
        $date      = $today->format('d-m-Y');
        $api_url   = 'https://api.aladhan.com/v1/timings/' . $date . '?latitude=' . $latitude . '&longitude=' . $longitude . '&method=' . $method;

        $response = wp_remote_get($api_url);

        if (is_wp_error($response)) {
            error_log('Dbanie Waktunya Sholat API Error: ' . $response->get_error_message());
            return false;
        }

        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);

        if (isset($data['code']) && $data['code'] === 200 && isset($data['data']['timings'])) {
            return $data['data']['timings'];
        } else {
            error_log('Dbanie Waktunya Sholat API Error: Invalid response - ' . $body);
            return false;
        }
    }
}
