FROM php:8.2-cli

ARG user=tmanager
ARG uid=1000
ARG gid=1000

WORKDIR /app

RUN apt-get update && apt-get install -y \
    git \
    libpq-dev \
    libzip-dev \
    sqlite3 \
    zip \
    unzip \
    curl \
    nodejs \
     npm \
    --no-install-recommends && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install \
    bcmath \
    exif \
    pdo \
    pdo_pgsql \
    pgsql \
    zip

RUN pecl install xdebug && docker-php-ext-enable xdebug

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN npm install --location=global npm@latest

RUN groupadd -g $gid -o $user && useradd -m -u $uid -g $gid -o -s /bin/bash $user

USER $user

# Для разработки, если нужен volume, COPY можно не использовать
# Для продакшена раскомментировать:
# COPY . .

ENV PORT=8000

CMD ["bash", "-c", "php artisan serve --host=0.0.0.0 --port=$PORT"]
