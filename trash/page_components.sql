CREATE TABLE `page_components` (
  `page_id` int NOT NULL,
  `component_id` int NOT NULL,
  `content_id` int NOT NULL,
  `component_order` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Omezení pro tabulku `page_components`
--
ALTER TABLE `page_components`
  ADD CONSTRAINT `page_components_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`);

COMMIT;



-- Odstranění cizího klíče pro sloupec component_id
ALTER TABLE `page_components` DROP FOREIGN KEY `page_components_ibfk_2`;

-- Odstranění omezení pro sloupec component_id
ALTER TABLE `page_components` DROP INDEX `component_id`;

-- Aktualizace struktury tabulky pro povolení opakovaného použití component_id
ALTER TABLE `page_components` ADD INDEX `component_id` (`component_id`);

-- Potvrzení změn v tabulce
COMMIT;
