CREATE DATABASE IF NOT EXISTS aula_pdo;
USE aula_pdo;

-- TABELA DE PROJETOS
CREATE TABLE projetos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    duracao INT NOT NULL,
    responsavel VARCHAR(100) NOT NULL
);

-- TABELA DE USUÁRIOS
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

-- TABELA DE LOG
CREATE TABLE logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    projeto_id INT NULL,
    acao VARCHAR(50) NOT NULL,
    data_hora DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

-- Senha do usuário abaixo: 123456
-- A senha não fica salva em texto puro. O PHP compara usando password_verify().
INSERT INTO usuarios (nome, email, senha)
VALUES (
    'Aluno Teste',
    'aluno@teste.com',
    '$2y$12$OkcvRBsAR/0ObL/S9D60lOCeufnYGlCMAakHkLZY00t.gkuFUoE7S'
);

-- PROJETOS PARA TESTE
INSERT INTO projetos (nome, duracao, responsavel)
VALUES ('Projeto 01', 3, 'Maria');

INSERT INTO projetos (nome, duracao, responsavel)
VALUES ('Projeto 02', 9, 'Lucas');

INSERT INTO projetos (nome, duracao, responsavel)
VALUES ('Projeto 03', 10, 'Fernando');

SELECT * FROM projetos;
SELECT * FROM usuarios;
SELECT * FROM logs;