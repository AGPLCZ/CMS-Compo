-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Stř 08. kvě 2024, 21:26
-- Verze serveru: 10.4.32-MariaDB
-- Verze PHP: 8.2.12

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
-- Struktura tabulky `components`
--

CREATE TABLE `components` (
  `components_id` int(11) NOT NULL,
  `pages_id` int(11) NOT NULL,
  `list_components_id` int(11) NOT NULL,
  `contents_id` int(11) NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `components`
--

INSERT INTO `components` (`components_id`, `pages_id`, `list_components_id`, `contents_id`, `order`) VALUES
(1, 1, 1, 1, 1),
(38, 1, 2, 14, 3),
(2, 1, 3, 1, 2),
(4, 1, 4, 0, 20),
(36, 1, 4, 12, 20),
(3, 1, 13, 7, 3),
(40, 1, 13, 15, 5),
(41, 1, 13, 16, 4),
(35, 1, 17, 11, 4),
(34, 1, 18, 0, 5),
(48, 1, 18, 23, 6),
(43, 6, 1, 18, 1),
(47, 6, 2, 22, 2),
(44, 6, 3, 19, 2),
(45, 6, 4, 20, 50),
(39, 6, 13, 12, 4),
(46, 6, 13, 21, 5);

-- --------------------------------------------------------

--
-- Struktura tabulky `contents`
--

CREATE TABLE `contents` (
  `contents_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `content1` text NOT NULL,
  `content2` text NOT NULL,
  `content3` text NOT NULL,
  `content4` text NOT NULL,
  `content5` text NOT NULL,
  `content6` text NOT NULL,
  `content7` text NOT NULL,
  `content8` text NOT NULL,
  `content9` text NOT NULL,
  `content10` text NOT NULL,
  `content11` text NOT NULL,
  `content12` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `contents`
--

INSERT INTO `contents` (`contents_id`, `page_id`, `name`, `content1`, `content2`, `content3`, `content4`, `content5`, `content6`, `content7`, `content8`, `content9`, `content10`, `content11`, `content12`) VALUES
(1, 1, 'nula', '', '', 'zrtf', ',nb,nm', '', '', 'nkbbbn', '', '', '', '', ''),
(7, 1, 'tři', 'Výletyyy', 'Cestovatelské a tábornické znalosti, dovednosti přežití. Zkušený průvodce, respektující přístup a spousta zábavy.​.', 'Kroužky​', 'Většinu času trávíme v pohybu, v přírodě, za každého počasí. Věnujeme se, pohybovým hrám a vzdělávacím činnostem.​', 'Kurzy', 'Nabízím vzdělávací činnosti, výuku programování, sjíždění řek na nafukovacích kánojích, cestovatelské dovednosti a znalosti. ​', 'fad fa-hiking', 'fad fa-hiking', 'fad fa-hiking', '', '0', ''),
(8, 1, 'Nový Obsah', 'Content 1', 'Content 2', 'Content 3', 'Content 4', 'Content 5', 'Content 6', 'Content 7', 'Content 8', 'Content 9', 'Content 10', 'Content 11', 'Content 12'),
(11, 1, 'Nový Obsah', 'Nadpis česky', 'Content 2', 'Content 3', 'Content 4', 'Content 5', 'Content 6', 'Content 7', 'Content 8', 'Content 9', 'Content 10', 'Content 11', 'Content 12'),
(12, 1, 'Nový Obsah', 'Content 1', 'Content 2', 'Content 3', 'Content 4', 'Content 5', 'Content 6', 'Český 8', 'Content 8', 'Content 9', 'Content 10', 'Content 11', 'Content 12'),
(13, 1, 'Nový Obsah', 'Content 1', 'Content 2', 'Content 3', 'Content 4', 'Content 5', 'Content 6', 'Content 7', 'Content 8', 'Content 9', 'Content 10', 'Content 11', 'Content 12'),
(14, 1, 'Nový Obsah', 'Content 1', 'Content 2', 'Content 3', 'Content 4', 'Content 5', 'Content 6', 'Content 7', 'Content 8', 'Content 9', 'Content 10', 'Content 11', 'Content 12'),
(15, 1, 'Nový Obsah', 'Content 1', 'Content 2', 'Content 3', 'Content 4', 'Content 5', 'Content 6', 'Content 7', 'Content 8', 'Content 9', 'Content 10', 'Content 11', 'Content 12'),
(16, 1, 'Nový Obsah', 'Česky kontenty', 'Content 2', 'Content 3', 'Content 4', 'Content 5', 'Content 6', 'Content 77', 'Content 8', 'Content 9', 'Content 10', 'Content 11', 'Content 15'),
(17, 6, 'Nový Obsah', 'Content 1', 'Content 2', 'Content 3', 'Content 4', 'Content 5', 'Content 6', 'Content 7', 'Content 8', 'Content 9', 'Content 10', 'Content 11', 'Content 12'),
(18, 6, 'Nový Obsah', 'Content 1', 'Content 2', 'Content 3', 'Content 4', 'Content 5', 'Content 6', 'Content 7', 'Content 8', 'Content 9', 'Content 10', 'Content 11', 'Content 12'),
(19, 6, 'Nový Obsah', 'Moderní řešení pro', 'Váš', 'Projekt', 'E-shop', 'Otevřete svůj internetový obchod ještě dnes!', 'Content 6', 'Od 50 Kč / měsíc', 'Trvá to 5 minut', 'Content 9', 'Content 10', 'Content 11', 'Content 12'),
(20, 6, 'Nový Obsah', 'Content 1', 'Content 2', 'Content 3', 'Content 4', 'Content 5', 'Content 6', 'Content 7', 'Content 8', 'Content 9', 'Content 10', 'Content 11', 'Content 12'),
(21, 6, 'Nový Obsah', 'Content 1', 'Content 2', 'Content 3', 'Content 4', 'Content 5', 'Content 6', 'Content 7', 'Content 8', 'Content 9', 'Content 10', 'Content 11', 'Content 12'),
(22, 6, 'Nový Obsah', 'Content 1', 'Content 2', 'Content 3', 'Content 4', 'Content 5', 'Content 6', 'Content 7', 'Content 8', 'Content 9', 'Content 10', 'Content 11', 'Content 12'),
(23, 1, 'Nový Obsah', 'bi bi-circle-half', 'Content 2', 'Content 3', 'bi bi-circle-half', 'Content 5', 'Content 6', 'bi bi-circle-half', 'Content 8', 'Content 9', 'Content 10', 'Content 11', 'Content 12');

-- --------------------------------------------------------

--
-- Struktura tabulky `content_localizations`
--

CREATE TABLE `content_localizations` (
  `localization_id` int(11) NOT NULL,
  `contents_id` int(11) NOT NULL,
  `language` varchar(10) NOT NULL,
  `field_name` varchar(255) NOT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `content_localizations`
--

INSERT INTO `content_localizations` (`localization_id`, `contents_id`, `language`, `field_name`, `content`) VALUES
(1, 7, 'en', 'content1', 'Tripsss'),
(2, 7, 'en', 'content3', 'Clouzek2'),
(3, 11, 'en', 'content1', 'Nadpis českyy'),
(4, 16, 'en', 'content1', 'Englicky contenty'),
(5, 12, 'en', 'content7', 'Englicky 8'),
(6, 21, 'en', 'content7', 'Englicky');

-- --------------------------------------------------------

--
-- Struktura tabulky `installed_templates`
--

CREATE TABLE `installed_templates` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `installed_templates`
--

INSERT INTO `installed_templates` (`id`, `name`, `description`, `path`) VALUES
(1, 'mizzle', NULL, NULL),
(2, 'block', NULL, NULL),
(3, 'timeline', NULL, NULL),
(4, 'travel', NULL, NULL),
(5, 'green', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabulky `list_components`
--

CREATE TABLE `list_components` (
  `list_components_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `list_components`
--

INSERT INTO `list_components` (`list_components_id`, `name`) VALUES
(11, '3box-v1'),
(12, '3box-v2'),
(13, '3box1'),
(16, '3box2'),
(17, '3box3'),
(18, '3box4'),
(5, 'articles'),
(7, 'blog'),
(4, 'footer'),
(1, 'head'),
(3, 'headbar'),
(6, 'head_path'),
(2, 'navigation'),
(9, 'navigation1'),
(8, 'timeline'),
(10, 'travel');

-- --------------------------------------------------------

--
-- Struktura tabulky `pages`
--

CREATE TABLE `pages` (
  `pages_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `menu_order` int(11) NOT NULL,
  `visible_in_menu` tinyint(1) NOT NULL DEFAULT 1,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `pages`
--

INSERT INTO `pages` (`pages_id`, `title`, `uri`, `menu_order`, `visible_in_menu`, `parent_id`) VALUES
(1, 'Úvod', 'index', 1, 1, NULL),
(6, 'Blog', 'blog', 2, 1, NULL);

-- --------------------------------------------------------

--
-- Struktura tabulky `templates`
--

CREATE TABLE `templates` (
  `tamplates_id` int(11) NOT NULL,
  `pages_id` int(11) NOT NULL,
  `templates_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_token` varchar(128) DEFAULT NULL,
  `token_expiration` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password_hash`, `reset_token`, `token_expiration`) VALUES
(1, 'agpl', 'gmail@petrlizal.com', '$2y$10$3YhiH9zzbLPdU8vdi.pF4OxvXrJ0m5Z7nV0BuOz82kiS/s3qXZBWa', NULL, NULL),
(2, 'admin', 'info@dobrodruzi.cz', '$2y$10$xwp16jsQG0XXzyDmV/rayuFLk/HtfGWWBwr68rbjy8UpH.NaNKddG', NULL, NULL);

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `components`
--
ALTER TABLE `components`
  ADD PRIMARY KEY (`pages_id`,`list_components_id`,`contents_id`),
  ADD UNIQUE KEY `id` (`components_id`),
  ADD KEY `fk_component_id` (`list_components_id`),
  ADD KEY `fk_content_id` (`contents_id`);

--
-- Indexy pro tabulku `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`contents_id`),
  ADD KEY `page_content` (`page_id`);

--
-- Indexy pro tabulku `content_localizations`
--
ALTER TABLE `content_localizations`
  ADD PRIMARY KEY (`localization_id`),
  ADD KEY `contents_id` (`contents_id`);

--
-- Indexy pro tabulku `installed_templates`
--
ALTER TABLE `installed_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexy pro tabulku `list_components`
--
ALTER TABLE `list_components`
  ADD PRIMARY KEY (`list_components_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexy pro tabulku `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`pages_id`),
  ADD UNIQUE KEY `uri` (`uri`),
  ADD KEY `fk_pages_parent` (`parent_id`);

--
-- Indexy pro tabulku `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`tamplates_id`),
  ADD KEY `fk_template_page` (`pages_id`),
  ADD KEY `fk_template_template_id` (`templates_id`);

--
-- Indexy pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `components`
--
ALTER TABLE `components`
  MODIFY `components_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pro tabulku `contents`
--
ALTER TABLE `contents`
  MODIFY `contents_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pro tabulku `content_localizations`
--
ALTER TABLE `content_localizations`
  MODIFY `localization_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pro tabulku `installed_templates`
--
ALTER TABLE `installed_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pro tabulku `list_components`
--
ALTER TABLE `list_components`
  MODIFY `list_components_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pro tabulku `templates`
--
ALTER TABLE `templates`
  MODIFY `tamplates_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `components`
--
ALTER TABLE `components`
  ADD CONSTRAINT `fk_component_id` FOREIGN KEY (`list_components_id`) REFERENCES `list_components` (`list_components_id`),
  ADD CONSTRAINT `fk_content_id` FOREIGN KEY (`contents_id`) REFERENCES `contents` (`contents_id`),
  ADD CONSTRAINT `fk_page_id` FOREIGN KEY (`pages_id`) REFERENCES `pages` (`pages_id`);

--
-- Omezení pro tabulku `contents`
--
ALTER TABLE `contents`
  ADD CONSTRAINT `page_content` FOREIGN KEY (`page_id`) REFERENCES `pages` (`pages_id`);

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
