use mg;

insert into login (login,password,last_login) values(
	"miguel", "123456", now());
    
insert into login_time (user_id, time)  select id, last_login from login;