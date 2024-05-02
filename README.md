# DB_Dlog 
This Project is built the LAMP Stack via docker as defined here: https://github.com/sprintcube/docker-compose-lamp/blob/master/README.md 

I have modified the /www root directory with html forms and php scripts to resemble a blog/discussion board.
A database has been added with the following tables:
- users
- posts
- comments
- categories
- tags
- postTags

## Installation

Make sure you have docker on your machine and are in a Linux environment.

- Clone this repository on your local computer
- configure .env as needed
- Run the `docker compose up -d`.
- access the landing page via HTTP:localhost
- for admin access visit HTTP:localhost/admin.php
