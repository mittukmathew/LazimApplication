# Task Management Application

This is a Task Management Application built using Laravel that supports CRUD (Create, Read, Update, Delete) operations and user login functionality.

## Table of Contents

1. [Features](#features)
2. [Installation](#installation)
3. [Configuration](#configuration)
4. [Usage](#usage)
5. [Endpoints](#endpoints)
6. [Testing](#testing)

## Features

- User Registration and Login
- Create, Read, Update, and Delete Tasks with image for specific task (There is a title,boby and image uploadeing field for specific task)
- User-specific Task Management
- Secure Authentication using Laravel's built-in Auth features
- Responsive and intuitive user interface

## Installation

1. download the latest laravel version.

## Install the dependencies:
composer install
npm install

## Copy the environment file and configure it:
cp .env.example .env

## Generate the application key:
php artisan key:generate

## Run the migrations:
php artisan migrate

## Seed the database (optional):

php artisan db:seed

## Start the local development server:
php artisan serve

 ## Configuration
Environment Variables: Configure your .env file with the necessary details such as database connection, mail settings, and any third-party services.
Database: Set your database connection details (DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD).
Mail: Configure your mail settings to enable email notifications.
Usage
User Registration and Login:

Register a new user at /register.
Login at /login.
Task Management:

 # Create a new task.
View a list of your tasks.
Update existing tasks.
Delete tasks.

## Endpoints
Here are the main endpoints of the application:

GET /: Home page
GET /login: User login page
POST /login: Authenticate user
GET /register: User registration page
POST /register: Register new user
GET /getBlog: List all tasks (requires authentication)
POST /createBlog: Store new task (requires authentication)
GET /getBlogById/{id}: Show specific task (requires authentication)
PUT /updateBlogById/{id}: Update task (requires authentication)
DELETE /blogDelete/{id}: Delete task (requires authentication)
POST /logout: logout the user(requires authentication)

# Testing
Run the test suite to ensure your application works as expected:

1 . Unit Tests:
php artisan test

2. Feature Tests:

php artisan test --group=Feature
