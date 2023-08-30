## Simply Code Zen (In Progress)

Simply Code Zen is a blog project designed using Laravel and Filament. Its purpose is to provide a platform for sharing and exploring coding concepts, programming tips, and technology insights in a calm and simplified manner. Whether you're a seasoned developer or just starting your coding journey, Simply Code Zen seeks to offer a serene space for learning and growth.

## Preview

![preview](preview.jpg?raw=true)

## Technologies

**[Laravel](https://laravel.com/)**

**[Filament](https://filamentphp.com/)**

**[Laravel Livewire](https://laravel-livewire.com/)**

**[Alpine.js](https://alpinejs.dev/)**

**[TailwindCSS](https://tailwindcss.com/)**

## Installation

1. Clone the project
```
git clone https://github.com/acorvin/simply-code-zen.git
```
2. Run the composer installation by cd'ing into project folder in the terminal and running
```
docker run --rm \
-u "$(id -u):$(id -g)" \
-v "$(pwd):/var/www/html" \
-w /var/www/html \
laravelsail/php82-composer:latest \
composer install --ignore-platform-reqs
```
3. Copy .env.example into .env
```
cp .env.example .env

```
4. Start the project in detached mode
```
./vendor/bin/sail up -d
```
To run php artisan commands, access the docker container
```
./vendor/bin/sail bash
```
5. Set the encryption key
```
php artisan key:generate --ansi
```
6. Run the migrations
```
php artisan migrate
```
7. Add a filament admin user account to access the dashboard
```
php artisan make:filament-user
```
