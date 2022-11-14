#!/bin/bash
php artisan db:wipe

php artisan migrate --path=/database/migrations/System
php artisan migrate --path=/database/migrations/Aux
php artisan migrate --path=/database/migrations/Auth
php artisan migrate --path=/database/migrations/Postsystem

php artisan migrate --seed
