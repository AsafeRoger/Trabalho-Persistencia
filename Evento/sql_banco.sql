CREATE TABLE eventos (
    id INT AUTO_INCREMENT NOT NULL,
    tipo VARCHAR(20) NOT NULL,  -- Tipo de evento (Aniversario, Casamento)
    data DATE NOT NULL,  -- Data do evento
    orcamento DECIMAL(10, 2) NOT NULL,  -- Orçamento do evento
    qntConvidados INT NOT NULL,  -- Quantidade de convidados
    local VARCHAR(255) NOT NULL,  -- Local do evento
    nome_aniversariante VARCHAR(70) DEFAULT NULL,  -- Nome do aniversariante (para Aniversário)
    tema_festa VARCHAR(70) DEFAULT NULL,  -- Tema da festa (para Aniversário)
    noivo VARCHAR(70) DEFAULT NULL,  -- Nome do noivo (para Casamento)
    noiva VARCHAR(70) DEFAULT NULL,  -- Nome da noiva (para Casamento)
    PRIMARY KEY (id)
);
