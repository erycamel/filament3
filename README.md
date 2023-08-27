git config --global user.name "Ery Camel"
git config --global user.email "erycamel@gmail.com"
ssh-keygen -t ed25519 -C "erycamel@gmail.com"

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

