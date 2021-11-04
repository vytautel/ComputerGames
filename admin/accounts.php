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

<?php
LoadMenu($db);

if (isset($_SESSION['add_msg'])) { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['add_msg']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['add_msg']);}
?>


<div class="container">
 <form method='post' action="add_employee.php">
 <div class="row">
    <?php
    LoadFormInput('Vartotojo vardas', 'username', 'text', 'input', '', true);
    LoadFormInput('El.paštas', 'pastas', 'email', 'input', '', true);
    LoadFormInput('Teisės', 'teises', 'text', 'input', '', true);
    ?>
 </div>
 <div class="row">
    <?php LoadFormInput(
        'Komentaras',
        'komentaras',
        'text',
        'textarea',
        '',
        false
    ); ?>
 </div>
 <div class="row">
	<div class="form-group col-lg-2">
	<button type='submit' class="btn btn-secondary">
    Pridėti</button></div>
 </div>

 </form>
</div>


<div class="container">
<?php LoadAccountsTable($db); ?>
</div>

</body>
</html>