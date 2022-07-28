
## Getting Staarted

### step 1 - Clone project

`git clone`

### step 2 - Change directory to clone dircetory

`cd xxx`

### step 3 -  Copy .env file to .env and json

Copy .env & json file to json directory

### step 4 - run Docker compose

`docker-compose up -d`

### step 5 - get Container ID

`docker ps`

### step 6 - docker exec

`docker exec -it <docker sail-81/app container id> /bin/bash`

### step 7 - Install packages

`composer install`

### step 8 - Generate a APP_KEY

`php artisan key:generate`

### step 9 - Migrate

`php artisan migrate`

### step 10 - Check By Postman

Postman document: https://documenter.getpostman.com/view/22424762/UzXPwGSb

