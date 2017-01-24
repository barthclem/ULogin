drop table if exists Expenses;

create table Expenses(
id int primary key not null auto_increment,
title varchar(40) not null,
userId int references user(id)

);