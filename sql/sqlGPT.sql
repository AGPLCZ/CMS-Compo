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



CREATE TABLE `content_localizations` (
  `localization_id` int(11) NOT NULL,
  `contents_id` int(11) NOT NULL,
  `language` varchar(10) NOT NULL,
  `field_name` varchar(255) NOT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE `installed_templates` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE `list_components` (
  `list_components_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



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



CREATE TABLE `templates` (
  `tamplates_id` int(11) NOT NULL,
  `pages_id` int(11) NOT NULL,
  `templates_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `components`
  ADD PRIMARY KEY (`pages_id`,`list_components_id`,`contents_id`),
  ADD UNIQUE KEY `id` (`components_id`),
  ADD KEY `fk_component_id` (`list_components_id`),
  ADD KEY `fk_content_id` (`contents_id`);


-- Indexy pro tabulku `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`contents_id`),
  ADD KEY `page_content` (`page_id`);

--
-- Indexy pro tabulku `content_localizations`
--
ALTER TABLE `content_localizations`
  ADD PRIMARY KEY (`localization_id`),
  ADD KEY `contents_id` (`contents_id`);

--
-- Indexy pro tabulku `installed_templates`
--
ALTER TABLE `installed_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexy pro tabulku `list_components`
--
ALTER TABLE `list_components`
  ADD PRIMARY KEY (`list_components_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexy pro tabulku `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`pages_id`),
  ADD UNIQUE KEY `uri` (`uri`),
  ADD KEY `fk_pages_parent` (`parent_id`);

--
-- Indexy pro tabulku `sms_messages`
--
ALTER TABLE `sms_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`tamplates_id`),
  ADD KEY `fk_template_page` (`pages_id`),
  ADD KEY `fk_template_template_id` (`templates_id`);

--
-- Indexy pro tabulku `users`
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
  MODIFY `components_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pro tabulku `contents`
--
ALTER TABLE `contents`
  MODIFY `contents_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pro tabulku `content_localizations`
--
ALTER TABLE `content_localizations`
  MODIFY `localization_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pro tabulku `installed_templates`
--
ALTER TABLE `installed_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pro tabulku `list_components`
--
ALTER TABLE `list_components`
  MODIFY `list_components_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pro tabulku `pages`
--
ALTER TABLE `pages`
  MODIFY `pages_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- Omezení pro tabulku `content_localizations`
--
ALTER TABLE `content_localizations`
  ADD CONSTRAINT `content_localizations_ibfk_1` FOREIGN KEY (`contents_id`) REFERENCES `contents` (`contents_id`);

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