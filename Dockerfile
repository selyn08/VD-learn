# Use the official PHP image with an Apache server
FROM php:8.2-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the application files from the current directory to the working directory
COPY . .

# Apache's default configuration will serve the files from this directory.
# The container will expose port 80 by default.