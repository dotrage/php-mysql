PHP MySQL
=========

A PHP MySQL wrapper class that can handle a single database configuration or an array of databases.  Through a single object, an application can envoke unlimited interactions with a database.

The following functions are available through this class:
* check
* query
* row
* results
* count
* affected_rows

Examples
--------

Define the database connection settings:
``` php
$connection = array(
	"host" => "localhost",
	"username" => "user",
	"password" => "password",
	"database" => "test"
);
```

Instantiate the DB object:
``` php
$db = new DB($connection);
```

Check whether the database is available:
``` php
$check = $db->check();
```

Query the database for a collection of records from a table:
``` php
$users = $db->results("SELECT * FROM users WHERE name = '%s'","John Doe");
```

Query the database for a single record from a table:
``` php
$user = $db->row("SELECT * FROM users WHERE name = '%s'","John Doe");
```

Return a record count for a query:
``` php
$user_total = $db->count("SELECT * FROM users");
```

Insert a new record into a table:
``` php
$insert = $db->query(
	"INSERT INTO users (name,city,state,zip)" .
	"VALUES ('%s','%s','%s','%s')",
	"John Doe","Denver","CO","80238"
);
```

Update an existing record:
``` php
$update = $db->query(
	"UPDATE users SET name = '%s' " .
	" WHERE key = '%s'",
	"Johnny Doe","John Doe"
);
```

