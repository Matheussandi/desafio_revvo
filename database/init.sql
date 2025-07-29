CREATE DATABASE IF NOT EXISTS leo_learning CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE leo_learning;

CREATE TABLE IF NOT EXISTS courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    description TEXT NOT NULL,
    image VARCHAR(255) NULL,
    is_new BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM courses;

INSERT INTO courses (title, description, image, is_new) VALUES
('PHP para Iniciantes', 'Curso completo de PHP do básico ao avançado com projetos práticos e exemplos reais.', NULL, TRUE),
('Design UI/UX', 'Aprenda os fundamentos do design de interfaces e experiência do usuário.', NULL, FALSE),
('Marketing Digital', 'Estratégias completas de marketing para o mundo digital e redes sociais.', NULL, TRUE),
('JavaScript Moderno', 'Domine JavaScript ES6+ e desenvolva aplicações web modernas e interativas.', NULL, TRUE),
('Fundamentos de React.js', 'Aprenda a biblioteca JavaScript mais popular para criar interfaces incríveis.', NULL, FALSE);
