# Laravel Helpers

A lightweight yet powerful collection of reusable helper functions and utilities designed to simplify common tasks in Laravel applications.

---

## 🚀 Installation

Install the package using Composer:

```bash
composer require laxmidhar/laravel-helpers
````

The package supports auto-discovery, so it will register itself automatically.

---

## ⚙️ Configuration (Optional)

You can publish the configuration file to customize the package behavior:

```bash
php artisan vendor:publish --tag=helpers-config
```

This will publish the config file to:

```
config/helpers.php
```

---

## 🧩 Usage

### 1️⃣ Using the Facade

```php
use Laxmidhar\LaravelHelpers\Facades\Helper;

// or use the auto-registered alias
Helper::prettyUrls('Hello World'); // hello-world
Helper::otp();                     // 6-digit OTP
Helper::convertCurrency(50000);    // 50K
```

---

### 2️⃣ Using Global Helper Functions

```php
helper_pretty_urls('Hello World');   // hello-world
helper_otp();                        // 6-digit OTP
helper_convert_currency(50000);      // 50K
```

---

### 3️⃣ Custom Facade Alias

You can customize the facade alias from the config file:

```php
'facade_alias' => 'MyHelper',
```

Or set it via `.env`:

```env
HELPERS_FACADE_ALIAS=MyHelper
```

Then use it like this:

```php
MyHelper::prettyUrls('Hello World');
```

---

## 🧠 Available Methods

| Method                                         | Description                              |
| ---------------------------------------------- | ---------------------------------------- |
| `sayHello()`                                   | Test method                              |
| `prettyUrls(string $string)`                   | Converts a string to a URL-friendly slug |
| `getCanonicalDate($date, bool $flag = true)`   | Formats a date into canonical format     |
| `formatTime($datetime)`                        | Converts to 12-hour formatted time       |
| `limitText(?string $string, int $limit = 120)` | Limits string length with ellipsis       |
| `properString(string $string)`                 | Converts to proper case                  |
| `uppercase(string $string)`                    | Converts to uppercase                    |
| `shortName(string $name)`                      | Extracts first name from full name       |
| `convertCurrency(int $no)`                     | Formats numbers into K / Lakh / Cr       |
| `generateUniqueId()`                           | Generates a unique identifier            |
| `otp()`                                        | Generates a 6-digit OTP                  |
| `appDateFormat($date)`                         | Formats date for app usage               |
| `appTimeFormat($date)`                         | Formats time for app usage               |
| `uploadFile($file, string $directory)`         | Uploads a file to storage                |
| `deleteFile(string $filePath)`                 | Deletes a file from storage              |

> ✨ More helpers are added regularly to make your Laravel development faster and cleaner.

---

## 🧪 Testing

Run the test suite with:

```bash
composer test
```

---

## 🪪 License

This package is open-sourced software licensed under the [MIT license](LICENSE).

---

## 👨‍💻 Author

**Laxmidhar Moharana**
Senior Laravel Developer • Open Source Contributor
🔗 [GitHub](https://github.com/dante-san)  |  💼 [LinkedIn](https://www.linkedin.com/in/laxmidhar-moharana)

---

## 💡 Contributing

Pull requests are welcome!
If you find a bug or have a feature suggestion, please open an issue.

```bash
git clone https://github.com/yourusername/laravel-helpers.git
cd laravel-helpers
composer install
```

Then run tests and make your improvements!

---

## 🏷️ Keywords

`laravel` · `helpers` · `utility` · `php` · `facade` · `laravel-package` · `artisan` · `laxmidhar`

