-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Počítač: db.dw141.webglobe.com
-- Vytvořeno: Ned 25. úno 2024, 13:52
-- Verze serveru: 8.0.34-26
-- Verze PHP: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `green`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `page_components`
--

CREATE TABLE `page_components` (
  `page_id` int NOT NULL,
  `component_id` int NOT NULL,
  `component_order` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `page_components`
--

INSERT INTO `page_components` (`page_id`, `component_id`, `component_order`) VALUES
(1, 1, 1),
(1, 2, 2),
(1, 3, 3),
(1, 4, 5),
(1, 5, 4),
(2, 1, 1),
(2, 2, 2),
(2, 3, 3),
(2, 4, 4),
(3, 1, 1),
(3, 2, 2),
(3, 3, 3),
(3, 4, 4),
(3, 5, 3),
(4, 1, 1),
(4, 2, 2),
(4, 4, 20),
(4, 5, 4),
(4, 6, 3),
(6, 1, 1),
(6, 2, 2),
(6, 4, 20),
(6, 6, 4),
(6, 7, 5);

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `page_components`
--
ALTER TABLE `page_components`
  ADD PRIMARY KEY (`page_id`,`component_id`),
  ADD KEY `component_id` (`component_id`);

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `page_components`
--
ALTER TABLE `page_components`
  ADD CONSTRAINT `page_components_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`),
  ADD CONSTRAINT `page_components_ibfk_2` FOREIGN KEY (`component_id`) REFERENCES `components` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



CREATE TABLE `page_content` (
  `content_id` int NOT NULL,
  `content_name` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
