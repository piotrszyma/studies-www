FROM php:7.1-apache


RUN apt-get update && \
    apt-get install -y --no-install-recommends git zip unzip

RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql

COPY --from=composer:1.5 /usr/bin/composer /usr/bin/composer

RUN mkdir /scripts
WORKDIR /scripts
RUN mkdir generated-classes/
COPY src/composer.json .

RUN composer install

RUN mkdir /code
WORKDIR /code

RUN ln -s /scripts/vendor/propel/propel/bin/propel /usr/bin/propel
