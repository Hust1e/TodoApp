Todo app
Environment: 
PHP 8.1.12
Laravel 9.39.0
Vite + bootstrap5

Проект был разработан через Docker и Laravel Sail из под Ubuntu 20.04.


Команды для развертки проекта:

`docker-compose up`  
`docker ps`  
`docker exec -it {id} /bin/sh`  
`composer install`  
`cp .env.example .env`

Если возникли проблемы с правами:  
`sudo chmod 775 -R ./`

Если возникли проблемы с созданием миграции то в .env стоит поменять:  
`DB_HOST=127.0.0.1 на DB_HOST=mysql`  
и перезагрузить контейнеры.

`alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'`  
`sail php artisan migrate`

В проекте есть готовые фабрики для заданий и пользователей.  
`sail php artisan db:seed`  

Так же для удобства тестирования функционала в фабрике есть готовый пользователь  
`email: user@mail.ru
password: 123`  

В проекте есть Feature тесты  
`sail php artisan test`
