
-- Přidání sloupce id s auto inkrementem jako primární klíč
ALTER TABLE `page_components`
  ADD COLUMN `id` INT AUTO_INCREMENT PRIMARY KEY FIRST;


-- Přidání sloupce id s auto inkrementem
ALTER TABLE `page_components`
  ADD COLUMN `id` INT AUTO_INCREMENT UNIQUE FIRST;
