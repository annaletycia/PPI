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
   estado varchar(50)
) ENGINE=InnoDB;

CREATE TABLE endereco
(
   id int PRIMARY KEY auto_increment,
   cep char(10),
   logradouro varchar(100),
   cidade varchar(50),
   estado varchar(50)
) ENGINE=InnoDB;

CREATE TABLE funcionario
(
   id int PRIMARY KEY auto_increment,
   data_contrato date,
   salario int,
   hash_senha varchar(255),
   id_pessoa int not null,
   FOREIGN KEY (id_pessoa) REFERENCES pessoa(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE paciente
(
   id int PRIMARY KEY auto_increment,
   peso varchar(5),
   altura int,
   tipo_sanguineo varchar(5),
   id_pessoa int not null,
   FOREIGN KEY (id_pessoa) REFERENCES pessoa(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE medico
(
   id int PRIMARY KEY auto_increment,
   especialidade varchar(30),
   CRM varchar(10),
   id_funcionario int not null,
   FOREIGN KEY (id_funcionario) REFERENCES funcionario(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE agenda
(
   id int PRIMARY KEY auto_increment,
   data_consulta date,
   horario varchar(3),
   nome_paciente varchar(50),
   sexo_paciente varchar(30),
   email_paciente varchar(50),
   id_medico int not null,
   FOREIGN KEY (id_medico) REFERENCES medico(id) ON DELETE CASCADE
   
) ENGINE=InnoDB;




