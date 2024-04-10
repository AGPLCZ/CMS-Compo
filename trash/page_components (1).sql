exportoval jsem tabulku: 

CREATE TABLE `page_components` (
  `page_id` int NOT NULL,
  `component_id` int NOT NULL,
  `content_id` int NOT NULL,
  `component_order` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `page_components`
--

INSERT INTO `page_components` (`page_id`, `component_id`, `content_id`, `component_order`) VALUES
(1, 1, 1, 1),
(1, 2, 1, 2),
(1, 3, 1, 3),
(1, 4, 1, 5),
(1, 11, 1, 4),
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

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `page_components`
--
ALTER TABLE `page_components`
  ADD PRIMARY KEY (`page_id`,`component_id`),
  ADD KEY `component_id` (`component_id`);


ALTER TABLE `page_components`
  ADD CONSTRAINT `page_components` FOREIGN KEY (`component_id`) REFERENCES `components` (`id`),
  ADD CONSTRAINT `page_components_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`);



potřebuji aby v tabulce page_components tyto sloupce page_id, component_id, content_id, odkazovali na:
page_id na tabulku pages sloupec id 
component_id na tabulku components sloupec id
content_id na tabulku page_content sloupec id



-- Přidání sloupců pro cizí klíče
ALTER TABLE `page_components`
  ADD COLUMN `page_id` INT NOT NULL AFTER `page_id`, -- Přidání sloupce pro cizí klíč pro tabulku pages
  ADD COLUMN `component_id` INT NOT NULL AFTER `component_id`, -- Přidání sloupce pro cizí klíč pro tabulku components
  ADD COLUMN `content_id` INT NOT NULL AFTER `content_id`; -- Přidání sloupce pro cizí klíč pro tabulku page_contents

-- Aktualizace stávajících sloupců
UPDATE `page_components` pc
INNER JOIN `pages` p ON pc.page_id = p.id
INNER JOIN `components` c ON pc.component_id = c.id
INNER JOIN `page_contents` pcn ON pc.content_id = pcn.id
SET pc.page_id = p.id, pc.component_id = c.id, pc.content_id = pcn.id;

-- Odstranění stávajícího primárního klíče a indexu pro sloupec component_id
ALTER TABLE `page_components`
  DROP PRIMARY KEY,
  DROP INDEX `component_id`;

-- Přidání nových omezení cizích klíčů a indexů
ALTER TABLE `page_components`
  ADD PRIMARY KEY (`page_id`, `component_id`, `content_id`),
  ADD CONSTRAINT `fk_page_id` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`),
  ADD CONSTRAINT `fk_component_id` FOREIGN KEY (`component_id`) REFERENCES `components` (`id`),
  ADD CONSTRAINT `fk_content_id` FOREIGN KEY (`content_id`) REFERENCES `page_content` (`id`);
