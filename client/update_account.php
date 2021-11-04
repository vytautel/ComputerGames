<?php

include '../login/functions.php';

if ($_POST != null) {
    $sql = 'SELECT * FROM paskyros LIMIT 1';
    $result = mysqli_query($GLOBALS['db'], $sql);

    while ($row = mysqli_fetch_array($result)) {
        $e_id = $row['id'];
    }

    $username = $_POST['username'];
    $pastas = $_POST['pastas'];
    $komentaras = $_POST['komentaras'];

    $sql = "UPDATE paskyros SET username = '$username',
		pastas = '$pastas', komentaras = '$komentaras'
		WHERE id='$e_id'";

    if (!mysqli_query($db, $sql)) {
        die('Klaida įrašant:' . mysqli_error($db));
    }

    $_SESSION['add_msg'] = 'Paskyros duomenys atnaujinti';
    header('Location: my_account.php');
}

?>
