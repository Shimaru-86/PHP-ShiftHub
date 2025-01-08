-- Criação do Banco de Dados
CREATE DATABASE php_shifthub_teste
CHARACTER SET utf8mb4
COLLATE utf8mb4_roman_ci;

USE php_shifthub_teste;

-- Criação da Tabela de Usuários
CREATE TABLE users (
  id_user INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  email VARCHAR(100) NOT NULL UNIQUE,
  password_user VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP
);

-- Criação da Tabela de Log de Atividades
CREATE TABLE activities_log (
  id_log INT AUTO_INCREMENT PRIMARY KEY,
  id_user INT NOT NULL,
  user_action VARCHAR(255) NOT NULL,
  user_agent VARCHAR(255) NULL,
  details TEXT NULL,
  ip_address VARCHAR(45) NOT NULL,
  action_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
  deleted_at TIMESTAMP NULL,
  FOREIGN KEY (id_user) REFERENCES users(id_user) ON DELETE CASCADE
);
