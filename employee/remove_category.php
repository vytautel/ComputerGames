<?php

include '../login/functions.php';

if ($_POST != null) {
    $r_id = $_POST['category_removal_id'];

    $sql = "DELETE FROM kategorijos WHERE id=$r_id";
    if (!mysqli_query($db, $sql)) {
        die('Klaida trinant:' . mysqli_error($db));
    }

    $_SESSION['add_msg'] = 'Kategorija pašalinta';
    header('Location: categories.php');
}

?>
