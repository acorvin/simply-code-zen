## Code Zen Blog

Code Zen is a blog project designed using Laravel and Filament. Its purpose is to provide a platform for sharing and exploring coding concepts, programming tips, and technology insights in a calm and simplified manner. Whether you're a seasoned developer or just starting your coding journey, Code Zen seeks to offer a serene space for learning and growth.

## Preview

![preview](preview.jpg?raw=true)

## Technologies

**[Laravel](https://laravel.com/)**

**[Filament](https://filamentphp.com/)**

**[Laravel Livewire](https://laravel-livewire.com/)**

**[Alpine.js](https://alpinejs.dev/)**

**[TailwindCSS](https://tailwindcss.com/)**

**[Docker](https://docker.com/)**

## Installation

1. Clone the project
```
git clone https://github.com/acorvin/simply-code-zen.git
```
2. I recommend using **[Docker](https://docker.com/)** to run the dev environment 

3. Run the composer installation by cd'ing into project folder in the terminal and running
```
docker run --rm \
-u "$(id -u):$(id -g)" \
-v "$(pwd):/var/www/html" \
-w /var/www/html \
laravelsail/php82-composer:latest \
composer install --ignore-platform-reqs
```
4. Copy .env.example into .env
```
cp .env.example .env

```
5. Start the project in detached mode
```
./vendor/bin/sail up -d
```
To run php artisan commands, access the docker container
```
./vendor/bin/sail bash
```
6. Set the encryption key
```
php artisan key:generate --ansi
```
7. Run the migrations
```
php artisan migrate
```
8. Add a filament admin user account to access the dashboard
```
php artisan make:filament-user
```
9. Install dependencies for tailwind and vite
```
npm install
```
10. Run dev / vite
```
npm run dev
```
## Accessing Dashboard

To access the Filament admin dashboard, navigate to 
```
localhost/admin
```
