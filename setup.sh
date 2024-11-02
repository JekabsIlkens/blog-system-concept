#!/bin/bash

echo "Copying .env.example to .env..."
if [ ! -f .env ]; then
    cp .env.example .env
    echo ".env file created."
else
    echo ".env file already exists. Skipping copy."
fi

echo "Installing PHP dependencies..."
composer install --no-interaction
if [ $? -ne 0 ]; then
    echo "Composer installation failed."
    exit 1
fi

echo "Installing frontend dependencies..."
npm install
if [ $? -ne 0 ]; then
    echo "NPM installation failed."
    exit 1
fi

echo "Building frontend assets..."
npm run build
if [ $? -ne 0 ]; then
    echo "Building frontend assets failed."
    exit 1
fi

echo "Generating application key..."
php artisan key:generate
if [ $? -ne 0 ]; then
    echo "Generating application key failed."
    exit 1
fi

echo "Running database migrations..."
php artisan migrate
if [ $? -ne 0 ]; then
    echo "Running migrations failed."
    exit 1
fi

echo "Seeding the database..."
php artisan db:seed
if [ $? -ne 0 ]; then
    echo "Database seeding failed."
    exit 1
fi

echo "Setup complete! You can now run the application using - php artisan serve"
