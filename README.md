Online registration and login system by using PHP, CSS, Bootstrap,Html

-Create database as given below.
-registration create standard user only.
-to make user admin just change group field in database in user table.
-insert data in group table as given below.

-Database Name: loginregdb

-Tables:
users
users_session
groups

-users:
id int autoincreament,
username varchar(20),
password varchar(64),
salt varchar(32),
name varchar(50),
joined datetime,
group int


-users_session:
id int autoincreament,
user_id int,
hash varchar(64)


-groups:
id int autoincreament,
name varchar(20),
permissions text

insert data into the groups table:
data 1:
name=standard user
permissions=

data 2:
name= Administrator
permissions= {"admin":1}