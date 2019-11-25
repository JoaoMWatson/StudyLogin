CREATE DATABASE study;
use study;

create table pessoa(
    idPessoa INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100),
    email VARCHAR(100),
    telefone int,
    senha VARCHAR(100),
    CONSTRAINT PK_Pessoa PRIMARY KEY(idPessoa)
);