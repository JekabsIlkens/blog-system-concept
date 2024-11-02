@echo off

echo "Copying .env.example to .env..."
if not exist .env (
    copy .env.example .env
    echo ".env file created."
) else (
    echo ".env file already exists. Skipping copy."
)

echo "Installing PHP dependencies..."
call composer install --no-interaction
if errorlevel 1 (
    echo "Composer installation failed."
    exit /b
)

echo "Installing frontend dependencies..."
call npm install
if errorlevel 1 (
    echo "NPM installation failed."
    exit /b
)

echo "Building frontend assets..."
call npm run build
if errorlevel 1 (
    echo "Building frontend assets failed."
    exit /b
)

echo "Generating application key..."
call php artisan key:generate
if errorlevel 1 (
    echo "Generating application key failed."
    exit /b
)

echo "Running database migrations..."
call php artisan migrate
if errorlevel 1 (
    echo "Running migrations failed."
    exit /b
)

echo "Seeding the database..."
call php artisan db:seed
if errorlevel 1 (
    echo "Database seeding failed."
    exit /b
)

echo "Setup complete! You can now run the application using - php artisan serve"
pause
