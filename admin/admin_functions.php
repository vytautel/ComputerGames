<?php
function CheckAccess()
{
    if (!isLoggedIn()) {
        $_SESSION['msg'] = 'Turite pirmiau prisijungti';
        header('location: ../login/login.php');
    } elseif (isEmployee()) {
        header('location: ../employee/index.php');
    } elseif (isClient()) {
        header('location: ../client/index.php');
    }
}

function LoadMenu()
{
    echo '<ul class="menu">
        <li><a href="accounts.php">Naudotojai</a></li>
        <li><a href="reports.php">Ataskaitos</a></li>
        <li><a href="products.php">Prekės</a></li>
        <li id ="logOut"><a href="index.php?logout="1"">Atsijungti</a></li>  
        </ul>';
}
?>
