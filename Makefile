build:
	docker build -t laravel .

start:
	docker run -p 8000:8000 laravel