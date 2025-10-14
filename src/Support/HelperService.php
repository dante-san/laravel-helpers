<?php

namespace Laxmidhar\LaravelHelpers\Support;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class HelperService
{
    public function prettyUrls(string $string): string
    {
        $string = str_replace(' ', '-', $string);
        return preg_replace('/[^A-Za-z0-9\-]/', '', strtolower($string));
    }

    public function formatTime($datetime): string
    {
        return Carbon::parse($datetime)->format('g:i A');
    }

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

    public function convertCurrency(int $no): string
    {
        $length = strlen((string)$no);

        if ($length == 4 || $length == 5) {
            $number = round($no / 1000, 2);
            return $number . "K";
        } elseif ($length == 6 || $length == 7) {
            $number = round($no / 100000, 2);
            return $number . " Lakh";
        } elseif ($length == 8 || $length == 9) {
            $number = round($no / 10000000, 2);
            return $number . ' Cr';
        }

        return $no . ' Lakh';
    }

    public function generateUniqueId(): string
    {
        $timestamp = now()->timestamp;
        $random = Str::random(8);
        $hash = hash('crc32b', $timestamp . $random);
        return substr($hash, 0, 12);
    }

    public function otp(): int
    {
        return rand(100000, 999999);
    }

    public function appDateFormat($date): string
    {
        return Carbon::parse($date)->format('M j, Y');
    }

    public function appTimeFormat($date): string
    {
        return Carbon::parse($date)->format('g:i A');
    }

    public function uploadFile($file, string $directory): string
    {
        $uniqueFilename = Str::uuid() . '.' . $file->extension();
        $file->storeAs($directory, $uniqueFilename, 'public');
        return $uniqueFilename;
    }

    public function deleteFile(string $filePath): void
    {
        Storage::disk('public')->delete($filePath);
    }

    // Add all your other helper methods here...
}
