-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Úte 16. dub 2024, 15:00
-- Verze serveru: 10.4.24-MariaDB
-- Verze PHP: 8.1.6

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `components`
--

INSERT INTO `components` (`components_id`, `pages_id`, `list_components_id`, `contents_id`, `order`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 2, 1, 2),
(3, 1, 3, 1, 3),
(4, 1, 4, 1, 20),
(5, 1, 11, 7, 4),
(6, 1, 12, 6, 5),
(7, 2, 1, 1, 1),
(8, 2, 2, 1, 2),
(9, 2, 3, 1, 3),
(10, 2, 4, 1, 4),
(11, 3, 1, 1, 1),
(12, 3, 2, 1, 2),
(13, 3, 3, 1, 3),
(14, 3, 4, 1, 4),
(15, 3, 5, 1, 3),
(16, 4, 1, 1, 1),
(17, 4, 2, 1, 2),
(18, 4, 4, 1, 21),
(19, 4, 5, 1, 4),
(20, 4, 6, 1, 3),
(21, 6, 1, 1, 1),
(22, 6, 2, 1, 2),
(23, 6, 4, 1, 21),
(24, 6, 6, 1, 3),
(25, 6, 7, 1, 3),
(26, 8, 1, 1, 1),
(27, 8, 4, 1, 20),
(28, 8, 8, 1, 4),
(29, 8, 9, 1, 2),
(30, 9, 1, 1, 1),
(31, 9, 2, 1, 2),
(33, 9, 3, 1, 3),
(32, 9, 4, 1, 20);

-- --------------------------------------------------------

-
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `contents`
--

INSERT INTO `contents` (`contents_id`, `page_id`, `name`, `content1`, `content2`, `content3`, `content4`, `content5`, `content6`, `content7`, `content8`, `content9`, `content10`, `content11`, `content12`) VALUES
(1, 1, 'nula', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 1, 'jedna', 'Výlety', 'Cestovatelské a tábornické znalosti, dovednosti přežití. Zkušený průvodce, respektující přístup a spousta zábavy.​', 'Kroužky​kk', 'Většinu času trávíme v pohybu, v přírodě, za každého počasí. Věnujeme se, pohybovým hrám a vzdělávacím činnostem.​', 'Kurzy', 'Nabízím vzdělávací činnosti, výuku programování, sjíždění řek na nafukovacích kánojích, cestovatelské dovednosti a znalosti. ​', 'fad fa-hiking', 'fad fa-hiking', 'fad fa-hiking', '', '0', ''),
(7, 1, 'tři', 'Výlety109', 'Cestovatelské a tábornické znalosti, dovednosti přežití. Zkušený průvodce, respektující přístup a spousta zábavy.​.', 'Kroužky​', 'Většinu času trávíme v pohybu, v přírodě, za každého počasí. Věnujeme se, pohybovým hrám a vzdělávacím činnostem.​', 'Kurzy', 'Nabízím vzdělávací činnosti, výuku programování, sjíždění řek na nafukovacích kánojích, cestovatelské dovednosti a znalosti. ​', 'fad fa-hiking', 'fad fa-hiking', 'fad fa-hiking', '', '0', '');

-- --------------------------------------------------------

--
-- Struktura tabulky `installed_templates`
--

CREATE TABLE `installed_templates` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `list_components`
--

INSERT INTO `list_components` (`list_components_id`, `name`) VALUES
(11, '3box-v1'),
(12, '3box-v2'),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `pages`
--

INSERT INTO `pages` (`pages_id`, `title`, `uri`, `menu_order`, `visible_in_menu`, `parent_id`) VALUES
(1, 'Úvod', 'index', 1, 1, NULL),
(2, 'Produkty', 'produkty', 2, 1, NULL),
(3, 'Vybavení', 'vybaveni', 3, 0, NULL),
(4, 'Příspěvky', 'articles', 4, 0, NULL),
(5, 'Lektorské služby pro děti', 'https://dobrodruzi.cz', 5, 1, NULL),
(6, 'Blog', 'blog', 2, 1, NULL),
(8, 'Cestovní časová osa', 'timeline', 8, 1, 10),
(9, 'Cestovní deník', 'travel', 7, 1, 10),
(10, 'Cestovní zápisky', 'nic', 10, 1, NULL);

-- --------------------------------------------------------

--
-- Struktura tabulky `templates`
--

CREATE TABLE `templates` (
  `tamplates_id` int(11) NOT NULL,
  `pages_id` int(11) NOT NULL,
  `templates_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `templates`
--

INSERT INTO `templates` (`tamplates_id`, `pages_id`, `templates_id`) VALUES
(3, 9, 4),
(4, 8, 3);

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `username`, `password_hash`) VALUES
(2, 'agpl', '$2y$10$3YhiH9zzbLPdU8vdi.pF4OxvXrJ0m5Z7nV0BuOz82kiS/s3qXZBWa');

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
-- Indexy pro tabulku `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`Id`);

--
-- Indexy pro tabulku `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`contents_id`),
  ADD KEY `page_content` (`page_id`);

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
-- Indexy pro tabulku `sms_messages`
--
ALTER TABLE `sms_messages`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `components_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pro tabulku `contacts`
--
ALTER TABLE `contacts`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT pro tabulku `contents`
--
ALTER TABLE `contents`
  MODIFY `contents_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pro tabulku `installed_templates`
--
ALTER TABLE `installed_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pro tabulku `list_components`
--
ALTER TABLE `list_components`
  MODIFY `list_components_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pro tabulku `pages`
--
ALTER TABLE `pages`
  MODIFY `pages_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pro tabulku `sms_messages`
--
ALTER TABLE `sms_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT pro tabulku `templates`
--
ALTER TABLE `templates`
  MODIFY `tamplates_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Omezení pro tabulku `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `fk_pages_parent` FOREIGN KEY (`parent_id`) REFERENCES `pages` (`pages_id`);

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
