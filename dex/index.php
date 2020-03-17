<?php

// TODO if this becomes it's own page -- check if logged in like on home index.php

require("../model/dex_db.php");

$pokemons = get_all_pokemon();
?>

<style>
    .card {
        margin-top: 10px;
    }

    .card-img-top {
        width: 50%;
        margin-left: 25%;
    }

    .card-img-div {
        height: 127px;
    }

    .default-img {
        margin-top: 20%;
    }

    .pokemon-type {
        padding-left: 5px;
        padding-right: 5px;
        border-radius: 6px;
    }

    .hidden {
        display: none;
    }

    @media(max-width: 575px) {
        .card-img-div {
            height: 100%;
        }
    }
</style>

<div class="container">

    <input id="searchBar" type="text" class="form-control" placeholder="Search" />

    <div class="row">
        <?php foreach ($pokemons as $pokemon) : ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 card-container">
                <div class="card">
                    <div class="card-img-div">
                        <img class="card-img-top <?php echo ($pokemon['url'] == null ? "default-img" : "") ?>" src="<?php echo ($pokemon['url'] == null ? "../images/pokemon-logo.png" : $pokemon['url']) ?>" alt="<?= $pokemon['name'] ?> image">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $pokemon['name']; ?> #<?= $pokemon['pokenum']; ?></h5>
                        <p class="card-text">
                            <span class="pokemon-type" style="background-color: <?= $pokemon['color1'] ?>"><?= $pokemon['type1'] ?></span>
                            <span class="pokemon-type" style="background-color: <?= $pokemon['color2'] ?>"><?= $pokemon['type2'] ?></span>
                        </p>
                        <!-- TODO if dex becomes it's own page change href link -->
                        <a href="../dex/info.php?id=<?= $pokemon["pokeid"] ?>" class="btn btn-primary">See Profile</a>
                    </div>
                </div>
                <p class="hidden searchable"><?= $pokemon['pokenum'] ?></p>
                <p class="hidden searchable"><?= $pokemon['name'] ?></p>
                <p class="hidden searchable"><?= $pokemon['type1'] ?></p>
                <p class="hidden searchable"><?= $pokemon['type2'] ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
    $(document).ready(function() {

        $("#searchBar").on("input", function() {
            var searchText = $(this).val();
            if (searchText == '') {
                $(".card-container").removeClass("hidden");
            } else {
                $(".card-container").addClass("hidden");
            }

            $(".searchable").each(function() {
                var $this = $(this);
                if ($this.text().toLowerCase().includes(searchText.toLowerCase())) {
                    $this.parent().removeClass("hidden");
                }
            });
        });
    });
</script>