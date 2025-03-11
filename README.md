# Project Overview

This project has been developed based on the knowledge I have acquired over the past three days. It incorporates the following features:

## Features and Functionality

### Product List:

- Developed using **Vue.js** integrated with **Laravel**.
- Data is fetched from an API (via a controller that will be implemented).
- A keyword search feature is implemented, allowing users to search for products by name or description.
- Products can be filtered by category.
- The product list is paginated for better usability.
- Products can be removed from the list.

### Create Product:

- The **Product List** includes a "Create" button, which redirects the user to a page called "Create Product."
- A link to the "Create Product" page is available in the dashboard sidebar.
- The **Create Product** page contains a form built using Laravel, which is broken down into two steps:
  - **Step 1:**
    - **Fields:**
      - Name (Text Field)
      - Category (Select Dropdown)
      - Description (HTML Editor)
    - Form validation ensures that all required fields are completed before proceeding to the next step.
  - **Step 2:**
    - **Fields:**
      - Date and Time (Date Picker)
    - Once the form is completed, the data is submitted, and the new product is saved in the Product database.
    - Upon successful creation, the user is redirected back to the **Product List** page, where the newly created product will be visible.
    - The **Product List** page also includes an **Edit** button for each product, allowing users to update product details via a form similar to the **Create Product** form.

### Video Player Component:

- A video player component has been implemented using **Laravel**.

## Database Configuration

Please ensure you update the `.env` file with your local MySQL password for proper database connectivity.

## To run the project, execute the following commands:

```bash
npm install
composer install

```
## Rename .env.example to .env

## Put your localhost password in DB_PASSWORD in .env

```bash
php artisan key:generate
npm run dev

```
## Setup your mysql privileges to run it into your localhost

```bash
sudo mysql

GRANT ALL PRIVILEGES ON *.* TO 'root'@'localhost' IDENTIFIED BY 'm3passw0rd' WITH GRANT OPTION;
FLUSH PRIVILEGES;

```

## Sreate new terminal

```bash
php artisan serve

```
## To populate the database with the initial 20 product records, run the following command:

```bash
php artisan db:seed --class=ProductTableSeeder0