# Simple API with Laravel and JWT



## Guide


### Installation

> $ git clone git@github.com:tambakdev/Laravel-JWT.git your-project

> $ cd your-project && composer install

> $ cp .env.example .env

Create new database and setup your .env file to connecting with your new database

Run command ``` $ php artisan migrate ``` 

To create user example, run command ``` $ php artisan db:seed ``` and run server with ``` $ php artisan serve ```

### Test your API
Open Postman or your favourite api tester app

``` http://127.0.0.1:8000/api/ ```

**Login :** http://127.0.0.1:8000/api/login (POST)
<br>
**Profile :** http://127.0.0.1:8000/api/profile (GET)

For detail please check api.php file
 

## To Do (Maybe)

1. Permission
2. Avatar
3. Whatever you want

Thankyou...