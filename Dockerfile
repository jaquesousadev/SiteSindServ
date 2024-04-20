# Use a imagem oficial do PHP com Apache
FROM php:7.4-apache

# Atualizar pacotes e instalar dependências necessárias
RUN apt-get update && \
    apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev libzip-dev sendmail

# Habilitar extensões PHP necessárias
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd mysqli pdo pdo_mysql zip

# Copiar os arquivos do projeto para o diretório do Apache
COPY . /var/www/html

# Copiar o código PHPMailer para o diretório do Apache
#COPY ./phpmailer /var/www/phpmailer

# Expor a porta 80 para o tráfego HTTP
EXPOSE 8080
