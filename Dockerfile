# Imagen base con PHP, Composer y extensiones necesarias
FROM php:8.2-cli

# Instala dependencias del sistema y extensiones PHP requeridas
RUN apt-get update && apt-get install -y \
    unzip \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    git \
    curl \
    nodejs \
    npm && \
    docker-php-ext-install pdo pdo_mysql zip gd

# Instala Composer globalmente
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Crea y establece directorio de trabajo
WORKDIR /var/www

# Copia todos los archivos del proyecto al contenedor
COPY . .

# Instala dependencias PHP
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Genera la clave de la app si no existe (solo si hay .env)
RUN if [ -f ".env" ]; then php artisan key:generate; fi

# Compila assets con Vite si hay package.json
RUN if [ -f "package.json" ]; then npm install && npm run build; fi

# Expone el puerto que Laravel usa
EXPOSE 8080

# Comando por defecto para iniciar el servidor Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
