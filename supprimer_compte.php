<?php
    session_start();

    require 'classes/database.php';
    require 'classes/User.php';

    $bd = new Database("localhost","root","","memory");

    $user = new User($bd); 

    $id = $_SESSION['id']; 

    if (isset($_GET['supp'])) {
        if ($_GET['supp'] == "ok") {
            $user->delete($id);
        }
    }

    unset($_SESSION);
    session_destroy();
    header("location: index.php");
?>