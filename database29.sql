create database granjalosarcos;

create table usuario(
idUsuario int primary key auto_increment not null,
nombreUs varchar(45),
clave varchar(45)
);

create table gallos(
idGallo int primary key auto_increment not null,
raza varchar (45), 
peso varchar (45)
);

create table quienCompro(
idUsuario int primary key auto_increment not null,
nombreUs varchar (45),
compra varchar (50),
fecha date,
detalles varchar (50)s
); 

ALTER TABLE usuario ADD COLUMN rol ENUM('usuario', 'administrador') DEFAULT 'usuario';

ALTER TABLE usuario DROP COLUMN rol;

insert into usuario (nombreUs, clave, rol) values ("lolo", "12345","administrador");
insert into usuario (nombreUs, clave, rol) values ("pepe", "123455","administrador");
select *from usuario;