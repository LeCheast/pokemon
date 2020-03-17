<?php

require("database.php");

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
