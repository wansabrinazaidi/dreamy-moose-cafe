# Dreamy Moose: Cafe Ordering System

*"Where coffee meets comfort"*

Dreamy Moose is a web-based ordering system for a cafe. Customers browse the menu, add items to a cart and check out. Staff manage the menu and handle incoming orders from an admin dashboard.

Built with **PHP**, **MySQL/MariaDB**, **HTML/CSS/JavaScript** and **SweetAlert**, and runs on **XAMPP**.

## Features

**Customer**
- Sign up and log in with a username or email
- Browse the menu by category: Coffee, Non-Coffee, Frappe, Pastries and Hot Meals
- Choose items, set quantities and manage a cart
- Order summary with payment method (online banking or cash)
- View pending orders and delivery details
- Contact page

**Admin**
- Admin login and admin registration
- Dashboard overview
- Menu management: add items with image upload, update items and remove items
- View pending orders with customer and item details, then confirm or delete them
- Organization page

**Security**
- Prepared statements for logins and admin actions to prevent SQL injection
- Numeric IDs and payment values validated before they reach the database
- Session-based access control on every admin page and admin AJAX endpoint

## Project structure

```
CafeOrderingSystem/
├── index.php            Landing page
├── customer_login.php   Customer login
├── signup.php           Customer registration
├── menu.php             Menu by category
├── selectedMenu.php     Item details and add to cart
├── cart.php             Cart
├── OrderSummary.php     Checkout and payment method
├── order-details.php    Customer's pending orders
├── contact.php          Contact page
├── query/               AJAX endpoints for placing orders
├── admin/
│   ├── index.php        Admin login
│   ├── dashboard.php    Admin dashboard
│   ├── menu.php         Menu overview
│   ├── additem.php / updateitem.php / removeitem.php
│   ├── orderdetails.php Order management
│   └── query/           AJAX endpoints for order status
└── coffeeshop.sql       Database schema and demo data
```

## Running it locally

1. Install [XAMPP](https://www.apachefriends.org/) and start **Apache** and **MySQL**.
2. Copy this folder into `xampp/htdocs/`.
3. Open phpMyAdmin, create a database named **`coffeeshop`**, and import `coffeeshop.sql`.
4. Customer site: `http://localhost/CafeOrderingSystem/customer_login.php`
5. Admin panel: `http://localhost/CafeOrderingSystem/admin/`

Demo accounts:

| Role | Username | Password |
|---|---|---|
| Admin | `admin` | `admin123` |
| Customer | `demo` | `demo123` |
