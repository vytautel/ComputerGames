<?php

include '../login/functions.php';

if ($_POST != null) {
    $e_id = $_POST['category_edit_id'];
    $pavadinimas = $_POST['pavadinimas'];
    $aprasas = $_POST['aprasas'];

    $sql = "UPDATE kategorijos SET pavadinimas = '$pavadinimas',
		aprasas = '$aprasas'
		WHERE id='$e_id'";

    if (!mysqli_query($db, $sql)) {
        die('Klaida įrašant:' . mysqli_error($db));
    }

    $_SESSION['add_msg'] = 'Kategorijos duomenys atnaujinti';
    header('Location: categories.php');
}

?>
