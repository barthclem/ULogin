drop table if exists failedLogins;


create table failedLogins(

id int  primary key not null auto_increment,
userId integer not null,
ipAddress varchar(30) not null,
attempted int

);