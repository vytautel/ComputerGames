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
<?php
LoadMenu();
if (isset($_SESSION['add_msg'])) { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['add_msg']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['add_msg']);}
?>
</select>

<div class="container">
 <form method='post' action="add_product.php">
 <div class="row">
    <?php
    LoadFormInput('Pavadinimas', 'pavadinimas', 'text', 'input', ' ', true);
    LoadFormInput(
        'Gavėjo miestas',
        'gavejo_miestas',
        'text',
        'input',
        '',
        true
    );
    ?>
 </div>
 <div class="row">
    <?php
    LoadFormInput('Gavimo laikas', 'gavimo_laikas', 'date', 'input', '', false);
    LoadFormInput(
        'Išsiuntimo laikas',
        'issiuntimo_laikas',
        'date',
        'input',
        '',
        false
    );
    ?>
 </div>
 <div class="row">
    <?php LoadSelectInput('Statusas', 'siuntos_statusas', ''); ?>
 </div>
 <div class="row">
    <?php LoadFormInput('Aprašas', 'aprasas', 'text', 'textarea', '', false); ?>
 </div>
 <div class="row">
	<div class="form-group col-lg-2">
	<button type='submit' class="btn btn-secondary">
    Pridėti</button></div>
 </div>

 </form>
</div>


<div class="container">
<select id = "product_type" onchange="showProducts(this.value);">
<?php LoadStatusesFilter(); ?>
</select>

<div id='sortTable'>
</div>
</div>

</body>
</html>