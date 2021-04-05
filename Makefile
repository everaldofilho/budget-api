setup:
	docker pull webdevops/php-nginx:7.3
	docker-compose up --build -d
bash:
	docker-compose exec app bash