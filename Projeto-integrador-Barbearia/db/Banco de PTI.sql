-- Nome Para o Banco de Dados será db-pti-agenda
create database db_PTI_agenda;
use db_PTI_agenda;

create table usuarios(
idusuarios int auto_increment primary key,
nome varchar(20) not null unique,
email varchar(100) not null,
senha varchar (250) not null
)engine Innodb;

create table cliente(
idcliente int auto_increment primary key,
nomecliente varchar(50) not null,
cpf varchar(13) not null unique,
telefone varchar(20) not null,
sexo char(5) not null,
idendereco int not null,
idusuarios int not null,
idagenda int not null
)engine InnoDB;

create table endereco(
idendereco int auto_increment primary key,
idcliente int not null,
tipo varchar(10) not null,
logradouro varchar(100) not null,
numero varchar(10) not null,
complemento varchar(20) not null,
bairro varchar(50) not null,
cep varchar(10) not null
)engine Innodb;

DROP table endereco;

create table agenda(
idagenda int auto_increment primary key,
idcliente int not null,
dataagenda varchar(30) not null,
hora varchar(20) not null,
datapedido timestamp default current_timestamp()
)engine InnoDB;

ALTER TABLE `db_PTI_agenda`.`cliente` 
ADD CONSTRAINT `fk_cliente_pk_usuarios`
  FOREIGN KEY (`idusuarios`)
  REFERENCES `db_PTI_agenda`.`usuarios` (`idusuarios`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;
  
  ALTER TABLE `db_PTI_agenda`.`agenda` 
ADD CONSTRAINT `fk_agenda_pk_cliente`
  FOREIGN KEY (`idcliente`)
  REFERENCES `db_PTI_agenda`.`cliente` (`idcliente`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;
  
 
  ALTER TABLE `db_PTI_agenda`.`endereco` 
ADD CONSTRAINT `fk_endereco_pk_cliente`
  FOREIGN KEY (`idcliente`)
  REFERENCES `db_PTI_agenda`.`cliente` (`idcliente`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

