<?php

include '../login/functions.php';

if ($_POST != null) {
    $r_id = $_POST['account_removal_id'];

    $sql = "DELETE FROM paskyros WHERE id=$r_id";
    if (!mysqli_query($db, $sql)) {
        die('Klaida trinant:' . mysqli_error($db));
    }

    $_SESSION['add_msg'] = 'Paskyra pašalinta';
    header('Location: accounts.php');
}

?>
