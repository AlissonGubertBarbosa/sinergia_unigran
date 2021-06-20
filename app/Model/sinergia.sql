/*
Data:		23/05/2021
Programa: 	model/Connection.php
Autor:		Alisson Gubert Barbosa
*/

-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Jul-2020 às 19:53
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.2.28

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sinergia`
--
CREATE DATABASE IF NOT EXISTS `sinergia` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sinergia`;

/* Tabelas de locais e identificação no mapa*/
CREATE TABLE LocalMapa (
	id_local integer primary key auto_increment,
	numeracaoPoste integer,
    id_marcacaoMapa integer,
    CONSTRAINT fk_marcacaoMapa FOREIGN KEY (id_marcacaoMapa) REFERENCES MarcacaoMapa (id_marcacaoMapa)
);

CREATE TABLE MarcacaoMapa (
	id_marcacaoMapa integer primary key auto_increment,
    observacao varchar(120),
    longitude integer,
    latitude integer,
    id_endereco integer,
    CONSTRAINT fk_enderecoMapa FOREIGN KEY (id_endereco) REFERENCES Endereco (id_endereco)
);

/* Tabelas sem redundâncias de endereço */
CREATE TABLE Endereco (
	id_endereco integer primary key auto_increment,
    logradouro varchar(80),
    numero integer,
    bairro varchar(50),
    complemento varchar(50),
    id_cep integer,
    CONSTRAINT fk_cep FOREIGN KEY (id_cep) REFERENCES Cep (id_cep)
);

CREATE TABLE Cep (
	id_cep integer primary key auto_increment,
    cidade varchar(100),
    id_estado integer,
    CONSTRAINT fk_estado FOREIGN KEY (id_estado) REFERENCES Estado (id_estado)
);

CREATE TABLE Estado (
	id_estado integer primary key auto_increment,
    nome varchar(60)
);

/* Tabela de contato*/

CREATE TABLE Contato (
	id_contato integer primary key,
    celular integer,
    telefone integer,
    email varchar(50)
);

/* Tabela de funcionário na empresa*/
CREATE TABLE Funcionario (
	cpf_funcionario integer primary key,
    rg integer,
    nome_funcionario varchar(120),
    nomeUsuario_funcionario varchar(40),
    dataDeNascimento_funcionario date,
    estadoCivil varchar(20),
    cargo varchar(30),
    id_enderecoFuncionario integer,
    id_contatoFuncionario integer,
    CONSTRAINT fk_enderecoFuncionario FOREIGN KEY (id_enderecoFuncionario) REFERENCES Endereco (id_endereco),
	CONSTRAINT fk_contatoFuncionario FOREIGN KEY (id_contatoFuncionario) REFERENCES Contato (id_contato)
);

/* Tabela de usuario comum*/
CREATE TABLE UsuarioComum (
	cpf_usuario integer primary key,
    rg_usuario integer,
    nome_usuario varchar(120),
    nomeUsuario varchar(40),
    dataDeNascimento date,
    estadoCivil varchar(20),
    id_enderecoUsuario integer,
    id_contatoUsuario integer,
    CONSTRAINT fk_enderecoUsuario FOREIGN KEY (id_enderecoUsuario) REFERENCES Endereco (id_endereco),
    CONSTRAINT fk_contatoUsuario FOREIGN KEY (id_contatoUsuario) REFERENCES Contato (id_contato)
);

/* Tabela de Responsável e Terceirizada*/

CREATE TABLE Responsavel (
	id_responsavel integer primary key,
    nome_responsavel varchar(120),
    observacao varchar(150),
    id_enderecoResponsavel integer,
    id_contatoResponsavel integer,
    cnpj_empresa integer,
    CONSTRAINT fk_enderecoResposavel FOREIGN KEY (id_enderecoResponsavel) REFERENCES Endereco (id_endereco),
    CONSTRAINT fk_contatoResponsavel FOREIGN KEY (id_contatoResponsavel) REFERENCES Contato (id_contato),
    CONSTRAINT fk_empresaResponsavel FOREIGN KEY (cnpj_empresa) REFERENCES Empresa (cnpj_empresa)
);

CREATE TABLE Empresa (
	cnpj_empresa integer primary key,
    nomeResponsavel varchar(120),
    telefone integer,
    emailEmpresarial varchar(70),
    observacao varchar(150),
    id_enderecoEmpresa integer,
    CONSTRAINT fk_enderecoEmpresa FOREIGN KEY (id_enderecoEmpresa) REFERENCES Endereco (id_endereco)
);

/* Tabela MAIN Ordem de serviço*/
CREATE TABLE OrdemServico (
	id_ordemServico integer primary key,
	data_ordemServico datetime,
    observacao varchar(150),
    id_local integer,
    cpf_usuario integer,
    id_responsavel integer,
    cpf_funcionario integer,
    CONSTRAINT fk_localMapa FOREIGN KEY (id_local) REFERENCES LocalMapa (id_local),
    CONSTRAINT fk_usuarioComum FOREIGN KEY (cpf_usuario) REFERENCES UsuarioComum (cpf_usuario),
    CONSTRAINT fk_responsavel FOREIGN KEY (id_responsavel) REFERENCES Responsavel (id_responsavel),
    CONSTRAINT fk_funcionario FOREIGN KEY (cpf_funcionario) REFERENCES Funcionario (cpf_funcionario)
);