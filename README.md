<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Teste VIPCommerce

Esta API é um teste proposto pela empresa [VipCommerce](https://site.vipcommerce.com.br/);

## Rodar o projeto local

Este projeto esta utilizando o [Docker](https://www.docker.com/get-started) e o Docker Compose, você pode acessar a página e seguir os passos de instalação.

##### Passo 1
Após a instalar o Docker, clone o projeto na sua maquina:

```
$ git clone https://github.com/ThiagoFelipeg3/VipCommerce.git
```

##### Passo 2

Dentro da raiz do projeto clone um arquivo chamado .env.example

```
cp .env.example .env
```
Adicionar as variáveis de ambiente para os teste de email, no meu caso estou utilizando o [MailTramp](https://mailtrap.io/)
```
MAIL_MAILER=smtp
MAIL_HOST=
MAIL_PORT=2525
MAIL_FROM_ADDRESS=contato@viacommerce.com
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=tls
MAIL_FROM_NAME="${APP_NAME}"
```

##### Passo 3
Após isso entre na pasta do projeto e execute o docker compose:
Isso pode demorar um pouco;

```
$ docker-compose up -d
```

```
$ docker-compose up -d --force-recreate app
```

##### Passo 4
Se não ouver erros, entre no container criado pelo projeto e instale o composer:

```
$  docker-compose exec app bash
```

```
$ composer install
```


## Teste de rotas

### Cadastro de Pedido

Segue o JSON para cadastro de pedido:

```
{
    "data_pedido": "2020-05-21",
    "observacao": "Compras do Mês",
    "codigo_forma_pagamento": 1,
    "codigo_cliente": 2,
    "pedido_produto": [
        {
            "codigo_produto": 3,
            "quantidade": 34
        },
        {
            "codigo_produto": 4,
            "quantidade": 7
        },
        {
            "codigo_produto": 5,
            "quantidade": 14
        },
        {
            "codigo_produto": 13,
            "quantidade": 200
        }
    ]
}

```

# Backend
## Criar uma API que contenha as seguintes Resources e suas rotas

A API RESTful deverá ser criada usando o NodeJs (Podendo usar typescript e qualquer
framework que julgue necessário ) ou PHP (Poderá ser usado Cakephp ou Laravel/Lumen)
com o banco de dados em Mysql. O projeto deve conter testes unitários (Isso também será
avaliado).

Os testes das rotas poderão ser feitos no postman (nesse caso exportar a collection no
postman junto com o projeto) ou via teste integração (pode ser utilizado qualquer framework
para tal).

Não precisa se preocupar com autenticação das rotas, usuário ou restrição de acesso.

Criar um repositório no github e detalhar no readme.md todos os passos necessários para
rodar a API e quais requisitos necessários para rodar o projeto.

Fazer os commits no github como se estivesse em um projeto real, fazendo um commit por
feature e explicando nos commits o que está sendo alterado no projeto. Isso também será
avaliado.

### Clientes
Com os campos: código cliente, nome, cpf, sexo, email
Com os endpoints
- GET /clientes/
- GET /clientes/1
- POST /clientes/
- PUT /clientes/1
- DELETE /clientes/1

### Produtos
Com os campos: código produto, nome, cor, tamanho, valor
Com os endpoints
- GET /produtos/
- GET /produtos/1
- POST /produtos/
- PUT /produtos/1
- DELETE /produtos/1

### Pedido
Com os campos: código do pedido, data do pedido, observação, forma de pagamento
(dinheiro, cartão, cheque).

    1. Um pedido deverá ser de um cliente
    2. Um pedido deverá conter 1 ou mais produtos, cada produto no pedido poderá ter 1 ou mais quantidades.

Com os endpoints
- GET /pedidos/
- GET /pedidos/1
- POST /pedidos/
- PUT /pedidos/1
- DELETE /pedidos/1

O pedido terá a opção de ser enviado para o email do cliente pela API
No email deverá ter os dados do pedido, os dados do cliente, os produtos do pedido, o valor
total por produto e o valor total do pedido.
    - POST /pedidos/1/sendmail

O pedido terá a opção de ser gerado em PDF pela API (e feito o download pelo front)
No relatório pdf deverá ter os dados do pedido, os dados do cliente, os produtos do pedido, o
valor total por produto e o valor total do pedido.
    - POST/pedidos/1/report