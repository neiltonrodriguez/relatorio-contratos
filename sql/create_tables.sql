CREATE TABLE IF NOT EXISTS Tb_banco (
    codigo INTEGER PRIMARY KEY,
    nome TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS Tb_convenio (
    codigo INTEGER PRIMARY KEY,
    convenio TEXT NOT NULL,
    verba REAL NOT NULL,
    banco INTEGER NOT NULL,
    CONSTRAINT FK_banco FOREIGN KEY (banco) REFERENCES Tb_banco(codigo)
);

CREATE TABLE IF NOT EXISTS Tb_convenio_servico (
    codigo INTEGER PRIMARY KEY,
    convenio INTEGER NOT NULL,
    servico TEXT NOT NULL,
    CONSTRAINT FK_convenio FOREIGN KEY (convenio) REFERENCES Tb_convenio(codigo)
);

CREATE TABLE IF NOT EXISTS Tb_contrato (
    codigo INTEGER PRIMARY KEY,
    prazo INTEGER NOT NULL,
    valor REAL NOT NULL,
    data_inclusao TEXT NOT NULL,
    convenio_servico INTEGER NOT NULL,
    CONSTRAINT FK_convenio_servico FOREIGN KEY (convenio_servico) REFERENCES Tb_convenio_servico(codigo)
);
