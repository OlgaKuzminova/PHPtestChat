up:
	docker-compose up -d
	
logs:
	docker-compose logs -f

ps:
	docker-compose ps

down:
	docker stop tasksimg || true
	docker rm tasksimg || true
	
stop:
	docker-compose stop

init-db:
		source ./db/init.sh
		docker-compose up -d --build

remove-db:
		docker compose rm --stop --volumes --force
		rm .env || true
		rm ./db/createdb.sql  || true
