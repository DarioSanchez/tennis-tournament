FROM php:8.1-fpm

COPY php.ini /usr/local/etc/php/
COPY docker.conf /usr/local/etc/php-fpm.d/docker.conf
COPY .bashrc /root/

# Establecer el directorio de trabajo
WORKDIR /var/www

# Agregar claves GPG necesarias y actualizar el índice de paquetes
RUN apt-get update \
    && apt-get install -y gnupg2 \
    && apt-key adv --keyserver keyserver.ubuntu.com --recv-keys 648ACFD622F3D138 \
    && apt-key adv --keyserver keyserver.ubuntu.com --recv-keys 112695A0E562B32A \
    && apt-get update

# Instalar dependencias básicas
RUN apt-get install -y \
  build-essential \
  zlib1g-dev \
  default-mysql-client \
  curl \
  gnupg \
  procps \
  vim \
  git \
  unzip \
  libzip-dev \
  libpq-dev

# Instalar extensiones PHP
RUN docker-php-ext-install zip pdo_mysql

# Instalar intl
RUN apt-get install -y libicu-dev \
  && docker-php-ext-configure intl \
  && docker-php-ext-install intl

# Instalar gd
RUN apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
  && docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ \
  && docker-php-ext-install gd

# Instalar Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin
RUN composer config --global process-timeout 3600
RUN composer global require "laravel/installer"

EXPOSE 80

WORKDIR /var/www
