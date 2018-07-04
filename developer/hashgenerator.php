<!DOCTYPE html>
<html>
<head>
	<title>Hash Generator</title>
</head>
<body>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		Enter string to hash:<br>
		<input type="text" name="string"><br>
		<input type="submit" name="Submit">
	</form>
	<?php
	/**
	 * We just want to hash our password using the current DEFAULT algorithm.
	 * This is presently BCRYPT, and will produce a 60 character result.
	 *
	 * Beware that DEFAULT may change over time, so you would want to prepare
	 * By allowing your storage to expand past 60 characters (255 would be good)
	 */
	echo "Hash= " . password_hash($_POST["string"], PASSWORD_DEFAULT);
	?>

</body>
</html>

