<?php

use Laxmidhar\LaravelHelpers\Facades\Helper;

// ==================== URL & SLUG HELPERS ====================

if (!function_exists('helper_pretty_urls')) {
    function helper_pretty_urls(string $string): string
    {
        return Helper::prettyUrls($string);
    }
}

if (!function_exists('helper_generate_slug')) {
    function helper_generate_slug(string $text, string $separator = '-'): string
    {
        return Helper::generateSlug($text, $separator);
    }
}

if (!function_exists('helper_url_safe')) {
    function helper_url_safe(string $string): string
    {
        return Helper::urlSafe($string);
    }
}

// ==================== DATE & TIME HELPERS ====================

if (!function_exists('helper_format_time')) {
    function helper_format_time(string $time): string
    {
        return Helper::formatTime($time);
    }
}

if (!function_exists('helper_app_date_format')) {
    function helper_app_date_format($date): string
    {
        return Helper::appDateFormat($date);
    }
}

if (!function_exists('helper_app_time_format')) {
    function helper_app_time_format($date): string
    {
        return Helper::appTimeFormat($date);
    }
}

if (!function_exists('helper_human_readable_date')) {
    function helper_human_readable_date($date): string
    {
        return Helper::humanReadableDate($date);
    }
}

if (!function_exists('helper_date_range')) {
    function helper_date_range($startDate, $endDate): string
    {
        return Helper::dateRange($startDate, $endDate);
    }
}

if (!function_exists('helper_is_weekend')) {
    function helper_is_weekend($date = null): bool
    {
        return Helper::isWeekend($date);
    }
}

if (!function_exists('helper_business_days_from')) {
    function helper_business_days_from($date, int $days)
    {
        return Helper::businessDaysFrom($date, $days);
    }
}

// ==================== STRING MANIPULATION ====================

if (!function_exists('helper_limit_text')) {
    function helper_limit_text(?string $string, int $limit = 120, string $suffix = "..."): string
    {
        return Helper::limitText($string, $limit, $suffix);
    }
}

if (!function_exists('helper_proper_string')) {
    function helper_proper_string(string $string): string
    {
        return Helper::properString($string);
    }
}

if (!function_exists('helper_uppercase')) {
    function helper_uppercase(string $string): string
    {
        return Helper::uppercase($string);
    }
}

if (!function_exists('helper_short_name')) {
    function helper_short_name(string $name): string
    {
        return Helper::shortName($name);
    }
}

if (!function_exists('helper_get_initials')) {
    function helper_get_initials(string $name): string
    {
        return Helper::getInitials($name);
    }
}

if (!function_exists('helper_mask_email')) {
    function helper_mask_email(string $email): string
    {
        return Helper::maskEmail($email);
    }
}

if (!function_exists('helper_mask_phone')) {
    function helper_mask_phone(string $phone): string
    {
        return Helper::maskPhone($phone);
    }
}

if (!function_exists('helper_random_string')) {
    function helper_random_string(int $length = 10): string
    {
        return Helper::randomString($length);
    }
}

if (!function_exists('helper_sanitize_string')) {
    function helper_sanitize_string(string $string): string
    {
        return Helper::sanitizeString($string);
    }
}

// ==================== NUMBER HELPERS ====================

if (!function_exists('helper_format_currency')) {
    function helper_format_currency(float $amount, string $currency = '₹'): string
    {
        return Helper::formatCurrency($amount, $currency);
    }
}

if (!function_exists('helper_format_number')) {
    function helper_format_number(float $number, int $decimals = 2): string
    {
        return Helper::formatNumber($number, $decimals);
    }
}

if (!function_exists('helper_percentage')) {
    function helper_percentage(float $value, float $total): float
    {
        return Helper::percentage($value, $total);
    }
}

if (!function_exists('helper_ordinal')) {
    function helper_ordinal(int $number): string
    {
        return Helper::ordinal($number);
    }
}

// ==================== FILE HELPERS ====================

if (!function_exists('helper_upload_file')) {
    function helper_upload_file($file, string $directory): string
    {
        return Helper::uploadFile($file, $directory);
    }
}

if (!function_exists('helper_delete_file')) {
    function helper_delete_file(string $filePath): void
    {
        Helper::deleteFile($filePath);
    }
}

if (!function_exists('helper_file_exists')) {
    function helper_file_exists(string $filePath): bool
    {
        return Helper::fileExists($filePath);
    }
}

if (!function_exists('helper_get_file_url')) {
    function helper_get_file_url(string $filePath): string
    {
        return Helper::getFileUrl($filePath);
    }
}

if (!function_exists('helper_get_file_size')) {
    function helper_get_file_size(string $filePath): string
    {
        return Helper::getFileSize($filePath);
    }
}

if (!function_exists('helper_get_file_mime_type')) {
    function helper_get_file_mime_type(string $filePath): string
    {
        return Helper::getFileMimeType($filePath);
    }
}

// ==================== VALIDATION HELPERS ====================

if (!function_exists('helper_is_valid_email')) {
    function helper_is_valid_email(string $email): bool
    {
        return Helper::isValidEmail($email);
    }
}

if (!function_exists('helper_is_valid_url')) {
    function helper_is_valid_url(string $url): bool
    {
        return Helper::isValidUrl($url);
    }
}

if (!function_exists('helper_is_valid_phone')) {
    function helper_is_valid_phone(string $phone): bool
    {
        return Helper::isValidPhone($phone);
    }
}

if (!function_exists('helper_is_valid_indian_pan')) {
    function helper_is_valid_indian_pan(string $pan): bool
    {
        return Helper::isValidIndianPAN($pan);
    }
}

if (!function_exists('helper_is_valid_gst')) {
    function helper_is_valid_gst(string $gst): bool
    {
        return Helper::isValidGST($gst);
    }
}

// ==================== ARRAY & COLLECTION HELPERS ====================

if (!function_exists('helper_array_to_object')) {
    function helper_array_to_object(array $array): object
    {
        return Helper::arrayToObject($array);
    }
}

if (!function_exists('helper_object_to_array')) {
    function helper_object_to_array(object $object): array
    {
        return Helper::objectToArray($object);
    }
}

if (!function_exists('helper_unique_array')) {
    function helper_unique_array(array $array): array
    {
        return Helper::uniqueArray($array);
    }
}

if (!function_exists('helper_pluck_column')) {
    function helper_pluck_column(array $array, string $column): array
    {
        return Helper::pluckColumn($array, $column);
    }
}

// ==================== GENERATOR HELPERS ====================

if (!function_exists('helper_generate_unique_id')) {
    function helper_generate_unique_id(): string
    {
        return Helper::generateUniqueId();
    }
}

if (!function_exists('helper_otp')) {
    function helper_otp(int $length = 6): string
    {
        return Helper::otp($length);
    }
}

if (!function_exists('helper_generate_referral_code')) {
    function helper_generate_referral_code(int $length = 8): string
    {
        return Helper::generateReferralCode($length);
    }
}

if (!function_exists('helper_generate_order_id')) {
    function helper_generate_order_id(string $prefix = 'ORD'): string
    {
        return Helper::generateOrderId($prefix);
    }
}

if (!function_exists('helper_generate_invoice_number')) {
    function helper_generate_invoice_number(string $prefix = 'INV'): string
    {
        return Helper::generateInvoiceNumber($prefix);
    }
}

// ==================== COLOR HELPERS ====================

if (!function_exists('helper_hex_to_rgb')) {
    function helper_hex_to_rgb(string $hex): array
    {
        return Helper::hexToRgb($hex);
    }
}

if (!function_exists('helper_random_color')) {
    function helper_random_color(): string
    {
        return Helper::randomColor();
    }
}

if (!function_exists('helper_get_avatar_color')) {
    function helper_get_avatar_color(string $name): string
    {
        return Helper::getAvatarColor($name);
    }
}

// ==================== STATUS & BADGE HELPERS ====================

if (!function_exists('helper_status_badge')) {
    function helper_status_badge(string $status): string
    {
        return Helper::statusBadge($status);
    }
}

// ==================== UTILITY HELPERS ====================

if (!function_exists('helper_get_user_ip')) {
    function helper_get_user_ip(): string
    {
        return Helper::getUserIp();
    }
}

if (!function_exists('helper_get_user_agent')) {
    function helper_get_user_agent(): string
    {
        return Helper::getUserAgent();
    }
}

if (!function_exists('helper_is_mobile')) {
    function helper_is_mobile(): bool
    {
        return Helper::isMobile();
    }
}

if (!function_exists('helper_current_url')) {
    function helper_current_url(): string
    {
        return Helper::currentUrl();
    }
}

if (!function_exists('helper_previous_url')) {
    function helper_previous_url(): string
    {
        return Helper::previousUrl();
    }
}

if (!function_exists('helper_app_name')) {
    function helper_app_name(): string
    {
        return Helper::appName();
    }
}

if (!function_exists('helper_app_url')) {
    function helper_app_url(): string
    {
        return Helper::appUrl();
    }
}

if (!function_exists('helper_is_production')) {
    function helper_is_production(): bool
    {
        return Helper::isProduction();
    }
}

if (!function_exists('helper_is_development')) {
    function helper_is_development(): bool
    {
        return Helper::isDevelopment();
    }
}

if (!function_exists('helper_log_activity')) {
    function helper_log_activity(string $message, array $context = []): void
    {
        Helper::logActivity($message, $context);
    }
}

if (!function_exists('helper_cache')) {
    function helper_cache(string $key, $value, int $minutes = 60)
    {
        return Helper::cache($key, $value, $minutes);
    }
}

if (!function_exists('helper_clear_cache')) {
    function helper_clear_cache(string $key): void
    {
        Helper::clearCache($key);
    }
}
