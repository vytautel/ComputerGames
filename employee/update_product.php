<?php

include '../login/functions.php';

if ($_POST != null) {
    $e_id = $_POST['product_edit_id'];
    $pavadinimas = $_POST['pavadinimas'];
    $aprasas = $_POST['aprasas'];
    $gavejo_miestas = $_POST['gavejo_miestas'];
    $siunt_laikas = $_POST['issiuntimo_laikas'];
    $gav_laikas = $_POST['gavimo_laikas'];
    $statusas = $_POST['siuntos_statusas'];

    $sql = "UPDATE prekes SET pavadinimas = '$pavadinimas',
		aprasas = '$aprasas', gavejo_miestas = '$gavejo_miestas', 
		issiuntimo_laikas = '$siunt_laikas',
		gavimo_laikas = '$gav_laikas',
		statuso_id = '$statusas'
		WHERE id='$e_id'";

    if (!mysqli_query($db, $sql)) {
        die('Klaida įrašant:' . mysqli_error($db));
    }

    $_SESSION['add_msg'] = 'Prekės duomenys atnaujinti';
    header('Location: products.php');
}

?>
