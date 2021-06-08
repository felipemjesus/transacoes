# Transações

Aplicação API REST FULL desenvolvida com framework Laravel para realizar transferências de valores entre usuários comuns e lojistas

## Executar o projeto

```bash
# Clone o repositório
git clone https://github.com/felipemjesus/transacoes.git

# Entre na pasta do projeto
cd transacoes

# Levantar servidor
docker-compose up -d

# Instalar dependências
docker exec app-php-fpm composer install
```

Verifique se existe o arquivo ``.env``, caso não existe crie e copie o conteúdo do arquivo ```.env.example```.

Acesse ``http://localhost:8000``

## Recursos da API REST

URL Base: ``http://localhost:8000/api``

### Cadastro de Usuários

Request ``POST /usuarios``

```json
{
    "nome" : "Felipe",
    "documento" : 12345678900,
    "email" : "felipe@email.com",
    "senha": "*Ujn$Rfv"
}
```

### Realizar transferência

Request ``POST /transacoes``

```json
{
    "valor" : 100.00,
    "pagador" : 1,
    "beneficiario" : 2
}
```

