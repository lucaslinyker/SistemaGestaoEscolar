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
('João Pereira', '20230001', 1, 'joao.pereira@escola.com.br'),
('Ana Lima', '20230002', 2, 'ana.lima@escola.com.br'),
('Pedro Martins', '20230003', 3, 'pedro.martins@escola.com.br');

INSERT INTO Horarios (curso_id, professor_id, classe_id, horario_inicio, horario_fim, sala) VALUES
(1, 1, 1, '08:00:00', '09:30:00', 'Sala 101'), -- Matemática com Carlos Silva
(2, 2, 2, '10:00:00', '11:30:00', 'Sala 102'), -- História com Fernanda Souza
(3, 3, 3, '13:00:00', '14:30:00', 'Sala 103'); -- Programação com Paulo Oliveira