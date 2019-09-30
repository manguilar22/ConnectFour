FROM php:7.2-apache
LABEL maintainer=manguilar22@gmail.com
WORKDIR /var/www/html 
COPY . .
EXPOSE  80
