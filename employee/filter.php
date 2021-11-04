<?php

/*ini_set('display_errors', 0);
 ini_set('display_startup_errors', 0);*/
include '../login/functions.php';
include '../database_functions.php';
include 'employee_functions.php';

CheckAccess();
?>
<html>
<head>
<link rel="stylesheet" href="../style.css">

</head>
<body>

<?php LoadProductsTable($_GET['q'], true); ?>

</body>
</html>