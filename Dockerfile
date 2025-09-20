FROM php:8.2-cli

# تثبيت متطلبات النظام
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    zip \
    libonig-dev \
    libpng-dev \
    libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

WORKDIR /var/www/html

# نسخ ملفات المشروع
COPY . .

# تثبيت Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader

# نسخ ملف .env أو إنشاء نسخة مؤقتة إذا غير موجود
RUN cp .env.example .env

# توليد مفتاح التطبيق
RUN php artisan key:generate

# افتح البورت المطلوب
EXPOSE 10000

# تشغيل Laravel
CMD php artisan serve --host=0.0.0.0 --port=10000


