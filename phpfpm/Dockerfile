FROM php:7.4-fpm

LABEL version="1.0"
LABEL discription="laravel potore"

COPY php.ini /usr/local/etc/php/

RUN apt update && \
        apt install -y \
        aptitude \ 
        git \
        libz-dev \   
        libmcrypt-dev \
        libmemcached-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        nodejs \
        npm \
        unzip \
        wget \
        zlib1g-dev \
        libzip-dev
RUN docker-php-ext-install mysqli pdo pdo_mysql zip

#Xdebug
RUN pecl install xdebug \
  && docker-php-ext-enable xdebug

#Composer install
COPY --from=composer /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1 
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin
WORKDIR /var/www
RUN composer global require "laravel/installer"

#node update
WORKDIR /var/www/potore
RUN npm install -g n && \
    n --latest && \
    n latest

#entrykit install
RUN wget https://github.com/progrium/entrykit/releases/download/v0.4.0/entrykit_0.4.0_linux_x86_64.tgz && \
    tar -xvzf entrykit_0.4.0_linux_x86_64.tgz && \
    rm entrykit_0.4.0_linux_x86_64.tgz && \
    mv entrykit /usr/local/bin/ && \
    entrykit --symlink 
#entrykit set
COPY docker-entrypoint.sh /root
COPY .env.example.tmpl /var/www/potore/

#envファイル生成
#laravel初回インストール
ENTRYPOINT [ \
    "render", "/var/www/potore/.env.example", "--" \
]

CMD ["php-fpm"]