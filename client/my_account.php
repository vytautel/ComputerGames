<?php

/*ini_set('display_errors', 0);
 ini_set('display_startup_errors', 0);*/
include '../base.php';
include '../login/functions.php';
include '../database_functions.php';
include '../elements_load_functions.php';
include 'client_functions.php';

CheckAccess();
?>
<html>
<head>
<link rel="stylesheet" href="../style.css">

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


<?php
/* KOL KAS PARENKAMAS BET KURIS PIRMAS ACOUNTAS */
$sql = 'SELECT * FROM paskyros LIMIT 1';
$result = mysqli_query($GLOBALS['db'], $sql);

while ($row = mysqli_fetch_array($result)) {
    $username = $row['username'];
    $pastas = $row['pastas'];
    $komentaras = $row['komentaras'];
}
?>

<div class="container">
 <form method='post' action="update_account.php">
 <input type="hidden" name="account_edit_id" value = "<?php echo $e_id; ?>" >
 <div class="row">
    <?php
    LoadFormInput(
        'Vartotojo vardas',
        'username',
        'text',
        'input',
        $username,
        true
    );
    LoadFormInput('El. paštas', 'pastas', 'text', 'input', $pastas, true);
    ?>
 </div>
 <div class="row">
    <?php LoadFormInput(
        'Komentaras',
        'komentaras',
        'text',
        'textarea',
        $komentaras,
        false
    ); ?>
 </div>
 <div class="row">
	<div class="form-group col-lg-2">
	<button type='submit' class="btn btn-secondary">
    Išsaugoti</button></div>
 </div>

 </form>
</div>


</body>
</html>