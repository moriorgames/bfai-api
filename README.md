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


```
# Install docker-compose on CoreOs
$ sudo su -
$ mkdir -p /opt/bin
$ curl -L "https://github.com/docker/compose/releases/download/1.19.0/docker-compose-$(uname -s)-$(uname -m)" -o /opt/bin/docker-compose
$ chmod +x /opt/bin/docker-compose
```
