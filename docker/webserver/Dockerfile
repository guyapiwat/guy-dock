FROM php:5.6-apache
LABEL maintainer="saintentex@gmail.com"

RUN apt-get update -y \
    && apt-get install -y \
    libpng-dev curl \
    libcurl4-openssl-dev \
    libmcrypt-dev \
    libreadline-dev \
    libmemcached-dev \
    zlib1g-dev \
    libfreetype6-dev \
    libpng-dev \
    libjpeg-dev \
    libpng-dev

RUN apt-get install -y git zip unzip && \
        php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer && \
        apt-get -y autoremove && \
        apt-get clean && \
        rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*


RUN pecl install \
    xdebug-2.5.0 \
    memcached-3.0.4

RUN docker-php-ext-configure gd \
            --enable-gd-native-ttf \
            --with-freetype-dir=/usr/include/freetype2 \
            --with-png-dir=/usr/include \
            --with-jpeg-dir=/usr/include \
        && docker-php-ext-install gd

RUN docker-php-ext-install pdo pdo_mysql curl mysqli mcrypt mysql
RUN docker-php-ext-enable \
    xdebug

RUN echo 'xdebug.remote_enable=1' >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo 'xdebug.remote_autostart=1' >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo 'xdebug.remote_connect_back=1' >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo 'xdebug.remote_host=172.20.0.2' >>  /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo 'xdebug.remote_port=9001' >>  /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN a2enmod rewrite


WORKDIR /var/www/html
RUN chown -R www-data /var/www

#USER www-data
#COPY composer.json /var/www/html/composer.json
#COPY composer.lock /var/www/html/composer.lock
#RUN /usr/bin/composer install

USER root
COPY phpconfig/php.ini /usr/local/etc/php


RUN service apache2 restart
