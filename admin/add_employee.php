<?php

include '../login/functions.php';

if ($_POST != null) {
    $username = $_POST['username'];
    $pastas = $_POST['pastas'];
    $teises = $_POST['teises'];
    $komentaras = $_POST['komentaras'];

    $sql = "INSERT INTO paskyros (username, pastas, teises, komentaras) 
		VALUES ('$username', '$pastas', '$teises', '$komentaras' )";

    if (!mysqli_query($db, $sql)) {
        die('Klaida įrašant:' . mysqli_error($db));
    }

    $_SESSION['add_msg'] = 'Paskyra išsaugota';
    header('Location: accounts.php');
}

?>
