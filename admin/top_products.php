<?php

/*ini_set('display_errors', 0);
 ini_set('display_startup_errors', 0);*/
include '../base.php';
include '../login/functions.php';
include '../database_functions.php';
include '../elements_load_functions.php';
include 'admin_functions.php';

CheckAccess();
?>
<html>
<head>
<link rel="stylesheet" href="../style.css">
<script type="text/javascript" src="../functions.js"></script>
</head>

<body>
<?php LoadMenu(); ?>

<p> Čia bus mėnesinio perkamiausių prekių ataskaita </p>

</body>
</html>