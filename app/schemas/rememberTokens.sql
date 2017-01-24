drop table if exists remembertokens;


create table remembertokens(

id int  primary key not null auto_increment,
userId integer not null,
userAgent varchar(200) not null,
token   varchar(200),
createdAt int

);