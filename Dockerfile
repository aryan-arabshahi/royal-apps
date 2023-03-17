FROM php:8-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    vim \
    cron \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN mkdir -p /app
RUN chown -R www-data:www-data /app
WORKDIR /app

COPY . .

RUN composer install --ignore-platform-reqs

RUN php artisan vendor:publish --tag assets --force

CMD php artisan serv --host 0.0.0.0
