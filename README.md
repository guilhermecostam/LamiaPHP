<div align="center">
    <h1>LamiaPHP</h1>
    <p>:izakaya_lantern: A minimalist MVC framework for PHP</p>
    <img src="https://img.shields.io/badge/License-MIT-blue.svg" alt="License MIT">
    <img src="https://img.shields.io/badge/Maintained%3F-yes-green.svg">
</div>

***
## Content
- [Introduction](#Introduction)
- [Installation](#Installation)
- [Running Lamia](#Running-Lamia)
- [Models, controllers and views](#Models,-controllers-and-views)
	- [Model](#Model)
	- [Controller](#Controller)
	- [View](#View)
- [Routes](#Routes)
	- [Introducing routes](#Introducing-routes)
	- [Merging routes](#Merging-routes)
- [Database](#Database)
	- [PDO](#pdo)
	- [Migrations](#migrations)
- [Validating](#Validating)
	- [Introducing validations](#Introducing-validations)
	- [Validation list](#Validation-list)
- [Testing](#Testing)
- [How to contribute](#How-to-contribute)
- [License](#License)
***
## Introduction
Whenever I would start a simple PHP project without the need for a big framework to help me in the development process I would do the whole process of creating a scope, folder structure, settings and more. So to solve this I had the idea to create a simple base template for these occasions. However, as I was developing, I noticed that the project stopped being a template and became a framework. And so Lamia was born, a minimalist framework written in PHP.
***
## Installation
To install Lamia, you must have the following dependencies on your machine:
- PHP 8.0 (or later)
- Composer
- Docker
- Docker-compose

After you have all the dependencies installed, just follow these commands:
``` bash
composer create-project guilhermecostam/lamiaphp example-app

cd example-app
```
***
## Running Lamia
Installation done, now we will run the application. Initially we will create the .env file and fill in the blank information in it.
``` bash
# create the .env file
cp .env.example .env
```
Note that the database host is already defined. 
```
DB_HOSTNAME=127.0.0.1
DB_NAME=
DB_USERNAME=
DB_PASSWORD=
```
This is because the database is being run in docker, so the database host is the docker's IP address, which is usually `127.0.0.1`. 
> If your machine is not `127.0.0.1`, just run `ifconfig` (linux) or `ipconfig` (windows) to find out which IP your docker is running on.

Now we will install the composer dependencies and run the containers.
``` bash
composer install

docker-compose up -d
```
Finally, if all the steps have been followed correctly, the application is already running on localhost and ready to receive the [database migrations](#Database).
***
## Models, controllers and views
### Model
The models must be in the `app/Models/` directory and extend the Model abstract class:
``` php
# create a symbolic namespace, based in directory
namespace App\Models;

use App\Core\Model;

class Coffee extends Model
{
    //
}
```
The models in the application serve to communicate the [Controllers](#controller) with business rules and the database. Therefore, here you should write the database queries, which can be done using the `db` method. For more details, see the [PDO](#pdo) section.
### Controller
The controllers must be in the `app/Controllers/` directory and extend the Controller abstract class:
```php
namespace App\Controllers;

use App\Core\Controller;

class CoffeeController extends Controller
{
	//
}
```
The controllers in the application serve to intermediate the requests sent by the [Views](#view) with the information provided by [Models](#model). This is also where the validations of the data provided on the forms are made.
### View
The views must be in the `app/Views/` directory and is the layer where the visual information of the application should be contained. Only templates should come here, CSS styles and JavaScript files that can be accessed publicly should go in the `public/` directory.

To render the views you need to import the view class where you want to call it and call the `render` method with the specified directory: 
```php
use App\Core\View;

// ...
	(new View)->render('coffee/index');
// ...
```
> Note that here you only need to specify the folder created for the view and the file name without the `.php`, because the `render` function already accesses the `app/Views/` directory directly, along with the extension.

If you want to send information to the View scope, just create an array containing it. To access it in the view, just call the variable `$args` specifying the key sent:
``` php
# in controller
$messages = [
	'lorem' => 'ipsum'
];

(new View)->render('coffee/index', $messages);

# in view
$args['lorem']; // return must be: 'ipsum'
```
Finally, views also render http errors. Just create the view with the error you want in the `app/Views/error/` directory and call the `errorCode` function passing the error as an integer. It also has a `redirect` method which redirects to the url passed as a parameter:
``` php
# error code render
(new View)->errorCode(500);

# redirect to url
(new View)->redirect('/');
```
> It is worth noting that the `errorCode` function also takes arguments like `render`.
***
## Routes
### Introducing routes
The application routes must be in the `routes/` directory. The correct way to write them is to separate them into files that have nomenclatures related to the grouped routes.
> For example, the routes responsible for a coffee CRUD should be contained in the `coffee.php` file, and those for a beer CRUD should be contained in `beer.php`.

However, nothing stops you from putting all of the application's routes into a single file.

To create routes is simple. Just include the Router classes and the controllers that have the functions to be used:
``` php
use App\Core\Router;
use App\Controllers\CoffeeController;
```
After that, simply create an array `$routes` and structure it as follows, calling the Router's `createRoute` function:
``` php
$routes = [
	'/coffee/create' => (new Router)->createRoute(CoffeeController::class, 'create'),
	'/coffee/edit' => (new Router)->createRoute(CoffeeController::class, 'edit'),
];

return $routes;
```
In case of fetching an undefined route, the application is already prepared to return a 404 error view.
### Merging routes
For the system to recognize the routes created, it is necessary to merge the files created in the `web.php` file:
``` php
$routes = array_merge(
	include 'coffee.php',
	include 'beer.php',
);
```
***
## Database
### PDO
For the database MySQL is being used. We will use PDO to communicate with the database and create queries.

In the abstract class Model the connection to the database is already made with the instance of the Connection class. Just call the `db` attribute in the class that extends model and call the following methods:
``` php
# query for returns rows
$this->db->row('SELECT * FROM beers');

# query for returns columns
$this->db->column('SELECT * FROM beers');
```
It is worth pointing out that it is also possible to bind values with the mentioned methods. Just create the following query, passing also an array with parameter that are the values to be replaced:
``` php
# query for returns rows with bind params
$params = [
	'field' => 'brand'
];
$this->db->row('SELECT :field FROM beers', $params);
```
### Migrations
In Lamia you can use migrations via [Phinx](https://phinx.org/). The migrations automatically go into the `database/migrations/` directory by creating them with the following command:
``` bash
/vendor/bin/phinx create MyNewMigration
```
For more details on writing migrations and the rest of Phinx's functionality, see its [documentation.](https://book.cakephp.org/phinx/0/en/index.html)
***
## Validating
### Introducing validations
If you want to validate the data in a form, Lamia has a native functionality for this. Just create files to write the rules to in the `app/Requests/` directory. In each file you must extend the abstract class Request:
``` php
# create a symbolic namespace, based in directory
namespace App\Requests;

use App\Core\Request;

class CreateCoffeeRequest extends Request
{
    //
}
```
To perform validations, you must create a public method `validations`. This will return an `array_merge` with the return of each validated field.

The `validate` method called in the merge must receive two parameters. These are the name of the field to be validated and an array of validations that should be applied to the value assigned to the field. 
``` php
public function validations(): array
{
	return array_merge(
		parent::validate('lorem', [
			'required' => 'Field should be required',
			'isString' => 'Field should be string',
		]),
		parent::validate('ipsum', [
			'isBoolean' => 'Field should be boolean',
		]),
	);
}
```
> Observations:
> - The array that 'validate' receives must have items where the key is the name of the validation predefined in the application and the value is the message to be displayed if the validation fails.
> - Note that each call of the extended `validate` method of Request is for one field of the form.

Now just include the request where you want to perform the validations and call the `validations` method:
``` php
use App\Requests\CreateCoffeeRequest;

// ...
    $messages = (new CreateCoffeeRequest)->validations();
// ...
```
### Validation list
Here is a list of all the validations available in the application:

| Name        | Description                       |
|-------------|-----------------------------------|
| required    | Validate if value is empty        |
| isArray     | Validate if value is an array     |
| isString    | Validate if value is an string    |
| isInteger   | Validate if value is an integer   |
| isFloat     | Validate if value is an float     |
| isBoolean   | Validate if value is an boolean   |
| isEmail     | Validate if value is an boolean   |
| isUrl       | Validate if value is an url       |
| isValidDate | Validate if value is a valid date |
***
## Testing
For the unit tests [PHPUnit](https://phpunit.de/) is being used. The tests should be written in the `tests/` directory and to run them just run the following command:
``` bash
# for a specific test
/vendor/bin/phpunit -v tests/ExampleTest.php

# for a specific path
/vendor/bin/phpunit -v tests
```
For more details on writing tests, assertion lists, and the rest of PHPUnit's functionality, see its [documentation.](https://phpunit.readthedocs.io/en/9.5/)
***
## How to contribute
Do you want to contribute to the Lamia? Just follow these instructions:
1. Fork this repository.
2. Clone your repository.
3. Create a branch with your feature:
`git checkout -b my-feature`
4. Commit your changes:
`git commit -m 'feat: My new feature'`
5. Push to your branch:
`git push origin my-feature`
6. Come in Pull Requests from the original project and create a pull request with your changes.

After the merge of your pull request is done, you can delete your branch and wait for the feedback.
***
## License
This project is licensed under the MIT License - see the [LICENSE](https://github.com/guilhermecostam/LamiaPHP/blob/main/LICENSE) page for details.
