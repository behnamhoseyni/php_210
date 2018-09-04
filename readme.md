<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>
# Laravel 5.6 

## Installation

Development environment requirements :
- [Docker](https://www.docker.com)
- [Docker Compose](https://docs.docker.com/compose/install/)

Setting up your development environment on your local machine :
```
$ git clone https://github.com/ehsanmnz/laravel-course-demo.git
$ cd laravel-course-demo
$ cp .env.example .env
$ docker-compose run --rm --no-deps blog-server composer install
$ docker-compose run --rm --no-deps blog-server php artisan key:generate
$ docker-compose run --rm --no-deps blog-server php artisan vendor:publish --provider="Laravel\Horizon\HorizonServiceProvider"
$ docker-compose run --rm --no-deps blog-server php artisan storage:link
$ docker run --rm -it -v $(pwd):/app -w /app node npm install
$ docker-compose up -d
```

Now you can access the application via [http://localhost:8000](http://localhost:8000).

**There is no need to run ```php artisan serve```. PHP is already running in a dedicated container.**

## Before starting
You need to run the migrations with the seeds :
```
$ docker-compose run --rm blog-server php artisan migrate --seed
```

This will create a new user that you can use to sign in :
```
Email : ehsan@minaei.ir
Password : 1234
```

And then, compile the assets :
```
$ docker run --rm -it -v $(pwd):/app -w /app node npm run dev
```

Starting job for newsletter :
```
$ docker-compose run blog-server php artisan tinker
> PrepareNewsletterSubscriptionEmail::dispatch();
```

## Useful commands
Seeding the database :
```
$ docker-compose run --rm blog-server php artisan db:seed
```

Running tests :
```
$ docker-compose run --rm blog-server ./vendor/bin/phpunit
```

Running php-cs-fixer :
```
$ docker-compose run --rm --no-deps blog-server ./vendor/bin/php-cs-fixer fix --config=.php_cs --verbose --dry-run --diff
```

Generating backup :
```
$ docker-compose run --rm blog-server php artisan backup:run
```

Generating fake data :
```
$ docker-compose run --rm blog-server php artisan db:seed --class=DevDatabaseSeeder
```

Discover package
```
$ docker-compose run --rm --no-deps blog-server php artisan package:discover
```

In development environnement, rebuild the database :
```
$ docker-compose run --rm blog-server php artisan migrate:fresh --seed
```

## Accessing the API

Clients can access to the REST API. API requests require authentication via token. You can create a new token in your user profil.

Then, you can use this token either as url parameter or in Authorization header :

```
# Url parameter
GET http://laravel-blog.app/api/v1/posts?api_token=your_private_token_here

# Authorization Header
curl --header "Authorization: Bearer your_private_token_here" http://laravel-blog.app/api/v1/posts
```

API are prefixed by ```api``` and the API version number like so ```v1```.

Do not forget to set the ```X-Requested-With``` header to ```XMLHttpRequest```. Otherwise, Laravel won't recognize the call as an AJAX request.

To list all the available routes for API :

```bash
$ docker-compose run --rm --no-deps blog-server php artisan route:list --path=api
```
