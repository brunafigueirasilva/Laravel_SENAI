use produtolaravel;

CREATE TABLE setores(
	id INT auto_increment primary key,
    nome varchar(255) null,
	ncorredor int NOT null,
    created_at timestamp null,
    updated_at timestamp null
);

SELECT * FROM setores;

SELECt * FROM produtos;

ALTER TABLE produtos
	ADD COLUMN setor_id INT NULL, 
	ADD CONSTRAINT fk_produtos_setor
    FOREIGN KEY (setor_id) REFERENCES setores(id) ON DELETE SET NULL;
    
CREATE TABLE  detalheProduto(
	id INT auto_increment primary key,
    descricao varchar(255) null,
    tamanho varchar(255) null,
    peso varchar(255) null,
    created_at timestamp null,
    updated_at timestamp null
);

ALTER TABLE detalheProduto
	ADD COLUMN produtos_id INT NULL, 
	ADD CONSTRAINT fk_detalheProduto_produtos
    FOREIGN KEY (produtos_id) REFERENCES  produtos(id) ON DELETE SET NULL;

SELECT * FROM detalheProduto;


