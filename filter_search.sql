SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `filter_search` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `filter_search`;

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `brands` (`id`, `name`) VALUES
(1, 'Red MI'),
(2, 'Samsung'),
(3, 'Apple'),
(4, 'OnePlus'),
(5, 'Nokia');


CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `products` (`id`, `brand_id`, `name`, `price`, `created_at`) VALUES
(1, 1, 'Red Mi Note 8', '100', '2023-11-28 21:52:36'),
(2, 1, 'Red Mi Note 7 PRO', '100', '2023-11-28 21:52:36'),
(3, 2, 'Samsung Galaxy S5', '100', '2023-11-28 21:52:36'),
(4, 2, 'Samsung Galaxy Note', '100', '2023-11-28 21:52:36'),
(5, 3, 'iPhone 6 Plus', '100', '2023-11-28 21:52:36'),
(6, 3, 'iPhone X', '100', '2023-11-28 21:52:36'),
(7, 4, 'OnePlus 6', '100', '2023-11-28 21:52:36'),
(8, 4, 'OnePlus 7 pro', '100', '2023-11-28 21:52:36'),
(9, 5, 'Nokia 3310', '100', '2023-11-28 22:18:41');

ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;