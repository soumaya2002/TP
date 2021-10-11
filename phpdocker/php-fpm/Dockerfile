FROM phpdockerio/php80-fpm

WORKDIR "/application"

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get -y --no-install-recommends install  \
php-memcached php-mysql php-redis \
php-xdebug php-bcmath php-bz2 php-gd \
php-soap php-intl php-sodium php-gmp

#Special Brice POTE le 14/07/2020
RUN apt-get -y --no-install-recommends install  wget git dos2unix sshpass tree \
    yarn vim mysql-client openssh-client gnupg2

#Install Blackfire.io SensioLabs Profiler
RUN version=$(php -r "echo PHP_MAJOR_VERSION.PHP_MINOR_VERSION;") \
    && architecture=$(uname -m) \
    && curl -A "Docker" -o /tmp/blackfire-probe.tar.gz -D - -L -s https://blackfire.io/api/v1/releases/probe/php/linux/$architecture/$version \
    && mkdir -p /tmp/blackfire \
    && tar zxpf /tmp/blackfire-probe.tar.gz -C /tmp/blackfire \
    && mv /tmp/blackfire/blackfire-*.so $(php -r "echo ini_get ('extension_dir');")/blackfire.so \
    && printf "extension=blackfire.so\nblackfire.agent_socket=tcp://blackfire_agent:${BLACKFIRE_PORT}\n" > /etc/php/8.0/fpm/conf.d/blackfire.ini \
    && rm -rf /tmp/blackfire /tmp/blackfire-probe.tar.gz

RUN echo ${BLACKFIRE_PORT}

# Cleaing the sources packets
RUN apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

#Special Brice POTE le 01/01/2021 - Install Symfony bin
RUN wget https://get.symfony.com/cli/installer -O - | bash
RUN mv /root/.symfony/bin/symfony /usr/local/bin/symfony

#Special Brice POTE le 14/07/2020
COPY ./cls /usr/bin/cls
COPY ./lt /usr/bin/lt
COPY ./install_composer.sh /usr/bin/install_composer
RUN chmod 755 /usr/bin/cls
RUN chmod 755 /usr/bin/lt
RUN chmod 755 /usr/bin/install_composer

#Special Brice POTE le 14/07/2020 Avoid conflict Window/Linux
RUN dos2unix /usr/bin/cls
RUN dos2unix /usr/bin/lt
RUN dos2unix /usr/bin/install_composer

#Special Brice POTE le 05/02/2021 Install properly composer
RUN install_composer

#Launch Blacfire agent
#RUN blackfire-agent agent:start
