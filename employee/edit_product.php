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
    $e_id = $_POST['product_edit_id'];

    $sql = "SELECT * FROM prekes WHERE id=$e_id";
    $result = mysqli_query($GLOBALS['db'], $sql);

    while ($row = mysqli_fetch_array($result)) {
        $pavadinimas = $row['pavadinimas'];
        $gavejo_miestas = $row['gavejo_miestas'];
        $gavimo_laikas = $row['gavimo_laikas'];
        $issiuntimo_laikas = $row['issiuntimo_laikas'];
        $statuso_id = $row['statuso_id'];
        $aprasas = $row['aprasas'];
    }
} ?>

<div class="container">
 <form method='post' action="update_product.php">
  <input type="hidden" name="product_edit_id" value = "<?php echo $e_id; ?>" >
 <div class="row">
    <?php
    LoadFormInput(
        'Pavadinimas',
        'pavadinimas',
        'text',
        'input',
        $pavadinimas,
        true
    );
    LoadFormInput(
        'Gavėjo miestas',
        'gavejo_miestas',
        'text',
        'input',
        $gavejo_miestas,
        true
    );
    ?>
 </div>
 <div class="row">
    <?php
    LoadFormInput(
        'Gavimo laikas',
        'gavimo_laikas',
        'date',
        'input',
        date('Y-m-d', strtotime($gavimo_laikas)),
        false
    );
    LoadFormInput(
        'Išsiuntimo laikas',
        'issiuntimo_laikas',
        'date',
        'input',
        date('Y-m-d', strtotime($issiuntimo_laikas)),
        false
    );
    ?>
 </div>
 <div class="row">
    <?php LoadSelectInput('Statusas', 'siuntos_statusas', $statuso_id); ?>
 </div>
 <div class="row">
    <?php LoadFormInput(
        'Aprašas',
        'aprasas',
        'text',
        'textarea',
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