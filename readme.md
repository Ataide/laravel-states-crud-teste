# Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)



## Instrução de Instalação

Clone o projeto para sua máquina local. Depois de terminado o clone execute o comando  `composer update` dentro da pasta do projeto e espere a instalação das dependências.

Depois de instalado as dependências, é hora criar um banco de dados.

Crie um banco de dados com o nome de sua preferência e tenha certeza que seu arquivo  .env  está configurado corretamente:

```
DB_HOST=localhost
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

Caso não tenha o arquivo .env, faça uma cópia do .env.example para .env e continue com as configurações.

Feito isso vamos seguir com as migrations:

```shell
php artisan migrate
```

Depois com os seeds:

```shell
php artisan db:seed
```

Pronto, depois só rodar:

```shell
php artisan serve
```

Aqui tem um link de demonstração Online:

[DEMO](http://52.67.219.144:8001/).



## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
