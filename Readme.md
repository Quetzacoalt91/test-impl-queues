This project is a simple implementation of a queuing system with Redis and Symfony Messenger

## How to run this project

### Stack

```
php -S 127.0.0.1:8000 -t public/
```

```
docker run --name redis -tid -p 6379:6379 redis
```

### Message consumers

```
php bin/console messenger:consume
```