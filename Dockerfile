# ใช้ PHP 8.2 CLI
FROM php:8.2-cli

# Set working directory
WORKDIR /var/www/html

# ติดตั้ง PHP extensions ที่จำเป็น
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev zip \
    && docker-php-ext-install pdo pdo_mysql zip

# ติดตั้ง Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy project
COPY . .

# ติดตั้ง dependencies Laravel
RUN composer install --no-dev --optimize-autoloader

# Set permissions สำหรับ storage
RUN chown -R www-data:www-data /var/www/html/storage \
    && chmod -R 755 /var/www/html/storage

# เปิด port ที่ Render จะ detect
EXPOSE 8080

# Command รัน Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
