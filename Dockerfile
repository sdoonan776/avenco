FROM php:7.4-fpm

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug 

WORKDIR /src/app

RUN chown www-data:www-data /src/app 
RUN chmod 744 /src/app

RUN apt-get update && apt-get install -y \
    git \
    zip \
    curl \
    sudo \
    unzip \
    libicu-dev \
    libbz2-dev \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libmcrypt-dev \
    libreadline-dev \
    libfreetype6-dev \
    g++ \
    wget

RUN docker-php-ext-configure gd --with-freetype --with-jpeg

RUN docker-php-ext-install \
    -j$(nproc) gd \
    bz2 \
    zip \
    intl \
    pcntl \
    iconv \
    bcmath \
    opcache \
    calendar \
    pdo \
    pdo_mysql

COPY --from=public.ecr.aws/composer/composer:latest /usr/bin/composer /usr/bin/composer
COPY . .

# RUN composer update 