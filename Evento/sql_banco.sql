CREATE TABLE eventos (
    id INT AUTO_INCREMENT NOT NULL,
    tipo VARCHAR(20) NOT NULL, 
    data INT NOT NULL,  
    orcamento DECIMAL(10, 2) NOT NULL,  
    qntConvidados INT NOT NULL, 
    local VARCHAR(255) NOT NULL,  
    nome_aniversariante VARCHAR(70) DEFAULT NULL,
    tema_festa VARCHAR(70) DEFAULT NULL,  
    noivo VARCHAR(70) DEFAULT NULL,  
    noiva VARCHAR(70) DEFAULT NULL, 
    PRIMARY KEY (id)
);
