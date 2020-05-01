# Avenco

An ecommerce personal project to better understand design priciples in php and laravel. Features of this ecommerce website include stripe payments, coupon discounts via sessions and a fully updatable shopping cart. 

Design patterns include Repository, DI, service container and fatcory method. Each of these deisgn patterns follow the SOLID design principles for OOP design.

There is also an admin panel to allow the editing of resources via a rest api. The admin panel can be accessed through /admin with login details, admin@admin.com and adminpassword.

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