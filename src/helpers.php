<?php

use Laxmidhar\LaravelHelpers\Facades\Helper;

if (!function_exists('helper_pretty_urls')) {
    function helper_pretty_urls(string $string): string
    {
        return Helper::prettyUrls($string);
    }
}

if (!function_exists('helper_otp')) {
    function helper_otp(): int
    {
        return Helper::otp();
    }
}

if (!function_exists('helper_convert_currency')) {
    function helper_convert_currency(int $no): string
    {
        return Helper::convertCurrency($no);
    }
}
