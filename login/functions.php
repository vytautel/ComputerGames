<?php
session_start();
// connect to database
include 'connection.php';

if (!$db) {
    die(
        '<h1 style = "margin-left: auto; margin-right: auto; text-align: center; color: red" >Nepavyko prisijungti prie duomenų bazės</h1>'
    );
}

// variable declaration
$username = '';
$email = '';
$errors = [];

// escape string
function e($val)
{
    global $db;
    return mysqli_real_escape_string($db, trim($val));
}

function display_error()
{
    global $errors;

    if (count($errors) > 0) {
        echo '<div class="error">';
        foreach ($errors as $error) {
            echo $error . '<br>';
        }
        echo '</div>';
    }
}

function isLoggedIn()
{
    if (isset($_SESSION['user'])) {
        return true;
    } else {
        return false;
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header('location: login.php');
}

// call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
    login();
}

// LOGIN USER
function login()
{
    global $db, $username, $errors;

    // grap form values
    $username = e($_POST['username']);
    $password = e($_POST['password']);

    // make sure form is filled properly
    if (empty($username)) {
        array_push($errors, 'Reikalingas vartotojo vardas');
    }
    if (empty($password)) {
        array_push($errors, 'Reikalingas slaptažodis');
    }

    // attempt login if no errors on form
    if (count($errors) == 0) {
        $password = md5($password);

        $query = "SELECT * FROM prisijungimai WHERE username='$username' AND password='$password' LIMIT 1";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) == 1) {
            // user found
            // check if user is admin or user
            $logged_in_user = mysqli_fetch_assoc($results);
            $_SESSION['user'] = $logged_in_user;
            header('location: ../index.php');
        } else {
            array_push($errors, 'Blogas slaptažodis arba vartotojo vardas');
        }
    }
}

function isAdmin()
{
    if (isset($_SESSION['user']) && $_SESSION['user']['rights'] == 'admin') {
        return true;
    } else {
        return false;
    }
}

function isClient()
{
    if (isset($_SESSION['user']) && $_SESSION['user']['rights'] == 'client') {
        return true;
    } else {
        return false;
    }
}
function isEmployee()
{
    if (isset($_SESSION['user']) && $_SESSION['user']['rights'] == 'employee') {
        return true;
    } else {
        return false;
    }
}
