<?php
function connect ($dsn, $user, $password)
{
    try {
    $dbConnection = new PDO($dsn, $user, $password);
        }
    catch (PDOException $e) 
        {
           echo 'Подключение не удалось: ' . $e->getMessage();
        }
return $dbConnection;
}
?>