<?php

use App\Models\Settings;

function get_settings($key, $default = "error")
{
    $settings = Settings::where('key', $key)->first();
    return $settings ? $settings->default_value : $default;
}
