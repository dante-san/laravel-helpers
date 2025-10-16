<?php

namespace Laxmidhar\LaravelHelpers\Support;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;

class HelperService
{
    // ==================== URL & SLUG HELPERS ====================

    public function prettyUrls(string $string): string
    {
        return Str::slug($string);
    }

    public function generateSlug(string $text, string $separator = '-'): string
    {
        return Str::slug($text, $separator);
    }

    public function urlSafe(string $string): string
    {
        return urlencode($string);
    }

    // ==================== DATE & TIME HELPERS ====================

    public function formatTime(string $time): string
    {
        return Carbon::parse($time)->format('g:i A');
    }

    public function appDateFormat($date): string
    {
        return Carbon::parse($date)->format('M j, Y');
    }

    public function appTimeFormat($date): string
    {
        return Carbon::parse($date)->format('g:i A');
    }

    public function humanReadableDate($date): string
    {
        return Carbon::parse($date)->diffForHumans();
    }

    public function dateRange($startDate, $endDate): string
    {
        $start = Carbon::parse($startDate);
        $end = Carbon::parse($endDate);

        if ($start->isSameDay($end)) {
            return $start->format('M j, Y');
        }

        if ($start->isSameMonth($end)) {
            return $start->format('M j') . ' - ' . $end->format('j, Y');
        }

        return $start->format('M j, Y') . ' - ' . $end->format('M j, Y');
    }

    public function isWeekend($date = null): bool
    {
        $date = $date ? Carbon::parse($date) : now();
        return $date->isWeekend();
    }

    public function businessDaysFrom($date, int $days): Carbon
    {
        return Carbon::parse($date)->addWeekdays($days);
    }

    // ==================== STRING MANIPULATION ====================

    public function limitText(?string $string, int $limit = 120, string $suffix = "..."): string
    {
        if (empty($string)) return '';
        return Str::limit(html_entity_decode(strip_tags($string)), $limit, $suffix);
    }

    public function properString(string $string): string
    {
        return ucwords(strtolower($string));
    }

    public function uppercase(string $string): string
    {
        return strtoupper($string);
    }

    public function shortName(string $name): string
    {
        $spacePosition = strpos($name, ' ');
        return $spacePosition !== false ? substr($name, 0, $spacePosition) : $name;
    }

    public function getInitials(string $name): string
    {
        $words = explode(' ', trim($name));

        if (count($words) === 1) {
            return strtoupper(substr($words[0], 0, 2));
        }

        return strtoupper(substr($words[0], 0, 1) . substr(end($words), 0, 1));
    }

    public function maskEmail(string $email): string
    {
        $parts = explode('@', $email);
        if (count($parts) !== 2) return $email;

        $username = $parts[0];
        $domain = $parts[1];

        $maskedUsername = substr($username, 0, 2) . str_repeat('*', strlen($username) - 2);

        return $maskedUsername . '@' . $domain;
    }

    public function maskPhone(string $phone): string
    {
        $length = strlen($phone);
        if ($length < 4) return $phone;

        return str_repeat('*', $length - 4) . substr($phone, -4);
    }

    public function randomString(int $length = 10): string
    {
        return Str::random($length);
    }

    public function sanitizeString(string $string): string
    {
        return htmlspecialchars(strip_tags(trim($string)), ENT_QUOTES, 'UTF-8');
    }

    // ==================== NUMBER HELPERS ====================

    public function formatCurrency(float $amount, string $currency = '₹'): string
    {
        return $currency . number_format($amount, 2);
    }

    public function formatNumber(float $number, int $decimals = 2): string
    {
        return number_format($number, $decimals);
    }

    public function percentage(float $value, float $total): float
    {
        if ($total == 0) return 0;
        return round(($value / $total) * 100, 2);
    }

    public function ordinal(int $number): string
    {
        $ends = ['th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th'];

        if ((($number % 100) >= 11) && (($number % 100) <= 13)) {
            return $number . 'th';
        }

        return $number . $ends[$number % 10];
    }

    // ==================== FILE HELPERS ====================

    public function uploadFile($file, string $directory): string
    {
        $uniqueFilename = Str::uuid() . '.' . $file->extension();
        $file->storeAs($directory, $uniqueFilename, 'public');
        return $uniqueFilename;
    }

    public function deleteFile(string $filePath): void
    {
        if (Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
        }
    }

    public function fileExists(string $filePath): bool
    {
        return Storage::disk('public')->exists($filePath);
    }

    public function getFileUrl(string $filePath): string
    {
        return Storage::disk('public')->url($filePath);
    }

    public function getFileSize(string $filePath): string
    {
        if (!$this->fileExists($filePath)) return '0 B';

        $bytes = Storage::disk('public')->size($filePath);
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];

        for ($i = 0; $bytes > 1024 && $i < 4; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }

    public function getFileMimeType(string $filePath): string
    {
        return Storage::disk('public')->mimeType($filePath);
    }

    // ==================== VALIDATION HELPERS ====================

    public function isValidEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function isValidUrl(string $url): bool
    {
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }

    public function isValidPhone(string $phone): bool
    {
        return preg_match('/^[0-9]{10}$/', preg_replace('/[^0-9]/', '', $phone));
    }

    public function isValidIndianPAN(string $pan): bool
    {
        return preg_match('/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/', strtoupper($pan));
    }

    public function isValidGST(string $gst): bool
    {
        return preg_match('/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/', strtoupper($gst));
    }

    // ==================== ARRAY & COLLECTION HELPERS ====================

    public function arrayToObject(array $array): object
    {
        return json_decode(json_encode($array));
    }

    public function objectToArray(object $object): array
    {
        return json_decode(json_encode($object), true);
    }

    public function uniqueArray(array $array): array
    {
        return array_values(array_unique($array));
    }

    public function pluckColumn(array $array, string $column): array
    {
        return array_column($array, $column);
    }

    // ==================== GENERATOR HELPERS ====================

    public function generateUniqueId(): string
    {
        $timestamp = now()->timestamp;
        $random = Str::random(8);
        $hash = hash('crc32b', $timestamp . $random);
        return substr($hash, 0, 12);
    }

    public function otp(int $length = 6): string
    {
        return str_pad((string)rand(0, pow(10, $length) - 1), $length, '0', STR_PAD_LEFT);
    }

    public function generateReferralCode(int $length = 8): string
    {
        return strtoupper(Str::random($length));
    }

    public function generateOrderId(string $prefix = 'ORD'): string
    {
        return $prefix . '-' . now()->format('Ymd') . '-' . strtoupper(Str::random(6));
    }

    public function generateInvoiceNumber(string $prefix = 'INV'): string
    {
        return $prefix . '/' . now()->format('Y/m') . '/' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
    }

    // ==================== COLOR HELPERS ====================

    public function hexToRgb(string $hex): array
    {
        $hex = ltrim($hex, '#');

        return [
            'r' => hexdec(substr($hex, 0, 2)),
            'g' => hexdec(substr($hex, 2, 2)),
            'b' => hexdec(substr($hex, 4, 2))
        ];
    }

    public function randomColor(): string
    {
        return '#' . str_pad(dechex(rand(0, 16777215)), 6, '0', STR_PAD_LEFT);
    }

    public function getAvatarColor(string $name): string
    {
        $colors = ['#FF6B6B', '#4ECDC4', '#45B7D1', '#FFA07A', '#98D8C8', '#F7DC6F', '#BB8FCE', '#85C1E2'];
        $index = ord(strtoupper($name[0])) % count($colors);
        return $colors[$index];
    }

    // ==================== STATUS & BADGE HELPERS ====================

    public function statusBadge(string $status): string
    {
        $badges = [
            'active' => '<span class="badge badge-success">Active</span>',
            'inactive' => '<span class="badge badge-secondary">Inactive</span>',
            'pending' => '<span class="badge badge-warning">Pending</span>',
            'completed' => '<span class="badge badge-primary">Completed</span>',
            'cancelled' => '<span class="badge badge-danger">Cancelled</span>',
        ];

        return $badges[strtolower($status)] ?? '<span class="badge badge-secondary">' . ucfirst($status) . '</span>';
    }

    // ==================== UTILITY HELPERS ====================

    public function getUserIp(): string
    {
        return request()->ip();
    }

    public function getUserAgent(): string
    {
        return request()->userAgent() ?? '';
    }

    public function isMobile(): bool
    {
        return preg_match('/(android|iphone|ipad|mobile)/i', $this->getUserAgent());
    }

    public function currentUrl(): string
    {
        return url()->current();
    }

    public function previousUrl(): string
    {
        return url()->previous();
    }

    public function appName(): string
    {
        return config('app.name', 'Laravel');
    }

    public function appUrl(): string
    {
        return config('app.url', 'http://localhost');
    }

    public function isProduction(): bool
    {
        return app()->environment('production');
    }

    public function isDevelopment(): bool
    {
        return app()->environment('local', 'development');
    }

    public function logActivity(string $message, array $context = []): void
    {
        \Log::info($message, $context);
    }

    public function cache(string $key, $value, int $minutes = 60)
    {
        return cache()->remember($key, $minutes * 60, function () use ($value) {
            return is_callable($value) ? $value() : $value;
        });
    }

    public function clearCache(string $key): void
    {
        cache()->forget($key);
    }
}
