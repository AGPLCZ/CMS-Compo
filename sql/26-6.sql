-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Stř 26. čen 2024, 01:20
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
(3, 1, 13, 7, 4),
(50, 1, 16, 25, 4),
(35, 1, 17, 11, 4),
(34, 1, 18, 0, 5),
(55, 1, 18, 30, 4),
(56, 1, 19, 31, 3),
(58, 1, 20, 33, 4),
(59, 1, 21, 34, 5),
(63, 1, 22, 38, 8),
(62, 1, 23, 37, 8),
(64, 1, 25, 39, 8),
(43, 6, 1, 18, 1),
(47, 6, 2, 22, 2),
(44, 6, 3, 19, 2),
(45, 6, 4, 20, 50),
(39, 6, 13, 12, 5),
(46, 6, 13, 21, 7),
(52, 6, 16, 27, 6),
(53, 6, 17, 28, 6),
(54, 6, 17, 29, 6);

-- --------------------------------------------------------

--
-- Struktura tabulky `contents`
--

CREATE TABLE `contents` (
  `contents_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `content1` text DEFAULT NULL,
  `content2` text DEFAULT NULL,
  `content3` text DEFAULT NULL,
  `content4` text DEFAULT NULL,
  `content5` text DEFAULT NULL,
  `content6` text DEFAULT NULL,
  `content7` text DEFAULT NULL,
  `content8` text DEFAULT NULL,
  `content9` text DEFAULT NULL,
  `content10` text DEFAULT NULL,
  `content11` text DEFAULT NULL,
  `content12` text DEFAULT NULL,
  `content13` text DEFAULT NULL,
  `content14` text DEFAULT NULL,
  `content15` text DEFAULT NULL,
  `content16` text DEFAULT NULL,
  `content17` text DEFAULT NULL,
  `content18` text DEFAULT NULL,
  `content19` text DEFAULT NULL,
  `content20` text DEFAULT NULL
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
(32, 1, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 1, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 1, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 1, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 1, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 1, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 1, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 1, 'Nový Obsah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(6, 21, 'en', 'content7', 'Englicky'),
(7, 12, 'en', 'content1', 'Contentky'),
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
(20, 1, 'cs', 'content1', 'Planeta je náš domov,'),
(21, 1, 'cs', 'content2', 'ne území'),
(22, 1, 'cs', 'content3', 'státu'),
(23, 1, 'cs', 'content4', 'mafie'),
(24, 19, 'cs', 'content5', 'Spusťte svůj vlastní cestovatelský obchod a začněte vydělávat ještě dnes.'),
(25, 19, 'cs', 'content7', 'Od 50 Kč / měsíc'),
(26, 19, 'cs', 'content8', 'Žádné skryté poplatky'),
(27, 1, 'cs', 'content5', 'itcoin'),
(28, 1, 'cs', 'content7', 'Svoboda'),
(29, 1, 'cs', 'content8', 'Respekt'),
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
(40, 14, 'cs', 'content1', 'dobrodruzi'),
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
(55, 11, 'cs', 'content2', 'Díky unikátním datům a letitému know-how v oblasti pronájmů i prodejů nemovitostí se na nás obrací největší česká média. Komentujeme dění na trhu '),
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
(77, 33, 'cs', 'content1', 'Seamless connections for enhanced performan'),
(78, 33, 'cs', 'content2', 'Explore our array of integrations that effortlessly connect with your existing tools and amplify your workflow efficiency.fasf'),
(79, 33, 'cs', 'content3', 'Connect with a wide range of third-party applicationsdd'),
(80, 33, 'cs', 'content12', '/assets/template/mizzle/images/saas-bg.jpg'),
(81, 33, 'cs', 'content11', 'https://google.com'),
(82, 33, 'cs', 'content10', 'Know moree'),
(83, 39, 'cs', 'content2', 'Ensure timely and dependable delivery services to meet customer expectations.dfa'),
(84, 39, 'cs', 'content1', 'Fast and reliable deliverdsy'),
(85, 39, 'cs', 'content8', 'Provide responsive customer support to address shipping-related queries and issues.d'),
(86, 39, 'cs', 'content6', 'Clearly outline your return and exchange policy, making it easy for customers to initiate returns.d'),
(87, 39, 'cs', 'content4', 'Offer real-time tracking information, so customers can monitor the status of their shipments.d'),
(88, 39, 'cs', 'content3', 'Package trackingg'),
(89, 39, 'cs', 'content5', 'Returns and exchangess'),
(90, 39, 'cs', 'content7', 'Customer supportt'),
(91, 39, 'cs', 'content10', 'bi bi-lightning-charge-fill');

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
(19, 'component1'),
(20, 'component2'),
(21, 'component3'),
(22, 'component4'),
(23, 'component5'),
(24, 'component6'),
(25, 'component7'),
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
(6, 'Blog', 'blog', 2, 1, NULL),
(7, 'Test', 'test', 3, 1, NULL),
(9, 'Podtest', 'pod', 3, 1, 7);

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
  MODIFY `components_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT pro tabulku `contents`
--
ALTER TABLE `contents`
  MODIFY `contents_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pro tabulku `content_localizations`
--
ALTER TABLE `content_localizations`
  MODIFY `localization_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT pro tabulku `installed_templates`
--
ALTER TABLE `installed_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pro tabulku `list_components`
--
ALTER TABLE `list_components`
  MODIFY `list_components_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pro tabulku `pages`
--
ALTER TABLE `pages`
  MODIFY `pages_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- Omezení pro tabulku `templates`
--
ALTER TABLE `templates`
  ADD CONSTRAINT `fk_template_page` FOREIGN KEY (`pages_id`) REFERENCES `pages` (`pages_id`),
  ADD CONSTRAINT `fk_template_template_id` FOREIGN KEY (`templates_id`) REFERENCES `installed_templates` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
