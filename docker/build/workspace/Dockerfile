FROM php:7.2-fpm-alpine

ENV COMPOSER_ALLOW_SUPERUSER=1

# PHP modules
RUN docker-php-ext-install \
    opcache \
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

# Composer
RUN apk --no-cache --update add git openssh bash unzip && \
    docker-php-ext-install zip && \
    curl -s http://getcomposer.org/installer | php && \
    mv composer.phar /usr/bin/composer && \
    chmod +x /usr/bin/composer

# MySQL Client
RUN apk add --no-cache --update mysql-client

# Clean
RUN rm -rf /var/cache/apk/* \
    && pecl clear-cache

RUN mkdir -p /www/src

CMD ["php-fpm"]

EXPOSE 9000