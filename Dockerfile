# Specify the base image
FROM php:7.4-apache

# Set the working directory
WORKDIR /var/www/html

# Copy the application files to the container
COPY . .

# Install any necessary dependencies
RUN apt-get update && apt-get install -y \
    default-mysql-client \
    && docker-php-ext-install mysqli pdo_mysql


# Expose the port
EXPOSE 80

# Start the Apache server
CMD ["apache2-foreground"]

