<?php
	session_start();

	if (!isset($_SESSION['userID'])) {
		header('Location: login.php');
		exit();
	}
?>
<html>
<head>
</head>
<body>
<h1> ici </h1>
</body>
</html>

