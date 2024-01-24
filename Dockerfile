FROM php:8.0-apache
RUN docker-php-ext-install mysqli
COPY messagesapp.conf /usr/local/apache2/conf/messagesapp.conf

