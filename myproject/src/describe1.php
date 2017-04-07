<?php
require_once('headcss.php');
?>
<?php
require_once('header.php');
?>
<?php
require_once('menu.php');
?>
<?php
require_once(__DIR__ . '/../../config/config.php');
require_once(__DIR__ .'/class/userclass.php');
require_once(__DIR__ .'/function/connect.php');

$name = $_GET['name'];
$dbConnection = connect($dsn, $user, $password);
$base = new User($dbConnection);
$result = $base->describetopage($name);

/*$num = 2;
$page = $_GET['page'];
$statement = $dbConnection->prepare('SELECT COUNT (*) FROM fotob');
$statement->execute();
$result = $statement->fetchall();
$posts = $result['0'];
$total = (($posts-1)/$num)+1;
$total = intval($total);
$page = intval($page);
if (empty($page) && $page < 0) $page = 1;
if ($page > $total) $page = $total;
$start = $page * $num - $num;
*/
//var_dump($result);
if (!empty($result))
{
	$i=0;
 foreach ($result as $key => $value)
	foreach ($value as $key2 => $value2)
	{
		if ($key2 == '0')
		{
		$url = $value2;
		//var_dump($url);
		?><div class="describe"><img  class="sizeimage" src ="<?php echo $url;?>"<br></div><?php
		}
		if ($key2 == '1')
		{
		$describe = $value2;
		?><div class="describe"><?php echo $describe;?></div><?php
		}
		if ($key2 == '2')
		{
		$date = $value2;
		?><div class="describe"><?php echo $date;?></div><?php
		}
		if ($key2 == '3')
		{
		$company = $value2;
		?><div class="describe"><?php echo $company;?></div><?php
		}
		$i = $i +100;
	}
}
else
{
		?>
		<script type="text/javascript">
			alert('В данной категории нет данных');
		</script>
}
<?php
require_once('footer.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
</body>
</html>