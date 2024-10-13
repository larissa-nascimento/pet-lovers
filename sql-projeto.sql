create table produtos (
	id integer primary key not null auto_increment,
	nome varchar(100) not null,
    descricao varchar(255) not null,
    valor integer not null

); 
create table estoque (
	id integer primary key not null auto_increment,
	id_produto integer,
	tipo_op varchar(50) not null,
    id_usr varchar(100) not null,
	horario_op timestamp not null
);
create table twofa (
	id integer primary key not null auto_increment,
    id_usr integer not null,
    pergunta1 varchar(200) not null,
    pergunta2 varchar(200) not null,
    pergunta3 varchar(200) not null
);

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usr INT NOT NULL,
    nome VARCHAR(100) NOT NULL,
    data_nascimento DATE NOT NULL,
    sexo ENUM('masculino', 'feminino', 'outro', 'prefiro_nao_dizer') NOT NULL,
    nome_materno VARCHAR(100) NOT NULL,
    cpf VARCHAR(14) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL,
    celular VARCHAR(15) NOT NULL,
    telefone_fixo VARCHAR(14),
    cep VARCHAR(9) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    complemento VARCHAR(100)
);
create table login (
	id integer primary key auto_increment not null,
    login varchar(255) not null,
    password varchar(255) not null
    );
    
create table login_time (
	time_id integer primary key auto_increment not null,
    user_id integer not null,
    time timestamp not null
);