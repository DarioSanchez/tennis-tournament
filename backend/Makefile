up:
	docker-compose up -d

down:
	docker-compose down

restart:
	docker-compose down
	docker-compose up -d

build:
	docker-compose up --build -d

shell:
	docker-compose exec app bash

logs:
	docker-compose logs -f

migrate:
	docker-compose exec app php artisan migrate

seed:
	docker-compose exec app php artisan db:seed
