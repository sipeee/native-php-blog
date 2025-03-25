FROM php:8.4-apache

RUN apt-get update && \
    apt-get install -y \
        bzip2 \
        ca-certificates \
        curl \
        gettext \
        git \
        libtool \
        tzdata \
        unzip \
        zip

RUN docker-php-ext-install pdo pdo_mysql && \
    docker-php-ext-enable opcache

WORKDIR /var/www

ADD .etc /etc
ADD . /var/www

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install

ENV PATH "$PATH:/var/www/vendor/bin"

RUN mkdir -p smarty/templates && \
    mkdir -p smarty/templates_c && \
    mkdir -p smarty/cache && \
    mkdir -p smarty/configs && \
    chmod 777 smarty/templates_c && \
    chmod 777 smarty/cache && \
    mkdir -p log && \
    chmod 777 smarty/templates_c && \
    rm -R .etc

