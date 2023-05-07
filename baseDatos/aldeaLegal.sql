create database aldea CHARACTER SET utf8 COLLATE utf8_general_ci;
use aldea;

create table tipo(
Id_tipo int auto_increment primary key,
nombreTipo varchar(50));

create table usuario(
Id_usuario int auto_increment primary key,
Id_tipo int (13),
nombre_usuario varchar(50),
correo varchar(100),
password varchar(200),
numero_telefono varchar(50),
foreign key (Id_tipo) references tipo (Id_tipo));

create table docPersonal(
Id_docPer int auto_increment primary key,
Id_usuario int (13),
ine varchar(100),
curp varchar(100),
acta_nacimeinto varchar(100),
rfc varchar(100),
comprobante_domi varchar(100),
foreign key (Id_usuario) references usuario (Id_usuario));

create table docEmpresa(
Id_docEmpresa int auto_increment primary key,
Id_usuario int (13),
acta_constitutiva varchar(100),
rfc varchar(100),
regisPubEmpr varchar(100),
cuentaBancaria varchar(100),
certificadoEmprGro varchar(100),
foreign key (Id_usuario) references usuario (Id_usuario));

create table contacto(
Id_contacto int auto_increment primary key,
Id_usuario int (13),
contactoCliente varchar(100),
contactoColabo varchar(100),
contactoRenta varchar(100),
contactoProve varchar(100),
foreign key (Id_usuario) references usuario (Id_usuario));

create table contabilidad(
Id_contabilidad int auto_increment primary key,
Id_usuario int (13),
declaraMen varchar(100),
contactoColabo varchar(100),
declaraAnual varchar(100),
estadoFinan varchar(100),
foreign key (Id_usuario) references usuario (Id_usuario));

create table administracion(
Id_administracion int auto_increment primary key,
Id_usuario int (13),
pagos varchar(100),
nomina varchar(100),
foreign key (Id_usuario) references usuario (Id_usuario));
INSERT INTO tipo(nombreTipo) VALUES ('Administrador');
INSERT INTO tipo(nombreTipo) VALUES ('Usuario');
INSERT INTO `usuario` ( `Id_tipo`, `nombre_usuario`, `correo`, `password`, `numero_telefono`) VALUES
(1, 'Fatima', 'obed@gmail.com', '$2y$10$kQ1SMoB698M.0S7ogAFrieLwffEq9Mhz.5oNGQZaYfBaztwtWAE5.', '7443178537');
