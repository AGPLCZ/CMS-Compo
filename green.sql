-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Sob 13. dub 2024, 13:31
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
-- Databáze: `green2`
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

--
-- Struktura tabulky `contacts`
--

CREATE TABLE `contacts` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Number` varchar(50) DEFAULT NULL,
  `Tag` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `contacts`
--

INSERT INTO `contacts` (`Id`, `Name`, `Number`, `Tag`) VALUES
(1, 'Pavol Lupták\r\n', '421905400542', 'Ankap'),
(4, 'Filip Libertarián', '420776200929', 'Ankap'),
(5, 'Pavla Krbílková', '420777651743', 'Rodina'),
(6, 'Petr Jaša', '776049861', 'Rodina'),
(7, 'Taťka', '776025215', 'Rodina'),
(8, 'Babička Žatčany', '724382127', 'Rodina'),
(9, 'Dědeček', '776726514', 'Rodina'),
(10, 'Mamka', '724382128', 'Rodina'),
(11, 'Mirek', '734754418', 'Rodina'),
(12, 'Pavel Venclovský', '739570682', 'Instituce'),
(13, 'homolka ordinace', '541152750', 'Instituce'),
(14, 'ZVedent', '420736302341', 'Instituce'),
(15, 'Homolka', '732751905', 'Instituce'),
(16, 'Ivona Sedláková Ježek', '420731303720', 'Instituce'),
(17, 'Eva z práce', '731692252', 'Práce'),
(18, 'Líba', '420776421185', 'Práce'),
(19, 'Krček', '420731552733', 'Práce'),
(20, 'ABB dílna', '547152054', 'Práce'),
(21, 'Robert', '775679296', 'Práce'),
(22, 'Katka Šrámková', '608192148', 'Práce'),
(23, 'Zdenek', '420731573116', 'Práce'),
(24, 'Jiří Hort', '733693675', 'Práce'),
(25, 'Adámek Dokoupil', '739864885', 'Opice'),
(26, 'Tučková', '732563402', 'Opice'),
(27, 'Sonina mamka', '605912839', 'Opice'),
(28, 'Patrikova', '606850369', 'Opice'),
(29, 'Tuček', '420605578602', 'Opice'),
(30, 'Patrik Brada Strýc', '420777204351', 'Opice'),
(31, 'Patrik Bradová', '420777568587', 'Opice'),
(32, 'sestra od Aleny', '420608752005', 'Opice'),
(33, 'Miki Tuček', '739605109', 'Opice'),
(34, 'Kubik Navratilová', '733511081', 'Opice'),
(35, 'AG', '420605563263', 'Ja'),
(36, 'Kaktus', '420735528343', 'Ja'),
(37, 'Theo  -Mirka Misáková', '777321179', 'Dobro'),
(38, 'Theo Táta P', '420608741938', 'Dobro'),
(39, 'Mates', '721224644', 'Kamarádi'),
(40, 'Jarča', '774361826', 'Kamarádi'),
(41, 'Boha', '728129126', 'Kamarádi'),
(42, 'Šárka', '607487689', 'Skaut'),
(43, 'Filip', '776516925', 'Skaut'),
(44, 'Andrej', '608088750', 'Skaut'),
(45, 'Anda', '773125493', 'Skaut'),
(46, 'Mike', '720069807', 'Skaut'),
(47, 'Chinese', '737088396', 'Skaut'),
(48, 'Martin Matyáš', '420608642615', 'Skaut'),
(49, 'Bety', '737706142', 'Skaut'),
(50, 'Šany', '606571612', 'Skaut'),
(51, 'Šany prac', '420730898702', 'Skaut'),
(52, 'Šany', '777199455', 'Skaut'),
(53, 'Lada', '420777296982', 'Skaut'),
(54, 'Hanka Baláková', '420770694794', 'Skaut'),
(55, 'Vojta Újezd', '420722404190', 'Děti'),
(56, 'Dan', '420703362304', 'Děti'),
(57, 'Saša', '420606785456', 'Skaut'),
(58, 'Elijáš Dítě', '420733153475', 'Děti'),
(59, 'Mojmír Brácha  od Šimona', '737333882', 'Děti'),
(60, 'Karel', '604822067', 'Děti'),
(61, 'Hronova', '604670331', 'Rodiče'),
(62, 'danuv tata Tretera', '606642859', 'Rodiče'),
(63, 'eliáš habinger babička', '608475839', 'Rodiče'),
(64, 'Snášel', '725992340', 'Rodiče'),
(65, 'Snášelová', '725992341', 'Rodiče'),
(66, 'Plchova', '420608253487', 'Rodiče'),
(67, 'Vykouřil', '420606438902', 'Rodiče'),
(68, 'Franta Vykouřil', '777519201', 'Rodiče');

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
(6, 1, 'jedna', 'Výlety', 'Cestovatelské a tábornické znalosti, dovednosti přežití. Zkušený průvodce, respektující přístup a spousta zábavy.​', 'Kroužky​', 'Většinu času trávíme v pohybu, v přírodě, za každého počasí. Věnujeme se, pohybovým hrám a vzdělávacím činnostem.​', 'Kurzy', 'Nabízím vzdělávací činnosti, výuku programování, sjíždění řek na nafukovacích kánojích, cestovatelské dovednosti a znalosti. ​', 'fad fa-hiking', 'fad fa-hiking', 'fad fa-hiking', '', '0', ''),
(7, 1, 'tři', 'Výlety6', 'Cestovatelské a tábornické znalosti, dovednosti přežití. Zkušený průvodce, respektující přístup a spousta zábavy.​...', 'Kroužky​', 'Většinu času trávíme v pohybu, v přírodě, za každého počasí. Věnujeme se, pohybovým hrám a vzdělávacím činnostem.​', 'Kurzy', 'Nabízím vzdělávací činnosti, výuku programování, sjíždění řek na nafukovacích kánojích, cestovatelské dovednosti a znalosti. ​', 'fad fa-hiking', 'fad fa-hiking', 'fad fa-hiking', '', '0', '');

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
(2, 'Bitcoin VexlATM', 'bitcoin', 2, 1, NULL),
(3, 'Vybavení', 'vybaveni', 3, 0, NULL),
(4, 'Příspěvky', 'articles', 4, 0, NULL),
(5, 'Lektorské služby pro děti', 'https://dobrodruzi.cz', 5, 1, NULL),
(6, 'Blog', 'blog', 2, 1, NULL),
(8, 'Cestovní časová osa', 'timeline', 8, 1, 10),
(9, 'Cestovní deník', 'travel', 7, 1, 10),
(10, 'Cestovní zápisky', 'nic', 10, 1, NULL);

-- --------------------------------------------------------

--
-- Struktura tabulky `sms_messages`
--

CREATE TABLE `sms_messages` (
  `id` int(11) NOT NULL,
  `from` varchar(255) DEFAULT NULL,
  `fromName` varchar(255) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `sent_stamp` datetime DEFAULT NULL,
  `received_stamp` datetime DEFAULT NULL,
  `sim` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `sms_messages`
--

INSERT INTO `sms_messages` (`id`, `from`, `fromName`, `text`, `sent_stamp`, `received_stamp`, `sim`) VALUES
(25, '420605563263', 'Michal', 'Hello, long time no see, when will we meet?', '2024-03-02 22:20:44', '2024-03-02 22:20:44', 'sim1'),
(26, '420605563264', 'Fog', 'I already found it, I\'ll bring it to you tomorrow', '2024-03-02 22:20:44', '2024-03-02 22:20:44', 'sim2'),
(30, '420605563265', 'Ages', 'I have already programmed it, but I still need time to finish it. I\'ll see tomorrow, maybe it\'ll be done already', '2024-03-03 08:36:11', '2024-03-03 08:36:11', 'sim1'),
(31, '420605563264', 'Fog', 'I\'m going', '2024-03-02 22:20:44', '2024-03-02 22:20:44', 'sim2'),
(34, '420606785456', 'Saša', 'Ahojky, připomínám dnešní poradu ohledně ZVaS v 16hodin na googlemeet. Odkaz bude na webu. Doufám že se nás potká co nejvíc. Sušenka', '2024-03-03 13:41:25', '2024-03-03 13:41:26', 'sim1'),
(45, 'GoPay', 'GoPay', 'Vas SMS kod je 1113', '2024-03-07 16:56:30', '2024-03-07 16:56:38', 'sim2'),
(46, '420608752005', 'sestra od Aleny Nováková', 'Ahoj Petre, chtela bych se te na neco zeptat, tak jestli mi muzes zavolat, az budes mit cas. \nZuzka Novakova ', '2024-03-07 20:02:17', '2024-03-07 20:02:18', 'sim2'),
(47, 'VITAKARTA', 'VITAKARTA', 'Prihlasovaci kod portalu OZP VITAKARTA: 136 170 774', '2024-03-08 09:04:16', '2024-03-08 09:04:17', 'sim2'),
(48, 'kytary.cz', 'kytary.cz', 'KYTARY.CZ:Vase objednavka OBJ 240 607 48 je pripravena k vyzvednuti na odbernem miste Lidicka 28, Brno do 13.3.. Zbozi si muzete vyzvednout v ramci oteviraci doby, ktera je uvedena na webu https://kytary.cz/StaticPage/Content/Contact', '2024-03-08 09:47:51', '2024-03-08 09:47:52', 'sim2'),
(49, 'GoPay', 'GoPay', 'Vas SMS kod je 8014', '2024-03-08 10:45:11', '2024-03-08 10:45:11', 'sim2'),
(50, 'Info', 'Info', 'Vas overovaci kod pro nastaveni telefonu na Portalu obcana je: 99325236 (obcan.portal.gov.cz).', '2024-03-08 11:07:26', '2024-03-08 11:07:27', 'sim2'),
(51, '420608752005', 'sestra od Aleny Nováková', 'Tak to zkusim nacpat do zpravy.. Loni jsem vzala skupinu deti do Menina do kina. Jeli jsme ve 4 busem, dali prochazku a po kine je rodice vyzvedli. Je tam dobry, ze nemusim koukat s nimi a da se cekat v té jejich kavarne. \nPristi patek hraji pohadku. Kdyz vezmu kluky, tak ti ubyde pul skautu. Tak me napadlo, jestli si nechces udelat vylet se mnou, ze by jeli vsichni. Ale musi se koupit listky dopredu, byva tam plno. \nZ.\n', '2024-03-08 13:02:23', '2024-03-08 13:02:38', 'sim2'),
(52, '420608752005', 'sestra od Aleny Nováková', 'Ok. Odvoz bych domluvila. ', '2024-03-08 14:06:28', '2024-03-08 14:06:28', 'sim2'),
(53, '420605578602', 'Oliver Tuček', 'Nepůjdu na skaut ', '2024-03-08 15:53:17', '2024-03-08 15:53:19', 'sim2'),
(54, 'Info', 'Info', 'Portal obcana - notifikace: do datove schranky (bduzy7h) Vam byla dorucena nova datova zprava.', '2024-03-08 16:07:38', '2024-03-08 16:07:39', 'sim2'),
(55, 'VITAKARTA', 'VITAKARTA', 'Prihlasovaci kod portalu OZP VITAKARTA: 030 450 413', '2024-03-10 14:30:55', '2024-03-10 14:30:57', 'sim2'),
(56, '420608752005', 'sestra od Aleny Nováková', 'Ahoj, s Patrikovou mamkou jsem mluvila, nic doma nerekl, ale jede v patek k tatkovi. Trkanu se muzu poptat. Mne se holky taky zatim neozvaly..', '2024-03-11 15:32:35', '2024-03-11 15:32:36', 'sim2'),
(57, '420608752005', 'sestra od Aleny Nováková', 'Ahoj, tak jsem psala maminkam, kluci to doma rekli zmatecne, tak to nikdo nepochopil. \nPojede Simon, Jindra, Eliasek. (Patrik, Olik ne) Nevim, kdo jeste chodi?', '2024-03-12 11:51:07', '2024-03-12 11:51:08', 'sim2'),
(58, '420608752005', 'sestra od Aleny Nováková', 'Sima mluvil o nejakym klukovi z Menina, ze se chtel pridat tam. Tak jestli mi posles cislo na rodice, zavolam jim. At chlapecek neni smutny, ze mu to uteklo. ', '2024-03-12 11:52:12', '2024-03-12 11:52:13', 'sim2'),
(59, '420608752005', 'sestra od Aleny Nováková', 'Vecer bych chtela koupit listky, uz se to plni.. ', '2024-03-12 11:52:28', '2024-03-12 11:52:29', 'sim2'),
(60, '420608752005', 'sestra od Aleny Nováková', 'Je mi jedno, jestli se pridas nebo si udelas volno. Jak chces ty. ', '2024-03-12 11:56:28', '2024-03-12 11:56:29', 'sim2'),
(61, '420608752005', 'sestra od Aleny Nováková', 'Tak Adamek pojede taky. Kuba by se pridal treba jen na hriste. ', '2024-03-12 13:46:28', '2024-03-12 13:46:30', 'sim2'),
(62, '420608752005', 'sestra od Aleny Nováková', 'Diky. Jsem uz domluvila i vetsi veci, nez kino. 😃\nJeste cekam na vyjadreni nekterych holcicek, tak ted jsem nervozni, abych stihla chytit mista vedle sebe. 🙈', '2024-03-12 13:57:51', '2024-03-12 13:57:54', 'sim2'),
(63, '420608752005', 'sestra od Aleny Nováková', 'Tak mam nakonec domluvenych deset deti. Listky uz jsem koupila. ', '2024-03-12 19:59:51', '2024-03-12 19:59:52', 'sim2'),
(64, 'GOCZ', 'GOCZ', 'OS: Vidite dokonale ostre? Prijdte si do GrandOptical pro nove bryle se slevou az 50 % na skla. Pozor, akce plati pouze do 20.3.2024. Vice informaci v prodejnach nebo na gocz.cz/KAaHrl.\nOdhlasit na gocz.cz/8hpZu9', '2024-03-13 09:56:23', '2024-03-13 09:56:24', 'sim2'),
(65, '6220', '6220', 'Dobry den, radi bychom Vam pripomneli moznost dentalni hygieny v ordinaci ZVEDENT. Kontakty: objednani@zvedent.cz, 775311221, facebook.com/zvedent. Tesime se :)', '2024-03-15 06:00:15', '2024-03-15 06:00:16', 'sim2'),
(66, '420608752005', 'sestra od Aleny Nováková', 'Ahojky, tak nakonec mam deti 12. Jeste vas Ondra se Zuzkou. Pocasi vypada zatim uzasne.', '2024-03-15 10:16:44', '2024-03-15 10:16:45', 'sim2'),
(67, '420608752005', 'sestra od Aleny Nováková', 'Bezva. Ja taky. Bavi me vylety s detma. ☺️\n', '2024-03-15 11:03:42', '2024-03-15 11:03:42', 'sim2'),
(68, '420608752005', 'sestra od Aleny Nováková', 'https://photos.app.goo.gl/rJen6BtSgSHjx9oJ7', '2024-03-15 20:39:28', '2024-03-15 20:39:28', 'sim2'),
(69, 'Air Bank', 'Air Bank', 'Dobry den, platbu kartou ****2140 v obchode HEROHERO.CO jsme zamitli kvuli nedostatecnemu zustatku. Poslete si prosim na ucet penize. Vase Air Bank', '2024-03-18 19:30:27', '2024-03-18 19:30:28', 'sim2'),
(70, 'github', 'github', '916784 is your GitHub authentication setup code.\n\n@github.com #916784', '2024-03-19 17:17:10', '2024-03-19 17:17:10', 'sim2'),
(71, 'CZ.NIC', 'CZ.NIC', 'Dobry den, upozornujeme Vas, ze dne 25.03.2024 bude zrusena domena mladidobrodruzi.cz. Dalsi informace poskytneme na cisle 222745111. S pozdravem CZ.NIC', '2024-03-20 14:09:49', '2024-03-20 14:09:49', 'sim2'),
(72, 'Air Bank', 'Air Bank', 'Dobry den, platbu kartou ****2140 v obchode HEROHERO.CO jsme zamitli kvuli nedostatecnemu zustatku. Poslete si prosim na ucet penize. Vase Air Bank', '2024-03-21 19:31:30', '2024-03-21 19:31:31', 'sim2'),
(73, 'GoPay', 'GoPay', 'Vas SMS kod je 1837', '2024-03-22 07:19:48', '2024-03-22 07:19:48', 'sim2'),
(74, '420606571612', '606 571 612', 'Ahoj AG, mas dnes schuzku Opic? Zitra je totiz od 9:00 v Zatcanech den prn obec. Sraz na hristi. Vyridis jim to? Ja tam budu, takze mohu pripadne Opice doprovazet. Omlouvam se, ze pisi tak pozde, zjistil jsem to az tento tyden. Diky. Sany', '2024-03-22 12:34:42', '2024-03-22 12:34:44', 'sim2'),
(75, '420606571612', '606 571 612', 'Diky. Kde mate sraz? U orlovny? Sany', '2024-03-22 12:47:19', '2024-03-22 12:47:19', 'sim2'),
(76, '420605578602', 'Oliver Tuček', 'AG bohužel nejdu na tu akci protože mám rodinou akci😭', '2024-03-22 20:20:15', '2024-03-22 20:20:16', 'sim2'),
(77, 'Air Bank', 'Air Bank', 'Dobry den, platbu kartou ****2140 v obchode HEROHERO.CO jsme zamitli kvuli nedostatecnemu zustatku. Poslete si prosim na ucet penize. Vase Air Bank', '2024-03-22 21:02:48', '2024-03-22 21:02:48', 'sim2'),
(78, '420605578602', 'Oliver Tuček', 'Jo', '2024-03-23 08:22:53', '2024-03-23 08:22:53', 'sim2'),
(79, '420606571612', '606 571 612', 'Ahoj AG, vcera z Opic dorazili Šimon a Jindra. Sany', '2024-03-24 11:13:17', '2024-03-24 11:13:17', 'sim2'),
(80, 'Air Bank', 'Air Bank', 'Dobry den, platbu kartou ****2140 v obchode CHATGPT SUBSCRIPTION jsme zamitli kvuli nedostatecnemu zustatku. Poslete si prosim na ucet penize. Vase Air Bank', '2024-03-24 20:58:00', '2024-03-24 20:58:00', 'sim2'),
(81, 'Air Bank', 'Air Bank', 'Dobry den, platbu kartou ****2140 v obchode SUNO INC. jsme zamitli kvuli nedostatecnemu zustatku. Poslete si prosim na ucet penize. Vase Air Bank', '2024-03-25 13:08:35', '2024-03-25 13:08:35', 'sim2'),
(82, 'AUTHMSG', 'AUTHMSG', 'Your Link verification code is: 369267. To stop receiving these messages, visit support.link.com/sms-opt-out?id=VQs1cJMPqkY%23GgUI6gEYAQ', '2024-03-25 13:09:12', '2024-03-25 13:09:11', 'sim2'),
(83, 'AUTHMSG', 'AUTHMSG', 'Your Link verification code is: 213240. To stop receiving these messages, visit support.link.com/sms-opt-out?id=ZEHUZsbOYgQ%23GgUI6gEYAQ', '2024-03-25 16:40:07', '2024-03-25 16:40:07', 'sim2'),
(84, 'Raiffeisen', 'Raiffeisen', 'Vazeny kliente, mejte prehled o svych produktech stavebni sporitelny prehledne na jednom miste. Aktivujte si moderni internetovou a mobilni aplikaci online za par minut. Soucasny Internet servis bude v druhe polovine roku ukoncen. Vice informaci na https://www.rsts.cz/digi. Vase Raiffeisen stavebni sporitelna', '2024-03-26 14:14:05', '2024-03-26 14:14:07', 'sim2'),
(85, '420607487689', 'Šárka', 'Saša bude za chvíli otevrírat přihlašování na zvas tak tam hoďte družinky kdo chcete', '2024-03-28 19:57:06', '2024-03-28 19:57:08', 'sim2'),
(86, '420608088750', 'Andrej', 'Je dnes skaut', '2024-03-29 16:26:31', '2024-03-29 16:26:34', 'sim2'),
(87, '420606785456', 'Saša', 'Ahojky, přihlas si šestku na závod prosím 😌 ať jsme tam za Újezd vši 😉', '2024-04-02 20:54:58', '2024-04-02 20:55:00', 'sim2'),
(88, '420606785456', 'Saša', 'Ahojky, hele neozval jsi se na zadnej e-mail, ale i tak by me zajímalo esi jsi ochotny pomáhat se ZVaSem...? \nA přihlas si je prosím na ten ZVaS at vim o kolik este musim navysit kapacitu', '2024-04-04 11:59:25', '2024-04-04 11:59:28', 'sim2'),
(89, '420606785456', 'Saša', 'Úplně v pohodě nejsi jediný kdo pomáhat nebude, chápu že jsou někdy důležitější věci :) Pujdes si tedy s nima zavod jako jejich vedouci a hotovo, pripadne pomoc patek odpo chystatni a pak uklid by byla super, ale nemusis to slibit ted.\nNo bude to 4.5.\nJelikož máš dětí v Isu 8 coz je max pro zavod, tak je prihlasim vsechny a proste kdo nedojde, nedojde. Minimum pro ucast je 4 coz urco budou :)', '2024-04-04 13:29:21', '2024-04-04 13:29:25', 'sim2'),
(90, '420606785456', 'Saša', 'Hotovo :) díky za domluvu a měj se pěkně a doufám že problémy se dobře vyřeší :) ', '2024-04-04 13:33:24', '2024-04-04 13:33:25', 'sim2'),
(91, 'Air Bank', 'Air Bank', 'Dobry den, platbu kartou ****2140 v obchode NETFLIX.COM jsme zamitli kvuli nedostatecnemu zustatku. Poslete si prosim na ucet penize. Vase Air Bank', '2024-04-06 03:36:56', '2024-04-06 03:36:58', 'sim2'),
(92, 'Air Bank', 'Air Bank', 'Dobry den, platbu kartou ****2140 v obchode NETFLIX.COM jsme zamitli kvuli nedostatecnemu zustatku. Poslete si prosim na ucet penize. Vase Air Bank', '2024-04-06 09:44:42', '2024-04-06 09:44:43', 'sim2');

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
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `user`, `pass`) VALUES
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
