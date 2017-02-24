#!/bin/bash

docker run -ti --name=certificado --link=db \
-p 806:80 \
-v $(pwd)/php-fpm.conf:/etc/php/7.0/fpm/php-fpm.conf \
-v $(pwd)/site:/var/www \
-v $(pwd)/logs/nginx:/var/log/nginx \
-v $(pwd)/logs/php:/var/log/php \
-v $(pwd)/php.ini:/etc/php/7.0/fpm/php.ini \
-v $(pwd)/nginx.conf:/etc/nginx/nginx.conf \
-v $(pwd)/vhost:/etc/nginx/sites-available/default \
-v $(pwd)/vhost:/etc/nginx/sites-enabled/default \
mckatoo/nginx-php:0.2 \
bash
