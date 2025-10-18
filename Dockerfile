# Étape 1 : Image de base PHP avec extensions nécessaires
FROM php:8.2-fpm

# Installe les dépendances système
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libjpeg-dev libfreetype6-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Installe Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copie les fichiers de l'application
WORKDIR /var/www/html
COPY . .

# Installe les dépendances Laravel
RUN composer install --no-dev --optimize-autoloader

# Génére la clé Laravel
RUN php artisan key:generate

# Donne les bons droits aux dossiers de stockage
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Port exposé
EXPOSE 8002

# Commande de démarrage
CMD php artisan serve --host=0.0.0.0 --port=8002
