-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: db.dw141.webglobe.com
-- Vytvořeno: Pát 21. úno 2025, 23:48
-- Verze serveru: 8.0.40-31
-- Verze PHP: 8.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `dobrodruzi_py`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `components`
--

CREATE TABLE `components` (
  `components_id` int NOT NULL,
  `pages_id` int NOT NULL,
  `list_components_id` int NOT NULL,
  `contents_id` int NOT NULL,
  `order` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `components`
--

INSERT INTO `components` (`components_id`, `pages_id`, `list_components_id`, `contents_id`, `order`) VALUES
(101, 0, 0, 17, 0),
(102, 0, 0, 21, 0),
(1, 1, 1, 1, 1),
(38, 1, 2, 14, 3),
(2, 1, 3, 1, 2),
(4, 1, 4, 0, 20),
(36, 1, 4, 12, 20),
(3, 1, 13, 7, 10),
(50, 1, 16, 25, 9),
(35, 1, 17, 11, 9),
(34, 1, 18, 0, 5),
(55, 1, 18, 30, 9),
(56, 1, 19, 31, 10),
(58, 1, 20, 33, 4),
(59, 1, 21, 34, 5),
(63, 1, 22, 38, 8),
(117, 1, 22, 86, 12),
(62, 1, 23, 37, 8),
(64, 1, 25, 39, 5),
(71, 1, 26, 48, 9),
(72, 1, 26, 49, 9),
(73, 1, 27, 50, 9),
(74, 1, 28, 51, 9),
(110, 1, 28, 82, 9),
(75, 1, 29, 52, 9),
(76, 1, 29, 53, 6),
(77, 1, 30, 54, 9),
(79, 1, 32, 56, 9),
(80, 1, 33, 57, 6),
(81, 1, 34, 58, 8),
(82, 1, 35, 59, 6),
(83, 1, 36, 60, 4),
(84, 1, 37, 61, 9),
(85, 1, 38, 62, 9),
(87, 1, 40, 64, 7),
(43, 6, 1, 18, 1),
(47, 6, 2, 22, 3),
(44, 6, 3, 19, 2),
(45, 6, 4, 20, 50),
(119, 6, 11, 23, 10),
(120, 6, 12, 63, 10),
(121, 6, 13, 79, 4),
(124, 6, 31, 88, 4),
(123, 6, 35, 81, 8),
(125, 6, 35, 89, 4);

-- --------------------------------------------------------

--
-- Struktura tabulky `contents`
--

CREATE TABLE `contents` (
  `contents_id` int NOT NULL,
  `page_id` int NOT NULL,
  `list_components_id` int DEFAULT NULL,
  `name` tinytext COLLATE utf8mb4_general_ci NOT NULL,
  `content1` text COLLATE utf8mb4_general_ci,
  `content2` text COLLATE utf8mb4_general_ci,
  `content3` text COLLATE utf8mb4_general_ci,
  `content4` text COLLATE utf8mb4_general_ci,
  `content5` text COLLATE utf8mb4_general_ci,
  `content6` text COLLATE utf8mb4_general_ci,
  `content7` text COLLATE utf8mb4_general_ci,
  `content8` text COLLATE utf8mb4_general_ci,
  `content9` text COLLATE utf8mb4_general_ci,
  `content10` text COLLATE utf8mb4_general_ci,
  `content11` text COLLATE utf8mb4_general_ci,
  `content12` text COLLATE utf8mb4_general_ci,
  `content13` text COLLATE utf8mb4_general_ci,
  `content14` text COLLATE utf8mb4_general_ci,
  `content15` text COLLATE utf8mb4_general_ci,
  `content16` text COLLATE utf8mb4_general_ci,
  `content17` text COLLATE utf8mb4_general_ci,
  `content18` text COLLATE utf8mb4_general_ci,
  `content19` text COLLATE utf8mb4_general_ci,
  `content20` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `contents`
--

INSERT INTO `contents` (`contents_id`, `page_id`, `list_components_id`, `name`, `content1`, `content2`, `content3`, `content4`, `content5`, `content6`, `content7`, `content8`, `content9`, `content10`, `content11`, `content12`, `content13`, `content14`, `content15`, `content16`, `content17`, `content18`, `content19`, `content20`) VALUES
(1, 1, NULL, 'Head page 1', '', 'Váš', 'projekt', 'e-shop', '', '', 'Od 50 Kč / měsíc', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 1, NULL, 'tři', 'Nadpis​', 'Cestovatelské a tábornické znalosti, dovednosti přežití. Zkušený průvodce, respektující přístup a spousta zábavy.', 'Dedikace​', 'Default', 'Díky unikátním datům a letitému know-how v oblasti pronájmů i prodejů nemovitostí se na nás obrací největší česká média. Komentujeme dění na trhu a pravidelně vydáváme tiskové zprávy. Neváhejte nás kontaktovat.', 'Nabízíme', 'Nabízím vzdělávací činnosti, výuku programování, sjíždění řek na nafukovacích kánoích cestovatelské dovednosti a znalosti.', 'Hmmm', 'Jop tak tu bude další obsah, jen nevím jestli se mi tam vleze ale jo zalomilo se to takže asi v pohodě.', 'bi bi-chat-heart', '', '', '../blog', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 1, NULL, 'Nový Obsah', 'Nadpis česky', 'Content 2', 'Content 3', 'Content 4', 'Content 5', 'Content 6', 'Content 7', 'Content 8', 'Content 9', 'Content 10', 'Content 11', 'Content 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 1, NULL, 'Úvod - footer', 'Noční automat krutý', 'Řeší problém lidí  alskfja ', 'jo tak to si koupíte aha', 'Všechno je zavřeno', 'Content 5', 'Jednoduchost', 'Český 8', 'Nevidím úředník', 'Content 9', 'fad fa-campground', 'bi bi-window-stack', 'fad fa-campground', 'https://www.google.cz', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 1, NULL, 'Nový Obsah', 'Adventures', 'Content 2', 'Content 3', 'Content 4', 'Content 5', 'Content 6', 'Content 7', 'Content 8', 'Content 9', 'Content 10', 'Content 11', 'Content 12', NULL, NULL, 'test', NULL, NULL, NULL, NULL, NULL),
(17, 6, NULL, 'Nový Obsah', 'Content 1', 'Content 2', 'Content 3', 'Content 4', 'Content 5', 'Content 6', 'Content 7', 'Content 8', 'Content 9', 'Content 10', 'Content 11', 'Content 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 6, NULL, 'Nový Obsah', 'Content 1', 'Content 2', 'Content 3', 'Content 4', 'Content 5', 'Content 6', 'Content 7', 'Content 8', 'Content 9', 'Content 10', 'Content 11', 'Content 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 6, NULL, 'Nový Obsah', 'Moderní řešení pro ', 'Vášde', 'Projekt', 'E-shop', 'Otevřete svůj internetový obchod ještě dnes!', 'Content 6', 'Od 50 Kč / měsíffc', 'Trvá to 5 minut', 'Content 9', 'Content 10', 'Content 11', 'Content 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 6, NULL, 'Blog footer', 'Content 1', 'Content 2', 'Content 3', 'Content 4', 'Content 5', 'Content 6', 'Content 7', 'Content 8', 'Content 9', 'Content 10', 'Content 11', 'Content 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 6, NULL, 'Nový Obsah', 'Content 1', 'Content 2', 'Content 3', 'Content 4', 'Content 5', 'Content 6', 'Content 7', 'Content 8', 'Content 9', 'Content 10', 'Content 11', 'Content 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 6, NULL, 'Nový Obsah', 'Content 1', 'Content 2', 'Content 3', 'Content 4', 'Content 5', 'Content 6', 'Content 7', 'Content 8', 'Content 9', 'Content 10', 'Content 11', 'Content 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 1, NULL, 'Nový Obsah', 'bi bi-circle-half', 'Content 2ii', 'Content 3', 'bi bi-circle-half', 'Content 5', 'Content 6', 'bi bi-circle-half', 'Content 8', 'Content 9', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 1, NULL, 'Nový Obsah', 'Content 1', 'Content 2', 'Content 3', 'Content 4', 'Content 5', 'Content 6', 'Content 7', 'Content 8', 'Content 9', 'Content 10', 'Content 11', 'Content 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 1, NULL, 'Nový Obsah', 'Content 1', 'Content 2kjj', 'Content 3', 'Content 4', 'Content 5', 'Content 6', 'bi bi-chat-heart', 'Content 8jj', 'Content 9', 'bi bi-chat-heart', 'bi bi-chat-heart', 'bi bi-chat-heart', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 1, NULL, 'Nový Obsah', 'Vytvořte moderní e-shop', 'Redakční systém obsahuje veškeré funkce pro správu e-shopu.', '', '', '', '', '', '', 'Vedení účetnictví', '', 'Zjistit více informací', '../blog', '', 'bi bi-boxes', 'bi bi-people', 'bi bi-shield-check', NULL, NULL, NULL, NULL),
(33, 1, NULL, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 1, NULL, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 1, NULL, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 1, NULL, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 1, NULL, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 1, NULL, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 1, NULL, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 1, NULL, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 1, NULL, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 1, NULL, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 1, NULL, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 1, NULL, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 1, NULL, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 1, NULL, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 1, NULL, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 1, NULL, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 1, NULL, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 1, NULL, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 1, NULL, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 1, NULL, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 1, NULL, 'Nový Obsah', 'nadpis', 'bnvhgjhjgjgjgjhgjgjgg hg jjgjggjgjh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 1, NULL, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 6, NULL, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 6, NULL, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 1, NULL, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, 1, 28, 'Test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, 6, 31, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, 6, 35, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabulky `content_localizations`
--

CREATE TABLE `content_localizations` (
  `localization_id` int NOT NULL,
  `contents_id` int NOT NULL,
  `language` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `field_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `content_localizations`
--

INSERT INTO `content_localizations` (`localization_id`, `contents_id`, `language`, `field_name`, `content`) VALUES
(106, 63, 'en', 'content3', 'Nástroj pro správu rizik'),
(107, 63, 'en', 'content4', 'S naším nástrojem budou neřešitelné situace již řešitelné'),
(108, 63, 'en', 'content2', 'Tento nástroj Vám umožní snadno identifikovat krizové situace, odhadnout jejich závažnost a naplánovat protiopatření, která sníží dopady na minimum, ať už jste na cestách, nebo jen chcete mít jistotu, že máte vše pod kontrolou.'),
(109, 63, 'en', 'content7', 'Připravte se a chraňte se'),
(110, 63, 'en', 'content5', 'Analýza rizik OPSEC '),
(111, 63, 'en', 'content9', 'Předpřipravené řešení'),
(112, 63, 'en', 'content6', 'je jednoduchý proces pro řízení rizik a řešení kritických problémů dříve, než nastanou.'),
(113, 63, 'en', 'content10', 'Předejděte nepříjemnostem, máme pro Vás připravený plán na nejrůznější krizové situace.'),
(114, 63, 'en', 'content8', 'Vytvořte si seznam nejrůznějších situací které mohou nastat'),
(130, 63, 'en', 'content12', 'Relevance problémů'),
(131, 63, 'en', 'content12', 'Relevance of the problem'),
(133, 64, 'en', 'content2', 'S tímto nástrojem budete mít přehled a plán pro jakoukoli situaci. \n\n'),
(137, 63, 'en', 'content16', 'fa-light fa-list'),
(138, 63, 'en', 'content15', 'fa-sharp fa-light fa-shield-check'),
(139, 63, 'en', 'content14', 'fa-light fa-joystick'),
(140, 63, 'en', 'content18', 'Identifikujte problémy, vyhodnoťte jejich závažnost a vytvořte strategie ke zmírnění dopadů.'),
(141, 63, 'en', 'content17', 'Relevance problému'),
(154, 63, 'en', 'content1', 'Předvídejte, připravte se, chraňte se');

-- --------------------------------------------------------

--
-- Struktura tabulky `installed_templates`
--

CREATE TABLE `installed_templates` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `path` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
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
  `list_components_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `list_components`
--

INSERT INTO `list_components` (`list_components_id`, `name`) VALUES
(13, '3box1'),
(16, '3box2'),
(17, '3box3'),
(18, '3box4'),
(5, 'articles'),
(7, 'blog'),
(19, 'component1'),
(28, 'component10'),
(29, 'component11'),
(30, 'component12'),
(31, 'component13'),
(32, 'component14'),
(33, 'component15'),
(34, 'component16'),
(35, 'component17'),
(36, 'component18'),
(37, 'component19'),
(20, 'component2'),
(38, 'component20'),
(39, 'component21'),
(40, 'component22'),
(21, 'component3'),
(22, 'component4'),
(23, 'component5'),
(24, 'component6'),
(25, 'component7'),
(26, 'component8'),
(27, 'component9'),
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
  `pages_id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `uri` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `menu_order` int NOT NULL,
  `visible_in_menu` tinyint(1) NOT NULL DEFAULT '1',
  `parent_id` int DEFAULT NULL
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
  `tamplates_id` int NOT NULL,
  `pages_id` int NOT NULL,
  `templates_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` text COLLATE utf8mb4_general_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `reset_token` varchar(128) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `token_expiration` int DEFAULT NULL
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
  MODIFY `components_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT pro tabulku `contents`
--
ALTER TABLE `contents`
  MODIFY `contents_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT pro tabulku `content_localizations`
--
ALTER TABLE `content_localizations`
  MODIFY `localization_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT pro tabulku `installed_templates`
--
ALTER TABLE `installed_templates`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pro tabulku `list_components`
--
ALTER TABLE `list_components`
  MODIFY `list_components_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pro tabulku `pages`
--
ALTER TABLE `pages`
  MODIFY `pages_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pro tabulku `templates`
--
ALTER TABLE `templates`
  MODIFY `tamplates_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `contents`
--
ALTER TABLE `contents`
  ADD CONSTRAINT `page_content` FOREIGN KEY (`page_id`) REFERENCES `pages` (`pages_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
