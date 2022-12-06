CREATE TABLE endereco
(
   id int PRIMARY KEY auto_increment,
   cep char(10),
   logradouro varchar(100),
   bairro varchar(50),
   cidade varchar(50),
   estado varchar(10)
) ENGINE=InnoDB;

CREATE TABLE login_usuario
(
   id int PRIMARY KEY auto_increment,
   email varchar(50) UNIQUE,
   hash_senha varchar(255)
) ENGINE=InnoDB;

CREATE TABLE pessoa
(
   id int PRIMARY KEY auto_increment,
   nome varchar(50),
   sexo varchar(30),
   email varchar(50) UNIQUE,
   telefone varchar(20),
   cep char(10),
   logradouro varchar(100),
   cidade varchar(50),
   estado varchar(10)
) ENGINE=InnoDB;

CREATE TABLE paciente
(
   id int PRIMARY KEY auto_increment,
   peso varchar(5),
   altura int,
   tipoSanguineo varchar(5),
   id_pessoa int not null,
   FOREIGN KEY (id_pessoa) REFERENCES pessoa(id) ON DELETE CASCADE
) ENGINE=InnoDB;