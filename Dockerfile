FROM php:8.2-apache

# Instalar extensión PDO para MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Copiar archivos PHP al servidor Apache
COPY src/ /var/www/html/

# Exponer puerto 80
EXPOSE 80