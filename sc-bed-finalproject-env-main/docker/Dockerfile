FROM php:8.2-fpm

# Argument for Xdebug
ARG WITH_XDEBUG=true

# Install dependencies
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libzip-dev \
        zip \
        git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install pdo pdo_mysql \
    && docker-php-ext-install zip

# Install Xdebug if enabled
RUN if [ "$WITH_XDEBUG" = "true" ] ; then \
        pecl install xdebug && docker-php-ext-enable xdebug; \
    fi

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy startup script and make it executable
COPY scripts/run.sh /opt/run.sh
RUN chmod +x /opt/run.sh

# Set the startup command
CMD ["/opt/run.sh"]
