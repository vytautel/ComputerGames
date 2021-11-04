<?php

/*ini_set('display_errors', 0);
 ini_set('display_startup_errors', 0);*/
include '../base.php';
include '../login/functions.php';
include '../database_functions.php';
include '../elements_load_functions.php';
include 'employee_functions.php';

CheckAccess();
?>
<html>
<head>
<link rel="stylesheet" href="../style.css">

<script type="text/javascript" src="../functions.js"></script>

<script>
function showProducts(str) {

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("sortTable").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET","filter.php?q="+str,true);
    xmlhttp.send();
}

$(document).ready(function(){
	showProducts(""); 
});

</script>

</head>

<body>
<?php LoadMenu(); ?>

<p>Čia yra darbuotojo namų puslapis</p>

</body>
</html>