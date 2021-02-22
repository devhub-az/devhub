install: env key storage passport

env:
	php -r "file_exists('.env') || copy('.env.example', '.env');"

key:
	php artisan key:generate

storage:
	php artisan storage:link

passport:
	php artisan passport:keys
