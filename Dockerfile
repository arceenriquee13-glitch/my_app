FROM php:8.2-cli

WORKDIR /app

# instalar dependencias necesarias + intl
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    libicu-dev \
    && docker-php-ext-install intl

# instalar composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install

EXPOSE 8080

CMD php -S 0.0.0.0:$PORT -t webroot