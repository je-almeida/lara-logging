LaraLogger is a Laravel package that provides a custom logging solution to store log entries directly in a database. This package includes a ready-to-use `DatabaseLogger` channel and provides necessary migrations to set up a `logs` table.

---

## Features

- **Custom Log Channel:** Store logs in the database using a dedicated channel.
- **Database Migration:** Automatic setup for a `logs` table.
- **Configurable:** Easily integrate into your existing Laravel logging configuration.

---

## Installation

1. Install the package using Composer:

```bash
composer require jeff/lara-logger
```

2. Add `Jeff\LaraLogger\Providers\LoggingServiceProvider::class` to providers list (/bootstrap/providers.php):

```bash
<?php

return [
    ...,
    Jeff\LaraLogger\Providers\LoggingServiceProvider::class,
];

```

3. Run the Publish command (optional):

```bash
php artisan vendor:publish --provider="Jeff\LaraLogger\Providers\LoggingServiceProvider"
```

4. Run the migrations to create the logs table:

```bash
php artisan migrate
```

5. Add the following logging-related environment variables to your .env file if needed:

```bash
LOG_CHANNEL=database
LOG_STACK=custom
```

## Usage

1. Add Logs:

```bash
\Illuminate\Support\Facades\Log::info('test ok');
\Illuminate\Support\Facades\Log::info('test ok', [
... ,
'test' => 'tests'
]);
\Illuminate\Support\Facades\Log::error('test ok');
\Illuminate\Support\Facades\Log::warning('test ok');
\Illuminate\Support\Facades\Log::channel('database')->info('test ok');
```

2. List Logs, (ex: in a route function):

```bash
return \Jeff\LaraLogger\App\Models\LogModel::all(['*']);
```
