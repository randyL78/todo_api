# PHP Techdegree Project 7 - Todo ApiException

## Instructions

- [x] This API is versioned, all routes should be prefixed with **/api/v1**

- [x] You should have the following routes:

    - [x] [GET] /api/v1/todos
    - [x] [POST] /api/v1/todos
    - [x] [GET] /api/v1/todos/{id}
    - [x] [PUT] /api/v1/todos/{id}
    - [x] [DELETE] /api/v1/todos/{id}

- [x] When the app first starts it will attempt to fetch all Todos in the system.  Handle the request and return all the Todos.

    - [x] Route [GET] /api/v1/todos

- [x] When a Todo is **created** and the save link is clicked, it will make a request to the server.  Handle the request by creating a Todo and setting the proper status code.

    - [x] Route [POST] /api/v1/todos

- [x] When a previously saved Todo is **updated** and the save link is clicked, it will make a request to the server. Handle the request by updating the existing Todo.

    - [x] Route [PUT] /api/v1/todos/{id}

- [x] When a previously saved Todo is **deleted** and the save link is clicked, it will make a request to the server.  Handle the deletion and return a "message" that the resource has been deleted along with the proper status code.

    - [x] [DELETE] /api/v1/todos/{id}

## Extra Credit

- [ ] Add additional fields to your tasks such as due date, priority or project.
- [ ] Add unit tests to test your task model.

***

# Slim-Skeleton

Use this skeleton application to quickly setup and start working on a new Slim Framework 4 application. This application uses the latest Slim 4 with Slim PSR-7 implementation and PHP-DI container implementation. It also uses the Monolog logger.

This skeleton application was built for Composer. This makes setting up a new Slim Framework application quick and easy.

## Install the Application

Run this command from the directory in which you want to install your new Slim Framework application.

```bash
composer create-project slim/slim-skeleton [my-app-name]
```

Replace `[my-app-name]` with the desired directory name for your new application. You'll want to:

* Point your virtual host document root to your new application's `public/` directory.
* Ensure `logs/` is web writable.

To run the application in development, you can run these commands 

```bash
cd [my-app-name]
composer start
```

Or you can use `docker-compose` to run the app with `docker`, so you can run these commands:

         cd [my-app-name]
	 docker-compose up -d
After that, open `http://0.0.0.0:8080` in your browser.

Run this command in the application directory to run the test suite

```bash
composer test
```

That's it! Now go build something cool.
