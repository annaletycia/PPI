INSERT INTO pessoa (nome, sexo, email, telefone,
    cep, logradouro, cidade, estado)
    VALUES
    ("Gustavo", M, "gustavoguimaraereis@hotmail.com", "31998862123", "38475-000", "Avenidade 222 de Setembro", "Monte Alegre de Minas", "MG")

INSERT INTO pessoa (nome, sexo, email, telefone,
    cep, logradouro, cidade, estado)
    VALUES
    ("Tales", M, "tales@multimed.com", "38 4657-9856", "38400-100", "Av. Nicomedes", "Uberlândia", "MG")

INSERT INTO funcionario (data_contrato, salario, hash_senha, 	id_pessoa)
    VALUES
    (2022-03-01, 3000, "$2y$10$qyeqstF6KEvffupdtmUaBuWyXnylTRG4RuatLoaFXiQeTefm1Egm6", 1)

INSERT INTO medico (especialidade, CRM, id_funcionario)
    VALUES
    ("cardiologia", 34586, 1)

