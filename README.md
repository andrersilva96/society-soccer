<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Society Soccer
An application that shows teams, based on each player's skills.

# Documentation [here](https://documenter.getpostman.com/view/10880762/2sA3XJk4hm).

👉 Requirements:

1. PHP 8.2
2. Node 21
3. Composer
4. MySQL
5. Redis

   
### Installation
1. Clone this Repository
```sh
git clone git@github.com:andrersilva96/society-soccer.git
```

2. Create the .env file
```sh
cd society-soccer/
cp .env.example .env
```

3. Update environment variables in .env
```dosini
APP_NAME="Name Your Project"
APP_URL=http://localhost:8080

DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=
```

4.1 Install packages with Docker
```sh
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```

4.2 Install packages (without Docker)
```sh
composer install
```

5. Generate the Laravel project key
```sh
php artisan key:generate
```

6.1 Up containers
```sh
sail up
```

6.2 Without Docker
```sh
php artisan serve
```

7. NPM
```sh
npm install
npm run build
```

8. Access the project
[http://localhost:8080](http://localhost:8080)
