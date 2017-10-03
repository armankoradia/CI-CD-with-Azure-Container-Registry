FROM ubuntu:16.04
MAINTAINER Arman <ask.arman990@gmail.com>
LABEL Description="LAMP Stack on Ubuntu 16.04 with php 7."

RUN apt-get update
RUN apt-get upgrade -y

RUN apt-get install apache2 -y
RUN DEBIAN_FRONTEND=noninteractive
RUN apt-get install php libapache2-mod-php php-mcrypt php-mysql -y

COPY webpage/index.php /var/www/html/index.php

RUN a2enmod rewrite
RUN rm /var/www/html/index.html
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

CMD ["/usr/sbin/apachectl", "-D", "FOREGROUND"]
