up:
	docker-compose up -d
	
logs:
	docker-compose logs -f

ps:
	docker-compose ps

stop:
	docker-compose stop

init-db:
	pwd
	sh ./db/init.sh
	pwd
	docker-compose up -d --build

remove-db:
	docker compose rm --stop --volumes --force
	rm .env || true
	rm ./db/createdb.sql  || true
