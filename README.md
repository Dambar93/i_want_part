How to start:

1. Turn on your favorite editor, also don't forget that you will need Docker to run this project.
2. Commands and things to do order that you'll need to run this project: 
    2.1 git clone https://github.com/Dambar93/i_want_part
    2.2 composer install
    2.3 Copy .env.examlpe and rename it to .env
    2.4 ./vendor/bin/sail up
    2.5 ./vendor/bin/sail bash or sudo ./vendor/bin/sail bash
        2.5.1. php artisan migrate:fresh --seed 
    2.6 In your browser write http://localhost/login
        username: admin@admin.admin
        password: 12345678

For front-end you'll need other repository: 
https://github.com/Dambar93/front-end-project

