<?php

session_start();
if (!isset($_SESSION["logged_in"])) {
    header("Location: /");
}

require("../model/dex_db.php");

$pokemonid = $_REQUEST['id'];

$pokemonStats = get_pokemon_stats($pokemonid);

$pokemonStatuses = get_dex_statuses();

$pokemonDexStatus = get_pokemon_dex_status($_SESSION['userid'], $pokemonid);
?>

<?php include("../view/header.php"); ?>

<style>
    .pokemon-type {
        padding-left: 5px;
        padding-right: 5px;
        border-radius: 6px;
    }

    .default-img {
        width: 240px;
        margin: 20px 0;
    }

    @media(max-width: 530px) {
        table {
            display: none;
        }

        .mobile-stats {
            display: block;
        }

        img {
            width: 60%;
            margin-left: 20%;
        }

        .default-img {
            width: 80%;
            margin-left: 10%;
        }
    }

    @media(min-width: 530px) {
        table {
            display: inline-table;
        }

        .mobile-stats {
            display: none;
        }
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <img class="<?php echo ($pokemonStats['url'] == null ? "default-img" : "") ?>" src="<?php echo ($pokemonStats['url'] == null ? "../images/pokemon-logo.png" : $pokemonStats['url']) ?>" alt="<?= $pokemonStats['name'] ?> image">

            <h1 id="pokemon" data-pokeid="<?= $pokemonStats['pokeid'] ?>"><?= $pokemonStats['name'] ?> #<?= $pokemonStats['pokenum'] ?></h1>

            <span class="pokemon-type" style="background-color: <?= $pokemonStats['color1'] ?>"><?= $pokemonStats['type1'] ?></span>
            <span class="pokemon-type" style="background-color: <?= $pokemonStats['color2'] ?>"><?= $pokemonStats['type2'] ?></span>

            <select id="caughtStatus" class="form-control">
                <?php foreach ($pokemonStatuses as $pokemonstatus) : ?>
                    <option value="<?= $pokemonstatus['dexstatusid'] ?>" <?php echo ($pokemonstatus['dexstatusid'] == $pokemonDexStatus['status'] ? "selected" : "") ?>>
                        <?= $pokemonstatus['statusname'] ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <table class="table">
                <thead>
                    <th>Total</th>
                    <th>HP</th>
                    <th>Attack</th>
                    <th>Defense</th>
                    <th>Spl. Attack</th>
                    <th>Spl. Defense</th>
                    <th>Speed</th>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $pokemonStats['total'] ?></td>
                        <td><?= $pokemonStats['hp'] ?></td>
                        <td><?= $pokemonStats['attack'] ?></td>
                        <td><?= $pokemonStats['defense'] ?></td>
                        <td><?= $pokemonStats['splatk'] ?></td>
                        <td><?= $pokemonStats['spldef'] ?></td>
                        <td><?= $pokemonStats['speed'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mobile-stats col-lg-12">
            <h3>Total</h3>
            <p><?= $pokemonStats['total'] ?></p>
            <hr>

            <h3>HP</h3>
            <p><?= $pokemonStats['hp'] ?></p>
            <hr>

            <h3>Attack</h3>
            <p><?= $pokemonStats['attack'] ?></p>
            <hr>

            <h3>Defense</h3>
            <p><?= $pokemonStats['defense'] ?></p>
            <hr>

            <h3>Special Attack</h3>
            <p><?= $pokemonStats['splatk'] ?></p>
            <hr>

            <h3>Special Defense</h3>
            <p><?= $pokemonStats['spldef'] ?></p>
            <hr>

            <h3>Speed</h3>
            <p><?= $pokemonStats['speed'] ?></p>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $('#caughtStatus').on('change', function() {
            var status = $('#caughtStatus').val();

            var ajaxurl = "/model/dex_db.php";
            var data = {
                'action': 'dexUpdate',
                'pokeid': $('#pokemon').attr('data-pokeid'),
                'status': status
            };

            debugger;

            $.post(ajaxurl, data, function(response) {
                if (response == '') {
                    location.reload();
                } else {
                    alert(response);
                }
            });
        });
    });
</script>

<?php include("../view/footer.php"); ?>