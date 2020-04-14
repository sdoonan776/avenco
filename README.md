# Avenco

An ecommerce personal project to better understand design priciples in php and laravel.

## Installation

Install needed composer and yarn dependencies

```bash
composer install
yarn install
```

## Usage

Copy .env file from example

```bash
cp .env.example .env
```

Generate the application key
```bash
php artisan key:generate
```

Fill out .env with own database details as well as details for stripe

Create migrations and seed

```bash
php artisan migrate --seed
```

Serve the appplication with laravel serve

```bash
php artisan serve
```

## License
[MIT](https://choosealicense.com/licenses/mit/)