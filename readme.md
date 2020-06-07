# Sistema de Tarefas

Sistema simples para controle de tarefas em aberto e finalizado

## Começando

```
Criar um cópia do arquivo env.example para .env (Ambiente de Teste)
```
Esse passo é importante dependendo onde você está rodando o projeto se for local é bom usar o .env caso em produção configurar no config/database.php

```
php artisan db:seed
```

Esse passo é para gerar dados fakes para visualização do sistema.
```
php artisan migrate
```
### Conta de acesso
```
login: admin@gmail.com
password: secret
```

Executar o comando para rodar a migrations para criação das tabelas no banco de dados.

# Funcionalidades do sistema

## O sistema consiste em utilizar seguintes telas

* Formulário de cadastro e edição de categorias, tarefas e usuários.
* Listagem com filtros.
* Restrição para acessar o sistema.
* Migrações para controle da estrutura do banco de dados.

### Categorias

```
Descrição
```
### Usuário

```
Nome, Email, Senha 
```
### Tasks

```
Título, Contéudo, Data de Início, Data Final, Status, Categoria, Usuário
```

## Desenvolvimento

Um pequeno projeto para to-do.

### Pré-requisitos

O que você precisa?
* PHP 7+
* MySQL ou PostgreSQL
* [SublimeTEXT](https://www.sublimetext.com/) - Editor de Texto
* [Visual Studio Code](https://code.visualstudio.com/) - IDE
* [Composer](https://getcomposer.org/) - Gerenciador de pacotes

### Ferramentas usadas

* PHP 7+
* MySQL
* [Laravel](https://laravel.com/) - Laravel 5.7
* [Template](https://adminlte.io/preview) - AdminLTE 2
* [Composer](https://getcomposer.org/) - Gerenciador de pacotes

### Desenvolvedor
* Yuri Neves(https://github.com/yurineves92)


