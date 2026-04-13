CREATE DATABASE bibliotecaLaravel;
use bibliotecaLaravel;

CREATE TABLE livros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NULL,
    autor VARCHAR(255) NULL,
    descricao VARCHAR(255) NULL,
    numero_pag INT NOT NULL,
    data DATE,
    editora_id INT NULL,
    detalhe_id INT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,

    FOREIGN KEY (editora_id) REFERENCES editoras(id) ON DELETE SET NULL,
    FOREIGN KEY (detalhe_id) REFERENCES detalhes(id) ON DELETE SET NULL
);
    
SELECT * FROM livros;

CREATE TABLE editoras (
	id INT auto_increment primary key,
    editora varchar(255) null,
    cnpj varchar(255) null,
    pais varchar(255) null,
    cidade varchar(255) null,
    created_at timestamp null,
    updated_at timestamp null
);

SELECT * FROM editoras;

CREATE TABLE detalhes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    custo VARCHAR(255) NULL,
    preco_venda VARCHAR(255) NULL,
    imposto VARCHAR(255) NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

SELECT * FROM detalhes;



    
    
