FROM php:7.1.23

# Copy the application code to /home
COPY . /home

# Set the working directory to /home
WORKDIR /home

# Install necessary PHP extensions
RUN docker-php-ext-install pdo_mysql

# Expose port 80 for the built-in PHP server
EXPOSE 80

# Use PHP's built-in web server to serve the app
CMD ["php", "-S", "0.0.0.0:80", "-t", "/home"]

