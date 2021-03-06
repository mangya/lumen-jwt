# Lumen JWT

Lumen (v8.x) API boilerplate with JSON Web Token Authentication

## Prerequisites

1. ```Composer (Dependency Manager for PHP)```
2. ```PHP >= 8.0```
3. ```MySQL >= 8.0```
4. ```OpenSSL PHP Extension```
5. ```PDO PHP Extension```
6. ```Mbstring PHP Extension```
7. ```Postman (To test your endpoints)```

## Quick start

1. Clone the repository with `git clone https://github.com/mangya/lumen-jwt.git <your_project_folder_name>`
2. Change directory to your project folder `cd <your_project_folder_name>`
3. Install the dependencies with `composer install`
4. Create database in MySQL.
5. Update the your database name and credentials in the `.env` file.
6. Create database tables and sample data with `php artisan migrate:refresh --seed`
7. Run the application with `php -S localhost:8000 -t public` (MySQL service should be up and running).
8. Access `http://localhost:8000` and you're ready to go!

## API Endpoints

#### Register
```http
POST /api/register
```
| Parameter | Type | Description |
| :--- | :--- | :--- |
| `name` | `string` | **Required**. Your Name |
| `email` | `string` | **Required**. Your Email |
| `password` | `string` | **Required**. Your Password |
| `password_confirmation` | `string` | **Required**. Same as password |

#### Login
```http
POST /api/login
```
| Parameter | Type | Description |
| :--- | :--- | :--- |
| `email` | `string` | **Required**. Your Email |
| `password` | `string` | **Required**. Your Password |

All API requests under `auth` middleware require a bearer roken in the Authorization header.

## License

The Lumen JWT is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

<img alt="Laravel" src="https://img.shields.io/badge/lumen-%23FF2D20.svg?&style=for-the-badge&logo=lumen&logoColor=white"/><img alt="MySQL" src="https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white"/><img alt="PHP" src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white"/>

Thank you 😊
