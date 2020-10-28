FROM ubuntu:18.04

# Instalando Vim

RUN apt-get update && \
    apt-get install --yes vim

# Adicionando repositório do PHP

RUN apt-get update && \
    apt-get install --yes software-properties-common && \
    LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php

# Solução que achei para o problema do tzdata https://serverfault.com/questions/949991/how-to-install-tzdata-on-a-ubuntu-docker-image
# É este comando mais as duas variáveis no docker.env TZ=America/New_York DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -y tzdata

# Instalando PHP + APACHE

RUN apt-get update && \
    apt-get install --yes php7.4

# Configurando APACHE

RUN a2enmod rewrite
COPY allow-override.conf /etc/apache2/conf-enabled/allow-override.conf
COPY vhost.conf /etc/apache2/sites-enabled/000-default.conf

# Instalando extensões do PHP

RUN apt-get update && \
    apt-get install --yes \
        php7.4-cli \
        php7.4-common \
        php7.4-curl \
        php7.4-dev \
        php7.4-gd \
        php7.4-json \
        php7.4-mbstring \
        php7.4-mysql \
        php7.4-opcache \
        php7.4-readline \
        php7.4-soap \
        php7.4-sqlite3 \
        php7.4-xml \
        php7.4-zip

EXPOSE 80
CMD ["apache2ctl", "-DFOREGROUND"]


# Instalando o composer

RUN curl -sS https://getcomposer.org/installer \
        | php -- --install-dir=/usr/local/bin --filename=composer


RUN apt-get update && \
    apt-get install --yes \
        php7.2-xdebug
COPY xdebug.ini /etc/php/7.2/apache2/conf.d/90-xdebug.ini
COPY xdebug.ini /etc/php/7.2/cli/conf.d/90-xdebug.ini
