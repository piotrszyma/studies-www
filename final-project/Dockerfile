FROM php:7.1-apache

RUN apt-get update && \
    apt-get install -y --no-install-recommends git zip unzip

RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql

RUN apt-get update && apt-get install -my wget gnupg
RUN curl -sL https://deb.nodesource.com/setup_10.x | bash -
RUN apt-get install -y nodejs
RUN npm install gulp-cli -g
RUN npm install gulp -g

COPY --from=composer:1.5 /usr/bin/composer /usr/bin/composer

ADD src/package.json /tmp/package.json
RUN cd /tmp && npm install
RUN mkdir /scripts
RUN cp -a /tmp/node_modules /scripts

WORKDIR /scripts
RUN mkdir generated-classes/
COPY src/composer.json .

RUN composer install

RUN mkdir /code
WORKDIR /code

RUN ln -s /scripts/vendor/propel/propel/bin/propel /usr/bin/propel
