version: '3'
services:
    web:
        image: nginx
        volumes:
#            - "./etc/nginx/default.conf:/etc/nginx/conf.d/default.conf"
#            - "./etc/ssl:/etc/ssl"
            - "./:/usr/share/nginx/html/"
#            - "./etc/nginx/default.template.conf:/etc/nginx/conf.d/default.template"
        ports:
            - "5000:80"
#            - "3000:443"
#        environment:
#            - NGINX_HOST=${NGINX_HOST}
#        command: /bin/sh -c "envsubst '$$NGINX_HOST' < /etc/nginx/conf.d/default.template > /etc/nginx/conf.d/default.conf && nginx -g 'daemon off;'"
        restart: always
        depends_on:
            - php
#            - mysqldb
    php:
        image: nanoninja/php-fpm
        restart: always
        volumes:
#            - "./etc/php/php.ini:/usr/local/etc/php/conf.d/php.ini"
         - "./:/var/www/html"