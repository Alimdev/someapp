<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## readme
## вместо rabbitmq, я использовал redis 5.0
## разработку вел на windows, использовал open server

1 создать .env
2 composer update
3 php artisan key:generate
4 npm install
5 настроить в .env файле окружение:
    подключение к бд, 
    APP_URL= в конце урла обязательно добавить "/" (http://testapp/)

    SANCTUM_STATEFUL_DOMAINS=localhost

    QUEUE_CONNECTION=redis
    QUEUE_DRIVER=redis

    //я использовал gmail smtp
    MAIL_MAILER=smtp
    MAIL_DRIVER=smtp
    MAIL_HOST=smtp.gmail.com
    MAIL_PORT=587
    MAIL_USERNAME=
    MAIL_PASSWORD=
    MAIL_ENCRYPTION=tls
    MAIL_FROM_ADDRESS=
    MAIL_FROM_NAME="${APP_NAME}"

6 php artisan migrate
7 npm run dev
8 php artisan queue:work - для запуска очередей(отправка верификации)

## php artisan insert:history - записать курс валют в историю