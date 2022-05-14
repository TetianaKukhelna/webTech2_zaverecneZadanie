MAIN_SERVICE = db

MYSQL_DBNAME = db
MYSQL_USER = xkukhelna
MYSQL_PASS =
MYSQL_PORT = 3306

ps:
	docker-compose ps

up:
	docker-compose up -d
	docker-compose ps

down:
	docker-compose down

run:
	docker-compose build --parallel --no-cache
	docker-compose up -d
	docker-compose ps

rebuild:
	docker-compose build --parallel
	docker-compose up -d
	docker-compose ps

restart:
	docker-compose restart db
	docker-compose ps

clean:
	docker volume rm some_name_my-db


restore:
	docker-compose exec -T $(MAIN_SERVICE) mysql --user=$(MYSQL_USER) --password=$(MYSQL_PASS) --host=localhost --port=$(MYSQL_PORT) db < some_name.sql
