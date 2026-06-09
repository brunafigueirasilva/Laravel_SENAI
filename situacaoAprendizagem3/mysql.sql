create database situacaoAprendizagem3;
use situacaoAprendizagem3;

CREATE TABLE Produtos (
id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) null,
    tipo_materia VARCHAR(100) null,
    quantidade double null,
    preco_venda double null,
    especificacoes VARCHAR(100) null,
    data_fabricacao DATE null,
    created_at timestamp null,
    updated_at timestamp null
);