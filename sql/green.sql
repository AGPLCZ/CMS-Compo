Změnil by jsi nějak názvy tabulek či sloupců, aby bylo vše konzistetní a bylo jasné pojmenování?  
components - to jsou jména komponent které jdou vložit na různé stránky, komponenty to jsou html šablony pro kousky / části stránky
pages - to je hlavní menu ale zároveň se tím vytvoří stránka na kterou jde vkládat mnoho komponentů a tím se seskládá obsah stránky
page_components - zde se ukládá která komponenta patří k jaké stránce "pages"  a taky se určuje jaký text ke komponentě patří který je uložen "page_contents"  
page_contents - zde je uložen veškerý obsah všech komponent - komponenty odsud mohou čerpat obsah

--
-- Struktura tabulky `components`
--

CREATE TABLE `components` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `components`
--

INSERT INTO `components` (`id`, `name`) VALUES
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
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `uri` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `menu_order` int NOT NULL,
  `visible_in_menu` tinyint(1) NOT NULL DEFAULT '1',
  `parent_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `pages`
--

INSERT INTO `pages` (`id`, `title`, `uri`, `menu_order`, `visible_in_menu`, `parent_id`) VALUES
(1, 'Úvod', 'https://eshop.dobrodruzi.cz', 1, 1, NULL),
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
-- Struktura tabulky `page_components`
--

CREATE TABLE `page_components` (
  `id` int NOT NULL,
  `page_id` int NOT NULL,
  `component_id` int NOT NULL,
  `content_id` int NOT NULL,
  `component_order` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Struktura tabulky `page_contents`
--

CREATE TABLE `page_contents` (
  `id` int NOT NULL,
  `page_id` int NOT NULL,
  `content_name` tinytext COLLATE utf8mb4_general_ci NOT NULL,
  `content1` text COLLATE utf8mb4_general_ci NOT NULL,
  `content2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content3` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content4` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content5` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content6` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content7` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content8` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content9` text COLLATE utf8mb4_general_ci NOT NULL,
  `content10` text COLLATE utf8mb4_general_ci NOT NULL,
  `content11` text COLLATE utf8mb4_general_ci NOT NULL,
  `content12` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



--
-- Indexy pro tabulku `components`
--
ALTER TABLE `components`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);


--
-- Indexy pro tabulku `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uri` (`uri`),
  ADD KEY `fk_pages_parent` (`parent_id`);

--
-- Indexy pro tabulku `page_components`
--
ALTER TABLE `page_components`
  ADD PRIMARY KEY (`page_id`,`component_id`,`content_id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `fk_component_id` (`component_id`),
  ADD KEY `fk_content_id` (`content_id`);

--
-- Indexy pro tabulku `page_contents`
--
ALTER TABLE `page_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_content` (`page_id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `components`
--
ALTER TABLE `components`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pro tabulku `contacts`
--
ALTER TABLE `contacts`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT pro tabulku `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pro tabulku `page_components`
--
ALTER TABLE `page_components`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pro tabulku `page_contents`
--
ALTER TABLE `page_contents`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;


--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `fk_pages_parent` FOREIGN KEY (`parent_id`) REFERENCES `pages` (`id`);

--
-- Omezení pro tabulku `page_components`
--
ALTER TABLE `page_components`
  ADD CONSTRAINT `fk_component_id` FOREIGN KEY (`component_id`) REFERENCES `components` (`id`),
  ADD CONSTRAINT `fk_content_id` FOREIGN KEY (`content_id`) REFERENCES `page_contents` (`id`),
  ADD CONSTRAINT `fk_page_id` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`);

--
-- Omezení pro tabulku `page_contents`
--
ALTER TABLE `page_contents`
  ADD CONSTRAINT `page_content` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
