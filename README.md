
## Requisitos

* Docker
* Docker compose
* GitHub

## Clone repositorio

git clone git@github.com:hanauer12/ProjetoDevEvolution.git

## Buildar os Containers:

`docker-compose up -d --build`

## Validar se todos containers estão UP

docker ps
Listara 3 containers, 1 de PHP outro de nginx e outro de mysql.

### Acessar aplicação:

`localhost:8888/PrimeiroUsuario.php` 

Acessando de dentro da rede da empresa, temos a aplicação disponivel e rodando em http://192.168.27.252:8888/PrimeiroUsuario.php 



