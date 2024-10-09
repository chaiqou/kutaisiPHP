# Dockerfile for web service
FROM php:8.0-apache AS web

# Copy the public directory to the container
COPY ./public /var/www/html/public

# Expose port 80
EXPOSE 80

# Dockerfile for app service
FROM php:8.0-cli AS app

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy the application code to the container
COPY . /var/www/html

# Set the working directory
WORKDIR /var/www/html