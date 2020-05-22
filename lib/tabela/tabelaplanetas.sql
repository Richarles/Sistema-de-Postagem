create database infoplanetas;
use infoplanetas;

CREATE TABLE PLANETAS(
    idplanetas int NOT NULL AUTO_INCREMENT,
    nome varchar(50) NOT NULL,
    descobridor varchar(50) NOT NULL,
    ano int NOT NULL,
    descricao text NOT NULL,
    PRIMARY KEY(idplanetas)
);

CREATE TABLE COMENTARIO(
    idcomentarios int NOT NULL AUTO_INCREMENT,
    nome varchar(50) NOT NULL,
    comentario text,
    PRIMARY KEY(idcomentarios)
);
