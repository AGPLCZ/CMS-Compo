-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Úte 16. dub 2024, 16:08
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
(6, 1, 'jedna', 'Místa konání​', 'Scházíme se v Brně a okolí, nejlepší učebna je sama příroda, v zimě hledáme úkryt v různých ​klubovnách.', 'Termíny akcí​', 'Na výlety vyrážíme o víkendech, kurzy a kroužky se konají ve všední dny. ​Zobrazit kalendář', 'Ceny', 'Dopravu, jídlo a ubytování na výletech si hradí děti sami (výdaje v řádu stokorun). Více informací najdete na stránce ​Ceny.', 'fad fa-hiking', 'fad fa-hiking', 'fad fa-hiking', '', '0', ''),
(7, 1, 'tři', 'Výlety', 'Cestovatelské a tábornické znalosti, dovednosti přežití. Zkušený průvodce, respektující přístup a spousta zábavy.​.', 'Kroužky​', 'Většinu času trávíme v pohybu, v přírodě, za každého počasí. Věnujeme se, pohybovým hrám a vzdělávacím činnostem.', 'Kurzy', 'Nabízím vzdělávací činnosti, výuku programování, sjíždění řek na nafukovacích kánojích, cestovatelské dovednosti a znalosti. ​', 'fad fa-hiking', 'fad fa-hiking', 'fad fa-hiking', '', '0', '');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`contents_id`),
  ADD KEY `page_content` (`page_id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `contents`
--
ALTER TABLE `contents`
  MODIFY `contents_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
