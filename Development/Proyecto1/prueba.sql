create database Proyecto1;
use Proyecto1
create table users(
    id int auto_increment primary key,
    email varchar(120) not null,
    password varchar(120) not null,
    status int  ,
    level int,
    name_user varchar(120) null,
    lastname_user  varchar(120) null
)

