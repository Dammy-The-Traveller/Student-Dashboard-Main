# Use official PHP image with Apache
FROM php:8.3-apache

# Enable Apache modules
RUN a2enmod rewrite headers

# Install dependencies
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Set ServerName to suppress domain warnings
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

COPY ./Public/.htaccess /var/www/html/.htaccess

# Copy the public directory to Apache's root folder
COPY ./Public /var/www/html/

# Copy other necessary files for configuration
COPY ./composer.json /var/www/composer.json
COPY ./composer.lock /var/www/composer.lock
COPY ./composer.phar /var/www/composer.phar
COPY ./lemsas.sql /var/www/lemsas.sql
COPY ./config.php /var/www/config.php
COPY ./bootstrap.php /var/www/bootstrap.php
COPY ./route.php /var/www/route.php
COPY ./Core /var/www/Core
COPY ./Http /var/www/Http
COPY ./veiws /var/www/veiws
COPY ./vendor /var/www/vendor
# Set permissions for Apache
RUN chown -R www-data:www-data /var/www



# Expose port 80
EXPOSE 80
