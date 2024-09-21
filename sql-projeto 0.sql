use mg;
create table login (
	id integer primary key auto_increment not null,
    login varchar(255) not null,
    password varchar(255) not null,
    last_login timestamp not null
    );
    
create table login_time (
	time_id integer primary key auto_increment not null,
    user_id integer not null,
    time timestamp not null
);