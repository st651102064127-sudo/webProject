# Base image PHP 8.2 FPM
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libzip-dev \
    libonig-dev \
    curl \
    && docker-php-ext-install pdo_mysql mbstring zip bcmath

# Install Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Copy project files
COPY . .

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 8000
EXPOSE 8000

# Run Laravel server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
