composer require filament/filament:"^3.2" -W
php artisan filament:install --panels
php artisan make:filament-user
php artisan filament:optimize
php artisan filament:optimize-clear


php artisan vendor:publish --tag=filament-config
php artisan vendor:publish --tag=filament-views
"# filament3" 
