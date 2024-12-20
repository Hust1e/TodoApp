FROM php:8.2-apache

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    git \
    zip \
    libfreetype-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libpq-dev \
&& rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

# add pdo_pgsql extension to PHP
RUN docker-php-ext-install pdo pdo_pgsql

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./src /var/www/html

RUN composer install

# Копируем наш конфигурационный файл в контейнер
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf

# Включаем модуль rewrite
RUN a2enmod rewrite

# Перезапускаем Apache для применения новых настроек
RUN service apache2 restart