FROM php:apache

# Copy project files
WORKDIR ./ /var/www/html

# Install Node.js and npm
RUN apt-get update && apt-get install -y \
    curl \
    zip \
    unzip \
    libzip-dev \
    libonig-dev \
    zlib1g-dev \
    libxml2-dev \
    libpng-dev \
    nodejs \
    npm \
    && docker-php-ext-configure gd \
    && docker-php-ext-install pdo_mysql mysqli zip gd \
    && docker-php-source delete

# Install dependencies
RUN docker-php-ext-install pdo pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set Apache document root
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

# Update Apache configuration
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf \
    && sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Enable Apache modules
RUN a2enmod rewrite

# Restart Apache service
RUN service apache2 restart
