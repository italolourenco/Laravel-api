
#!/bin/bash

echo Uploading Application container 
docker-compose up -d

echo Copying the configuration example file
winpty docker exec -it laravel-api-app cp .env.example .env

echo Install dependencies
winpty docker exec -it laravel-api-app composer install

echo Generate key
winpty docker exec -it laravel-api-app php artisan key:generate

echo Make migrations
winpty docker exec -it laravel-api-app php artisan migrate

echo Make seeds
winpty docker exec -it laravel-api-app php artisan db:seed

echo run serve
winpty docker exec -it laravel-api-app php serve --host=0.0.0.0 --port=8000

echo Information of new containers
docker ps -a 