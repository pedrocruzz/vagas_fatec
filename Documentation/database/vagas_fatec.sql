CREATE TABLE `Aluno` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`ra` varchar(14) NOT NULL,
	`nome` varchar(55) NOT NULL,
	`sobrenome` varchar(255) NOT NULL,
	`email` varchar(255) NOT NULL,
	`cpf` varchar(11) NOT NULL,
	`cep` varchar(10) NOT NULL,
	`cidade` varchar(50) NOT NULL,
	`endereco` varchar(255) NOT NULL,
	`telefone` INT(14) NOT NULL,
	`senha` varchar(55) NOT NULL,
	`curriculo` varchar NOT NULL,
	`curso` varchar(55) NOT NULL,
	`periodo` INT(2) NOT NULL,
	`dataNascimento` DATE NOT NULL,
	`areaInteresse` varchar(3) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `Empresa` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`razaoSocial` varchar(255) NOT NULL,
	`nomeFantasia` varchar(255) NOT NULL,
	`cnpj` varchar(18) NOT NULL,
	`email` varchar(255) NOT NULL,
	`endereco` varchar(255) NOT NULL,
	`cidade` varchar(50) NOT NULL,
	`telefone` INT(14) NOT NULL,
	`responsavel` varchar(255) NOT NULL,
	`website` varchar(100) NOT NULL,
	`descricao` TEXT(550) NOT NULL,
	`senha` varchar(55) NOT NULL,
	`parceria` BINARY NOT NULL,
	`id_vagas` varchar(11) NOT NULL,
	`nome_vagas` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `Vagas` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`titulo` varchar(255) NOT NULL,
	`descricao` varchar(550) NOT NULL,
	`periodoVagaAbrir` DATE NOT NULL,
	`periodoVagaFechar` DATE NOT NULL,
	`salario` FLOAT(11) NOT NULL,
	`area` varchar(55) NOT NULL,
	`nivelExperiencia` varchar(55) NOT NULL,
	`descricaoQualificacao` varchar(550) NOT NULL,
	`descricaoFuncoes` varchar(550) NOT NULL,
	`descricaoBeneficios` varchar(255) NOT NULL,
	`localVaga` varchar(55) NOT NULL,
	`id_empresa` INT(11) NOT NULL,
	`nome_empresa` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `Fatec` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`nome` varchar(255) NOT NULL,
	`email` varchar(255) NOT NULL,
	`senha` varchar(55) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `VagaPreenchida` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`id_vagas` INT(11) NOT NULL,
	`id_aluno` INT(11) NOT NULL,
	`dataPreenchimento` DATE NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `Empresa` ADD CONSTRAINT `Empresa_fk0` FOREIGN KEY (`id_vagas`) REFERENCES `Vagas`(`id`);

ALTER TABLE `Empresa` ADD CONSTRAINT `Empresa_fk1` FOREIGN KEY (`nome_vagas`) REFERENCES `Vagas`(`titulo`);

ALTER TABLE `Vagas` ADD CONSTRAINT `Vagas_fk0` FOREIGN KEY (`id_empresa`) REFERENCES `Empresa`(`id`);

ALTER TABLE `Vagas` ADD CONSTRAINT `Vagas_fk1` FOREIGN KEY (`nome_empresa`) REFERENCES `Empresa`(`nomeFantasia`);

ALTER TABLE `VagaPreenchida` ADD CONSTRAINT `VagaPreenchida_fk0` FOREIGN KEY (`id_vagas`) REFERENCES `Vagas`(`id`);

ALTER TABLE `VagaPreenchida` ADD CONSTRAINT `VagaPreenchida_fk1` FOREIGN KEY (`id_aluno`) REFERENCES `Aluno`(`id`);






