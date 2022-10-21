## Hand-On - Arquitetura sobre o Laravel

O objetivo desse repo é servir de base para o workshop Hands-on Arquitetura sobre o Laravel

Requerimentos:
```
docker
docker-compose
PHP 8.1
Exts para o Laravel
```

Faça o clone do repositório e siga os passos:

Configure banco no .env, se necessário a mesma config estará no ```.env.example```
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=twowheels
DB_USERNAME=root
DB_PASSWORD=123456
```

Suba o banco com docker-compose
```bash
$ docker-compose up -d

ou

$ docker compose up -d
```

Execute as migrations
```bash
php artisan migrate
```

Execute o seeder
```bash
php artisan db:seed
```

Para testes funcionais:
```bash
php artisan serve

curl --request GET \
  --url http://localhost:8000/api/biddings

curl --request POST \
  --url http://localhost:8000/api/biddings \
  --header 'Content-Type: application/json' \
  --data '{
	"user_id": 1,
	"motorcycle_id": 2,
	"bid_value": 33133.33
}'

curl --request PUT \
  --url http://localhost:8000/api/biddings/1 \
  --header 'Content-Type: application/json' \
  --data '{
	"user_id": 1,
	"motorcycle_id": 2,
	"bid_value": 33133.33
}'

curl --request DELETE \
  --url http://localhost:8000/api/biddings/1
```