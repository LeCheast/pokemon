<?php
require("database.php");

function login($name)
{
    global $db;
    $query = "SELECT * FROM users WHERE fname = :userName";

    $statement = $db->prepare($query);
    $statement->bindParam(':userName', $name);

    $statement->execute();

    $returnedUser = $statement->fetch();

    $statement->closeCursor();
    return $returnedUser;
}
