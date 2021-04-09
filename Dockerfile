FROM webdevops/php-nginx:7.4
ENV WEB_DOCUMENT_ROOT /app/public
ENV WEB_DOCUMENT_INDEX index.php
ENV COMPOSER_VERSION 2
WORKDIR /app
COPY . /app
RUN composer install
RUN bin/console doctrine:database:create -n
RUN bin/console doctrine:migrations:migrate -n

