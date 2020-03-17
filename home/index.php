<?php
session_start();
if (!isset($_SESSION["logged_in"])) {
    header("Location: /");
}
?>

<?php include("../view/header.php"); ?>
<title>Home - Pokemon DnD</title>

<div class="container">
    <h1>Hello <?= $_SESSION["fname"] ?></h1>
</div>

<?php include("../dex/index.php"); ?>

<?php include("../view/footer.php"); ?>