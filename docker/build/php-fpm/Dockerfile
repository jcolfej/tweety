FROM php:7.2-fpm-alpine

ENV COMPOSER_ALLOW_SUPERUSER=1

# PHP modules
RUN docker-php-ext-install \
    pdo_mysql

# Pecl needed packages
RUN apk --no-cache --update add \
    alpine-sdk \
    openssl-dev \
    php7-pear \
    php7-dev

# Pecl modules
RUN pecl install \
    redis

# PHP enable Pecl modules
RUN docker-php-ext-enable \
    redis

# Clean
RUN rm -rf /var/cache/apk/* \
    && pecl clear-cache

RUN mkdir -p /www/src

CMD ["php-fpm"]

EXPOSE 9000