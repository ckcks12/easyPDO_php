# easyPDO_php
functionalize pdo in php

### *Before you read*
I swear that I don't like **functional coding** and also it's not good for using **PDO** because that is an Object.
However the reason why I coded it functionally is ,.,.,.,., um,.,.,.,..,. maybe I dunno. I'll edit it asap.

# How to use
`dbConnect($pdo_driver, $server_name, $db_name, $usr_name, $usr_pw)`

$pdo_driver : I dunno how it connects other databases but I checked it works on `MySQL`.

return : when connection has succeed, it returns PDO obejct but failed it returns `false`(can compare using `===`).

---
`dbStmt($db, $stmt)`

$db : PDO object. Sorry, but function doesn't care that it has been connected.

$stmt : The sql query that will be exectued.

  **parameters and binding example**
  
  `dbStmt($db, "select * frmo account where id=:id and pw=:pw", ":id", $id, ":pw", $pw);`
  
  It can receive various amount of parameters. Reference at [`func_get_args()`](http://php.net/manual/en/function.func-get-args.php)
  
return : succeed when the query has no return : `true` (maybe?)

succeed when the query has return : output array

failed : `false`
