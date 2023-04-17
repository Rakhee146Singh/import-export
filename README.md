## Import - Export Csv File 

## Create new project
composer create-project laravel/import-export

## download package 
composer require maatwebsite/excel


## Providers and aliases in config
# app.php

'providers' => [
  Maatwebsite\Excel\ExcelServiceProvider::class,
 ],  


'aliases' => [ 
  'Excel' => Maatwebsite\Excel\Facades\Excel::class,
],

# execute vendor,publish the command
php artisan vendor:publish --provider="Maatwebsite\Excel\ExcelServiceProvider" --tag=config


# generate fake data and migrate table
php artisan migrate


# Use tinker for fake data 
php artisan tinker

 # After opening tinker you need to run this command for generating fake records
User::factory()->count(100)->create();

# Create Import Class
php artisan make:import ImportUser --model=User

# Create Export Class
php artisan make:export ExportUser --model=User
