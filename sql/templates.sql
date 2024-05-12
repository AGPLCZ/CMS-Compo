-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Počítač: dobrodruzi.cz
-- Vytvořeno: Stř 08. kvě 2024, 21:21
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
-- Databáze: `rs`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `templates`
--

CREATE TABLE `templates` (
  `tamplates_id` int NOT NULL,
  `pages_id` int NOT NULL,
  `templates_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Vypisuji data pro tabulku `templates`
--

INSERT INTO `templates` (`tamplates_id`, `pages_id`, `templates_id`) VALUES
(3, 9, 4),
(4, 8, 3);

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`tamplates_id`),
  ADD KEY `fk_template_page` (`pages_id`),
  ADD KEY `fk_template_template_id` (`templates_id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `templates`
--
ALTER TABLE `templates`
  MODIFY `tamplates_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `templates`
--
ALTER TABLE `templates`
  ADD CONSTRAINT `fk_template_page` FOREIGN KEY (`pages_id`) REFERENCES `pages` (`pages_id`),
  ADD CONSTRAINT `fk_template_template_id` FOREIGN KEY (`templates_id`) REFERENCES `installed_templates` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
