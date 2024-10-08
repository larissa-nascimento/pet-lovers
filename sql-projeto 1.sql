create table produtos (
	id integer primary key not null auto_increment,
	nome varchar(100) not null,
    descricao varchar(255) not null,
    valor integer not null
<<<<<<< Updated upstream
)

create table estoque (
	id integer primary key not null auto_increment,
	id_produto integer primary key not null auto_increment,
	tipo_op varchar(50) not null,
    id_usr varchar(100) not null,
	horario_op timestamp not null
)

update test set usuario = "Miguel" where id = 1;
=======
);

create table estoque (
	id integer primary key not null auto_increment,
	id_produto integer not null,
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
>>>>>>> Stashed changes
