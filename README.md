
## Requisitos

* Docker
* Docker compose
* GitHub

## Clone repositorio

git clone git@github.com:hanauer12/ProjetoDevEvolution.git

## Buildar os Containers:

`docker-compose up -d --build`

## Validar se todos containers estão UP

`docker ps`
Listara 3 containers, 1 de PHP outro de nginx e outro de mysql.

### Acessar aplicação:

`localhost:8888/PrimeiroUsuario.php` 

Acessando de dentro da rede da empresa, temos a aplicação disponivel e rodando em:
`http://192.168.27.252:8888/PrimeiroUsuario.php` 

.
├── Classes
│   ├── Planos.php
│   ├── Tarefas.php
│   └── Usuario.php
├── controllerPlanos
│   ├── atualizarplano.php
│   ├── criarplano.php
│   ├── deletarplano.php
│   └── listarplanos.php
├── controllerTarefas
│   ├── atualizartarefa.php
│   ├── criartarefa.php
│   ├── deletartarefa.php
│   └── listartarefas.php
├── controllerUsuarios
│   ├── atualizarusuario.php
│   ├── criarusuario.php
│   ├── deletarusuario.php
│   └── verificalogin.php
├── css
│   └── styles.css
├── DB
│   └── connectMysql.php
├── index.php
├── javascript
│   └── scripts.js
├── login
│   ├── atualizarusuario.php
│   ├── editarusuario.php
│   ├── logout.php
│   └── registrar.php
├── login.php
├── planos
│   ├── Criar.php
│   ├── Editar.php
│   └── planos.php
├── PrimeiroUsuario.php
└── tarefas
    ├── Criar.php
    ├── Editar.php
    └── tarefas.php

