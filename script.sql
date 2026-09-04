CREATE DATABASE	ESTACIONAMENTO;
USE estacionamento;

CREATE TABLE carro (
	id_carro INT AUTO_INCREMENT PRIMARY KEY,
    modelo   VARCHAR(50) NOT NULL,
    placa	 VARCHAR(20) NOT NULL
    );

INSERT INTO carro (modelo,placa) VALUES ('Onix', 'ABC1D23');
INSERT INTO carro (modelo,placa) VALUES ('Corolla', 'UVW1X23');
INSERT INTO carro (modelo,placa) VALUES ('Renegade', 'BCD7E89');

SELECT * FROM carro;
SELECT * FROM carro WHERE id_carro = 2;

UPDATE carro SET modelo = 'HR-V', placa = 'MNO5P67' WHERE id_carro = 3;

DELETE FROM carro WHERE id_carro = '1'



