create database	atividade01;
use atividade01;
CREATE TABLE usuario (
    idusuario int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome varchar(255),
    email varchar(255) UNIQUE,
    senha varchar(255)
);
