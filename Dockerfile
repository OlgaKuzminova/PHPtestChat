FROM php:8.0-apache
RUN docker-php-ext-install mysqli
COPY messagesapp.conf /usr/local/apache2/conf/messagesapp.conf
COPY .htaccess /var/www/html
RUN echo "LoadModule rewrite_module modules/mod_rewrite.so" >> /usr/local/apache2/conf/httpd.conf
RUN a2enmod rewrite 
