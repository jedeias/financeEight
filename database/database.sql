-- DROP DATABASE financeEight;

CREATE DATABASE IF NOT EXISTS financeEight CHARACTER SET utf8;

USE financeEight;

CREATE TABLE pessoas(
pkPessoa INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
CPF VARCHAR(14) NOT NULL UNIQUE KEY,
email VARCHAR (100) NOT NULL UNIQUE KEY,
password VARCHAR (100) NOT NULL,
dataNascimento DATE NOT NULL
)CHARACTER SET utf8;

DELIMITER $$

CREATE PROCEDURE insertPessoas(
	IN _CPF VARCHAR(14),
	IN _email VARCHAR(100),
	IN _password VARCHAR(100),
	IN _dataNascimento DATE
)BEGIN
	START TRANSACTION;
	INSERT INTO pessoas	(pkPessoa, CPF, email, password, dataNascimento)
	VALUES					(DEFAULT, _CPF, _email, _password, _dataNascimento);

	COMMIT;
		ROLLBACK;

END $$
DELIMITER ;

CALL insertPessoas("999.999.999.09", "teste@test.com", 1234, "1990-12-02");
SELECT * FROM pessoas;

CREATE TABLE bancos(
pkBanco INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
tipoDaConta ENUM ("CC","CP") DEFAULT "CC",
saldo INT NOT NULL,
fonteDeRenda VARCHAR (100) NOT NULL
)CHARACTER SET utf8;

INSERT INTO bancos VALUES
(1,"CP" , 2500.00, "5000"),
(2,"CC", 1500.00 , "6000");
SELECT * FROM bancos;

CREATE TABLE cartoes(
pkCartao INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
codigo INT NOT NULL,
validade DATE NOT NULL,
numero Varchar(20) NOT NULL 
)CHARACTER SET utf8;

INSERT INTO cartoes VALUES
(1, 123, "2031-12-01",5503010224258145),
(2, 235 , "2027-05-01" ,2203123456780000);
SELECT * FROM cartoes;

CREATE TABLE despesas(
pkDespesa INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
tipoDaDespesa VARCHAR (100) NOT NULL
)CHARACTER SET utf8;

INSERT INTO despesas VALUES 
(DEFAULT, "Lazer"),
(DEFAULT, "Investimentos");
SELECT * FROM despesas;

CREATE TABLE cartaoCredito(
pkCartaoCredito INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
fkCartao INT NOT NULL,
vencimento DATE NOT NULL,
limite DECIMAL (10.2) NOT NULL,
juros DOUBLE NOT NULL, 
FOREIGN KEY (fkCartao) REFERENCES cartoes(pkCartao)
)CHARACTER SET utf8;

INSERT INTO cartaoCredito VALUES
(1, 2, "2024-10-10" , 2500.00 , 5),
(2, 1, "2024-05-05" , 4000.00 , 3);
SELECT * FROM cartaoCredito;

CREATE TABLE bancoPessoas(
pkBancoPessoa INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
fkPessoa INT NOT NULL,
fkBanco INT NOT NULL, 
FOREIGN KEY (fkPessoa) REFERENCES pessoas(pkPessoa),
FOREIGN KEY (fkBanco) REFERENCES bancos(pkBanco)
)CHARACTER SET utf8;

INSERT  into bancoPessoas VALUES 
(1, 2, 2),
(2, 1, 1);
SELECT * FROM bancoPessoas;

CREATE TABLE bancoCartoes(
PkBancoCartoes INT NOT NULL PRIMARY KEY,
fkBanco INT NOT NULL,
fkCartao INT NOT NULL, 
FOREIGN KEY (fkBanco) REFERENCES bancos(PkBanco),
FOREIGN KEY (fkCartao) REFERENCES cartoes(PkCartao)
)CHARACTER SET utf8;

INSERT INTO  bancoCartoes VALUES
(1, 2, 2),
(2, 1, 1);
SELECT * FROM bancoCartoes;

CREATE TABLE compras(
pkCompras INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
fkDespesa INT NOT NULL,
fkCartao INT NOT NULL,
valorTotal DECIMAL(10,2) NOT NULL,
produto VARCHAR(80),
dataCompra DATE NOT NULL,
FOREIGN KEY (fkDespesa) REFERENCES despesas(pkDespesa),
FOREIGN KEY (fkCartao) REFERENCES cartoes(pkCartao)
)CHARACTER SET utf8;

INSERT INTO compras VALUES
(DEFAULT, 1, 1, 600, "teclado", "2024-05-21");
SELECT * FROM compras;

CREATE TABLE comprasParcelas(
pkComprasParcelas INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
fkCompra INT NOT NULL,
fkCartaoCredito INT NOT NULL,
juros DOUBLE NOT NULL,
parcelas INT NOT NULL,
diaDeVencimento INT NOT NULL,
FOREIGN KEY (fkCompra) REFERENCES compras(pkCompras),
FOREIGN KEY (fkCartaoCredito) REFERENCES cartaoCredito(pkCartaoCredito)
)CHARACTER SET utf8;

INSERT INTO comprasParcelas VALUES(DEFAULT, 1, 1, 0.3, 3, 5);
SELECT * FROM comprasParcelas;

DELIMITER $$

CREATE PROCEDURE insertDespesas(
	IN _pk INT,
	IN _tipoDespesa VARCHAR(100)
)BEGIN
	START TRANSACTION;
	INSERT INTO despesas 	(pkDespesas, tipoDaDespesa)
	VALUES					(DEFAULT, _tipoDespesa);

	COMMIT;
		ROLLBACK;

END $$
DELIMITER ;
