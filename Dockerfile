FROM composer:2.10.1 AS composer

FROM php:8.2.32-trixie

COPY --from=composer /usr/bin/composer /usr/bin/composer

# unzip is required for composer
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        unzip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*
    #unzip: is for support the composer install command
