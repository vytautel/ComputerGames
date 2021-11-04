<?php
function CheckAccess()
{
    if (!isLoggedIn()) {
        $_SESSION['msg'] = 'Turite pirmiau prisijungti';
        header('location: ../login/login.php');
    } elseif (isAdmin()) {
        header('location: ../admin/index.php');
    } elseif (isClient()) {
        header('location: ../client/index.php');
    }
}

function LoadMenu()
{
    echo '<ul class="menu">
        <li><a href="products.php">Prekės</a></li>
        <li><a href="orders.php">Užsakymai</a></li>
        <li><a href="categories.php">Kategorijos</a></li>
        <li id ="logOut"><a href="index.php?logout="1"">Atsijungti</a></li>  
    </ul>';
}

?>
