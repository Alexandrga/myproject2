<?php
class user 
{
	private $dbconnection;

	function __construct ($dbconnection)
	{
		$this->dbconnection = $dbconnection;
	}

	function imagetofoto($file, $describe, $ID_user, $date1, $category)
	{
		var_dump(['file' => $file, 'describe' => $describe, 'ID_user' => $ID_user, 'date1' => $date1, 'category' => $category]);
		//var_dump($category);
		//$this->dbconnection->query("SET NAMES utf8");
		$sql = "INSERT INTO foto1 (`url`, `describe`, `ID_user`, `DATE`, `category`) values (:file, :describe, :ID_user, :date1, :category)";
		$statement = $this->dbconnection->prepare($sql);
		$statement->bindParam(':ID_user', $ID_user, PDO::PARAM_INT);
		$statement->bindParam(':file', $file, PDO::PARAM_STR);
		$statement->bindParam(':describe', $describe, PDO::PARAM_STR);
		$statement->bindParam(':date1', $date1, PDO::PARAM_STR);
		$statement->bindParam(':category', $category, PDO::PARAM_STR);
	return $statement->execute();
	}
	function describetopage()
	{
		$sql ="SELECT `url`, `describe`, `DATE`, `Company` FROM foto, user where `ID_user`=1";
		$statement = $this->dbconnection->prepare($sql);
		$statement->execute();
		$result = $statement->fetchall();
	return $result;
	
	}
	
}
