FROM php:8.2-apache

RUN apt-get update && \
    apt-get install -y libzip-dev libpq-dev zlib1g-dev && \
    docker-php-ext-install pdo pdo_mysql zip && \
    pecl install xdebug && \
    docker-php-ext-enable xdebug

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

# Install dependencies using Composer
RUN composer install --no-dev --optimize-autoloader

# Set proper ownership
RUN chown -R www-data:www-data /var/www/html

# Enable mod_rewrite
RUN a2enmod rewrite
