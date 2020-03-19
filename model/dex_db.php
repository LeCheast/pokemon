<?php

require("database.php");

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'dexUpdate':
            session_start();
            update_dex($_SESSION['userid'], $_REQUEST['pokeid'], $_REQUEST['status']);
            break;
    }
}


function get_all_pokemon()
{
    global $db;
    $query = "SELECT p.pokeid, p.pokenum, p.name, t.tname AS 'type1', t.color AS 'color1', (SELECT tname FROM types WHERE typeid = p.type2) AS 'type2', (SELECT color FROM types WHERE typeid = p.type2) AS 'color2', p.url FROM pokemon AS p JOIN types AS t ON p.type1 = t.typeid";

    $statement = $db->prepare($query);
    $statement->execute();

    return $statement->fetchAll();
}

function get_pokemon_stats($id)
{
    global $db;
    $query = "SELECT p.pokeid, p.pokenum, p.name, t.tname AS 'type1', t.color AS 'color1', (SELECT tname FROM types WHERE typeid = p.type2) AS 'type2', (SELECT color FROM types WHERE typeid = p.type2) AS 'color2', p.total, p.hp, p.attack, p.defense, p.splatk, p.spldef, p.speed, p.url FROM pokemon AS p JOIN types AS t ON p.type1 = t.typeid WHERE p.pokeid = $id";

    $statement = $db->prepare($query);
    $statement->execute();

    return $statement->fetch();
}

function get_dex_statuses()
{
    global $db;
    $query = "SELECT * FROM dexstatus";

    $statement = $db->prepare($query);
    $statement->execute();

    return $statement->fetchAll();
}

function get_pokemon_dex_status($userid, $pokeid)
{
    global $db;
    $query = "SELECT * FROM dex WHERE userid = :userid AND pokeid = :pokeid";

    $statement = $db->prepare($query);
    $statement->bindParam(':userid', $userid);
    $statement->bindParam(':pokeid', $pokeid);

    $statement->execute();
    return $statement->fetch();
}

function update_dex($userid, $pokeid, $status)
{
    global $db;
    $query = "UPDATE dex SET status = :status WHERE pokeid = :pokeid AND userid = :userid";

    $statement = $db->prepare($query);
    $statement->bindParam(':status', $status);
    $statement->bindParam(':pokeid', $pokeid);
    $statement->bindParam(':userid', $userid);

    $statement->execute();
}
