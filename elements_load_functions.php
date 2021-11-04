<?php
function LoadFormInput($title, $name, $type, $inputtype, $value, $required)
{
    echo '<div class="form-group col">
	<label for=' .
        $name .
        ' class="control-label">' .
        $title .
        ':</label>
	<' .
        $inputtype .
        ' name=' .
        strtolower($name) .
        ' type=' .
        $type .
        ' value="' .
        $value .
        '"
        class="form-control input-sm"';

    if ($required) {
        echo ' required ';
    }

    echo '>
    </' .
        $inputtype .
        '>
	</div>';
}

function LoadSelectInput($title, $name, $value)
{
    $sql = 'SELECT * FROM statusai';
    $result = mysqli_query($GLOBALS['db'], $sql);

    echo '<div class="form-group col">
	<label for=' .
        $name .
        ' class="control-label">' .
        $title .
        ':</label>
	<select name = ' .
        strtolower($name) .
        ' class="form-control input-sm" required>';
    while ($row = mysqli_fetch_array($result)) {
        echo '<option value =' . $row['stat_id'] . ' ';
        if ($value == $row['stat_id']) {
            echo ' selected ';
        }
        echo '>' . ucfirst($row['statusas']) . '</option>';
    }
    echo '</select></div>';
}
?>
