# mystore
A customer review web plug-in for online stores.
Allowing them to store, display, modify, create and delete reviews.<br>
author : Voldi Monzambe <br>

## How to Run it
Open your php server running the databaseinit.php file first to initialize the database that this program uses, and then you can run index.php to start the program.

server name is "127.0.0.1";<br>
database name is "myDB";<br>
table name is "reviews";<br>

### i already have a database named like that on that server
If you already have a databse named like that on tat server then you can comment out line 13 to 19 on the databaseinit.php file to only create another table in that database and avoid database duplicate errors.

### choosing a different database to run it
If you want to run it in a new or different database, change line 5 of databaseinit.php where it says "myDB" and line 6 of dbcon.php where it says the same thing to your prefered database name and then run databaseinit.php.
