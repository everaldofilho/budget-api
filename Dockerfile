FROM webdevops/php-nginx:7.4

# RUN echo "vlatka ALL=(ALL) NOPASSWD: ALL" > /host/etc/sudoers.d/toto
# USER u32757
ENV WEB_DOCUMENT_ROOT /app/public
ENV WEB_DOCUMENT_INDEX index.php
ENV COMPOSER_VERSION 2
WORKDIR /app
COPY . /app
RUN chown -R application:application /app
USER application
COPY ./supervisor.conf /opt/docker/etc/supervisor.conf
RUN composer install
RUN bin/console doctrine:database:create -n
RUN bin/console doctrine:migrations:migrate -n
RUN chmod 777 -R /app/var
RUN chmod +x /app/entrypoint.sh
# ENTRYPOINT [ "/app/entrypoint.sh" ]
# CMD [ "id", "-u", "-n"]

