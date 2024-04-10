CREATE TABLE template (
    id INT AUTO_INCREMENT PRIMARY KEY,
    page_id INT NOT NULL,
    template_id INT NOT NULL,
    CONSTRAINT fk_template_page FOREIGN KEY (page_id) REFERENCES pages(id),
    CONSTRAINT fk_template_template_id FOREIGN KEY (template_id) REFERENCES installed_templates(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE installed_templates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    path VARCHAR(255),
    UNIQUE(name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
