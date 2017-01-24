

drop table if exists record;
drop table if exists expenditure;
drop table if exists week;



create table week(
id integer not null primary key auto_increment,
name  varchar(20) not null,
userID int,
monthId int,
year int,
totalAmount float,
month  varchar(25)
);



create table record (
id integer not null primary key auto_increment,
name  varchar(20) not null,
totalAmount float,
day   varchar(50) not null,
userId integer references user(id),
weekId integer references week(id),
month varchar(25)
);


create table expenditure (
id integer not null primary key auto_increment,
type  varchar(30),
totalAmount float,
recordId integer references record(id)
);
