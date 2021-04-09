setup:
	docker pull webdevops/php-nginx:7.3
	docker-compose up --build -d
bash:
	docker-compose exec app bash

reset:
	docker-compose exec app bash -c "rm -rf migrations/*.php \
	&& rm -rf var/data.db \
	&& bin/console cache:clear \
	&& bin/console doctrine:database:create -n \
	&& bin/console make:migration -n \
	&& bin/console doctrine:migrations:migrate -n \
	&& chmod 777 -R var/"