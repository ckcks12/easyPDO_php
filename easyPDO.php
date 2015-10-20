<?php

function dbConnect($pdo_driver, $server_name, $db_name, $usr_name, $usr_pw)
{
	try
	{
		$db = new PDO($pdo_driver.":host=".$server_name.";dbname=".$db_name, $usr_name, $usr_pw);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $db;
	}
	catch(Exception $e)
	{
		return false;
	}
}

function dbStmt($db, $stmt)
{
	$args = func_get_args();
	$db = $args[0];
	$stmt = $args[1];

	try
	{
		$stmt = $db->prepare($stmt);
		for( $i=2; $i<count($args); $i+=2 )
			$stmt->bindParam($args[$i], $args[$i+1]);
		$stmt->execute();

		$rslt = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		//if the query has no return value then only $rslt will return it was succeed.
		try
		{
			return $stmt->fetchAll();
		}
		catch(Exception $e)
		{
			return $rslt;
		}
	}
	catch(Exception $e)
	{
		return false;
	}
}

?>