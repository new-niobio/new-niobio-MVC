# New Niobio PHP MVC

These is a simple MVC.
# Examples

## public
public access index: https://leandroximenes.000webhostapp.com/<br/>
public access example: https://leandroximenes.000webhostapp.com/contato<br/>
public access 404: https://leandroximenes.000webhostapp.com/sdfsdf<br/>


## Admin
public access admin: https://leandroximenes.000webhostapp.com/admin<br/>
email: leandroj.r.ximenes@gmail.com<br/>
senha: 123456<br/>

## Simple

This is a very simple [MVC][mvc-pattern] structure, it contains Bootstrap, jQuery and Ajax.
There is auth module and user register.

## SQL
```bash
DROP DATABASE controle;
CREATE DATABASE controle;
USE controle;

CREATE TABLE `usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `hash_id` VARCHAR(45) NULL,
  `nome` VARCHAR(255) NULL,
  `email` VARCHAR(255) NULL,
  `senha` VARCHAR(45) NULL,
  `perfil` SMALLINT(2) NULL,
  `ativo` SMALLINT(1) NULL,
  PRIMARY KEY (`id`));

INSERT INTO `usuarios` (`id`, `hash_id`, `nome`, `email`, `senha`, `perfil`, `ativo`) VALUES
(1, '15482506375c486e0d4f664',  'Leandro', 'leandroj.r.ximenes@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1,  1);


CREATE TABLE `example` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `hash_id` VARCHAR(45) NULL,
  `text` VARCHAR(255) NULL,
  `cpf` VARCHAR(13) NULL,
  `email` VARCHAR(255) NULL,
  `date_full` date NULL,
  `date_small` date NULL,
  `value_int` int NULL,
  `value_decimal` decimal(8,2) NULL,
  `value_select` SMALLINT(2) NULL,
  `upload` VARCHAR(255) NULL,
  `ativo` SMALLINT(1) NULL,
  PRIMARY KEY (`id`));

```
## Files tree

```bash

Niobio
├── application
│   ├── control
│   │   ├── AdminController.php
│   │   ├── AuthController.php
│   │   ├── CrudController.php
│   │   ├── ExampleController.php
│   │   ├── MainController.php
│   │   ├── PublicController.php
│   │   └── UsuarioController.php
│   ├── model
│   │   ├── DAO
│   │   │   ├── DAO.php
│   │   │   ├── example.php
│   │   │   └── usuarios.php
│   │   ├── conexao.php
│   │   ├── funcoes.php
│   │   ├── my_setting.ini
│   │   └── sql
│   └── views
│       ├── home
│       │   ├── 404.php
│       │   └── index.php
│       ├── login
│       │   └── index.php
│       ├── usuario
│       │   ├── alterarSenha.php
│       │   ├── editar.php
│       │   ├── index.php
│       │   └── novov.php
│       ├── example
│       │   ├── editar.php
│       │   ├── index.php
│       │   └── novov.php
│       ├── ViewModel.php
│       ├── layout.php
├── public
|    ├── css
│    ├── js
│    ├── 404.php
│    ├── contato.php
│    ├── index.php
|    └── layout.php
├── util
|    └── Util.php
├── .gitignore
├── .htaccess
├── config.php
├── index.php
└── loader.php

```
## Add new CRUD
1- Create new table
```bash
CREATE TABLE `student` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `hash_id` VARCHAR(45) NULL,
  `name` VARCHAR(45) NULL,
  `email` VARCHAR(255) NULL,
  `ativo` SMALLINT(1) NULL,
  PRIMARY KEY (`id`));
```
2- clone "ExampleController.php", rename file to "StudentController.php" and change class name, modify parameters and keep only constructor<br/>
3- clone model/DAO/"example.php", and rename to "student.php", change class name and keeping only constructor<br/>
4- clone folder view/"example" and rename to "student"<br/>
5- Make the changes in the "index", "new" and "edit" pages according with the database<br/>
6(Optional)- Change menu "view/layout.php"<br/>

## License

New Niobio MVC Examples is open source software licensed. 
