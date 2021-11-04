<?php

include '../login/functions.php';

if ($_POST != null) {
    $pavadinimas = $_POST['pavadinimas'];
    $aprasas = $_POST['aprasas'];
    $gavejo_miestas = $_POST['gavejo_miestas'];
    $siunt_laikas = $_POST['issiuntimo_laikas'];
    $gav_laikas = $_POST['gavimo_laikas'];
    $statusas = $_POST['siuntos_statusas'];

    $sql = "INSERT INTO prekes (pavadinimas, 
        aprasas, gavejo_miestas, issiuntimo_laikas,
        gavimo_laikas, statuso_id) 
		VALUES ('$pavadinimas', '$aprasas','$gavejo_miestas',
         '$siunt_laikas','$gav_laikas','$statusas' )";

    if (!mysqli_query($db, $sql)) {
        die('Klaida įrašant:' . mysqli_error($db));
    }

    $_SESSION['add_msg'] = 'Prekė pridėtaa';
    header('Location: products.php');
}

?>
