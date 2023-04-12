
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
<br>
Listara 3 containers, 1 de PHP outro de nginx e outro de mysql.

### Acessar aplicação:

`localhost:8888/PrimeiroUsuario.php`

Acessando de dentro da rede da empresa, temos a aplicação disponivel e rodando em:
`http://192.168.27.252:8888/PrimeiroUsuario.php`
### Estrutura do projeto:

` ├── Classes` <br>
`│   ├── Planos.php`<br>
`│    ├── Tarefas.php` <br>
`│    └── Usuario.php` <br>
`├── controllerPlanos` <br>
`│   ├── atualizarplano.php` <br>
`│   ├── criarplano.php` <br>
`│   ├── deletarplano.php` <br>
`│   └── listarplanos.php` <br>
`├── controllerTarefas` <br>
`│   ├── atualizartarefa.php` <br>
`│   ├── criartarefa.php` <br>
`│   ├── deletartarefa.php` <br>
`│   └── listartarefas.php` <br>
`├── controllerUsuarios` <br>
`│   ├── atualizarusuario.php` <br>
`│   ├── criarusuario.php` <br>
`│   ├── deletarusuario.php` <br>
`│   └── verificalogin.php` <br>
`├── css` <br>
`│   └── styles.css` <br>
`├── DB` <br>
`│   └── connectMysql.php` <br>
`├── index.php` <br>
`├── javascript` <br>
`│   └── scripts.js` <br>
`├── login` <br>
`│   ├── atualizarusuario.php` <br>
`│   ├── editarusuario.php` <br>
`│   ├── logout.php` <br>
`│   └── registrar.php` <br>
`├── login.php` <br>
`├── planos` <br>
`│   ├── Criar.php` <br>
`│   ├── Editar.php` <br>
`│   └── planos.php` <br>
`├── PrimeiroUsuario.php` <br>
`└── tarefas` <br>
`├── Criar.php` <br>
`├── Editar.php` <br>
`└── tarefas.php` <br>

Temos a estrutura definida por Classes e Controlladores, alem da estrutura que trata o front-end e a conexão com o banco de dados.

Temos definido também a tela de login e a tela de Primeiro Usuário que pode ser usada  para cadastrar o primeiro usuário e se existe um usuário criado no banco a tela não é mais acessível.

Com o primeiro Usuário criado, somos direcionados a tela de login, após acessar a tela de login temos nossa dashboard e um menu lateral referente a aplicação.

Temos um CRUD de Tarefas e Planos de estudos com todas as funções de criar, editar, listar e deletar.

Também temos o controle dos usuarios, onde podemos criar, editar, listar e deletar os usuários.
