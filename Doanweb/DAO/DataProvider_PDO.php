<?php
class DataProvider_PDO 
{
	public static function ExecuteQuery($sql)
	{
		try{
			$dbh = new PDO("mysql:host=localhost;dbname=data_shopdt","root", "");
			$dbh->query("SET NAMES utf8");
			$result = $dbh->query($sql);
		}
		catch(PDOException $e)
		{
			echo "Error: ".$e->getMessage();
		}
		
		return $result;
	}
}
?>