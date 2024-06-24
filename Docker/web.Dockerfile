# Utiliser l'image officielle PHP avec Apache
FROM php:7.4-apache

# Installer les extensions PHP nécessaires
RUN docker-php-ext-install pdo pdo_mysql

# Activer mod_status d'Apache pour exporter les métriques
RUN a2enmod status

# Configurer l'accès aux métriques (autoriser depuis tous les hôtes)
RUN echo "ExtendedStatus On\n<Location /server-status>\n  SetHandler server-status\n  Require all granted\n</Location>" >> /etc/apache2/apache2.conf

# Copier le code de l'application dans le répertoire approprié
COPY ../ /var/www/html/

# Configurer les permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Exposer le port 80
EXPOSE 80

# Exposer le port 8080 pour les métriques
EXPOSE 8080

# Démarrer Apache
CMD ["apache2-foreground"]
