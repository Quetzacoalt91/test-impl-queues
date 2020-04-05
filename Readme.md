This project is a simple implementation of a queuing system with Redis and Symfony Messenger

## How to run this project

### Stack

```
php -S 127.0.0.1:8000 -t public/
```

```
docker run --name redis -tid -p 6379:6379 redis
```

Every time you fill the form on the home page, an email will be dispatched a certain amount of time (~10 000) on the queue.


### Message consumers

```
php bin/console messenger:consume
```

If some messages are waiting to be taken in account, they will be immediately consumed.