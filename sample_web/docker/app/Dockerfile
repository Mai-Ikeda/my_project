FROM php:8.0-fpm
COPY php.ini /usr/local/etc/php/

RUN apt-get update
RUN apt-get install -y zlib1g-dev mariadb-client
RUN apt-get install -y \
    nano \
    libicu-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    npm \
    && rm -rf /var/lib/apt/lists/*

RUN npm install npm@6.14.9 -g
RUN npm install -g n
RUN n 14.15.2
RUN update-alternatives --install /usr/bin/node node /usr/bin/nodejs 10
RUN docker-php-ext-install zip pdo_mysql
RUN npm install -D ts-loader typescript vue-property-decorator
RUN npm install -g yarn
RUN npm install --save-dev tsc-watch
RUN npm install --save-dev watch

COPY --from=composer /usr/bin/composer /usr/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

WORKDIR /var/www/sample_web
RUN composer global require "laravel/installer"
