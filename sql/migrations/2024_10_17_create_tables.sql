CREATE DATABASE sistema_gestao_escolar;
USE sistema_gestao_escolar;

CREATE TABLE Cursos (
	id INT AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(100) NOT NULL,
	descricao TEXT,
	duracao INT NOT NULL
);

CREATE TABLE Professores (
	id INT AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(100) NOT NULL,
	especialidade VARCHAR(100),
	contato VARCHAR(100)
);

CREATE TABLE Classes (
	id INT AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(100) NOT NULL,
	professor_id INT,
	curso_id INT,
	FOREIGN KEY (professor_id) REFERENCES Professores(id),
	FOREIGN KEY (curso_id) REFERENCES Cursos(id)
);

CREATE TABLE Alunos (
	id INT AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(100) NOT NULL,
	matricula VARCHAR(50) UNIQUE NOT NULL,
	classe_id INT,
	email VARCHAR(100),
	FOREIGN KEY (classe_id) REFERENCES Classes(id)
);

CREATE TABLE Horarios (
	id INT AUTO_INCREMENT PRIMARY KEY,
	curso_id INT,
	professor_id INT,
	classe_id INT,
	horario_inicio TIME NOT NULL,
	horario_fim TIME NOT NULL,
	sala VARCHAR(50),
	FOREIGN KEY (curso_id) REFERENCES Cursos(id),
	FOREIGN KEY (professor_id) REFERENCES Professores(id),
	FOREIGN KEY (classe_id) REFERENCES Classes(id)
);