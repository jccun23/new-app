Prerequisite
1. Docker Desktop should be installed
   - https://www.docker.com/products/docker-desktop/
---
1. Clone the repository
2. Copy the contents of the .env.example for your .env

```text
Run the command below inside your project folder to copy the contents of the .env.example 
cp .env.example .env
```
3. Run the following commands to your terminal
```text
npm install
composer install
```
4. Run `./vendor/bin/sail up` to run the application.
5. Visit `http://localhost` to test the app

