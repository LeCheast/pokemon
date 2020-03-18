<!DOCTYPE html>
<html lang="en">

<style>
    #pokemonLogo {
        width: 120px;
    }

    #siteNavBar {
        background-color: #E3350D !important;
    }

    .nav-link {
        color: white !important;
    }

    .navbar-dark .navbar-toggler {
        border-color: white !important;
    }

    .navbar-dark .navbar-toggler-icon {
        background-image: url("../images/pokeball.png") !important;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
</head>

<body>
    <nav id="siteNavBar" class="navbar-expand-lg navbar navbar-dark bg-primary">
        <a class="navbar-brand" href="/home">
            <img id="pokemonLogo" src="../images/pokemon-logo.png" alt="pokemon logo" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/home">Home</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/logout.php">Signout</a>
                </li>
            </ul>
        </div>
    </nav>