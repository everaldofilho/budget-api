FROM webdevops/php-nginx:7.4
RUN adduser myuser
USER root
ENV WEB_DOCUMENT_ROOT /app/public
ENV WEB_DOCUMENT_INDEX index.php
ENV PORT 80
ENV COMPOSER_VERSION 2
WORKDIR /app
COPY . /app
COPY ./supervisor.conf /opt/docker/etc/supervisor.conf
RUN composer install
RUN bin/console doctrine:database:create -n
RUN bin/console doctrine:migrations:migrate -n
RUN chmod 777 -R /app/var
RUN chmod +x /app/entrypoint.sh
RUN chown myuser:myuser /app
USER myuser

ENTRYPOINT [ "/app/entrypoint.sh" ]
# CMD [ "id", "-u", "-n"]

