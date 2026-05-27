FROM php:8.3-cli

# Instalar dependencias
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libzip-dev \
    zip

# Instalar extensiones PHP
RUN docker-php-ext-install pdo pdo_mysql zip

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Carpeta del proyecto
WORKDIR /app

# Copiar archivos
COPY . .

# Instalar Laravel
RUN composer install --no-dev --optimize-autoloader

# Puerto Render
EXPOSE 10000

# Iniciar Laravel
CMD php artisan serve --host=0.0.0.0 --port=10000