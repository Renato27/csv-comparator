# CSV Comparator Project

Este projeto contém duas implementações para comparação de arquivos CSV:
1. Um projeto Laravel.
2. Um projeto PHP sem framework.

## Estrutura do Projeto

- /csv-comparator-laravel # Projeto Laravel
- /public
- /css
- /uploads
- index.php
- upload.php
- /src
- /classes
- CsvComparator.php
- /uploads
- .gitignore
- docker-compose.yml
- Dockerfile
- README.md


## Projeto Laravel

### Requisitos

- Docker
- Docker Compose

### Como Executar

1. Navegue até o diretório do projeto Laravel:

   ```bash
   cd csv-comparator-laravel

2. Execute o Docker Compose:
    ```bash
    docker-compose up --build

3. Acesse o projeto Laravel no seu navegador:
    ```bash
    http://localhost:8000

### Funcionalidades

- Upload de arquivos CSV.
- Comparação de arquivos CSV.
- Exibição dos resultados de comparação.

### Endpoints

- `/` : Página de upload dos arquivos CSV.
- `/compare` : Página de resultados da comparação.

## Projeto PHP Sem Framework

### Requisitos

- Docker
- Docker Compose

### Como Executar

1. Navegue até o diretório raiz:

   ```bash
   cd /

2. Execute o Docker Compose:
    ```bash
    docker-compose up --build

3. Acesse o projeto Laravel no seu navegador:
    ```bash
    http://localhost:8080

### Funcionalidades

- Upload de arquivos CSV.
- Comparação de arquivos CSV.
- Exibição dos resultados de comparação.

### Estrutura do Projeto PHP

- `index.php`: Página principal para upload de arquivos.
- `upload.php`: Script para processamento dos arquivos.
- `src/classes/CsvComparator.php`: Classe para comparação dos arquivos CSV.
