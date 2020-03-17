<?php

require("../model/dex_db.php");

$pokemonid = $_REQUEST['id'];

$pokemonStats = get_pokemon_stats($pokemonid);

var_dump($pokemonStats);
