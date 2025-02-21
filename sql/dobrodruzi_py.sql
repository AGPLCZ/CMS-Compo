-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: db.dw141.webglobe.com
-- Vytvořeno: Čtv 20. úno 2025, 01:28
-- Verze serveru: 8.0.36-28
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
(1, 1, 1, 1, 1),
(38, 1, 2, 14, 3),
(2, 1, 3, 1, 2),
(4, 1, 4, 0, 20),
(36, 1, 4, 12, 20),
(3, 1, 13, 7, 40),
(50, 1, 16, 25, 9),
(35, 1, 17, 11, 9),
(34, 1, 18, 0, 5),
(55, 1, 18, 30, 9),
(56, 1, 19, 31, 10),
(58, 1, 20, 33, 4),
(59, 1, 21, 34, 5),
(63, 1, 22, 38, 8),
(62, 1, 23, 37, 8),
(64, 1, 25, 39, 5),
(71, 1, 26, 48, 9),
(72, 1, 26, 49, 9),
(73, 1, 27, 50, 9),
(74, 1, 28, 51, 9),
(75, 1, 29, 52, 9),
(76, 1, 29, 53, 6),
(77, 1, 30, 54, 9),
(78, 1, 31, 55, 6),
(79, 1, 32, 56, 9),
(80, 1, 33, 57, 6),
(81, 1, 34, 58, 8),
(82, 1, 35, 59, 6),
(83, 1, 36, 60, 4),
(84, 1, 37, 61, 9),
(85, 1, 38, 62, 9),
(86, 1, 39, 63, 4),
(87, 1, 40, 64, 7),
(43, 6, 1, 18, 1),
(47, 6, 2, 22, 2),
(44, 6, 3, 19, 2),
(45, 6, 4, 20, 50),
(39, 6, 13, 12, 5),
(46, 6, 13, 21, 7),
(67, 11, 1, 44, 1),
(68, 11, 2, 45, 2),
(69, 11, 3, 46, 3),
(70, 11, 4, 47, 1000),
(66, 11, 13, 32, 7);

-- --------------------------------------------------------

--
-- Struktura tabulky `contents`
--

CREATE TABLE `contents` (
  `contents_id` int NOT NULL,
  `page_id` int NOT NULL,
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

INSERT INTO `contents` (`contents_id`, `page_id`, `name`, `content1`, `content2`, `content3`, `content4`, `content5`, `content6`, `content7`, `content8`, `content9`, `content10`, `content11`, `content12`, `content13`, `content14`, `content15`, `content16`, `content17`, `content18`, `content19`, `content20`) VALUES
(1, 1, 'nula', '', 'Váš', 'projekt', 'e-shop', '', '', 'Od 50 Kč / měsíc', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 1, 'tři', 'Nadpis​', 'Cestovatelské a tábornické znalosti, dovednosti přežití. Zkušený průvodce, respektující přístup a spousta zábavy.', 'Dedikace​', 'Default', 'Díky unikátním datům a letitému know-how v oblasti pronájmů i prodejů nemovitostí se na nás obrací největší česká média. Komentujeme dění na trhu a pravidelně vydáváme tiskové zprávy. Neváhejte nás kontaktovat.', 'Nabízíme', 'Nabízím vzdělávací činnosti, výuku programování, sjíždění řek na nafukovacích kánoích cestovatelské dovednosti a znalosti.', 'Hmmm', 'Jop tak tu bude další obsah, jen nevím jestli se mi tam vleze ale jo zalomilo se to takže asi v pohodě.', 'bi bi-chat-heart', '', '', '../blog', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 1, 'Nový Obsah', 'Content 1', 'Content 2', 'Content 3', 'Content 4', 'Content 5', 'Content 6', 'Content 7', 'Content 8', 'Content 9', 'Content 10', 'Content 11', 'Content 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 1, 'Nový Obsah', 'Nadpis česky', 'Content 2', 'Content 3', 'Content 4', 'Content 5', 'Content 6', 'Content 7', 'Content 8', 'Content 9', 'Content 10', 'Content 11', 'Content 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 1, 'Nový Obsah', 'Noční automat krutý', 'Řeší problém lidí  alskfja ', 'jo tak to si koupíte aha', 'Všechno je zavřeno', 'Content 5', 'Jednoduchost', 'Český 8', 'Nevidím úředník', 'Content 9', 'fad fa-campground', 'bi bi-window-stack', 'fad fa-campground', 'https://www.google.cz', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 1, 'Nový Obsah', 'Content 1', 'Content 2', 'Content 3', 'Content 4', 'Content 5', 'Content 6', 'Content 7', 'Content 8', 'Content 9', 'Content 10', 'Content 11', 'Content 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 1, 'Nový Obsah', 'Content 1', 'Content 2', 'Content 3', 'Content 4', 'Content 5', 'Content 6', 'Content 7', 'Content 8', 'Content 9', 'Content 10', 'Content 11', 'Content 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 1, 'Nový Obsah', 'Content 1', 'Content 2', 'Content 3', 'Content 4', 'Content 5', 'Content 6', 'Contjjhjhent 7', 'Content 8', 'Content 9', 'Content 10', 'Content 11', 'Content 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 1, 'Nový Obsah', 'Česky kontenty', 'Content 2', 'Content 3', 'Content 4', 'Contenjjkjjkjt 5', 'Content 6', 'Content 77', 'Content 8', 'Content 9', 'Content 10', 'Content 11', 'Česky konteeny', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 6, 'Nový Obsah', 'Content 1', 'Content 2', 'Content 3', 'Content 4', 'Content 5', 'Content 6', 'Content 7', 'Content 8', 'Content 9', 'Content 10', 'Content 11', 'Content 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 6, 'Nový Obsah', 'Content 1', 'Content 2', 'Content 3', 'Content 4', 'Content 5', 'Content 6', 'Content 7', 'Content 8', 'Content 9', 'Content 10', 'Content 11', 'Content 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 6, 'Nový Obsah', 'Moderní řešení pro ', 'Vášde', 'Projekt', 'E-shop', 'Otevřete svůj internetový obchod ještě dnes!', 'Content 6', 'Od 50 Kč / měsíffc', 'Trvá to 5 minut', 'Content 9', 'Content 10', 'Content 11', 'Content 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 6, 'Nový Obsah', 'Content 1', 'Content 2', 'Content 3', 'Content 4', 'Content 5', 'Content 6', 'Content 7', 'Content 8', 'Content 9', 'Content 10', 'Content 11', 'Content 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 6, 'Nový Obsah', 'Content 1', 'Content 2', 'Content 3', 'Content 4', 'Content 5', 'Content 6', 'Content 7', 'Content 8', 'Content 9', 'Content 10', 'Content 11', 'Content 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 6, 'Nový Obsah', 'Content 1', 'Content 2', 'Content 3', 'Content 4', 'Content 5', 'Content 6', 'Content 7', 'Content 8', 'Content 9', 'Content 10', 'Content 11', 'Content 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 1, 'Nový Obsah', 'bi bi-circle-half', 'Content 2ii', 'Content 3', 'bi bi-circle-half', 'Content 5', 'Content 6', 'bi bi-circle-half', 'Content 8', 'Content 9', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 6, 'Nový Obsah', 'Content 1', 'Content 2', 'Content 3', 'Content 4', 'Content 5', 'Content 6', 'Content 7', 'Content 8', 'Content 9', 'Content 10', 'Content 11', 'Content 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 1, 'Nový Obsah', 'Content 1', 'Content 2', 'Content 3', 'Content 4', 'Content 5', 'Content 6', 'Content 7', 'Content 8', 'Content 9', 'Content 10', 'Content 11', 'Content 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 1, 'Nový Obsah', 'Content 1', 'Content 2', 'Content 3', 'Content 4', 'Content 5', 'Content 6', 'Content 7', 'Content 8', 'Content 9', 'Content 10', 'Content 11', 'Content 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 6, 'Nový Obsah', 'Content 1', 'Content 2', 'Content 3', 'Content 4', 'Content 5', 'Content 6', 'Content 7', 'Content 8', 'Content 9', 'Content 10', 'Content 11', 'Content 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 6, 'Nový Obsah', 'Content 1', 'Content 2', 'Content 3', 'Content 4', 'Content 5', 'Content 6', 'Content 7', 'Content 8', 'Content 9', 'Content 10', 'Content 11', 'Content 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 6, 'Nový Obsah', 'Content 1', 'Content 2', 'Content 3', 'Content 4', 'Content 5', 'Content 6', 'Content 7', 'Content 8', 'Content 9', 'Content 10', 'Content 11', 'Content 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 1, 'Nový Obsah', 'Content 1', 'Content 2kjj', 'Content 3', 'Content 4', 'Content 5', 'Content 6', 'bi bi-chat-heart', 'Content 8jj', 'Content 9', 'bi bi-chat-heart', 'bi bi-chat-heart', 'bi bi-chat-heart', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 1, 'Nový Obsah', 'Vytvořte moderní e-shop', 'Redakční systém obsahuje veškeré funkce pro správu e-shopu.', '', '', '', '', '', '', 'Vedení účetnictví', '', 'Zjistit více informací', '../blog', '', 'bi bi-boxes', 'bi bi-people', 'bi bi-shield-check', NULL, NULL, NULL, NULL),
(32, 11, 'Kontakt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 1, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 1, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 1, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 1, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 1, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 1, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 1, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 1, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 9, 'Nový Obsah', 'Moderní řešení pro ', 'Vášde', 'Projekt', 'E-shop', 'Otevřete svůj internetový obchod ještě dnes!', 'Content 6', 'Od 50 Kč / měsíffc', 'Trvá to 5 minut', 'Content 9', 'Content 10', 'Content 11', 'Content 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 11, 'Nový Obsah', 'Noční automat krutý', 'Řeší problém lidí  alskfja ', 'jo tak to si koupíte aha', 'Všechno je zavřeno', 'Content 5', 'Jednoduchost', 'Český 8', 'Nevidím úředník', 'Content 9', 'fad fa-campground', 'bi bi-window-stack', 'fad fa-campground', 'https://www.google.cz', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 11, 'Kontakt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 11, 'Kontakt - head', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 11, 'Kontakt-navigation', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 11, 'Kontakt-headbar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 11, 'Kontakt-footer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 1, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 1, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 1, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 1, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 1, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 1, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 1, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 1, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 1, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 1, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 1, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 1, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 1, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 1, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 1, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 1, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 1, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 1, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(1, 7, 'en', 'content1', 'Tripsss'),
(2, 7, 'en', 'content3', 'Clouzek2'),
(3, 11, 'en', 'content1', 'Nadpis českyy'),
(4, 16, 'en', 'content1', 'Englicky contenty'),
(5, 12, 'en', 'content7', 'Englicky 8'),
(6, 21, 'en', 'content7', 'Englicky'),
(7, 12, 'en', 'content1', 'Machine'),
(8, 7, 'en', 'content6', 'Cabízíme'),
(9, 7, 'en', 'content8', 'Cmmm'),
(10, 7, 'en', 'content4', 'English'),
(11, 7, 'en', 'content5', 'CCCCVětšinu času trávíme v pohybu, v přírodě, za každého počasí. Věnujeme se, pohybovým hrám a vzdělávacím činnostem'),
(12, 7, 'en', 'content7', 'Nabízím vzdělávací činnosti, výuku programování, sjížděVCCCCCCCCní řek na nafukovacích kánoích cestovatelské dovednosti a znalosti.'),
(13, 7, 'en', 'content9', 'Jop cccCCCtak tu bude další obsah, jen nevím jestli se mi tam vleze ale jo zalomilo se to takže asi v pohodě.'),
(14, 7, 'en', 'content2', 'CENglishestovatelské a tábornické znalosti, dovednosti přežití. Zkušený průvodce, respektující přístup a spousta zábavy.'),
(15, 7, 'cs', 'content4', 'Endddddcz'),
(16, 7, 'py', 'content4', 'Espanolt'),
(17, 23, 'cs', 'content2', 'Content 2'),
(18, 31, 'py', 'content1', 'Soluciones modernas para su proyecto'),
(19, 31, 'gn', 'content1', 'Peteĩ solución moderna nde proyecto-pe'),
(20, 1, 'cs', 'content1', 'Nabízíme nástroje'),
(21, 1, 'cs', 'content2', 'na'),
(22, 1, 'cs', 'content3', 'udržení osobní svobody'),
(23, 1, 'cs', 'content4', 'ochranu soukromí'),
(24, 19, 'cs', 'content5', 'Spusťte svůj vlastní cestovatelský obchod a začněte vydělávat ještě dnes.'),
(25, 19, 'cs', 'content7', 'Od 50 Kč / měsíc'),
(26, 19, 'cs', 'content8', 'Žádné skryté poplatky'),
(27, 1, 'cs', 'content5', 'krizové situace'),
(28, 1, 'cs', 'content7', 'soukromí'),
(29, 1, 'cs', 'content8', 'nezávislost'),
(30, 31, 'cs', 'content1', 'Nabízíme produkty které ochraňují osobní svobody'),
(31, 31, 'cs', 'content3', 'Nástroje na ochranu soukromí'),
(32, 31, 'cs', 'content7', 'Vybavení na všechny možné situace'),
(33, 31, 'cs', 'content8', 'Nabízíme vybavení pro nomádský život i krizové situace'),
(34, 31, 'cs', 'content5', 'Nástroje na ochranu soukromí'),
(35, 31, 'cs', 'content6', 'Státy mohou zneužívat informace které po sobě zanecháme'),
(36, 31, 'cs', 'content4', 'Především stát ubližuje, zneužívá informace které po sobě zanecháme.'),
(37, 31, 'cs', 'content2', 'Nabízíme možnost odloučit se od státu a žít v paralelní svobodné společnosti.'),
(38, 31, 'cs', 'content9', 'Nástroje na udržení osobní svobody'),
(39, 31, 'cs', 'content10', 'Nabízíme produkty které ochraňují osobní svobody'),
(40, 14, 'cs', 'content1', 'NomadSafe'),
(41, 19, 'cs', 'content2', 'Váš'),
(42, 22, 'cs', 'content1', 'dobrodruzi'),
(43, 7, 'cs', 'content1', 'Stát je organizovaný zločin​'),
(44, 7, 'cs', 'content2', 'Stáj má monopol na násilí, '),
(45, 25, 'cs', 'content1', 'Napis111'),
(46, 25, 'cs', 'content2', 'Díky unikátním datům a letitému know-how v oblasti pronájmů i prodejů nemovitostí se na nás obrací největší česká média. Komentujeme dění na trhu '),
(47, 25, 'cs', 'content10', 'fad fa-hiking\n'),
(48, 25, 'cs', 'content4', 'Díky unikátním datům a letitému know-how v oblasti pronájmů i prodejů nemovitostí se na nás obrací největší česká média. Komentujeme dění na trhu '),
(49, 25, 'cs', 'content6', 'Díky unikátním datům a letitému know-how v oblasti pronájmů i prodejů nemovitostí se na nás obrací největší česká média. Komentujeme dění na trhu '),
(50, 25, 'cs', 'content5', 'Contentmhjh 5'),
(51, 25, 'cs', 'content3', 'Content kkjk333'),
(52, 25, 'cs', 'content11', 'fad fa-hiking'),
(53, 25, 'cs', 'content12', 'fad fa-hiking'),
(54, 11, 'cs', 'content10', 'fad fa-hiking'),
(55, 11, 'cs', 'content2', 'Ať už cestujete nebo se připravujete na krizové situace, s tímto nástrojem budete mít přehled a plán pro jakoukoli situaci.'),
(56, 11, 'cs', 'content11', 'fad fa-hiking'),
(57, 11, 'cs', 'content12', 'fad fa-hiking'),
(58, 11, 'cs', 'content3', 'Content ada33'),
(59, 11, 'cs', 'content5', 'Content 55'),
(60, 11, 'cs', 'content6', 'Díky unikátním datům a letitému know-how v oblasti pronájmů i prodejů nemovitostí se na nás obrací největší česká média. Komentujeme dění na trhu '),
(61, 11, 'cs', 'content4', 'Díky unikátním datům a letitému know-how v oblasti pronájmů i prodejů nemovitostí se na nás obrací největší česká média. Komentujeme dění na trhu '),
(62, 38, 'cs', 'content1', 'At our digitald'),
(63, 38, 'cs', 'content2', 'At our digital agency, transparency isn\'t just a buzzword'),
(64, 38, 'cs', 'content10', 'fa-duotone fa-tree'),
(65, 38, 'cs', 'content11', 'fa-duotone fa-tree'),
(66, 38, 'cs', 'content12', 'fa-duotone fa-tree'),
(67, 38, 'cs', 'content13', 'fa-duotone fa-tree'),
(68, 38, 'cs', 'content4', 'At our digital agency, transparency isn\'t just a buzzwoadfrd'),
(69, 38, 'cs', 'content6', 'At our digital agency, transparency isn\'t just a ASFDA'),
(70, 38, 'cs', 'content8', 'At our digital agency, transparency isn\'t just a busadfafd'),
(71, 38, 'cs', 'content7', 'Default Contentasfa'),
(72, 38, 'cs', 'content5', 'Default Coasfd'),
(73, 38, 'cs', 'content3', 'Default Csadffaffdsf'),
(74, 31, 'cs', 'content17', '/assets/template/mizzle/images/saas-bg.jpg'),
(75, 7, 'cs', 'content11', 'bi bi-chat-heart'),
(76, 7, 'cs', 'content12', 'bi bi-chat-heart'),
(77, 33, 'cs', 'content1', 'Nástroj OPSEC'),
(78, 33, 'cs', 'content2', 'Každý problém je třeba vyhodnotit na základě tří klíčových faktorů: pravděpodobnost, dopad na život a náklady na řešení. Jednotlivé faktory samy o sobě nemusí nutně znamenat, že problém je závažný. Důležité je vzít v úvahu jejich kombinaci. Například, vysoká pravděpodobnost ne vždy znamená, že situaci musíme řešit, pokud je dopad na život nebo náklady zanedbatelné. Naopak, i problém s nízkou pravděpodobností může být závažný, pokud má obrovský dopad na život a náklady na řešení jsou vysoké.'),
(79, 33, 'cs', 'content3', 'Identifikujte problém: Zadejte název problému, který vás trápí, a krátký popis situace. Například \"Ztráta pasu v zahraničí.\"'),
(80, 33, 'cs', 'content12', '/assets/template/mizzle/images/saas-bg.jpg'),
(81, 33, 'cs', 'content11', 'https://google.com'),
(82, 33, 'cs', 'content10', 'Know moree'),
(83, 39, 'cs', 'content2', 'Nástroj OPSEC vám umožní identifikovat možné problémy ještě před tím, než nastanou, a připravit si konkrétní kroky, které vás ochránní před nežádoucími následky. Ať už cestujete nebo se připravujete na krizové situace, s tímto nástrojem budete mít přehled a plán pro jakoukoli situaci.'),
(84, 39, 'cs', 'content1', 'Nástroje na ochranu soukromí'),
(85, 39, 'cs', 'content8', 'Provide responsive customer support to address shipping-related queries and issues.d'),
(86, 39, 'cs', 'content6', 'Nabízíme produkty které ochraňují osobní svobody'),
(87, 39, 'cs', 'content4', 'Nabízíme vybavení pro nomádský život i krizové situace'),
(88, 39, 'cs', 'content3', 'Vybavení na všechny možné situace'),
(89, 39, 'cs', 'content5', 'Nástroje na udržení osobní svobody'),
(90, 39, 'cs', 'content7', 'Customer supportt'),
(91, 39, 'cs', 'content10', 'bi bi-lightning-charge-fill'),
(92, 7, 'cs', 'content7', 'Nabízím vzdělávací činnosti, výuku programování, sjíždění řek na nafukovacích kánoích cestovatelské dovednosti a znalosti.tt'),
(93, 12, 'cs', 'content1', 'Noční automat'),
(94, 31, 'en', 'content1', 'Cretate moderní e-shop'),
(95, 21, 'en', 'content10', 'bi bi-1-square-fill'),
(96, 21, 'en', 'content11', 'bi bi-2-square-fill'),
(97, 21, 'en', 'content12', 'bi bi-3-square-fill'),
(98, 21, 'en', 'content4', 'Content 1'),
(99, 21, 'en', 'content6', 'Content 2'),
(100, 21, 'en', 'content8', 'Content 3'),
(101, 21, 'cs', 'content10', 'bi bi-1-square-fill'),
(102, 21, 'cs', 'content11', 'bi bi-1-square-fill'),
(103, 21, 'cs', 'content12', 'bi bi-1-square-fill'),
(104, 46, 'cs', 'content1', 'Moderní řešení pro'),
(105, 63, 'cs', 'content1', 'Předvídejte, připravte se, chraňte se'),
(106, 63, 'cs', 'content3', 'Nástroj pro správu rizik'),
(107, 63, 'cs', 'content4', 'S naším nástrojem budou neřešitelné situace již řešitelné'),
(108, 63, 'cs', 'content2', 'Tento nástroj Vám umožní snadno identifikovat krizové situace, odhadnout jejich závažnost a naplánovat protiopatření, která sníží dopady na minimum, ať už jste na cestách, nebo jen chcete mít jistotu, že máte vše pod kontrolou.'),
(109, 63, 'cs', 'content7', 'Připravte se a chraňte se'),
(110, 63, 'cs', 'content5', 'Analýza rizik OPSEC '),
(111, 63, 'cs', 'content9', 'Předpřipravené řešení'),
(112, 63, 'cs', 'content6', 'je jednoduchý proces pro řízení rizik a řešení kritických problémů dříve, než nastanou.'),
(113, 63, 'cs', 'content10', 'Předejděte nepříjemnostem, máme pro Vás připravený plán na nejrůznější krizové situace.'),
(114, 63, 'cs', 'content8', 'Vytvořte si seznam nejrůznějších situací které mohou nastat'),
(115, 58, 'cs', 'content3', 'Návody a tipy'),
(116, 58, 'cs', 'content4', 'Nástroje na udržení osobní svobody'),
(117, 58, 'cs', 'content5', 'Opatření proti rizikům'),
(118, 58, 'cs', 'content6', 'Nástroj OPSEC pomáhá našim uživatelům vyhodnotit kritické situace, a nabízí preventivní řešení.'),
(119, 58, 'cs', 'content10', 'Nabízíme vybavení pro nomádský život i krizové situace'),
(120, 58, 'cs', 'content9', 'Vybavení na všechny možné situace'),
(121, 58, 'cs', 'content7', 'Plán B - Paraquay'),
(122, 58, 'cs', 'content8', 'Nabízíme bezpečné místo, pro přespání i na uložení vašich věci: PAS, klíče, mobil. '),
(123, 33, 'cs', 'content4', 'Vyhodnoťte pravděpodobnost: Odhadněte, jak pravděpodobné je, že daný problém nastane. Nástroj umožňuje hodnotit na stupnici od 1 do 100. Čím vyšší číslo, tím větší pravděpodobnost. Např. ztráta pasu v zahraničí může být hodnocena jako 80, protože riziko je poměrně vysoké, pokud cestujete často.'),
(124, 33, 'cs', 'content5', 'Na základě těchto tří hodnot vám nástroj poskytne celkové hodnocení problému, které vám umožní lépe pochopit, jak vážně je třeba situaci řešit.'),
(125, 30, 'cs', 'content2', 'Content 3jjjjj'),
(126, 30, 'cs', 'content6', 'Na základě této analýzy můžete naplánovat preventivní opatření, jako například mít záložní kopie dokladů nebo uložit náhradní pas na bezpečném místě, třeba v hotelovém sejfu. Tím snížíte dopad na minimum.'),
(127, 30, 'cs', 'content9', ' Po zadání těchto hodnot vám nástroj OPSEC ukáže, že i když ztráta pasu není drahá na řešení, jedná se o vážný problém s vysokou pravděpodobností výskytu a velkým dopadem. '),
(128, 30, 'cs', 'content3', 'Nástroj OPSEC vám umožní identifikovat možné problémy ještě před tím, než nastanou, a připravit si konkrétní kroky, které vás ochránní před nežádoucími následky. Ať už cestujete nebo se připravujete na krizové situace, s tímto nástrojem budete mít přehled a plán pro jakoukoli situaci.'),
(129, 63, 'cs', 'content13', 'fa-sharp fa-light fa-bars-progress'),
(130, 63, 'cs', 'content12', 'Relevance problémů'),
(131, 63, 'en', 'content12', 'Relevance of the problem'),
(132, 33, 'en', 'content1', 'How to Use the Tool'),
(133, 64, 'cs', 'content2', 'S tímto nástrojem budete mít přehled a plán pro jakoukoli situaci. \n\n'),
(134, 64, 'cs', 'content1', 'Příprava na krizové situace'),
(135, 65, 'cs', 'content2', 'OPSEC je určený k analýze a řízení rizik, která mohou nastat ve vašem životě, ať už jste na cestách, připravujete se na krizové situace, nebo jen chcete mít jistotu, že máte vše pod kontrolou. Tento nástroj vám umožňuje snadno identifikovat problémy, odhadnout jejich závažnost a naplánovat protiopatření, která sníží dopady na minimum. '),
(136, 65, 'cs', 'content1', 'Nástroj Operational Security '),
(137, 63, 'cs', 'content16', 'fa-light fa-list'),
(138, 63, 'cs', 'content15', 'fa-sharp fa-light fa-shield-check'),
(139, 63, 'cs', 'content14', 'fa-light fa-joystick'),
(140, 63, 'cs', 'content18', 'Identifikujte problémy, vyhodnoťte jejich závažnost a vytvořte strategie ke zmírnění dopadů.'),
(141, 63, 'cs', 'content17', 'Relevance problému'),
(142, 1, 'cs', 'content6', 'cesty');

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
(11, '3box-v1'),
(12, '3box-v2'),
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
(6, 'Blog', 'blog', 2, 1, NULL),
(7, 'Test', 'test', 3, 1, NULL),
(9, 'Podtest', 'pod', 3, 1, 7),
(10, 'Lukostřelba', 'lukostrelba', 3, 1, 7),
(11, 'Kontakt', 'kontakt', 4, 1, NULL);

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
  MODIFY `components_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT pro tabulku `contents`
--
ALTER TABLE `contents`
  MODIFY `contents_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT pro tabulku `content_localizations`
--
ALTER TABLE `content_localizations`
  MODIFY `localization_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

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
  MODIFY `pages_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
