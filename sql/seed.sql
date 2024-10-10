CREATE DATABASE SistemaGestaoEscolar;
USE SistemaGestaoEscolar;

CREATE TABLE Cursos (
	id INT IDENTITY(1,1) PRIMARY KEY,
	nome VARCHAR(100) NOT NULL,
	descricao TEXT,
	duracao INT NOT NULL
);

CREATE TABLE Professores (
	id INT IDENTITY(1,1) PRIMARY KEY,
	nome VARCHAR(100) NOT NULL,
	especialidade VARCHAR(100),
	contato VARCHAR(100)
);

CREATE TABLE Classes (
	id INT IDENTITY(1,1) PRIMARY KEY,
	nome VARCHAR(100) NOT NULL,
	professor_id INT,
	curso_id INT,
	FOREIGN KEY (professor_id) REFERENCES Professores(id),
	FOREIGN KEY (curso_id) REFERENCES Cursos(id)
);

CREATE TABLE Alunos (
	id INT IDENTITY(1,1) PRIMARY KEY,
	nome VARCHAR(100) NOT NULL,
	matricula VARCHAR(50) UNIQUE NOT NULL,
	classe_id INT,
	email VARCHAR(100),
	FOREIGN KEY (classe_id) REFERENCES Classes(id)
);

CREATE TABLE Horarios (
	id INT IDENTITY(1,1) PRIMARY KEY,
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

INSERT INTO Cursos (nome, descricao, duracao) VALUES
('Matemática Básica', 'Curso introdutório de matemática para iniciantes', 6),
('História Geral', 'Abordagem da história mundial com foco em eventos chave', 8),
('Introdução à Programação', 'Curso de programação para iniciantes em lógica e algoritmos', 4);

INSERT INTO Professores (nome, especialidade, contato) VALUES
('Carlos Silva', 'Matemática', 'carlos.silva@escola.com.br'),
('Fernanda Souza', 'História', 'fernanda.souza@escola.com.br'),
('Paulo Oliveira', 'Programação', 'paulo.oliveira@escola.com.br');

INSERT INTO Classes (nome, professor_id, curso_id) VALUES
('Turma 1A', 1, 1), -- Matemática com Carlos Silva
('Turma 2B', 2, 2), -- História com Fernanda Souza
('Turma 3C', 3, 3); -- Programação com Paulo Oliveira

INSERT INTO Alunos (nome, matricula, classe_id, email) VALUES
('Jo�o Pereira', '20230001', 1, 'joao.pereira@escola.com.br'),
('Ana Lima', '20230002', 2, 'ana.lima@escola.com.br'),
('Pedro Martins', '20230003', 3, 'pedro.martins@escola.com.br');

INSERT INTO Horarios (curso_id, professor_id, classe_id, horario_inicio, horario_fim, sala) VALUES
(1, 1, 1, '08:00:00', '09:30:00', 'Sala 101'), -- Matemática com Carlos Silva
(2, 2, 2, '10:00:00', '11:30:00', 'Sala 102'), -- História com Fernanda Souza
(3, 3, 3, '13:00:00', '14:30:00', 'Sala 103'); -- Programação com Paulo Oliveira

SELECT * FROM Cursos;
SELECT * FROM Professores;
SELECT * FROM Classes;
SELECT * FROM Alunos;
SELECT * FROM Horarios;

CREATE VIEW VerCursos AS
	SELECT
		id AS Id,
		nome AS Nome,
		descricao AS Descri��o,
		duracao AS Dura��o
	FROM Cursos;

CREATE VIEW VerProfessores AS
	SELECT
		id AS Id,
		nome AS Nome,
		especialidade AS Especialidade,
		contato AS Contato
	FROM Professores;

CREATE VIEW VerClasses AS
	SELECT TOP 100 PERCENT
		Cla.id AS Id,
		Cla.nome AS Nome,
		P.nome AS Professor,
		Cur.nome AS Curso
	FROM Classes Cla
	INNER JOIN Professores P
		ON Cla.professor_id = P.id
	INNER JOIN Cursos Cur
		ON Cla.curso_id = Cur.id
	ORDER BY Cla.id;

CREATE VIEW VerAlunos AS
	SELECT
		A.id AS Id,
		A.nome AS Nome,
		A.matricula AS Matricula,
		C.nome AS Classe,
		A.email AS Email
	FROM Alunos A
	INNER JOIN Classes C
		ON A.classe_id = C.id;

CREATE VIEW VerHorarios AS
	SELECT
		H.id AS Id,
		Cur.nome AS Curso,
		P.nome AS Professor,
		Cla.nome AS Classe,
		H.horario_inicio AS 'Horario de Inicio',
		H.horario_fim AS 'Horario de Termino',
		H.sala AS Sala
	FROM Horarios H
	INNER JOIN Cursos Cur
		ON H.curso_id = Cur.id
	INNER JOIN Professores P
		ON H.professor_id = P.id
	INNER JOIN Classes Cla
		ON H.classe_id = Cla.id;

SELECT * FROM VerCursos;
SELECT * FROM VerProfessores;
SELECT * FROM VerClasses;
SELECT * FROM VerAlunos;
SELECT * FROM VerHorarios;