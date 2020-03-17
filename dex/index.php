<?php

// TODO if this becomes it's own page -- check if logged in like on home index.php

require("../model/dex_db.php");

$pokemons = get_all_pokemon();
?>

<div class="container">
    <input type="text" class="form-control" placeholder="Search" />
    <div class="row">
        <?php foreach ($pokemons as $pokemon) : ?>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <p style="text-align: center;"><?= $pokemon['name'] ?><br>
                    <span style="background-color: <?= $pokemon['color1'] ?>"><?= $pokemon['type1'] ?></span><br>
                    <span style="background-color: <?= $pokemon['color2'] ?>"><?= $pokemon['type2'] ?></span>
                </p>
            </div>
        <?php endforeach; ?>
    </div>
</div>