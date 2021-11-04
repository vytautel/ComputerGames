<?php

include '../login/functions.php';

if ($_POST != null) {
    $e_id = $_POST['account_unblock_id'];

    $sql = "UPDATE paskyros SET blokavimas = 'aktyvi'
    WHERE id='$e_id'";

    if (!mysqli_query($db, $sql)) {
        die('Klaida trinant:' . mysqli_error($db));
    }

    $_SESSION['add_msg'] = 'Paskyra atblokuota';
    header('Location: accounts.php');
}

?>
