
FROM php:8.1-apache

# Устанавливаем необходимые пакеты и расширения PHP
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    && docker-php-ext-install pdo pdo_mysql

# Устанавливаем Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Копируем файлы проекта в контейнер
COPY . /var/www/html

# Устанавливаем права доступа
RUN chown -R www-data:www-data /var/www/html

# Устанавливаем рабочую директорию
WORKDIR /var/www/html

# Открываем порт для Apache
EXPOSE 80
