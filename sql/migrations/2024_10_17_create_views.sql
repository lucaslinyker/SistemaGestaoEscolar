USE sistema_gestao_escolar;

CREATE VIEW VerCursos AS
	SELECT
		id AS Id,
		nome AS Nome,
		descricao AS Descrição,
		duracao AS Duração
	FROM Cursos;

CREATE VIEW VerProfessores AS
	SELECT
		id AS Id,
		nome AS Nome,
		especialidade AS Especialidade,
		contato AS Contato
	FROM Professores;

CREATE VIEW VerClasses AS
	SELECT
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