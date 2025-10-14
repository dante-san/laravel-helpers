````markdown
# Laravel Helpers Package

A comprehensive collection of useful helper functions for Laravel applications.

## Installation

```bash
composer require yourvendor/laravel-helpers
```
````

The package will automatically register itself.

## Configuration (Optional)

Publish the configuration file:

```bash
php artisan vendor:publish --tag=helpers-config
```

## Usage

### Using Facade

```php
use YourVendor\LaravelHelpers\Facades\Helper;

// Or use the auto-registered alias
Helper::prettyUrls('Hello World'); // returns: hello-world
Helper::otp(); // returns: 6-digit OTP
Helper::convertCurrency(50000); // returns: 50K
```

### Using Helper Functions

```php
helper_pretty_urls('Hello World'); // returns: hello-world
helper_otp(); // returns: 6-digit OTP
helper_convert_currency(50000); // returns: 50K
```

### Custom Facade Alias

In `config/helpers.php`:

```php
'facade_alias' => 'MyHelper',
```

Or set environment variable:

```env
HELPERS_FACADE_ALIAS=MyHelper
```

Then use:

```php
MyHelper::prettyUrls('Hello World');
```

## Available Methods

- `sayHello()` - Test method
- `prettyUrls(string $string)` - Convert string to URL-friendly format
- `getCanonicalDate($date, bool $flag = true)` - Format date
- `formatTime($datetime)` - Format time to 12-hour format
- `limitText(?string $string, int $limit = 120)` - Limit text length
- `properString(string $string)` - Convert to proper case
- `uppercase(string $string)` - Convert to uppercase
- `shortName(string $name)` - Get first name from full name
- `convertCurrency(int $no)` - Format currency in K/Lakh/Cr
- `generateUniqueId()` - Generate unique ID
- `otp()` - Generate 6-digit OTP
- `appDateFormat($date)` - Format date for app
- `appTimeFormat($date)` - Format time for app
- `uploadFile($file, string $directory)` - Upload file
- `deleteFile(string $filePath)` - Delete file
- And many more...

## Testing

```bash
composer test
```

## License

MIT

```

```
