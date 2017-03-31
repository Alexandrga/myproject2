<?php
require_once ('config.php');
class user {
privat $dsn;
privat $user;
privat $password;

function __construct ($dns, $user, $password)
{
	$this->dsn = $dsn;
	$this->user = $user;
	$this->password = $password;
}
function connect ()
{
	try {
	$db = new PDO($this->dsn, $this->user, $this->password);
		}
	catch (PDOException $e) {
		echo 'Подключение не удалось: ' . $e->getMessage();
	}
return $db;
}
function loadimage()
{
	
}
}