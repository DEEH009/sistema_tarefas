CREATE TABLE pessoas.users (
	id INT auto_increment NOT NULL,
	nome varchar(100) NOT NULL,
	email varchar(100) NOT NULL,
	senha varchar(100) NOT NULL,
	ativo INT DEFAULT 1 NOT NULL,
	PRIMARY kEY (id)

)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_cs_0900_ai_ci;

CREATE TABLE pessoas.tarefas (
	id INT auto_increment NOT NULL,
	tarefa varchar(255) NOT NULL,
	id_user INT NOT NULL,
	PRIMARY KEY (id),

)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_0900_ai_ci;

