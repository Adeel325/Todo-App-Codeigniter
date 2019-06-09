<!DOCTYPE html>
<html>
<head>
	<title>User View</title>
</head>
<body>
	<h1>Hello World</h1>
	<?php 

	foreach ($users as $object) {
			echo $object->username. '<br>';
			echo $object->password. '<br>';
		}

	 ?>
</body>
</html>