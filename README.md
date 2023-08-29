git config --global user.name "Ery Camel"
git config --global user.email "erycamel@gmail.com"
ssh-keygen -t ed25519 -C "erycamel@gmail.com"

php artisan storage:link

php artisan vendor:publish --tag=filament-config

php artisan make:model Category -m
php artisan make:model Brand -m
php artisan make:model Product -m
php artisan make:model Customer -m
php artisan make:model Order -m
php artisan make:model OrderItems -m
php artisan make:migration create_category_product_table
php artisan migrate:fresh
php artisan make:filament-resource Product
php artisan make:filament-resource Brand
php artisan make:filament-resource Customer
php artisan make:filament-resource Order
php artisan make:filament-resource Category


Install Laravel-permission
----------------------------------------------
composer require spatie/laravel-permission
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan optimize:clear
php artisan config:clear
php artisan migrate
=> Add the necessary trait to your User model





php artisan make:filament-resource CategoryNilai --simple
php artisan make:filament-resource Periode --simple
php artisan make:filament-resource Teacher
