FROM ubuntu:14.04
MAINTAINER Lucas <lkovacs@sweatworks.net>
ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update
RUN apt-get install -y software-properties-common
RUN apt-get install -y --force-yes curl
RUN apt-get update && apt-get install -y php5 php5-mysql php5-mcrypt php5-cli php5-gd php5-curl libapache2-mod-php5 php5-mysql php5-xdebug mysql-client nodejs npm wget
RUN a2enmod rewrite
RUN npm config set strict-ssl false
RUN npm install -g istanbul
RUN ln -s /usr/bin/nodejs /usr/bin/node
RUN export TERM=xterm

ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2
ENV APACHE_PID_FILE /var/run/apache2.pid
#You can modify these below with your host user
ENV APACHE_RUN_USER thinkpad
ENV APACHE_RUN_GROUP thinkpad

EXPOSE 80
EXPOSE 8080
EXPOSE 443
EXPOSE 3306

COPY app /var/www/site
ADD virtualhost.conf /etc/apache2/sites-enabled/000-default.conf

WORKDIR /var/www/site
#RUN composer install

CMD /usr/sbin/apache2ctl -D FOREGROUND