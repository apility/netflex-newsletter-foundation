<?php

use Illuminate\Support\Facades\Config;
use Mexitek\PHPColors\Color;

if (!function_exists('get_newsletter_text_color')) {
    function get_newsletter_text_color($color)
    {

        $color = new Color($color);
        if($color->isDark()) {
            return Config::get('newsletter-foundation.text_colors.dark_bg');
        }

        return Config::get('newsletter-foundation.text_colors.light_bg');
    }
}


if (!function_exists('get_newsletter_button_padding')) {
    function get_newsletter_button_padding($size)
    {
        foreach(Config::get('newsletter-foundation.button.padding') as $key => $value) {
            if($size === $key) {
                return $value;
            }
        }

        return Config::get('newsletter-foundation.defaults.button.padding');
    }
}

if (!function_exists('get_newsletter_button_font_size')) {
    function get_newsletter_button_fontsize($size)
    {
        foreach(Config::get('newsletter-foundation.button.font_size') as $key => $value) {
            if($size === $key) {
                return $value;
            }
        }

        return Config::get('newsletter-foundation.defaults.button.font_size');
    }
}

if (!function_exists('get_newsletter_online_edition_url')) {
    function get_newsletter_online_edition_url($token = null)
    {
        if (!$token) {
            return null;
        }

        return variable('newsletters_public_url') . $token;
    }
}

if (!function_exists('get_newsletter_theme_colors')) {
    function get_newsletter_theme_colors()
    {
        return array_merge(Config::get('newsletter-foundation.background_colors'), ['custom' => 'Sett egen farge']);
    }
}

if (!function_exists('get_newsletter_background')) {
    function get_newsletter_background($fallback)
    {
        if(content('bodyBackground') === 'custom')
        {
            return content('bodyBackgroundColorCode') ?: $fallback;
        }

        return content('bodyBackground') ?: $fallback;
    }
}
