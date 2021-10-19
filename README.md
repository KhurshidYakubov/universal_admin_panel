

## About

This project is a convenient Content Management System(CMS) for your website. It contains all CRUD functionalities for creating wide range of posts including dynamic control over them.  

It has been integrated with Uzbekistan's National Identification System [OneID](https://id.egov.uz/). Authentification of your users will be produced through this system. This integration gives you an advantage to use reliable information of your users and gets around spammer users.

## Requirements

- Installed PHP7.4 or above
- Installed composer
- Installed MySQL 
- Installed Git
- Some experience with PHP, Laravel, MySQL, Composer and Git
- client_id and client_secret from [OneID](https://id.egov.uz/) (optional)
    
    **P.S If you don't need integration with OneID just change the logic of auth as you need :)**

## Installation
- Firstly, clone the project:

```shell
git clone https://github.com/KhurshidYakubov/universal_admin_panel.git
```


- In your terminal/cmd change your directory to project directory:

```shell
cd universal_admin_panel
```


- While you are in root directory of the project you have to install all required packages:

```shell
composer install
```


- Copy _.env.example_ as _.env_:

```shell
cp .env.example .env
```


- In your _.env_ write your Database credentials:
**Example:**
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=database_user
DB_PASSWORD=database_password
```


- Generate key:
```shell
php artisan key:generate
```


- Run migration along **seeders**
```shell
php artisan migrate --seed
```


- Finally, run the project:
```shell
php artisan serve
```
