# Use an official PHP image as the base image
FROM php:8.1-fpm

# Set the working directory in the container
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo pdo_mysql zip

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy the Laravel application files into the container
COPY . .

RUN COMPOSER_ALLOW_SUPERUSER=1 composer update

# Install Laravel dependencies using Composer (composer.json and composer.lock must exist)
RUN COMPOSER_ALLOW_SUPERUSER=1 composer install

# Expose port 8000 for PHP's built-in web server
EXPOSE 8000

# Start Laravel using PHP's built-in web server
CMD ["php", "artisan", "serve", "--host", "0.0.0.0", "--port", "8000"]
