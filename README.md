# PPOB Laravel API - Anihost

Build with laravel 10

## Installation

Follow the steps below to install this project:

1. **Install Composer dependencies**:

    ```bash
    composer install
    ```

2. **Install NPM dependencies**:

    ```bash
    npm install
    ```

3. **Compile front-end assets**:

    ```bash
    npm run dev
    ```

4. **Copy `.env` file**:

    ```bash
    cp .env.example .env
    ```

5. **Generate application key**:

    ```bash
    php artisan key:generate
    ```

6. **Generate JWT secret**:

    ```bash
    php artisan jwt:secret
    ```

7. **Set up environment variables**:

    Add the following lines to your `.env` file:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=

    MIDTRANS_CLIENT_KEY=your_midtrans_client_key
    MIDTRANS_SERVER_KEY=your_midtrans_server_key

    HOST_MASTER_DATA=your_master_data_host
    MASTER_DATA_APIKEY=your_master_data_api_key
    ```

8. **Run the application**:

    Start the Laravel server:

    ```bash
    php artisan serve
    ```

Your project is now ready and accessible at `http://localhost:8000`.

To extend your `README.md` with instructions for creating API and web controllers using custom commands (`make:controller-api` and `make:controller-web`), here's how you can describe it in English:

---

# Creating Controllers

### 1. Creating an API Controller

To create an API controller that extends the `ApiController`, use the custom command:

```bash
php artisan make:controller-api YourControllerName
```

This command will generate a controller within the `App\Http\Controllers\API` namespace, extending the `ApiController`. If you omit the "Controller" suffix in the name, it will automatically add "Controller" at the end. For example:

```bash
php artisan make:controller-api CategoryController
```

This will generate the following controller:

```php
<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;

class CategoryController extends ApiController
{
    //
}
```

### 2. Creating a Web Controller

To create a web controller that extends the default `Controller` class, use the custom command:

```bash
php artisan make:controller-web YourControllerName
```

This command will generate a controller within the `App\Http\Controllers\Web` namespace, extending the `Controller` class. Similarly, if you don't provide the "Controller" suffix, it will be added automatically. For example:

```bash
php artisan make:controller-web ProductController
```

This will generate the following controller:

```php
<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    //
}
```
