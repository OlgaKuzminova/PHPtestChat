build:

	docker run -d --name messagesimg -p 80:8080 -v ./html:/var/www/html ./html:/usr/local/apache2/htdocs

down:
	docker stop tasksimg || true
	docker rm tasksimg || true
	
stop:
	docker-compose stop
