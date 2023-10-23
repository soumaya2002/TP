FROM php:latest

RUN apt-get update && apt-get install -y ca-certificates


#RUN apt-get update \
#    && apt-get install -y --no-install-recommends vim curl debconf subversion git apt-transport-https apt-utils \
#    build-essential locales acl ma \
#    ilutils wget zip unzip \
#    gnupg gnupg1 gnupg2 gnupg && \
#    apt-get clean && \
#    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

RUN docker-php-ext-install pdo pdo_mysql
#COPY ./php/php.ini /etc/php/8.0.2/php.ini
#COPY ./php/php-fpm-pool.conf /etc/php/8.0.2/pool.d/www.conf

#Memcached Installation
RUN apt-get update && apt-get install -y \
        libz-dev libmemcached-dev \
    && pecl install memcached \
    && docker-php-ext-enable memcached


RUN curl -sSk https://getcomposer.org/installer | php -- --disable-tls && \
   mv composer.phar /usr/local/bin/composer

#RUN wget https://get.symfony.com/cli/installer -O - | bash
#RUN mv /root/.symfony5/bin/symfony /usr/local/bin/symfony


RUN groupadd dev -g 999
RUN useradd dev -g dev -d /home/dev -m

RUN rm -rf /var/lib/apt/lists/*
#RUN echo "en_US.UTF-8 UTF-8" > /etc/locale.gen && \
#    echo "fr_FR.UTF-8 UTF-8" >> /etc/locale.gen && \
#    locale-gen

CMD bash -c "composer install"
WORKDIR /home/wwwroot/ter-api

EXPOSE 9000
CMD ["php-fpm"]
