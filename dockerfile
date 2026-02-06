FROM php:8.1-apache

# Instalar extensiones necesarias
RUN docker-php-ext-install mysqli && \
    docker-php-ext-enable mysqli

# Copiar archivo php.ini personalizado
COPY config/php.ini /usr/local/etc/php/

# Habilitar mod_rewrite de Apache
RUN a2enmod rewrite

# Configurar DocumentRoot de Apache
RUN sed -i 's|/var/www/html|/var/www/html|g' /etc/apache2/sites-available/000-default.conf

# Copiar archivos de la aplicación
COPY public/ /var/www/html/
COPY src/ /var/www/src/

# Establecer permisos
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

EXPOSE 80

CMD ["apache2-foreground"]
