# Simple Blog System Concept - Laravel v11.30.0

### Ensure you have the following installed:
- PHP (version 8.2 or later)
- Composer (for PHP dependencies)
- Npm (for frontend dependencies and asset building)
- MySQL or PostgreSQL for local development

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

## What does the `setup.bat` and `setup.sh` do?

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
If you encounter any issues when running the setups scripts,
try executing these commands manually in the specified order.

## Unit tests & Feature tests

Use this command to run all the unit and feature tests:
```shell
php artisan test
```
**Note:** running the tests will refresh the database! </br> </br>
So you will need to manually re-seed it with this command:
```shell
php artisan db:seed
```
