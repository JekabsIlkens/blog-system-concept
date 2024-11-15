<h1>
    <img align="left" alt="CIS-LOGO" width="40px" src="https://i.postimg.cc/bNnmBR2n/logo.png"/>
    Blog System Concept - Laravel v11.30.0
</h1>

### Ensure you have the following installed:
- PHP (version 8.2 or later)
- Composer (for PHP dependencies)
- Node/npm (for frontend dependencies and asset building)
- MySQL or PostgreSQL (for a local database server)

## Instructions on how to install and run the application

### Clone the repository on your local machine and step into the project directory:
```shell
git clone https://github.com/JekabsIlkens/blog-system-concept.git

cd blog-system-concept
```

### Open .env.example and configure the database credentials to match your local setup:
```shell
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

### Make sure you have the following extensions enabled in your `php.ini` file:
```shell
extension=pdo_mysql
extension=pdo_pgsql
```

### Run the setup script to install dependencies and prepare the database:
For Windows systems:
```shell
setup.bat
```
For Mac & Linux systems:
```shell
chmod +x setup.sh

./setup.sh
```

### Launch the local development server:
```shell
php artisan serve
```
Visit http://127.0.0.1:8000/

## What's inside the setup:

It executes all the necessary setup commands in order:
```shell
copy .env.example .env              # Creates the environment configuration file
composer install                    # Installs the required PHP dependencies
npm install                         # Installs the required front-end dependencies
npm run build                       # Builds the required front-end assets
php artisan key:generate            # Generates the application key
php artisan migrate                 # Runs the database migrations
php artisan db:seed                 # Seeds the database
```
If you encounter any issues when running the setup script,
execute these commands manually in the specified order.

## Running unit and feature tests:

```shell
php artisan test
```
**Note:** running the tests will refresh the database!
You will need to manually re-seed it with `php artisan db:seed`.

## App showcase:

<img src='https://i.postimg.cc/xddWb0sS/1.png' alt='page-landing' width="1200px"/> <br/>
<img src='https://i.postimg.cc/Hn5ZD9Vj/2.png' alt='page-register' width="1200px"/> <br/>
<img src='https://i.postimg.cc/jSR8mNKd/3.png' alt='page-login' width="1200px"/> <br/>
<img src='https://i.postimg.cc/mr6KY0q1/4.png' alt='page-discover' width="1200px"/> <br/>
<img src='https://i.postimg.cc/3Rs6623K/5.png' alt='page-search' width="1200px"/> <br/>
<img src='https://i.postimg.cc/Fz0qQ1K0/6.png' alt='page-write' width="1200px"/> <br/>
<img src='https://i.postimg.cc/HWMFMvtj/7.png' alt='page-own-post' width="1200px"/> <br/>
<img src='https://i.postimg.cc/7Yydn1B9/8.png' alt='page-other-post-comment' width="1200px"/> <br/>
