drop table if exists successlogins;


create table successlogins(

id int  primary key not null auto_increment,
userId integer not null,
ipAddress varchar(30) not null,
userAgent varchar(200) not null

);