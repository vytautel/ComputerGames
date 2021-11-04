<?php

include '../login/functions.php';

if ($_POST != null) {
    $pavadinimas = $_POST['pavadinimas'];
    $aprasas = $_POST['aprasas'];

    $sql = "INSERT INTO kategorijos (pavadinimas, 
        aprasas) 
		VALUES ('$pavadinimas', '$aprasas' )";

    if (!mysqli_query($db, $sql)) {
        die('Klaida įrašant:' . mysqli_error($db));
    }

    $_SESSION['add_msg'] = 'Kategorija pridėtaa';
    header('Location: categories.php');
}

?>
