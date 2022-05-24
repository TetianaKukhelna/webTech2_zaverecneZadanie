# Zaverecne zadanie s Webovych Technologii 2

## This application is simulation of suspension

We use `PHP:8.1` , `MySQL` and `PHPMyAdmin`.

Project wrap in Docker and all interfaces you can see in `Makefile`

To run project just call
```sh
docker-compose up 
```
and Docker pull project and run it
___
1. Clone the project

    We’ll download the code from its repository on GitHub.

2. Configure

   We'll configure Xdebug for PHPStorm.

3. Run the application

    By this point we’ll have all the project pieces in place.

4. Use Makefile

    When developing, you can use `Makefile` for doing recurrent operations.

5. Use Docker Commands

    When running, you can use docker commands for doing recurrent operations.

___

## Clone the project

Clone Git repository 

```sh
git clone https://github.com/TetianaKukhelna/webTech2_zaverecneZadanie
```
___

## Run the application

1. Start the application for the first time :

    ```sh
    docker-compose up --build
    ```

    **After use**

    ```sh
    docker-compose up
    ```

2. Open your favorite browser :

    * [http://localhost:8000](http://localhost:8000/)
    * [http://localhost:8080](http://localhost:8080/) PHPMyAdmin (username: dev, password: dev)

3. Stop and clear services

    ```sh
    docker-compose down -v
    ```
___

#### Connecting MySQL from [PDO](http://php.net/manual/en/book.pdo.php)

```php
<?php
    try {
        $dsn = 'mysql:host=mysql;dbname=test;charset=utf8;port=3306';
        $pdo = new PDO($dsn, 'dev', 'dev');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
?>
```
