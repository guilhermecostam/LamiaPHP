<div align="center">
    <h1>LamiaPHP</h1>
    <p>:izakaya_lantern: A minimalist MVC framework for PHP</p>
    <img src="https://img.shields.io/badge/License-MIT-blue.svg" alt="License MIT">
    <img src="https://img.shields.io/badge/Maintained%3F-yes-green.svg">
</div>

***
## Indice
[Introduction](#Introduction)
[Installation](#Installation)
[Running Lamia](#Running%20Lamia)
[How to contribute](#How%20to%20contribute)
[License](#License)
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
``` shell
composer create-project guilhermecostam/lamiaphp example-app

cd example-app
```
***
## Running Lamia
Installation done, now we will run the application. Initially we will create the .env file and fill in the blank information in it.
``` shell
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
``` shell
composer install

docker-compose up -d
```
Finally, if all the steps have been followed correctly, the application is already running on localhost and ready to receive the [database migrations](#Database).
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
