<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

# My Movie Project

## Project Overview
My Movie is a movie blog platform where admins can post movie reviews, manage user roles, and interact with users. Visitors and registered users can browse posts, view profiles, and interact with content. The platform also includes an FAQ section, a contact form, and user profile management.

## Steps to Set Up the Project
### 1.Pre-requisites:

Install XAMPP.
Install Composer.
Install Node.js.

### 2.Clone the Repository:
 ```url
     git clone <https://github.com/Samia-almtlek/MyMovie.git>
 ```
 ``` bash
cd MyMovie
 ```
 
### 3.Configure XAMPP:

1.Start Apache and MySQL in XAMPP.

Ensure you have a .env file in the root directory (create one if it doesn’t exist).

2.Update the Database Configuration:

Open the .env file and update the following values to match your phpMyAdmin setup:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=root
DB_PASSWORD=your_password
Replace your_database_name with the name of your database.


### 4.install Dependencies:

``` bash
نسخ
تحرير
composer install
npm install
npm run dev
```
### 5.Run Migrations and Seeders:

``` bash
نسخ
تحرير
php artisan migrate --seed
```
### 6.Serve the Application:

``` bash
تحرير
php artisan serve
```
### 7.Access the Application:
``` url
Open http://127.0.0.1:8000 in your browser.
```

# Project Features

## For Visitors
- **Browse Blog Posts**
  - View all posts with details:
    - Title
    - Description
    - Genre
    - Release year
    - Tags
    - Admin's review
    - Image
  - Explore the latest movie reviews and updates.

- **View Public Profiles**
  - Access profiles of all users (admins or regular users).
  - View profile information such as:
    - Name
    - Bio
    - Birthdate
    - Profile photo.

- **FAQs and Categories**
  - Browse frequently asked questions categorized for easy navigation.

- **Contact Form**
  - Submit queries via the contact form.

## For Registered Users
- **Personal Profile**
  - Edit personal details including:
    - Username
    - Bio
    - Birthdate
    - Upload a profile picture.

- **Commenting on Posts**
  - Share opinions on movies by commenting on blog posts.
  - Comments are visible to all visitors.

- **Password Recovery**
  - Recover accounts via the email-based password reset feature.

## For Admins
- **Manage Blog Posts**
  - Create, edit, or delete posts.
  - Include title, description, genre, release year, tags, personal review, and an image.

- **Manage User Roles**
  - Assign or revoke admin privileges for any user.
  - Create new users with defined roles (admin or regular user).

- **Manage FAQs and Categories**
  - Add, edit, or delete FAQs.
  - Organize FAQs under existing categories or create new ones.

- **Contact Form Management**
  - Respond to visitor queries submitted via the contact form.
  - 

# Source References

- **Chatgpt:**  

- **Laravel Documentation:**  
  [https://laravel.com/docs](https://laravel.com/docs)

- **Bootstrap Framework:**  
  [https://getbootstrap.com](https://getbootstrap.com)

- **Font Awesome for Icons:**  
  [https://fontawesome.com](https://fontawesome.com)

- **Educational Resources:**
  - [YouTube Tutorial: Laravel Beginner Guide](https://youtu.be/f6uQfOw2_6o?si=WqyGibAhWW9Pe-Tv)
  - [YouTube Tutorial: Build a Blog with Laravel](https://www.youtube.com/watch?v=6hgBFDTTwEk&t=0s)
  - [YouTube Tutorial: Complete Laravel Project](https://www.youtube.com/watch?v=J20l1RGyIZE)
  - [Laravel 11 Update User Profile Tutorial Example](https://www.itsolutionstuff.com/post/laravel-11-update-user-profile-tutorial-exampleexample.html#)
 

# Note
* Ensure XAMPP is running with Apache and MySQL services before starting the application.
* In the default seeder, no image has been set for the default posts. This gives you an opportunity to test the "Edit Post" functionality by uploading your own image for the post :).

