<?php

	echo "type: ".$_FILES['file']['type'];


?>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
	<input type="file" name="file"><br>
	<input type="submit" value="Upload Image" name="submit">
</form>