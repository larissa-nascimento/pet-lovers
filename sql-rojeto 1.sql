create table produtos (
	id integer primary key not null auto_increment,
	nome varchar(100) not null,
    descricao varchar(255) not null,
    valor integer not null
)

create table estoque (
	id integer primary key not null auto_increment,
	id_produto integer primary key not null auto_increment,
	tipo_op varchar(50) not null,
    id_usr varchar(100) not null,
	horario_op timestamp not null
)

update test set usuario = "Miguel" where id = 1;