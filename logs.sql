-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: mysql
-- Čas generovania: Po 23.Máj 2022, 00:29
-- Verzia serveru: 8.0.21
-- Verzia PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `final_zadanie`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `logs`
--

CREATE TABLE `logs` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(64) CHARACTER SET utf8 COLLATE utf8_slovak_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `command` text CHARACTER SET utf8 COLLATE utf8_slovak_ci NOT NULL,
  `status` enum('SUCCESS','FAILED') CHARACTER SET utf8 COLLATE utf8_slovak_ci NOT NULL,
  `error_log` text CHARACTER SET utf8 COLLATE utf8_slovak_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Sťahujem dáta pre tabuľku `logs`
--

INSERT INTO `logs` (`id`, `username`, `created_at`, `command`, `status`, `error_log`) VALUES
(1, 'Patrik', '2022-05-23 00:27:56', '5+5', 'FAILED', 'NONE'),
(2, 'Patrik', '2022-05-23 00:28:36', '5+5', 'SUCCESS', 'NONE');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
