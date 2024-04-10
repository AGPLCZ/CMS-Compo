-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Počítač: db.dw141.webglobe.com
-- Vytvořeno: Pát 29. bře 2024, 20:52
-- Verze serveru: 8.0.36-28
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
  `content_id` int NOT NULL,
  `component_order` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexy pro tabulku `page_components`
--
ALTER TABLE `page_components`
  ADD PRIMARY KEY (`page_id`,`component_id`,`content_id`),
  ADD KEY `fk_component_id` (`component_id`),
  ADD KEY `fk_content_id` (`content_id`);


--
-- Omezení pro tabulku `page_components`
--
ALTER TABLE `page_components`
  ADD CONSTRAINT `fk_component_id` FOREIGN KEY (`component_id`) REFERENCES `components` (`id`),
  ADD CONSTRAINT `fk_content_id` FOREIGN KEY (`content_id`) REFERENCES `page_contents` (`id`),
  ADD CONSTRAINT `fk_page_id` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;









--
-- Vypisuji data pro tabulku `page_components`
--

INSERT INTO `page_components` (`page_id`, `component_id`, `content_id`, `component_order`) VALUES
(1, 1, 1, 1),
(1, 2, 1, 2),
(1, 3, 1, 3),
(1, 4, 1, 20),
(1, 11, 1, 4),
(1, 12, 6, 4),
(2, 1, 1, 1),
(2, 2, 1, 2),
(2, 3, 1, 3),
(2, 4, 1, 4),
(3, 1, 1, 1),
(3, 2, 1, 2),
(3, 3, 1, 3),
(3, 4, 1, 4),
(3, 5, 1, 3),
(4, 1, 1, 1),
(4, 2, 1, 2),
(4, 4, 1, 21),
(4, 5, 1, 4),
(4, 6, 1, 3),
(6, 1, 1, 1),
(6, 2, 1, 2),
(6, 4, 1, 21),
(6, 6, 1, 3),
(6, 7, 1, 3),
(8, 1, 1, 1),
(8, 4, 1, 20),
(8, 8, 1, 4),
(8, 9, 1, 2),
(9, 1, 1, 1),
(9, 2, 1, 2),
(9, 4, 1, 20),
(9, 11, 1, 3);