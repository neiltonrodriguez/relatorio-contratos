# Relatorio Contratos

Projeto de teste para cadastro de contratos, utilizando **PHP puro**, **Composer** e **SQLite** como banco de dados.  
Estou uma regra dentro do index que permita executar tarefas tanto em modo CLI quanto no navegador e usei o SQLite para persistir os dados.

---

## Estrutura do Projeto
```
relatorio-contratos/
│
├─ composer.json
├─ README.md
├─ src/
│ ├─ Database.php
│ ├─ ContratoRepository.php
│ └─ index.php
│
├─ database/
│ └─ contratos.db
│
├─ sql/
│ ├─ create_tables.sql
│ └─ seed_data.sql
```


---

## Como Executar o Projeto

### 1 Requisitos

- PHP 7.4+ ou superior
- Composer
- SQLite3 instalado no sistema

> Se não tiver o SQLite instalado no Ubuntu:
> ```bash
> sudo apt update
> sudo apt install sqlite3 php-sqlite3
> ```

- Rodar `composer install` para ativar autoload:

```bash
composer install
composer dump-autoload
```

## 2 Executando via CLI
No terminal, dentro do diretório do projeto:

### Listagem detalhada (Tarefa 1)
php src/index.php tarefa1

### Listagem agregada por banco e verba (Tarefa 2)
php src/index.php tarefa2


## 2 Executando via ServidorWeb Embutido do PHP
No terminal, dentro do diretório do projeto:
```
php -S localhost:8000 -t src/

```
Depois abra o navegador:

### Listagem detalhada (Tarefa 1)
http://localhost:8000/index.php?tipo=tarefa1

### Listagem agregada (Tarefa 2)
http://localhost:8000/index.php?tipo=tarefa2

