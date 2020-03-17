<?php
require("./model/login_out_db.php");

$returnedUser = login($_REQUEST["fname"]);

// var_dump($returnedUser);

if ($returnedUser) {
    session_start();

    $_SESSION["logged_in"] = TRUE;
    $_SESSION["userid"] = $returnedUser["userid"];
    $_SESSION['fname'] = $returnedUser["fname"];

    header("Location: /home");
} else {
    header("Location: /");
}
