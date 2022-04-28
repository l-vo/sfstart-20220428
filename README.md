# SFSTART training

## Installation

The easiest way to start the project is to use [docker](https://docs.docker.com/get-docker/) and the [Symfony local web server](https://symfony.com/doc/current/setup/symfony_server.html):

```bash
$ symfony new --webapp sfstart
$ docker compose up -d
$ yarn encore dev  # js/css entry points
$ symfony serve -d
```