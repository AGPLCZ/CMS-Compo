

CREATE TABLE `components` (
  `components_id` int(11) NOT NULL,
  `pages_id` int(11) NOT NULL,
  `list_components_id` int(11) NOT NULL,
  `contents_id` int(11) NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



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


ALTER TABLE `components`
  ADD PRIMARY KEY (`pages_id`,`list_components_id`,`contents_id`),
  ADD UNIQUE KEY `id` (`components_id`),
  ADD KEY `fk_component_id` (`list_components_id`),
  ADD KEY `fk_content_id` (`contents_id`);

ALTER TABLE `contents`
  ADD PRIMARY KEY (`contents_id`),
  ADD KEY `page_content` (`page_id`);

ALTER TABLE `list_components`
  ADD PRIMARY KEY (`list_components_id`),
  ADD UNIQUE KEY `name` (`name`);

ALTER TABLE `pages`
  ADD PRIMARY KEY (`pages_id`),
  ADD UNIQUE KEY `uri` (`uri`),
  ADD KEY `fk_pages_parent` (`parent_id`);

ALTER TABLE `sms_messages`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `components`
  MODIFY `components_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

ALTER TABLE `contents`
  MODIFY `contents_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `list_components`
  MODIFY `list_components_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

ALTER TABLE `pages`
  MODIFY `pages_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;


ALTER TABLE `components`
  ADD CONSTRAINT `fk_component_id` FOREIGN KEY (`list_components_id`) REFERENCES `list_components` (`list_components_id`),
  ADD CONSTRAINT `fk_content_id` FOREIGN KEY (`contents_id`) REFERENCES `contents` (`contents_id`),
  ADD CONSTRAINT `fk_page_id` FOREIGN KEY (`pages_id`) REFERENCES `pages` (`pages_id`);

ALTER TABLE `contents`
  ADD CONSTRAINT `page_content` FOREIGN KEY (`page_id`) REFERENCES `pages` (`pages_id`);

ALTER TABLE `pages`
  ADD CONSTRAINT `fk_pages_parent` FOREIGN KEY (`parent_id`) REFERENCES `pages` (`pages_id`);

