# Use a basic PHP and Apache server
FROM php:7.4-apache

# Copy your project files to the server
COPY . /var/www/html/

# Install database support for PHP
RUN docker-php-ext-install pdo pdo_mysql

# Expose port 80 for the web server
EXPOSE 80
