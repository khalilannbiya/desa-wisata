# Desa Wisata Sukarame

Sukarame Tourist Village is a destination rich in natural beauty and local culture. To support effective management and promotion, an integrated information system has been developed. This system is designed to meet various needs for managing the tourist village, with key features such as user management, ensuring that only authorized personnel can access and manage sensitive data, destination management, allowing village managers to manage information about the various tourist destinations in Sukarame. Each destination can have a complete description, operating hours, ticket prices, available facilities, and directions. Managers can also add images to provide an attractive visual representation for prospective visitors. This information can be updated periodically to ensure accuracy and relevance, gallery management, allowing managers to upload and organize a collection of photos from various activities and the beauty of the tourist village, article management, enabling admins to create and publish articles on various topics related to the tourist village, event management, allowing the management of events, including descriptions, time, and location. With this system, Sukarame Tourist Village can improve management efficiency, visitor experience, and effective promotion of the village. This application was created using Laravel v11 and requires a minimum of PHP v8.2. Therefore, if you encounter any errors or bugs during the installation or usage process, it is possible that they are caused by an unsupported PHP version.

## Tech Stack

-   **Client :** Tailwind, Blade Template
-   **Server :** PHP with Laravel
-   **DBMS   :** MySQL

## Additional supporting details

- CK Editor, Sweet Alert, Yajra Datatables, Template Tailadmin, Template Tailwind Awesome, Flowbite, AOS (Animate on Scroll), GSAP, Boxicons, Chart Js, Laravel Breeze

## Run Locally

Clone the project

```bash
  git clone https://github.com/khalilannbiya/desa-wisata.git
```

Or Download ZIP

[Link](https://github.com/khalilannbiya/desa-wisata/archive/refs/heads/main.zip)

Go to the project directory

```bash
  cd desa-wisata
```

Run the command

```bash
  composer update
```

Or

```bash
  composer install
```

Copy the .env file from .env.example.

```bash
  cp .env.example .env
```

Please don't forget to create the 'db_desawisata' database in phpMyAdmin. The database name is up to you, but in this project, We are using that name.

Configuration in .env is for database setup

```bash
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=db_desawisata
  DB_USERNAME=root
  DB_PASSWORD=
```

If you are using Apache or Nginx as your web server, change "APP_URL" in the .env to the following, choose one according to your web server:

```bash
  // Apache
  APP_URL=http://desa-wisata.test

  // Nginx
  APP_URL=http://desa-wisata.test:8080
```

If you want to set the default timezone of your Laravel application to Asia or specifically Indonesia, make sure to change APP_TIMEZONE in .env to the following:

```bash
  APP_TIMEZONE=Asia/Jakarta
```

If you want to set the default language of your Laravel application to Indonesian, make sure to change APP_LOCALE in .env to the following:

```bash
  APP_LOCALE=id
```

Generate key

```bash
  php artisan key:generate
```

Create symlink

```bash
  php artisan storage:link
```

Migrate database

```bash
  php artisan migrate
```

Run User Seeder

```bash
  php artisan db:seed --class=UserSeeder
```

Install node_modules

```bash
  npm i
```

Run npm run dev

```bash
  npm run dev
```

Run the application, make sure the web server is running

```bash
  // If you are using Apache, enter the following URL in your web browser:
  http://desa-wisata.test

  // If you are using Nginx, enter the following URL in your web browser:
  http://desa-wisata.test:8080
```

Another way to run the application is to use the command php artisan serve. Take the URL from the command output and enter it in your web browser

## Documentation

-   [Tailwind](https://tailwindcss.com/docs/installation)
-   [Blade Template](https://laravel.com/docs/11.x/blade)
-   [Laravel](https://laravel.com/docs/11.x)
-   [CK Editor 4](https://ckeditor.com/docs/ckeditor4/latest/guide/dev_installation.html)
-   [Sweet Alert](https://realrashid.github.io/sweet-alert/)
-   [Yajra Datatables](https://yajrabox.com/docs/laravel-datatables/master/installation)
-   [Template Tailadmin](https://tailadmin.com/)
-   [Tailwind Awesome](https://www.tailwindawesome.com/)
-   [Flowbite](https://flowbite.com/)
-   [AOS](https://michalsnik.github.io/aos/)
-   [GSAP](https://gsap.com/)
-   [Boxicons](https://boxicons.com/)
-   [Chart Js](https://www.chartjs.org/)
-   [Laravel Breeze](https://laravel.com/docs/11.x/starter-kits#laravel-breeze)

## Features

-   User Management
-   Login
-   Destination Management
-   Event Management
-   Article Management
-   Light/dark mode toggle at CMS

## Screenshots
![Beranda-Desa-Wisata-Sukarame](https://github.com/user-attachments/assets/53911628-a8ef-4bc6-9728-e72053225eab)
![Tempat-Wisata-Desa-Wisata-Sukarame](https://github.com/user-attachments/assets/2298fa3f-49a8-4fa0-9aec-d52e835326c6)
![Desa-Wisata-Sukarame](https://github.com/user-attachments/assets/a00c7c3d-8e05-49ce-ac48-768aad162c06)
![Data-Wisata-Desa-Wisata-Sukarame](https://github.com/user-attachments/assets/46e49171-f408-4171-b76c-7bdfb0ff2374)
![Desa-Wisata-Sukarame (1)](https://github.com/user-attachments/assets/eb4d8121-3075-47d8-bfe6-cbad19e282c0)


## Authors

- [@khalilannbiya](https://www.github.com/khalilannbiya)
- [@slamets24](https://github.com/slamets24)
- [@ramdhannassyirah](https://github.com/ramdhannassyirah)
- [@annisa-ozka](https://github.com/annisa-ozka)

## Feedback

If you have any feedback, please reach out to us at syeichkhalil@gmail.com
