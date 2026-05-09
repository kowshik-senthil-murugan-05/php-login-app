PHP Codeigniter Login Page:

Features:
    - User Registration.
    - User Login.
    - Username and Password validation whether it is empty or not.
    - Duplicate username check.
    - Success - if username and password matches.
    - Invalid user - if username not exists while login.
    - Incorrect password - if username available and password does not match.
    - if error - displays at the end of the form in same page.
    - if success - navigates to the next page.
    - MySQL database integration
    - CSS styling

Technologies used:
    - PHP
    - HTML
    - CSS
    - MySQL
    - XAMPP

Database queries:
1. Create and use DB:
    create DATABASE php_login;
    use php_login;

2. Create table:
    create table users (
        id int auto_increment primary key,
        username varchar(100) unique,
        password varchar(100)
    );

3. Insert row:
    insert into users (username, password) values ("abc", "123");

4. Fetch user:
    select * from users where username="abc";