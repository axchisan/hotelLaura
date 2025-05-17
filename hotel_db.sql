-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 25-03-2025 a las 19:09:39
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hotel_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `guest_name` varchar(100) NOT NULL,
  `guest_email` varchar(100) NOT NULL,
  `guest_phone` varchar(20) NOT NULL,
  `check_in_date` datetime NOT NULL,
  `expected_check_out_date` date NOT NULL,
  `check_out_date` datetime DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `status` enum('active','completed','cancelled') NOT NULL DEFAULT 'active',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `bookings`
--

INSERT INTO `bookings` (`id`, `room_id`, `guest_name`, `guest_email`, `guest_phone`, `check_in_date`, `expected_check_out_date`, `check_out_date`, `total_amount`, `status`, `created_by`, `created_at`) VALUES
(2, 4, 'Angie', 'fandinoangie4@gmail.com', 'N/A', '2025-03-23 14:00:00', '2025-03-24', '2025-03-24 00:49:55', 150.00, 'completed', 5, '2025-03-23 20:53:52'),
(3, 1, 'Angie', 'fandinoangie4@gmail.com', 'N/A', '2025-03-23 14:00:00', '2025-03-24', '2025-03-23 22:43:00', 100.00, 'completed', 5, '2025-03-23 21:42:42'),
(4, 3, 'Angie', 'fandinoangie4@gmail.com', 'N/A', '2025-03-24 14:00:00', '2025-03-25', '2025-03-24 00:49:58', 100.00, 'completed', 5, '2025-03-23 23:49:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_number` varchar(10) NOT NULL,
  `room_type` enum('standard','deluxe','suite') NOT NULL,
  `capacity` int(11) NOT NULL,
  `price_per_night` decimal(10,2) NOT NULL,
  `features` text DEFAULT NULL,
  `status` enum('available','occupied','maintenance') NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rooms`
--

INSERT INTO `rooms` (`id`, `room_number`, `room_type`, `capacity`, `price_per_night`, `features`, `status`) VALUES
(1, '101', 'standard', 2, 100.00, 'Wi-Fi, TV, Air Conditioning', 'available'),
(2, '102', 'standard', 2, 100.00, 'Wi-Fi, TV, Air Conditioning', 'available'),
(3, '103', 'standard', 2, 100.00, 'Wi-Fi, TV, Air Conditioning', 'available'),
(4, '201', 'deluxe', 3, 150.00, 'Wi-Fi, TV, Air Conditioning, Mini Bar, Balcony', 'available'),
(5, '202', 'deluxe', 3, 150.00, 'Wi-Fi, TV, Air Conditioning, Mini Bar, Balcony', 'available'),
(6, '301', 'suite', 4, 250.00, 'Wi-Fi, TV, Air Conditioning, Mini Bar, Balcony, Living Room, Jacuzzi', 'available');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','receptionist','admin') NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Admin User', 'admin@hotel.com', '$2y$10$8zUlxQxkK2LiBm4m9KbYzOXwLjFZG4zXNgBEk9XfIXBIZQAJQFzMy', 'admin', '2025-03-23 19:09:32'),
(5, 'Angie', 'fandinoangie4@gmail.com', '$2y$10$HYaLpA1LP7MTTVvlPH9dFuYtIs4aC96zk4SSlK7487lz0osEHqH2O', 'user', '2025-03-23 20:53:34'),
(6, 'Angie', 'angie@gmail.com', '$2y$10$biVn9tbkljZjOJy.iVm20OBVE3/6Tp8rFCv0Yg9ENVicC7pDuXY0a', 'receptionist', '2025-03-24 00:19:26');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indices de la tabla `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `room_number` (`room_number`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
