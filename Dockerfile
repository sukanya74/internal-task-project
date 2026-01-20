FROM php:8.2-apache

# Install mysqli extension
RUN docker-php-ext-install mysqli

# Enable Apache rewrite (optional but good practice)
RUN a2enmod rewrite

# Copy project files into container
COPY . /var/www/html/

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html

