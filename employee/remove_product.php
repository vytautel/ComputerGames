<?php

include '../login/functions.php';

if ($_POST != null) {
    $r_id = $_POST['product_removal_id'];

    $sql = "DELETE FROM prekes WHERE id=$r_id";
    if (!mysqli_query($db, $sql)) {
        die('Klaida trinant:' . mysqli_error($db));
    }

    $_SESSION['add_msg'] = 'Prekė pašalinta';
    header('Location: products.php');
}

?>
