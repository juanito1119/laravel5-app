-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-04-2016 a las 04:31:00
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `open_backend`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagination`
--

CREATE TABLE `pagination` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `pagination` int(11) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `users_id_update` int(11) DEFAULT NULL,
  `users_id_delete` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pagination`
--

INSERT INTO `pagination` (`id`, `name`, `pagination`, `color`, `users_id`, `users_id_update`, `users_id_delete`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1 a 5', NULL, 'fe', 1, 1, NULL, '2016-04-12 01:37:40', '2016-04-12 01:39:47', '0000-00-00 00:00:00'),
(2, 'prueba', 2, 'ed212fe', 1, 1, 1, '2016-04-12 01:40:35', '2016-04-12 01:57:53', '2016-04-12 01:57:53'),
(3, 'De 0 a 30', 30, 'azul', 1, NULL, NULL, '2016-04-12 01:58:38', '2016-04-12 01:58:38', '0000-00-00 00:00:00'),
(4, 'Pagination', 4, 'FDFE', 1, NULL, NULL, '2016-04-12 03:35:02', '2016-04-12 03:35:02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `priority`
--

CREATE TABLE `priority` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `users_id_update` int(11) DEFAULT NULL,
  `users_id_delete` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `priority`
--

INSERT INTO `priority` (`id`, `name`, `priority`, `color`, `users_id`, `users_id_update`, `users_id_delete`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Alta', 10, 'Modificado', 1, 1, NULL, '2016-04-12 02:31:41', '2016-04-12 02:32:06', '0000-00-00 00:00:00'),
(2, 'Media', 5, 'Yellow', 1, 1, NULL, '2016-04-12 02:32:27', '2016-04-12 02:33:23', '0000-00-00 00:00:00'),
(3, 'Hola', 1, 'Rojo', 1, 1, NULL, '2016-04-12 02:34:09', '2016-04-12 18:59:04', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` text,
  `color` varchar(10) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `users_id_update` int(11) DEFAULT NULL,
  `users_id_delete` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `name`, `description`, `color`, `users_id`, `users_id_update`, `users_id_delete`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Alta', 'Se puede utilizar en la aplicación ', '#009688', 1, NULL, 1, '2016-04-20 00:53:55', '2016-04-22 00:21:15', NULL),
(2, 'Baja Validate', 'No se puede utilizar pero si se encuentra en la aplicación ', '#d9534f', 1, 1, 1, '2016-04-12 00:48:41', '2016-04-22 00:54:53', NULL),
(3, 'otro campo', 'fdjklafldjkaf', '#4f3232', 1, 1, 1, '2016-04-21 23:56:18', '2016-04-22 00:21:24', NULL),
(4, 'lkjdfsjka', 'kjlfdljkafdsa', '#a83535', 1, 1, 1, '2016-04-22 00:42:48', '2016-04-22 02:06:51', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `responsible_id` int(10) NOT NULL,
  `priority_id` int(10) NOT NULL,
  `fecha_inicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_fin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `users_id` int(11) DEFAULT NULL,
  `users_id_update` int(11) DEFAULT NULL,
  `users_id_delete` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `description`, `responsible_id`, `priority_id`, `fecha_inicio`, `fecha_fin`, `users_id`, `users_id_update`, `users_id_delete`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Tarea 1 Modificada', 'Mi primera tarea modificada', 0, 0, '2016-04-12 05:00:00', '2016-04-13 05:00:00', 1, 1, NULL, '2016-04-12 03:22:52', '2016-04-12 03:28:05', '0000-00-00 00:00:00'),
(2, 'Mi Tarea 2', 'Esta es mi tarea 2', 0, 0, '2016-04-06 05:00:00', '2017-04-06 05:00:00', 1, NULL, NULL, '2016-04-12 03:28:48', '2016-04-12 03:28:48', '0000-00-00 00:00:00'),
(3, 'Tarea 3', 'Mi ultima tarea de prueba', 0, 0, '2016-01-01 06:00:00', '2016-12-12 06:00:00', 1, NULL, NULL, '2016-04-12 03:30:13', '2016-04-12 03:30:13', '0000-00-00 00:00:00'),
(4, 'FDSA', 'FDS', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL, NULL, '2016-04-13 01:13:22', '2016-04-13 01:13:22', '0000-00-00 00:00:00'),
(5, 'fdafd', 'fdsafdsa', 0, 0, '2016-04-21 06:00:00', '2016-04-13 06:00:00', 1, NULL, NULL, '2016-04-13 01:27:40', '2016-04-13 01:27:40', '0000-00-00 00:00:00'),
(6, 'Tarea', '', 0, 0, '2016-04-12 16:00:00', '2016-04-30 17:00:00', 1, NULL, NULL, '2016-04-13 01:29:57', '2016-04-13 01:29:57', '0000-00-00 00:00:00'),
(7, 'responsable', 'fdsa', 1, 2, '1970-01-01 06:00:00', '1970-01-01 06:00:00', 1, 1, NULL, '2016-04-13 02:23:12', '2016-04-15 00:46:31', '0000-00-00 00:00:00'),
(8, 'fdsafdsa', 'fdsafdsa', 1, 1, '1970-01-01 06:00:00', '1970-01-01 06:00:00', 1, 1, NULL, '2016-04-15 00:43:57', '2016-04-15 01:44:56', '0000-00-00 00:00:00'),
(9, 'fdsa', 'fdsa', 1, 2, '1970-01-01 06:00:00', '1970-01-01 06:00:00', 1, 1, NULL, '2016-04-15 01:45:17', '2016-04-22 02:14:59', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `names` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `surnames` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `expire` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `pagination` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `users_id_update` int(11) DEFAULT NULL,
  `users_id_delete` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `names`, `surnames`, `email`, `password`, `expire`, `avatar`, `phone`, `address`, `rol_id`, `pagination`, `remember_token`, `status_id`, `users_id`, `users_id_update`, `users_id_delete`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Juan Francisco', '', 'me@juanfrancisco.io', '$2y$10$tIL/q7XbVPKL8XXUq3UiQu0sBH.8jsf81MCYiMW58gPynFEUTj2Rq', '', '', '2222-2222', 'Ciudad de Guatemala', 1, NULL, 'sknyYA37t7Ao4cHUOkpLedxWGdhC5AdUKIaeyCHTKU7apiXksu2KD6u4Mt6s', 1, 0, NULL, NULL, '2016-04-12 05:14:46', '2016-04-12 07:46:14', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pagination`
--
ALTER TABLE `pagination`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `priority`
--
ALTER TABLE `priority`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pagination`
--
ALTER TABLE `pagination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `priority`
--
ALTER TABLE `priority`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
