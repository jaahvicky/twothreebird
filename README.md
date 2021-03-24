## Two Three Bird Assessment

This is a laravel framework cms template for two three bird assessment 


## Installation
cron the project using the git clone command 
make sure you have php version => 7.1.3
composer install
mysql 

## Step 1
To install all the required modules run
```bash
composer install
```

## Step 2
copy the env.example and create a file called .env
put your database details {database name, database user, database password}
put your mail host details (this is important for the system to send emails)

## Step 3
To generate a laravel key run
```bash
php artisan key:generate
```

## Step 4
To do database migration and seed run
```bash
php artisan migrate:refresh --seed
```
## Optional
If the above step throws error for missing file or class run below command 
```bash
composer dump-autoload -o
```

## Step 5
To run the application run 
```bash
php artisan serve
```

Please follow all the steps above.
## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
