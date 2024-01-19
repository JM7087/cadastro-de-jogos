## Sistema em desenvolvimento
esse é um projeto básico de crud em laravel é docker, de cadastro de jogos.

## Passo a passo para rodar o projeto

```sh
cd cadastros-de-jogos/
```


Crie o Arquivo .env
```sh
cp .env.example .env
```


Atualize essas variáveis de ambiente no arquivo .env
```dosini
APP_NAME="cadastro-de-jogos"
APP_URL=http://localhost:7087

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=nome_que_desejar_db
DB_USERNAME=nome_usuario
DB_PASSWORD=senha_aqui

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```


Suba os containers do projeto
```sh
docker-compose build
```

```sh
docker-compose up -d
```

Acesse o container
```sh
docker-compose exec app bash
```

Instalar o Composer
```sh
composer install
```

Gere a key do projeto Laravel
```sh
php artisan key:generate
```

Gere as tabelas do banco de dados
```sh
php artisan migrate
```

Acessar o bancco de dados
[http://localhost:8080/]

Acesse o projeto
[http://localhost:7087]
