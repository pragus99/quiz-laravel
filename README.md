# About quiz-app

An online quiz or online examination is a web application that allows the admin to set the questions with a maximum of four options along with the correct answer. 
Admin can categorize the questions by creating the category for the questions. This helps the admin to list all the questions for a particular category whenever necessary. 
Admin can create the users. Admin can assign the exam to his/her staff/interns/students for a particular category such as programming quiz, aptitude test, and so on. 
Each student/employee/intern who has been assigned a quiz can attempt the quiz and the result will be available to the candidate and admin can also view the result of the candidate in his/her dashboard.

# Usage
# Install Dependencies
composer install
npm install
or
yarn

# Create a copy of your .env file
cp .env.example .env

# Generate an app encryption key
php artisan key:generate

# Create an empty database for our application. In the .env file, add database information to allow Laravel to connect to the database

# Migrate the database
php artisan migrate

# Seed the database for admin account
php artisan db:seed

# Website 

http://quiz-lavel.herokuapp.com/
