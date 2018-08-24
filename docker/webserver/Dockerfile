FROM php:5.6-apache

RUN apt-get update -y && apt-get install -y libpng-dev curl libcurl4-openssl-dev
RUN pecl install xdebug-2.5.0
RUN docker-php-ext-install pdo pdo_mysql gd curl
RUN docker-php-ext-enable xdebug
RUN echo 'xdebug.remote_enable=1' >> /usr/local/etc/php/php.ini \
    && echo 'xdebug.remote_autostart=1' >> /usr/local/etc/php/php.ini
RUN echo 'xdebug.remote_connect_back=1' >> /usr/local/etc/php/php.ini
RUN a2enmod rewrite
RUN service apache2 restart
