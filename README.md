## Youtube clone in Laravel 10
I built a NAS in my home to store my "very private" and "Homework" video files. i searched for open source project that will help me to just store a video watch it later something like youtube.  
  
  Maybe i will improve it later but if you like it, please leave a star. it will make want to improve it.

## How to use: 
- Requiremensts: PHP8.1+, Mysql, Composer (etc just like in a normal laravel project)
- RUN: `composer install --no-dev`
- create a .env by following the .env.example and set database config
- RUN: `php artisan generate:key && php artisan migrate`
- RUN: `php artisan storage:link`
- now start a server in the public path or start a dev server by `php artisan serve`