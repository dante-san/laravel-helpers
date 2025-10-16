# Laravel Helpers

<p align="center">
  <img src="https://img.shields.io/packagist/v/laxmidhar/laravel-helpers?style=flat-square" alt="Latest Version">
  <img src="https://img.shields.io/packagist/dt/laxmidhar/laravel-helpers?style=flat-square" alt="Total Downloads">
  <img src="https://img.shields.io/packagist/l/laxmidhar/laravel-helpers?style=flat-square" alt="License">
  <img src="https://img.shields.io/badge/Laravel-9.x%20%7C%2010.x%20%7C%2011.x%20%7C%2012.x-FF2D20?style=flat-square&logo=laravel" alt="Laravel Version">
</p>

A comprehensive collection of 85+ production-ready helper functions designed to streamline common development tasks in Laravel applications. From string manipulation to file handling, date formatting to validation, this package provides clean, tested utilities that enhance developer productivity.

---

## ✨ Features

- 🎯 **85+ Helper Functions** - Covering strings, dates, files, validation, and more
- 🚀 **Zero Configuration** - Works out of the box with sensible defaults
- 🎨 **Multiple Usage Patterns** - Facade, global functions, or dependency injection
- 📦 **Auto-Discovery** - Automatically registers with Laravel
- ✅ **Fully Tested** - Comprehensive test coverage
- 🔧 **Highly Customizable** - Publish config for custom settings
- 📚 **Well Documented** - Detailed examples for every function

---

## 📋 Requirements

- PHP 8.0 or higher
- Laravel 9.x, 10.x, or 11.x

---

## 🚀 Installation

Install via Composer:

```bash
composer require laxmidhar/laravel-helpers
```

The service provider will be automatically registered via Laravel's package auto-discovery.

---

## ⚙️ Configuration (Optional)

Publish the configuration file:

```bash
php artisan vendor:publish --tag=helpers-config
```

This creates `config/helpers.php` where you can customize:

```php
return [
    'facade_alias' => env('HELPERS_FACADE_ALIAS', 'Helper'),
];
```

---

## 📖 Usage

### Facade Usage

```php
use Laxmidhar\LaravelHelpers\Facades\Helper;

Helper::prettyUrls('Hello World'); // "hello-world"
Helper::formatCurrency(1500.50);   // "₹1,500.50"
Helper::otp();                     // "482759"
```

### Global Functions

```php
helper_pretty_urls('Hello World');
helper_format_currency(1500.50);
helper_otp();
```

### Dependency Injection

```php
use Laxmidhar\LaravelHelpers\Helper;

class YourController extends Controller
{
    public function __construct(protected Helper $helper) {}

    public function index()
    {
        $slug = $this->helper->prettyUrls('My Article Title');
    }
}
```

---

## 🧩 Available Methods

### 🔗 URL & Slug Helpers

#### `prettyUrls(string $string): string`

Converts a string to a URL-friendly slug.

```php
Helper::prettyUrls('Hello World! How are you?');
// Output: "hello-world-how-are-you"

Helper::prettyUrls('Product Name 2024');
// Output: "product-name-2024"
```

#### `generateSlug(string $text, string $separator = '-'): string`

Generate a slug with custom separator.

```php
Helper::generateSlug('Laravel Helpers Package', '_');
// Output: "laravel_helpers_package"
```

#### `urlSafe(string $string): string`

URL-encodes a string.

```php
Helper::urlSafe('user@example.com');
// Output: "user%40example.com"
```

---

### 📅 Date & Time Helpers

#### `appDateFormat($date): string`

Format date for application display (e.g., "Jan 15, 2024").

```php
Helper::appDateFormat('2024-01-15 14:30:00');
// Output: "Jan 15, 2024"

Helper::appDateFormat(now());
// Output: "Oct 16, 2025"
```

#### `appTimeFormat($date): string`

Format time in 12-hour format (e.g., "2:30 PM").

```php
Helper::appTimeFormat('2024-01-15 14:30:00');
// Output: "2:30 PM"

Helper::appTimeFormat(now());
// Output: "10:45 AM"
```

#### `formatTime(string $time): string`

Convert time to readable format.

```php
Helper::formatTime('14:30:00');
// Output: "2:30 PM"
```

#### `humanReadableDate($date): string`

Convert date to human-readable format.

```php
Helper::humanReadableDate(now()->subDays(2));
// Output: "2 days ago"

Helper::humanReadableDate(now()->addHours(3));
// Output: "3 hours from now"
```

#### `dateRange($startDate, $endDate): string`

Format a date range intelligently.

```php
Helper::dateRange('2024-01-15', '2024-01-20');
// Output: "Jan 15 - 20, 2024"

Helper::dateRange('2024-01-15', '2024-02-20');
// Output: "Jan 15, 2024 - Feb 20, 2024"
```

#### `isWeekend($date = null): bool`

Check if a date is weekend.

```php
Helper::isWeekend('2024-01-20'); // Saturday
// Output: true

Helper::isWeekend('2024-01-15'); // Monday
// Output: false
```

#### `businessDaysFrom($date, int $days): Carbon`

Calculate business days from a date.

```php
Helper::businessDaysFrom('2024-01-15', 5);
// Output: Carbon instance (5 business days later, excluding weekends)
```

---

### ✂️ String Manipulation

#### `limitText(?string $string, int $limit = 120, string $suffix = '...'): string`

Truncate text with custom suffix.

```php
$text = "This is a very long description that needs to be truncated for display purposes.";

Helper::limitText($text, 30);
// Output: "This is a very long descri..."

Helper::limitText($text, 30, ' [Read more]');
// Output: "This is a very long descri [Read more]"
```

#### `properString(string $string): string`

Convert to proper case (title case).

```php
Helper::properString('HELLO WORLD');
// Output: "Hello World"

Helper::properString('laravel helpers package');
// Output: "Laravel Helpers Package"
```

#### `uppercase(string $string): string`

Convert to uppercase.

```php
Helper::uppercase('hello world');
// Output: "HELLO WORLD"
```

#### `shortName(string $name): string`

Extract first name from full name.

```php
Helper::shortName('John Doe');
// Output: "John"

Helper::shortName('Mary Jane Watson');
// Output: "Mary"
```

#### `getInitials(string $name): string`

Get initials from a name.

```php
Helper::getInitials('John Doe');
// Output: "JD"

Helper::getInitials('Mary Jane Watson');
// Output: "MW"

Helper::getInitials('John');
// Output: "JO"
```

#### `maskEmail(string $email): string`

Mask email for privacy.

```php
Helper::maskEmail('john.doe@example.com');
// Output: "jo******@example.com"

Helper::maskEmail('admin@company.com');
// Output: "ad***@company.com"
```

#### `maskPhone(string $phone): string`

Mask phone number.

```php
Helper::maskPhone('9876543210');
// Output: "******3210"

Helper::maskPhone('+91-9876543210');
// Output: "**********3210"
```

#### `randomString(int $length = 10): string`

Generate random string.

```php
Helper::randomString(8);
// Output: "K7mP9xQz" (random)

Helper::randomString(12);
// Output: "nX4pL8mK9rT2" (random)
```

#### `sanitizeString(string $string): string`

Sanitize user input.

```php
Helper::sanitizeString('<script>alert("XSS")</script>Hello');
// Output: "Hello"

Helper::sanitizeString('  User Input  <b>Bold</b>  ');
// Output: "User Input Bold"
```

---

### 💰 Number & Currency Helpers

#### `formatCurrency(float $amount, string $currency = '₹'): string`

Format amount as currency.

```php
Helper::formatCurrency(1500.50);
// Output: "₹1,500.50"

Helper::formatCurrency(2500, '$');
// Output: "$2,500.00"
```

#### `formatNumber(float $number, int $decimals = 2): string`

Format number with decimals.

```php
Helper::formatNumber(1234567.89);
// Output: "1,234,567.89"

Helper::formatNumber(1234.5, 0);
// Output: "1,235"
```

#### `percentage(float $value, float $total): float`

Calculate percentage.

```php
Helper::percentage(25, 100);
// Output: 25.0

Helper::percentage(45, 150);
// Output: 30.0
```

#### `ordinal(int $number): string`

Get ordinal number (1st, 2nd, 3rd).

```php
Helper::ordinal(1);
// Output: "1st"

Helper::ordinal(22);
// Output: "22nd"

Helper::ordinal(103);
// Output: "103rd"
```

---

### 📁 File Management

#### `uploadFile($file, string $directory): string`

Upload file to storage.

```php
// In controller
public function store(Request $request)
{
    $filename = Helper::uploadFile($request->file('avatar'), 'avatars');
    // Output: "9b1deb4d-3b7d-4bad-9bdd-2b0d7b3dcb6d.jpg"

    // Save to database
    $user->avatar = $filename;
}
```

#### `deleteFile(string $filePath): void`

Delete file from storage.

```php
Helper::deleteFile('avatars/old-image.jpg');
// File deleted safely (checks existence first)
```

#### `fileExists(string $filePath): bool`

Check if file exists.

```php
if (Helper::fileExists('documents/report.pdf')) {
    // File exists
}
```

#### `getFileUrl(string $filePath): string`

Get public URL of file.

```php
$url = Helper::getFileUrl('avatars/user-123.jpg');
// Output: "https://yourdomain.com/storage/avatars/user-123.jpg"
```

#### `getFileSize(string $filePath): string`

Get human-readable file size.

```php
Helper::getFileSize('documents/report.pdf');
// Output: "2.5 MB"

Helper::getFileSize('images/photo.jpg');
// Output: "345.67 KB"
```

#### `getFileMimeType(string $filePath): string`

Get file MIME type.

```php
Helper::getFileMimeType('documents/report.pdf');
// Output: "application/pdf"

Helper::getFileMimeType('images/photo.jpg');
// Output: "image/jpeg"
```

---

### ✅ Validation Helpers

#### `isValidEmail(string $email): bool`

Validate email address.

```php
Helper::isValidEmail('user@example.com');
// Output: true

Helper::isValidEmail('invalid-email');
// Output: false
```

#### `isValidUrl(string $url): bool`

Validate URL.

```php
Helper::isValidUrl('https://example.com');
// Output: true

Helper::isValidUrl('not-a-url');
// Output: false
```

#### `isValidPhone(string $phone): bool`

Validate 10-digit phone number.

```php
Helper::isValidPhone('9876543210');
// Output: true

Helper::isValidPhone('123');
// Output: false
```

#### `isValidIndianPAN(string $pan): bool`

Validate Indian PAN card.

```php
Helper::isValidIndianPAN('ABCDE1234F');
// Output: true

Helper::isValidIndianPAN('INVALID');
// Output: false
```

#### `isValidGST(string $gst): bool`

Validate Indian GST number.

```php
Helper::isValidGST('22AAAAA0000A1Z5');
// Output: true

Helper::isValidGST('INVALID');
// Output: false
```

---

### 🔧 Generator Helpers

#### `generateUniqueId(): string`

Generate unique 12-character ID.

```php
Helper::generateUniqueId();
// Output: "a3f5c8d9e2b1" (unique)
```

#### `otp(int $length = 6): string`

Generate OTP.

```php
Helper::otp();
// Output: "482759"

Helper::otp(4);
// Output: "9281"
```

#### `generateReferralCode(int $length = 8): string`

Generate referral code.

```php
Helper::generateReferralCode();
// Output: "K7MP9XQZ"

Helper::generateReferralCode(6);
// Output: "NX4PL8"
```

#### `generateOrderId(string $prefix = 'ORD'): string`

Generate order ID.

```php
Helper::generateOrderId();
// Output: "ORD-20241016-K7MP9X"

Helper::generateOrderId('INV');
// Output: "INV-20241016-NX4PL8"
```

#### `generateInvoiceNumber(string $prefix = 'INV'): string`

Generate invoice number.

```php
Helper::generateInvoiceNumber();
// Output: "INV/2024/10/0001"

Helper::generateInvoiceNumber('BILL');
// Output: "BILL/2024/10/0002"
```

---

### 🎨 Color Helpers

#### `hexToRgb(string $hex): array`

Convert hex color to RGB.

```php
Helper::hexToRgb('#FF5733');
// Output: ['r' => 255, 'g' => 87, 'b' => 51]
```

#### `randomColor(): string`

Generate random hex color.

```php
Helper::randomColor();
// Output: "#3a7bd5" (random)
```

#### `getAvatarColor(string $name): string`

Get consistent color for avatar based on name.

```php
Helper::getAvatarColor('John Doe');
// Output: "#4ECDC4" (consistent for same name)

Helper::getAvatarColor('Jane Smith');
// Output: "#FF6B6B" (different color)
```

---

### 🏷️ Status & Badge Helpers

#### `statusBadge(string $status): string`

Generate HTML badge for status.

```php
Helper::statusBadge('active');
// Output: '<span class="badge badge-success">Active</span>'

Helper::statusBadge('pending');
// Output: '<span class="badge badge-warning">Pending</span>'

Helper::statusBadge('cancelled');
// Output: '<span class="badge badge-danger">Cancelled</span>'
```

---

### 🔨 Array & Collection Helpers

#### `arrayToObject(array $array): object`

Convert array to object.

```php
$data = ['name' => 'John', 'age' => 30];
$object = Helper::arrayToObject($data);
// Access: $object->name, $object->age
```

#### `objectToArray(object $object): array`

Convert object to array.

```php
$object = (object)['name' => 'John', 'age' => 30];
$array = Helper::objectToArray($object);
// Output: ['name' => 'John', 'age' => 30]
```

#### `uniqueArray(array $array): array`

Get unique values from array.

```php
Helper::uniqueArray([1, 2, 2, 3, 3, 4]);
// Output: [1, 2, 3, 4]
```

#### `pluckColumn(array $array, string $column): array`

Extract column from multi-dimensional array.

```php
$users = [
    ['id' => 1, 'name' => 'John'],
    ['id' => 2, 'name' => 'Jane']
];

Helper::pluckColumn($users, 'name');
// Output: ['John', 'Jane']
```

---

### 🌐 Utility Helpers

#### `getUserIp(): string`

Get user's IP address.

```php
Helper::getUserIp();
// Output: "192.168.1.1"
```

#### `getUserAgent(): string`

Get user's browser agent.

```php
Helper::getUserAgent();
// Output: "Mozilla/5.0 (Windows NT 10.0; Win64; x64)..."
```

#### `isMobile(): bool`

Check if user is on mobile device.

```php
Helper::isMobile();
// Output: true/false
```

#### `currentUrl(): string`

Get current URL.

```php
Helper::currentUrl();
// Output: "https://yourdomain.com/current-page"
```

#### `previousUrl(): string`

Get previous URL.

```php
Helper::previousUrl();
// Output: "https://yourdomain.com/previous-page"
```

#### `appName(): string`

Get application name.

```php
Helper::appName();
// Output: "Laravel Helpers"
```

#### `appUrl(): string`

Get application URL.

```php
Helper::appUrl();
// Output: "https://yourdomain.com"
```

#### `isProduction(): bool`

Check if app is in production.

```php
Helper::isProduction();
// Output: true/false
```

#### `isDevelopment(): bool`

Check if app is in development.

```php
Helper::isDevelopment();
// Output: true/false
```

#### `logActivity(string $message, array $context = []): void`

Log activity.

```php
Helper::logActivity('User logged in', ['user_id' => 123]);
// Logs to Laravel log file
```

#### `cache(string $key, $value, int $minutes = 60)`

Simple cache helper.

```php
Helper::cache('user_data', function() {
    return User::all();
}, 30);
// Caches for 30 minutes
```

#### `clearCache(string $key): void`

Clear cached data.

```php
Helper::clearCache('user_data');
// Cache cleared
```

---

## 🧪 Testing

Run the test suite:

```bash
composer test
```

Run tests with coverage:

```bash
composer test:coverage
```

---

## 🔒 Security

If you discover any security-related issues, please email papu.team7@gmail.com instead of using the issue tracker.

---

## 🤝 Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

Please ensure:

- All tests pass
- Code follows PSR-12 standards
- New features include tests
- Documentation is updated

---

## 📝 Changelog

Please see [CHANGELOG](CHANGELOG.md) for recent changes.

---

## 📄 License

This package is open-sourced software licensed under the [MIT license](LICENSE.md).

---

## 👨‍💻 Author

**Laxmidhar Maharana**

Senior Laravel Developer • Open Source Contributor

- 🔗 [GitHub](https://github.com/dante-san)
- 💼 [LinkedIn](https://www.linkedin.com/in/laxmidharmaharana/)
- ✉️ [Email](mailto:papu.team7@gmail.com)

---

## ⭐ Show Your Support

If this package helped you, please give it a ⭐️ on [GitHub](https://github.com/dante-san/laravel-helpers)!

---

## 📚 Related Packages

- [Laravel Debugbar](https://github.com/barryvdh/laravel-debugbar)
- [Laravel IDE Helper](https://github.com/barryvdh/laravel-ide-helper)
- [Laravel Permissions](https://github.com/spatie/laravel-permission)

---

<p align="center">Made with ❤️ for the Laravel Community</p>
