# Web Programming
## OS1 - 2112 - TICA
### TP1-W2-S3-R0

<br>

```bash
$ docker run --rm --interactive --tty --volume "$PWD":/app composer create-project --prefer-dist laravel/laravel TICA-TP1
$ docker run --rm --interactive --tty --volume "$PWD":/app composer require laravelcollective/html
```

<br>

```bash
$ docker container run -it --rm -v "$PWD":/app -p 8000:8000 php bash
root@c44d51863525:/# cd /app/
root@c44d51863525:/app# php artisan make:controller HomeController 
root@c44d51863525:/app# php artisan make:controller RegisterController 
root@c44d51863525:/app# php artisan serve --host 0.0.0.0
```
