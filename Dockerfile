FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
 unzip \
 git \
 libicu-dev \
 && docker-php-ext-install intl \
 && rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php \
 && mv composer.phar /usr/local/bin/composer

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --optimize-autoloader --no-scripts --no-interaction

COPY . .

CMD php -S 0.0.0.0:${PORT:-8080} -t webroot
