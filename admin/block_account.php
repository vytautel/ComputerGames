<?php

include '../login/functions.php';

if ($_POST != null) {
    $e_id = $_POST['account_block_id'];

    $sql = "UPDATE paskyros SET blokavimas = 'blokuota'
    WHERE id='$e_id'";

    if (!mysqli_query($db, $sql)) {
        die('Klaida trinant:' . mysqli_error($db));
    }

    $_SESSION['add_msg'] = 'Paskyra užblokuota';
    header('Location: accounts.php');
}

?>
