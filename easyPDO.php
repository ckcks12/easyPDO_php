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
		for( $i=2; $i<count($args); $i++ )
			$stmt->bindParam($args[$i]);
		$stmt->execute();

		$rslt = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		return $stmt->fetchAll();
	}
	catch(Exception $e)
	{
		return false;
	}
}

?>