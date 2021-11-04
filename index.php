
<html>
<head>
</head>

<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta name="robots" content="noindex" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="stilius_pastams.css">


<body>
</body>
</html>
<?php
/*ini_set('display_errors', 0);
 ini_set('display_startup_errors', 0);*/

include 'login/functions.php';
if (!isLoggedIn()) {
    $_SESSION['msg'] = 'Turite pirmiau prisijungti';
    header('location: login/login.php');
} elseif (isAdmin()) {
    header('location: admin/index.php');
} elseif (isEmployee()) {
    header('location: employee/index.php');
} elseif (isClient()) {
    header('location: client/index.php');
}


?>
