## Test Laravel App v1.0

In order to work with this project, you have two alternatives:

1. Vagrant Homestead
2. Custom Virtual Machine

For the first alternative, we recommend following the documentation of the Laravel page [in here]("http://laravel.com/docs/master/homestead)

For the second alternative, you need to follow the next steps:

## Requirements

* Apache2
* php5-cli, php5-mcrypt, php5-mysql, php5-mysqlnd
* cURL
* MySQL Server and Client (mysql-server-5.6, mysql-client-5.6, mysql-client-core-5.6)
* PostgreSQL (postgresql postgresql-contrib)
* phpPgAdmin (Optional)
* PHPMyAdmin (Optional)
* Composer
* Node.js 0.12.* (gulp)
* Laravel 5.*
* PHPUnit 4.8.*

After installing the first five requirements, we need to install composer using:

**curl -sS https://getcomposer.org/installer | php**

When it's done, we need to move the *.phar* file to allow a global access to Composer using:

**sudo mv composer.phar /usr/local/bin/composer**

Then, we can install Laravel using the following command:

**composer global require "laravel/installer=~1.1"**

After this, we need to add the composer bin to the system PATH:

**export PATH="~/.composer/vendor/bin:$PATH"**

Remember to enable the following Apache and PHP modules in order to start working:

**sudo php5enmod mcrypt
sudo a2enmod rewrite**

After this, we need to restart the Apache server with *sudo service apache2 restart* and all the requirements to start working with Laravel are installed.

Then, we need to set up Node.js in order to make Elixir works which will compile our styles and javascripts files using some Gulp commands.

To install Node.js, follow these steps:
                    
- git clone https://github.com/creationix/nvm.git ~/.nvm
- echo "source ~/.nvm/nvm.sh" >> ~/.bashrc
- source ~/.nvm/nvm.sh
- nvm install node
- nvm use node
- nvm alias default node

**node -v**

If it shows your current Node.js installation, it's working correctly. Now, you need to install Gulp using npm with the following command:

**npm install --global gulp**

Because we install Gulp as a global dependency with npm we can execute this command from any folder. Now, we need to install Elixir, which will require to go to our project directory and execute the following command:

**npm install**

This will check the package.json file and install all node.js dependencies, as composer does.

**npm install -g bower**

This will install the dependency manager for the frontend. To add dependencies, simply add them to the dependencies section on bower.json. (Dependency version syntax is explained in http://stackoverflow.com/questions/19030170/what-is-the-bower-version-syntax)

**bower install**

This will install the dependencies from bower.json on the folder specified in .bowerrc.

**gulp watch**

This command will compile all of your assets and will monitor any changes to them. If it doesn't work you need to run gulp everytime you update the javascript or css files.


At last, you need to install PHPUnit using the following command:
**sudo apt-get install phpunit**

## Installation

In order to use, we need to copy the current .env.example and create a new *.env* file using the correct credentials for our new PostgreSQL database and our old MySQL database. 

You need to set the DB_CONNECTION config line in the env file to pgsql. And don't forget to execute the following command in order to make sessions works:

**php artisan key:generate**

This will set the APP_KEY in the system.

Now please run Laravel migration files and create your tables

**php artisan migrate**

After this, we need to install Passport to allow the APIs to work an use the public and privates key to generate secure JWT tokens, you need to use the command from the console:

**php artisan passport:install**