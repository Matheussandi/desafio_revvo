-- Banco de dados: meus_cursos
-- Script de inicialização

CREATE DATABASE IF NOT EXISTS meus_cursos;
USE meus_cursos;

-- Tabela de categorias
CREATE TABLE IF NOT EXISTS categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    cor VARCHAR(7) DEFAULT '#3498db',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tabela de cursos
CREATE TABLE IF NOT EXISTS cursos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(200) NOT NULL,
    descricao TEXT,
    categoria_id INT,
    instrutor VARCHAR(100),
    duracao_horas INT DEFAULT 0,
    progresso DECIMAL(5,2) DEFAULT 0.00,
    status ENUM('nao_iniciado', 'em_andamento', 'concluido') DEFAULT 'nao_iniciado',
    data_inicio DATE NULL,
    data_conclusao DATE NULL,
    nota DECIMAL(3,1) NULL,
    observacoes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id) ON DELETE SET NULL
);

-- Inserir categorias padrão
INSERT INTO categorias (nome, descricao, cor) VALUES
('Programação', 'Cursos de desenvolvimento de software', '#e74c3c'),
('Design', 'Cursos de design gráfico e UX/UI', '#9b59b6'),
('Marketing', 'Cursos de marketing digital e estratégias', '#f39c12'),
('Idiomas', 'Cursos de idiomas estrangeiros', '#27ae60'),
('Negócios', 'Cursos de gestão e empreendedorismo', '#34495e');

-- Inserir cursos de exemplo
INSERT INTO cursos (titulo, descricao, categoria_id, instrutor, duracao_horas, progresso, status) VALUES
('PHP para Iniciantes', 'Curso completo de PHP do básico ao avançado', 1, 'João Silva', 40, 25.50, 'em_andamento'),
('Design UI/UX', 'Fundamentos de design de interfaces', 2, 'Maria Santos', 30, 0.00, 'nao_iniciado'),
('Marketing Digital', 'Estratégias de marketing para o mundo digital', 3, 'Pedro Costa', 20, 100.00, 'concluido');
