<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	</head>

<body>

	<?php
	require_once('head.php');
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

	$dbConnection = connect($dsn, $user, $password);

	$base = new User($dbConnection);
	$result = $base->describetopage();
	//var_dump($result);
if (!empty($result))
{
 foreach ($result as $key => $value)
	foreach ($value as $key2 => $value2)
	{
		if ($key2 == '0')
		{
		$url = $value2;
		//var_dump($url);
		?><div align = "justify" class="describe"><img  class="sizeimage" src ="<?php echo $url;?>"<br></div><?php
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
		/*if ($key2 == '3')
		{
		$category = $value2;
		?><div class="describe"><?php echo $category;?></div><?php
		}*/
		if ($key2 == '4')
		{
		$company = $value2;
		?><div class="describe"><?php echo $company;?></div><?php
		}
	}
}
else
{
		
		?>
		<script type="text/javascript">
			alert('В данной категории нет данных');
		</script>
		<?php
}
	

	?>
	<?php
	require_once('footer.php');
	?>
</body>
</html>