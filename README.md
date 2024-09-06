# MVC PHP Routing & Middleware Project

This project is a simple MVC structure built with PHP, implementing custom routing and middleware. The routing system supports dynamic parameters, optional parameters, and regex patterns. Middleware can be used to handle requests before controllers are executed.

## Features

- MVC architecture
- Custom routing with support for dynamic and optional parameters
- Middleware for request handling
- PDO-based database connection
- Multi-type content response (JSON, plain text)
- Simple templating engine for views

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/yourusername/yourprojectname.git
    ```

2. Navigate to the project directory:
    ```bash
    cd yourprojectname
    ```

3. Set up the database configuration:
    - Edit the `config/config.php` file with your database credentials:
    ```php
    <?php
    return [
        'db_host' => 'localhost',
        'db_name' => 'your_database_name',
        'db_user' => 'your_username',
        'db_pass' => 'your_password',
    ];
    ```

4. Set up the web server:
    - You can use the built-in PHP server for development:
    ```bash
    php -S localhost:8000
    ```

5. Visit the application:
    Open your browser and go to `http://localhost:8000`

## Directory Structure

