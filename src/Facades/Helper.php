<?php

namespace Laxmidhar\LaravelHelpers\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string sayHello()
 * @method static string prettyUrls(string $string)
 * @method static string getCanonicalDate($date, bool $flag = true)
 * @method static string getCanonicalDateTime($date, bool $flag = true)
 * @method static string formatTime($datetime)
 * @method static string limitText(?string $string, int $limit = 120, string $suffix = "...")
 * @method static string properString(string $string)
 * @method static string properDecimals($value)
 * @method static string uppercase(string $string)
 * @method static array unique(\Illuminate\Support\Collection|array $data)
 * @method static string shortName(string $name)
 * @method static array strExplode(string $separator, string $value)
 * @method static string textCut(string $value, int $limit = 60, string $end = '...')
 * @method static array status()
 * @method static string convertCurrency(int $no)
 * @method static string generateUniqueId()
 * @method static int getPerPage()
 * @method static array getPerPageOptions()
 * @method static string reply(array $keys, string $separator = ' ')
 * @method static string formatCarbonDate($date, string $format = 'd-M-Y')
 * @method static int otp()
 * @method static string appDateFormat($date)
 * @method static string appTimeFormat($date)
 * @method static string appDateTimeFormat($date, bool $flag = true)
 * @method static string getNamespace(string $class)
 * @method static string generateFileName($file)
 * @method static string generateLongUniqueId(int $length = 16)
 * @method static string toFilamentLabel(string $string, string $divider = "_")
 * @method static string textLimit(string $value, int $limit = 20, string $end = '...')
 * @method static array looper(int $start = 1, int $end)
 * @method static bool fileExists(string $path, string $disk = 'public')
 * @method static string getFile(string $path, string $disk = 'public')
 * @method static string uploadFile($file, string $directory)
 * @method static void deleteFile(string $filePath)
 * @method static string sanitizeString(string $string)
 * @method static string formatTimeToAmPm($time)
 *
 * @see \Laxmidhar\LaravelHelpers\Support\HelperService
 */
class Helper extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-helpers';
    }
}
