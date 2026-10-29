-- Dreamy Moose Cafe Ordering System: database schema
-- Database: `coffeeshop` (MariaDB 10.4 / MySQL)
--
-- Import in phpMyAdmin: create a database named `coffeeshop`, then Import this file.

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
SET NAMES utf8;

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_name` varchar(50) NOT NULL,
  `cust_phonenum` varchar(50) NOT NULL,
  `cust_address` varchar(50) NOT NULL,
  `cust_email` varchar(50) NOT NULL,
  `cust_password` varchar(50) NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `menu_price` varchar(50) NOT NULL,
  `menu_category` varchar(50) NOT NULL,
  `menu_ingredients` varchar(50) NOT NULL,
  `menu_recipe` varchar(50) NOT NULL,
  `menu_image` varchar(100) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` varchar(50) NOT NULL,
  `order_placetime` varchar(50) NOT NULL,
  `order_date` varchar(50) NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `payment` (
  `pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `total` varchar(50) NOT NULL,
  `pay_method` varchar(50) NOT NULL,
  `pay_status` varchar(50) NOT NULL,
  `pay_date` varchar(50) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `delivery` (
  `delivery_id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` varchar(50) NOT NULL,
  `delivery_date` varchar(50) NOT NULL,
  `delivery_time` varchar(50) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`delivery_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `inventory` (
  `inventory_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  PRIMARY KEY (`inventory_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------
-- Demo data
-- --------------------------------------------------------

INSERT INTO `admin` (`admin_name`, `position`, `date`, `admin_email`, `admin_password`, `inventory_id`) VALUES
('admin', 'Manager', '2024-06-01', 'admin@example.com', 'admin123', 0);

INSERT INTO `customer` (`cust_name`, `cust_phonenum`, `cust_address`, `cust_email`, `cust_password`) VALUES
('demo', '0123456789', 'Shah Alam, Selangor', 'demo@example.com', 'demo123');

INSERT INTO `menu` (`menu_name`, `description`, `menu_price`, `menu_category`, `menu_ingredients`, `menu_recipe`, `menu_image`, `date`) VALUES
('Iced Latte', 'Smooth espresso over cold milk and ice', '9.50', 'coffee', 'Espresso, fresh milk, ice', 'Pour espresso over iced milk', 'cof1.jpg', '2024-06-22'),
('Iced Matcha Latte', 'Japanese matcha with creamy milk', '11.00', 'non-coffee', 'Matcha, fresh milk, ice', 'Whisk matcha, pour over iced milk', 'non1.jpg', '2024-06-22'),
('Biscoff Frappe', 'Blended Lotus Biscoff with whipped cream', '14.90', 'frappe', 'Biscoff spread, milk, ice, cream', 'Blend, top with cream and biscuit', 'frp1.jpg', '2024-06-22'),
('Butter Croissant', 'Flaky, golden butter croissant', '6.50', 'pastries', 'Flour, butter, yeast', 'Laminate dough, proof, bake', 'pas2.jpg', '2024-06-22'),
('Spaghetti Carbonara', 'Creamy carbonara with beef bacon', '18.90', 'hot-meals', 'Spaghetti, cream, beef bacon', 'Toss pasta in carbonara sauce', 'hot1.jpg', '2024-06-22');
