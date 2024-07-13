FROM php:8.2-apache

# install dependencies
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    unzip \
    zip \
    && docker-php-ext-install \
    pdo \
    pdo_pgsql \
    zip

# install nodejs and npm
RUN apt-get install -y nodejs npm

# install composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

# setting composer
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME "/opt/composer"
ENV PATH "$PATH:/opt/composer/vendor/bin"

# install laravel
RUN composer global require "laravel/installer"

# copy laravel project
WORKDIR /var/www
COPY . laravel

# setting laravel
EXPOSE 8000

WORKDIR /var/www/laravel
RUN npm install --save-dev vite vite-plugin-laravel
RUN npm run build
RUN composer require laravel/breeze --dev
RUN composer install
# RUN php artisan migrate
CMD ["php","artisan","serve","--host","0.0.0.0"]