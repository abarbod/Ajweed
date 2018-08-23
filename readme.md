# ِAjaweed Site

This repo contains the site for Ajaweed

## Prerequisites

1. [PHP](http://php.net/downloads.php#v7.2.9) `>= 7.1`
2. [Git](https://git-scm.com/downloads) `>= 2`
3. PHP [Composer](https://getcomposer.org/)
4. [Docker](https://www.docker.com/) _Optional_

## Coding style

-   PHP: [PSR-2](https://www.php-fig.org/psr/psr-2/)
-   JS: [JS Standard](https://standardjs.com/)
-   HTML/CSS: [Google HTML/CSS Style Guide](https://google.github.io/styleguide/htmlcssguide.html)

## How to use

1. Make a fork by clicking on the `Fork` button on the top of the page.
2. A new repo will be created in your github account.
3. From the new repo, clone the project to your computer.

    - From your repo click on the green button `Clone or Download` and copy the link to the repo.
    - from your computer open your `terminal/git bash` and run this command: (Change the username)

    ```bash
    git clone https://github.com/<your username>/ajaweed-site.git
    ```

    - The command will make a copy of the project to your computer.
    - Change your location to the project and run the following commands:

    ```bash
    cd ajaweed-site
    cp .env.example .env
    composer install
    php artisan key:generate
    php artisan serve
    ```

## How to use (Docker)

1. run

```bash
./vessel start
```

to start the environment setup (apache, mysql, php and the laravel app)

2. run

```bash
./vessel composer install
```

to install the dependencies

3. run

```bash
./vessel art migrate
./vessel art key:generate
```

4. You are good to go

## TODO

-   How to install
-   Docker (How to)
