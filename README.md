BFAI Api
========

Simple api to query for static data about the game.


Installation
============

Follow this steps to install and run the project

```
$ git clone https://github.com/moriorgames/bfai-api.git
$ cd bfai-api
$ php phars/composer.phar install
# Run the PHP built-in server
$ php -S localhost:5200 --docroot=public
```

```
# Shortcut to rebuild quickly the container
$ docker stop bfai_api && docker rm bfai_api && docker build -t moriorgames/bfai-api . && docker run -td --name bfai_api -p 5200:5200 moriorgames/bfai-api
```

