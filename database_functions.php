<?php
include 'login/connection.php';
function LoadProductsTable($filter, $canEdit)
{
    if ($filter == '') {
        $sql = "SELECT * FROM prekes LEFT JOIN statusai 
		ON prekes.statuso_id = statusai.stat_id";
    } else {
        $sql = "SELECT * FROM prekes LEFT JOIN statusai 
		ON prekes.statuso_id = statusai.stat_id
		WHERE statuso_id = '$filter'";
    }
    $result = mysqli_query($GLOBALS['db'], $sql);

    echo "<table id='sortableTable' class='table table-striped table-bordered table-responsive-md table-hover'>
	<thead><tr>
	<th onclick='tableSort(0, true)'>ID</th>
	<th onclick='tableSort(1, false)'>Pavadinimas</th>
	<th onclick='tableSort(2, false)'>Aprašas</th>
	<th onclick='tableSort(3, false)'>Gavėjo miestas</th>
	<th onclick='tableSort(4, false)'>Gavimo laikas</th>
	<th onclick='tableSort(5, false)'>Išsiuntimo laikas</th>
	<th onclick='tableSort(6, false)'>Statusas</th>";

    if ($canEdit) {
        echo '<th colspan=2></th>';
    }
    echo '</tr></thead><tbody>';

    while ($row = mysqli_fetch_array($result)) {
        $issiunt_data =
            strtotime($row['issiuntimo_laikas']) > 0
                ? date('Y-m-d', strtotime($row['issiuntimo_laikas']))
                : '';

        $gav_data =
            strtotime($row['gavimo_laikas']) > 0
                ? date('Y-m-d', strtotime($row['gavimo_laikas']))
                : '';

        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['pavadinimas'] . '</td>';
        echo '<td>' . $row['aprasas'] . '</td>';
        echo '<td>' . $row['gavejo_miestas'] . '</td>';
        echo '<td>' . $issiunt_data . '</td>';
        echo '<td>' . $gav_data . '</td>';
        echo '<td>' . $row['statusas'] . '</td>';

        if ($canEdit) {
            // removal button
            echo '<td>
                <form method="post" action="remove_product.php">
                <input type="hidden" name="product_removal_id" value=' .
                $row['id'] .
                '></input>
                <button type="submit" id="crudButton"><img src = "https://cdn0.iconfinder.com/data/icons/round-ui-icons/512/close_red.png"
                style = "height: 20px;"></button>
                </form>
            </td>';

            // edit button
            echo '<td id="myRow">
                <form method="post" action="edit_product.php">
                <input type="hidden" name="product_edit_id" value=' .
                $row['id'] .
                '></input>
                <button type="submit" id="crudButton"> <img src ="https://maxcdn.icons8.com/Share/icon/Editing//edit1600.png"
                style = "height: 20px;"></button>
                </form>
            </td>';
        }

        echo '</tr>';
    }
    echo '</tbody></table>';
}
function LoadProductForClient($id, $filter)
{
    if ($id != '') {
        if ($filter == '') {
            $sql = "SELECT * FROM prekes LEFT JOIN statusai 
        ON prekes.statuso_id = statusai.stat_id
        WHERE prekes.id = '$id'";
        } else {
            $sql = "SELECT * FROM prekes LEFT JOIN statusai 
        ON prekes.statuso_id = statusai.stat_id
        WHERE prekes.id = '$id' AND statusai.stat_id = '$filter'";
        }

        $result = mysqli_query($GLOBALS['db'], $sql);

        echo "<table id='sortableTable' class='table table-striped table-bordered table-sm'>
        <thead><tr>
        <th onclick='tableSort(0, true)'>ID</th>
        <th onclick='tableSort(1, false)'>Pavadinimas</th>
        <th onclick='tableSort(2, false)'>Aprašas</th>
        <th onclick='tableSort(3, false)'>Gavėjo miestas</th>
        <th onclick='tableSort(4, false)'>Gavimo laikas</th>
        <th onclick='tableSort(5, false)'>Išsiuntimo laikas</th>
        <th onclick='tableSort(6, false)'>Statusas</th>
        </tr></thead><tbody>";
        while ($row = mysqli_fetch_array($result)) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['pavadinimas'] . '</td>';
            echo '<td>' . $row['aprasas'] . '</td>';
            echo '<td>' . $row['gavejo_miestas'] . '</td>';
            echo '<td>' . $row['issiuntimo_laikas'] . '</td>';
            echo '<td>' . $row['gavimo_laikas'] . '</td>';
            echo '<td>' . $row['statusas'] . '</td>';
            echo '</tr>';
        }
        echo '</tbody></table>';
    }
}

function LoadStatusesFilter()
{
    $sql = 'SELECT * FROM statusai';
    $result = mysqli_query($GLOBALS['db'], $sql);

    echo '<option value="">Visos</option>';

    while ($row = mysqli_fetch_array($result)) {
        echo '<option value =' .
            $row['stat_id'] .
            '>' .
            ucfirst($row['statusas']) .
            '</option>';
    }
}

function LoadAccountsTable($canEdit)
{
    $sql = 'SELECT * FROM paskyros';
    $result = mysqli_query($GLOBALS['db'], $sql);

    echo "<table id='sortableTable' class='table table-striped table-bordered table-sm'>
    <thead><tr>
	<th onclick='tableSort(0, true)'>ID</th>
	<th onclick='tableSort(1, false)'>Username</th>
	<th onclick='tableSort(2, false)'>Paštas</th>
	<th onclick='tableSort(3, false)'>Teisės</th>
	<th onclick='tableSort(4, false)'>Blokavimas</th>";

    if ($canEdit) {
        echo '<th colspan=3></th>';
    }
    echo '</tr></thead><tbody>';
    while ($row = mysqli_fetch_array($result)) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['username'] . '</td>';
        echo '<td>' . $row['pastas'] . '</td>';
        echo '<td>' . $row['teises'] . '</td>';
        echo '<td>' . $row['blokavimas'] . '</td>';

        if ($canEdit) {
            // removal button
            echo '<td>
                <form method="post" action="remove_category.php">
                <input type="hidden" name="category_removal_id" value=' .
                $row['id'] .
                '></input>
                <button type="submit" id="crudButton"><img src = "https://cdn0.iconfinder.com/data/icons/round-ui-icons/512/close_red.png"
                style = "height: 20px;"></button>
                </form>
            </td>';

            // block button
            echo '<td>
                <form method="post" action="block_account.php">
                <input type="hidden" name="account_block_id" value=' .
                $row['id'] .
                '></input>
                <button type="submit" id="crudButton"> <img src ="https://cdn0.iconfinder.com/data/icons/shift-free/32/Block-512.png"
                style = "height: 20px;"></button>
                </form>
            </td>';

            // unblock button
            echo '<td>
                <form method="post" action="unblock_account.php">
                <input type="hidden" name="account_unblock_id" value=' .
                $row['id'] .
                '></input>
                <button type="submit" id="crudButton"> <img src ="https://static.thenounproject.com/png/3656360-200.png"
                style = "height: 20px;"></button>
                </form>
            </td>';
        }
        echo '</tr>';
    }
    echo '</tbody></table>';
}

function LoadCategoriesTable($canEdit)
{
    $sql = 'SELECT * FROM kategorijos';
    $result = mysqli_query($GLOBALS['db'], $sql);

    echo "<table id='sortableTable' class='table table-striped table-bordered table-sm'>
    <thead><tr>
	<th onclick='tableSort(0, true)'>ID</th>
	<th onclick='tableSort(1, false)'>Pavadinimas</th>
	<th onclick='tableSort(2, false)'>Aprašas</th>";

    if ($canEdit) {
        echo '<th colspan=2></th>';
    }
    echo '</tr></thead><tbody>';
    while ($row = mysqli_fetch_array($result)) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['pavadinimas'] . '</td>';
        echo '<td>' . $row['aprasas'] . '</td>';

        if ($canEdit) {
            // removal button
            echo '<td>
               <form method="post" action="remove_category.php">
               <input type="hidden" name="category_removal_id" value=' .
                $row['id'] .
                '></input>
               <button type="submit" id="crudButton"><img src = "https://cdn0.iconfinder.com/data/icons/round-ui-icons/512/close_red.png"
               style = "height: 20px;"></button>
               </form>
           </td>';

            // edit button
            echo '<td id="myRow">
               <form method="post" action="edit_category.php">
               <input type="hidden" name="category_edit_id" value=' .
                $row['id'] .
                '></input>
               <button type="submit" id="crudButton"> <img src ="https://maxcdn.icons8.com/Share/icon/Editing//edit1600.png"
               style = "height: 20px;"></button>
               </form>
           </td>';
        }
        echo '</tr>';
    }
    echo '</tbody></table>';
}
function LoadClientsTable($isOperator)
{
    $sql = 'SELECT * FROM klientai';
    $result = mysqli_query($GLOBALS['db'], $sql);

    echo "<table id='sortableTable' class='table table-striped table-bordered table-sm'>
    <thead><tr>
	<th onclick='tableSort(0, true)'>ID</th>
	<th onclick='tableSort(0, false)'>Vardas, pavardė</th>
	<th onclick='tableSort(0, false)'>Adresas</th>
	<th onclick='tableSort(0, false)'>Komentaras</th>";

    if ($isOperator) {
        echo '<th colspan=2></th>';
    }
    echo '</tr></thead><tbody>';
    while ($row = mysqli_fetch_array($result)) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['vardas_pavarde'] . '</td>';
        echo '<td>' . $row['adresas'] . '</td>';
        echo '<td>' . $row['komentaras'] . '</td>';

        if ($isOperator) {
            // removal button
            echo '<td>
                <form method="post" action="removeclient.php">
                <input type="hidden" name="client_removal_id" value=' .
                $row['id'] .
                '></input>
                <button type="submit" id="crudButton"><img src = "https://cdn0.iconfinder.com/data/icons/round-ui-icons/512/close_red.png"
                style = "height: 20px;"></button>
                </form>
            </td>';

            // edit button
            echo '<td>
                <form method="post" action="editclient.php">
                <input type="hidden" name="client_edit_id" value=' .
                $row['id'] .
                '></input>
                <button type="submit" id="crudButton"> <img src ="https://maxcdn.icons8.com/Share/icon/Editing//edit1600.png"
                style = "height: 20px;"></button>
                </form>
            </td>';
        }

        echo '</tr>';
    }
    echo '</tbody></table>';
}

?>
