# استخدم صورة PHP الرسمية مع Apache أو FPM
FROM php:8.2-cli

# إعداد النظام وتثبيت الامتدادات المطلوبة
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    zip \
    libonig-dev \
    libpng-dev \
    libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# نسخ المشروع للـ container
WORKDIR /var/www/html
COPY . .

# تثبيت Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# تثبيت مكتبات المشروع
RUN composer install --no-dev --optimize-autoloader

# توليد مفتاح التطبيق
RUN php artisan key:generate

# افتح البورت اللي Render يراقبه
EXPOSE 10000

# الأمر اللي يشغل التطبيق
CMD php artisan serve --host=0.0.0.0 --port=10000

