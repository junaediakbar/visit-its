<div align="center">
  <h1>Visit ITS </h1>
  <p> Visitor Request Management use Fullstack Laravel, Mysql, and Authentication </p>
</div>

## Features

-   🔑 Role Based Authentication (User and Admin)
-   🛒 Transactions Management
-   📦 Customers Management
-   🧾 Log Activites tracking

## Getting Started

1. Clone this repository

    ```bash
    git clone https://github.com/junaediakbar/visit-its.git
    ```

2. Copy .env.example to .env and set your Database

3. Install dependencies

    ```bash
    composer install
    ```

4. Generate key
    ```bash
    php artisan generate:key
    ```
5. Migrate database

    ```bash
    php artisan migrate
    ```

    \*If needed seed the seeding data

    ```bash
    php artisan db:seed
    ```

6. Run it on your machine

    ```bash
    php artisan serve
    ```

## Built With

-   Laravel (Fullstack)
-   MySQL
-   Figma for design UI
-   Bootstrap for css library

## Documentations

#### Login

![Login](<https://ik.imagekit.io/ctrnlvyl1p/Evits-ss/Screenshot%20(554).png?updatedAt=1713545455349>)

#### About

![About](<https://ik.imagekit.io/ctrnlvyl1p/Evits-ss/Screenshot%20(555).png?updatedAt=1713545450575>)

#### My Visit (User)

![Visits](https://ik.imagekit.io/ctrnlvyl1p/Evits-ss/ss-user.jpg?updatedAt=1713545465149)

#### Manage Request Visits (Admin)

![Visits](https://ik.imagekit.io/ctrnlvyl1p/Evits-ss/ss-admin.jpg?updatedAt=1713545459852)
