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

</head>

<body>
<?php LoadMenu(); ?>

<?php if ($_POST != null) {
    $e_id = $_POST['category_edit_id'];

    $sql = "SELECT * FROM kategorijos WHERE id=$e_id";
    $result = mysqli_query($GLOBALS['db'], $sql);

    while ($row = mysqli_fetch_array($result)) {
        $pavadinimas = $row['pavadinimas'];
        $aprasas = $row['aprasas'];
    }
} ?>

<div class="container">
 <form method='post' action="update_category.php">
  <input type="hidden" name="category_edit_id" value = "<?php echo $e_id; ?>" >
 <div class="row">
    <?php LoadFormInput(
        'Pavadinimas',
        'pavadinimas',
        'text',
        'input',
        $pavadinimas,
        true
    ); ?>
 </div>
 <div class="row">
    <?php LoadFormInput(
        'Aprašas',
        'aprasas',
        'text',
        'input',
        $aprasas,
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