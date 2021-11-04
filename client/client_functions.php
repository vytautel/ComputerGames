<?php
function CheckAccess()
{
    if (!isLoggedIn()) {
        $_SESSION['msg'] = 'Turite pirmiau prisijungti';
        header('location: ../login/login.php');
    } elseif (isAdmin()) {
        header('location: ../admin/index.php');
    } elseif (isEmployee()) {
        header('location: ../employee/index.php');
    }
}
function LoadMenu()
{
    echo '<ul class="menu">
    <li><a href="index.php">Parduotuvė</a></li>
    <li><a href="my_account.php">Mano paskyra</a></li>
    <li><a href="my_orders.php">Mano užsakymai</a></li>
    <li id ="logOut"><a href="index.php?logout="1"">Atsijungti</a></li>  
    </ul>';
}

?>
